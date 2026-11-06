<?php

namespace App\Http\Controllers;

use App\Models\SocialToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/**
 * One-time (and re-runnable) OAuth flow to authorize Journey Begins' own
 * TikTok account. TikTok has no server-to-server "look up any public
 * account's stats" endpoint — the account owner must log in once via
 * OAuth. After that, we store the refresh_token and keep ourselves
 * authorized automatically (see SocialMediaService::refreshTikTokToken).
 *
 * Visit /admin/tiktok/connect while logged in as the TikTok account owner
 * (journey_begins3) to (re)authorize.
 */
class TikTokAuthController extends Controller
{
    public function redirect(Request $request)
    {
        $state = Str::random(40);
        $request->session()->put('tiktok_oauth_state', $state);

        $params = http_build_query([
            'client_key' => config('services.tiktok.client_key'),
            'scope' => 'user.info.basic,user.info.stats,video.list',
            'response_type' => 'code',
            'redirect_uri' => config('services.tiktok.redirect_uri'),
            'state' => $state,
        ]);

        return redirect('https://www.tiktok.com/v2/auth/authorize/?' . $params);
    }

    public function callback(Request $request)
    {
        if ($request->get('state') !== $request->session()->pull('tiktok_oauth_state')) {
            abort(403, 'Invalid OAuth state.');
        }

        if ($request->has('error')) {
            return response('TikTok authorization failed: ' . $request->get('error_description'), 400);
        }

        $response = Http::asForm()->post('https://open.tiktokapis.com/v2/oauth/token/', [
            'client_key' => config('services.tiktok.client_key'),
            'client_secret' => config('services.tiktok.client_secret'),
            'code' => $request->get('code'),
            'grant_type' => 'authorization_code',
            'redirect_uri' => config('services.tiktok.redirect_uri'),
        ]);

        if (!$response->successful()) {
            return response('Failed to exchange TikTok code for token: ' . $response->body(), 400);
        }

        $data = $response->json();

        SocialToken::updateOrCreate(
            ['provider' => 'tiktok'],
            [
                'access_token' => $data['access_token'],
                'refresh_token' => $data['refresh_token'],
                'open_id' => $data['open_id'],
                'access_token_expires_at' => now()->addSeconds($data['expires_in']),
                'refresh_token_expires_at' => now()->addSeconds($data['refresh_expires_in']),
            ]
        );

        return response('TikTok account connected successfully. You can close this tab.');
    }
}