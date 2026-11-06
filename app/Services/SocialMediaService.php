<?php

namespace App\Services;

use App\Models\SocialToken;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SocialMediaService
{
    protected int $cacheTtl = 3600; // 1 hour for fresh cache
    protected int $staleTtl = 60 * 60 * 24 * 7; // 7 days for stale cache

    /**
     * Facebook Page likes/followers + recent posts via Meta Graph API or fallback feed.
     */
    public function getFacebookData(): array
    {
        return $this->rememberWithFallback('social_media_facebook', function () {
            $pageId = config('services.facebook.page_id') ?: '61568721061263';
            $token = config('services.facebook.page_access_token');

            if ($token) {
                $response = Http::timeout(5)->get("https://graph.facebook.com/v19.0/{$pageId}", [
                    'fields' => 'fan_count,followers_count,posts.limit(5){message,created_time,full_picture,likes.summary(true),comments.summary(true),permalink_url}',
                    'access_token' => $token,
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $posts = collect($data['posts']['data'] ?? [])->map(function ($post) {
                        return [
                            'text' => $post['message'] ?? '',
                            'date' => isset($post['created_time'])
                                ? \Carbon\Carbon::parse($post['created_time'])->format('M j')
                                : '',
                            'image' => $post['full_picture'] ?? null,
                            'likes' => $post['likes']['summary']['total_count'] ?? 0,
                            'comments' => $post['comments']['summary']['total_count'] ?? 0,
                            'permalink' => $post['permalink_url'] ?? 'https://www.facebook.com/people/Journey-Begins/61568721061263/',
                        ];
                    })->values()->all();

                    return [
                        'likes' => $data['fan_count'] ?? 552,
                        'followers' => $data['followers_count'] ?? ($data['fan_count'] ?? 560),
                        'posts' => $posts,
                    ];
                }
            }

            return $this->getFallbackFacebookData();
        });
    }

    /**
     * Instagram Business/Creator account stats + media via Instagram Graph API or fallback feed.
     */
    public function getInstagramData(): array
    {
        return $this->rememberWithFallback('social_media_instagram', function () {
            $igUserId = config('services.instagram.business_account_id');
            $token = config('services.instagram.access_token');

            if ($igUserId && $token) {
                $profile = Http::timeout(5)->get("https://graph.facebook.com/v19.0/{$igUserId}", [
                    'fields' => 'followers_count,follows_count,media_count',
                    'access_token' => $token,
                ]);

                $media = Http::timeout(5)->get("https://graph.facebook.com/v19.0/{$igUserId}/media", [
                    'fields' => 'caption,media_type,media_url,thumbnail_url,permalink,timestamp,like_count,comments_count',
                    'limit' => 6,
                    'access_token' => $token,
                ]);

                if ($profile->successful() && $media->successful()) {
                    $profileData = $profile->json();
                    $posts = collect($media->json()['data'] ?? [])->map(function ($item) {
                        $isVideo = in_array($item['media_type'] ?? '', ['VIDEO', 'REEL']);
                        return [
                            'type' => $isVideo ? 'reel' : 'post',
                            'caption' => $item['caption'] ?? '',
                            'image' => $isVideo ? ($item['thumbnail_url'] ?? $item['media_url']) : $item['media_url'],
                            'likes' => $item['like_count'] ?? 0,
                            'date' => isset($item['timestamp'])
                                ? \Carbon\Carbon::parse($item['timestamp'])->format('M j')
                                : '',
                            'link' => $item['permalink'] ?? 'https://www.instagram.com/jour.neybegins0/',
                        ];
                    })->values()->all();

                    return [
                        'followers' => $profileData['followers_count'] ?? 64,
                        'following' => $profileData['follows_count'] ?? 107,
                        'posts_count' => $profileData['media_count'] ?? 31,
                        'posts' => $posts,
                    ];
                }
            }

            return $this->getFallbackInstagramData();
        });
    }

    /**
     * TikTok stats + recent videos via TikTok Display API or fallback feed.
     */
    public function getTikTokData(): array
    {
        return $this->rememberWithFallback('social_media_tiktok', function () {
            try {
                $token = $this->getValidTikTokAccessToken();

                $userInfo = Http::timeout(5)->withToken($token)
                    ->get('https://open.tiktokapis.com/v2/user/info/', [
                        'fields' => 'display_name,follower_count,likes_count,video_count',
                    ]);

                $videoList = Http::timeout(5)->withToken($token)
                    ->post('https://open.tiktokapis.com/v2/video/list/', [
                        'max_count' => 6,
                    ], [
                        'fields' => 'id,cover_image_url,share_url,view_count,like_count,comment_count,video_description,create_time',
                    ]);

                if ($userInfo->successful() && $videoList->successful()) {
                    $user = $userInfo->json()['data']['user'] ?? [];
                    $videos = collect($videoList->json()['data']['videos'] ?? [])->map(function ($video) {
                        return [
                            'id' => $video['id'],
                            'caption' => $video['video_description'] ?? '',
                            'cover' => $video['cover_image_url'] ?? null,
                            'views' => $this->formatCount($video['view_count'] ?? 0),
                            'likes' => $video['like_count'] ?? 0,
                            'comments' => $video['comment_count'] ?? 0,
                            'date' => isset($video['create_time'])
                                ? \Carbon\Carbon::createFromTimestamp($video['create_time'])->format('M j')
                                : '',
                            'url' => $video['share_url'] ?? 'https://www.tiktok.com/@journey_begins3',
                        ];
                    })->values()->all();

                    return [
                        'followers' => $user['follower_count'] ?? 450,
                        'likes' => $user['likes_count'] ?? 1200,
                        'video_count' => $user['video_count'] ?? 18,
                        'videos' => $videos,
                    ];
                }
            } catch (\Throwable $e) {
                // API not authorized or request failed
            }

            return $this->getFallbackTikTokData();
        });
    }

    protected function getValidTikTokAccessToken(): string
    {
        $tokenRecord = SocialToken::where('provider', 'tiktok')->first();

        if (!$tokenRecord) {
            throw new \RuntimeException('No TikTok authorization found.');
        }

        if (!$tokenRecord->isAccessTokenExpired()) {
            return $tokenRecord->access_token;
        }

        $response = Http::asForm()->post('https://open.tiktokapis.com/v2/oauth/token/', [
            'client_key' => config('services.tiktok.client_key'),
            'client_secret' => config('services.tiktok.client_secret'),
            'grant_type' => 'refresh_token',
            'refresh_token' => $tokenRecord->refresh_token,
        ]);

        if (!$response->successful()) {
            throw new \RuntimeException('Failed to refresh TikTok token: ' . $response->body());
        }

        $data = $response->json();

        $tokenRecord->update([
            'access_token' => $data['access_token'],
            'refresh_token' => $data['refresh_token'],
            'access_token_expires_at' => now()->addSeconds($data['expires_in']),
            'refresh_token_expires_at' => now()->addSeconds($data['refresh_expires_in']),
        ]);

        return $tokenRecord->access_token;
    }

    protected function rememberWithFallback(string $key, \Closure $callback): array
    {
        $freshKey = $key;
        $staleKey = $key . '_stale';

        if (Cache::has($freshKey)) {
            return Cache::get($freshKey);
        }

        try {
            $data = $callback();
            if (!empty($data)) {
                Cache::put($freshKey, $data, $this->cacheTtl);
                Cache::put($staleKey, $data, $this->staleTtl);
                return $data;
            }
        } catch (\Throwable $e) {
            Log::error("SocialMediaService [{$key}] error: " . $e->getMessage());

            if (Cache::has($staleKey)) {
                return Cache::get($staleKey);
            }
        }

        return $this->getFallbackDataForKey($key);
    }

    protected function getFallbackDataForKey(string $key): array
    {
        if ($key === 'social_media_facebook') {
            return $this->getFallbackFacebookData();
        }
        if ($key === 'social_media_instagram') {
            return $this->getFallbackInstagramData();
        }
        if ($key === 'social_media_tiktok') {
            return $this->getFallbackTikTokData();
        }

        return [];
    }

    protected function getFallbackFacebookData(): array
    {
        return [
            'likes' => 552,
            'followers' => 552,
            'following' => 4,
            'intro' => "Explore Nepal with ease, comfort, and reliability. Whether you're headed for a weekend getaway or a business trip, we've got the perfect ride for you. 🛞✨\nFOLLOW US FOR GETTING RUPEES 500 OFF ON EVERY BOOKING.🇳🇵",
            'phone' => '+977 984-1912259 / 980-1299457',
            'location' => 'Bhaktapur, Nepal',
            'posts' => [
                [
                    'text' => "Your Driving Partner in Nepal. #shrawanspecial #selfdrive #Carrental ✨ FOLLOW US FOR GETTING RUPEES 500 OFF ON EVERY BOOKING! 🚘🇳🇵\n\nCall/WhatsApp: 9840002796 / 9801299457",
                    'date' => '5h ago',
                    'image' => '/images/hero/hero1.png',
                    'likes' => 45,
                    'comments' => 8,
                    'permalink' => 'https://www.facebook.com/people/Journey-Begins/61568721061263/',
                ],
                [
                    'text' => "✨ Explore Nepal with ease, comfort, and reliability! Whether you're planning a weekend getaway to Pokhara, Chitwan, or executive transport in Kathmandu, Journey Begins has the perfect rental car for you. 🚘 🇳🇵",
                    'date' => 'Jul 22',
                    'image' => '/images/bydatto3blue.png',
                    'likes' => 34,
                    'comments' => 6,
                    'permalink' => 'https://www.facebook.com/people/Journey-Begins/61568721061263/',
                ],
                [
                    'text' => "Looking for premium luxury or electric vehicles in Nepal? We offer BYD Atto 3, Hyundai Creta, Mahindra Scorpio N, and more for self-drive or with professional drivers! 🚗⚡",
                    'date' => 'Jul 18',
                    'image' => '/images/byd%20atto3.png',
                    'likes' => 48,
                    'comments' => 11,
                    'permalink' => 'https://www.facebook.com/people/Journey-Begins/61568721061263/',
                ],
                [
                    'text' => "Airport transfers available 24/7 in Kathmandu! Safe, reliable, and comfortable pickup right when you land at TIA. Call or WhatsApp us anytime! ✈️🚘",
                    'date' => 'Jul 12',
                    'image' => '/images/hero/hero2.png',
                    'likes' => 29,
                    'comments' => 4,
                    'permalink' => 'https://www.facebook.com/people/Journey-Begins/61568721061263/',
                ],
                [
                    'text' => "Planning a family trip to Pokhara or Sarangkot? Hire our spacious SUV with high ground clearance for a smooth & safe highway experience! 🏔️🚙",
                    'date' => 'Jul 10',
                    'image' => '/images/bydatto3silver.png',
                    'likes' => 42,
                    'comments' => 8,
                    'permalink' => 'https://www.facebook.com/people/Journey-Begins/61568721061263/',
                ],
                [
                    'text' => "Corporate car rental solutions & executive transport in Nepal. Customized monthly rates for long-term company logistics and team travel needs. 🏢💼",
                    'date' => 'Jul 05',
                    'image' => '/images/jaecoo.jpg',
                    'likes' => 22,
                    'comments' => 3,
                    'permalink' => 'https://www.facebook.com/people/Journey-Begins/61568721061263/',
                ]
            ]
        ];
    }

    protected function getFallbackInstagramData(): array
    {
        return [
            'followers' => 64,
            'following' => 107,
            'posts_count' => 31,
            'bio' => "Your Driving Partner in Nepal 🚘🇳🇵\nSelf drive & Driver car rental in Nepal.",
            'posts' => [
                [
                    'type' => 'post',
                    'caption' => "Drive your dream car with Journey Begins! Self-drive & driver options available across Nepal. 🚘✨\n\n#CarRental #Nepal #BYDAtto3 #Kathmandu #JourneyBegins",
                    'image' => '/images/bydatto3blue.png',
                    'likes' => 18,
                    'comments' => 3,
                    'date' => 'Jul 23',
                    'link' => 'https://www.instagram.com/jour.neybegins0/',
                ],
                [
                    'type' => 'reel',
                    'caption' => "Experience electric driving with BYD Atto 3. Smooth, quiet, and eco-friendly! ⚡🔋\n\n#BYD #ElectricCar #EVNepal #ExploreNepal",
                    'image' => '/images/byd%20atto3.png',
                    'likes' => 32,
                    'comments' => 5,
                    'date' => 'Jul 20',
                    'link' => 'https://www.instagram.com/jour.neybegins0/',
                ],
                [
                    'type' => 'post',
                    'caption' => "Weekend trip planned? Grab your SUV today at special weekend rates! 🏔️🚙\n\nCall now: +977 9840002796",
                    'image' => '/images/bydatto3silver.png',
                    'likes' => 24,
                    'comments' => 2,
                    'date' => 'Jul 15',
                    'link' => 'https://www.instagram.com/jour.neybegins0/',
                ],
                [
                    'type' => 'post',
                    'caption' => "Professional chauffeur services for business meetings and corporate trips in Kathmandu. 🏢💼",
                    'image' => '/images/hero/hero1.png',
                    'likes' => 15,
                    'comments' => 1,
                    'date' => 'Jul 10',
                    'link' => 'https://www.instagram.com/jour.neybegins0/',
                ],
                [
                    'type' => 'reel',
                    'caption' => "24/7 Airport transfer service at Tribhuvan International Airport. Arrive in style! ✈️🚘",
                    'image' => '/images/hero/hero2.png',
                    'likes' => 27,
                    'comments' => 4,
                    'date' => 'Jul 05',
                    'link' => 'https://www.instagram.com/jour.neybegins0/',
                ],
                [
                    'type' => 'post',
                    'caption' => "Your Driving Partner in Nepal 🚘🇳🇵 Book your vehicle in simple steps.",
                    'image' => '/images/jaecoo.jpg',
                    'likes' => 21,
                    'comments' => 2,
                    'date' => 'Jun 28',
                    'link' => 'https://www.instagram.com/jour.neybegins0/',
                ],
            ]
        ];
    }

    protected function getFallbackTikTokData(): array
    {
        return [
            'following' => 0,
            'followers' => 603,
            'likes' => 3692,
            'video_count' => 18,
            'bio' => "Your Driving Partner in Nepal. 🚘🇳🇵\nCONTACT US: 9840002796 / 9801299457",
            'videos' => [
                [
                    'id' => '1',
                    'is_pinned' => true,
                    'caption' => "Self-drive car rental WITH DRIVER option in Nepal! 🚘✨ #JourneyBegins #CarRental #Nepal",
                    'cover' => '/images/bydatto3blue.png',
                    'views' => '26K',
                    'likes' => '1.4K',
                    'date' => 'Jul 23',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '2',
                    'is_pinned' => true,
                    'caption' => "Explore beautiful Nepal with Journey Begins Car Rental! 🌾🚘 #ExploreNepal #Pokhara #Kathmandu",
                    'cover' => '/images/byd%20atto3.png',
                    'views' => '39K',
                    'likes' => '2.1K',
                    'date' => 'Jul 21',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '3',
                    'is_pinned' => false,
                    'caption' => "Special Shrawan Offer on car rentals! 🚘⚡ Call 9840002796",
                    'cover' => '/images/hero/hero1.png',
                    'views' => '4.7K',
                    'likes' => '320',
                    'date' => 'Jul 19',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '4',
                    'is_pinned' => false,
                    'caption' => "White Toyota Hilux Pickup for offroad trip & heavy travel across Nepal! 🚙🏔️",
                    'cover' => '/images/bydatto3silver.png',
                    'views' => '1.2K',
                    'likes' => '180',
                    'date' => 'Jul 16',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '5',
                    'is_pinned' => false,
                    'caption' => "Silver Hilux Pickup in garage ready for delivery! 🛠️🚘",
                    'cover' => '/images/jaecoo.jpg',
                    'views' => '3.6K',
                    'likes' => '290',
                    'date' => 'Jul 14',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '6',
                    'is_pinned' => false,
                    'caption' => "CONTACT JOURNEY BEGINS: 9841912259 / 9801299457 📞🚘",
                    'cover' => '/images/hero/hero2.png',
                    'views' => '6.9K',
                    'likes' => '540',
                    'date' => 'Jul 12',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '7',
                    'is_pinned' => false,
                    'caption' => "5000 hajar ma offer offer offer! Rent luxury cars at lowest prices! 💸🚘",
                    'cover' => '/images/bydatto3blue.png',
                    'views' => '4.7K',
                    'likes' => '380',
                    'date' => 'Jul 10',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '8',
                    'is_pinned' => false,
                    'caption' => "la hai ta bye! Daily car rental vlog with Journey Begins 🎬🚘",
                    'cover' => '/images/byd%20atto3.png',
                    'views' => '1.9K',
                    'likes' => '190',
                    'date' => 'Jul 08',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '9',
                    'is_pinned' => false,
                    'caption' => "Scenic road trip in Nepal with BYD Atto 3 🌿⚡",
                    'cover' => '/images/bydatto3silver.png',
                    'views' => '2.6K',
                    'likes' => '240',
                    'date' => 'Jul 05',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '10',
                    'is_pinned' => false,
                    'caption' => "la hai ta aayo.. Comfort and luxury inside our rental vehicles! 🛋️🚘",
                    'cover' => '/images/jaecoo.jpg',
                    'views' => '12.4K',
                    'likes' => '980',
                    'date' => 'Jul 02',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '11',
                    'is_pinned' => false,
                    'caption' => "la hai ta! Ready to drive yourself? Contact us today! 📞",
                    'cover' => '/images/hero/hero1.png',
                    'views' => '2.7K',
                    'likes' => '210',
                    'date' => 'Jun 29',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
                [
                    'id' => '12',
                    'is_pinned' => false,
                    'caption' => "BYD Atto 3 electric vehicle rental in Bhaktapur & Kathmandu! ⚡🚘",
                    'cover' => '/images/hero/hero2.png',
                    'views' => '3.7K',
                    'likes' => '350',
                    'date' => 'Jun 25',
                    'url' => 'https://www.tiktok.com/@journey_begins3',
                ],
            ]
        ];
    }

    protected function formatCount(int $count): string
    {
        if ($count >= 1000000) {
            return round($count / 1000000, 1) . 'M';
        }
        if ($count >= 1000) {
            return round($count / 1000, 1) . 'K';
        }
        return (string) $count;
    }
}