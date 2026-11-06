<?php

return [

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'social_links' => [
        'facebook' => env('SOCIAL_FACEBOOK_URL', 'https://www.facebook.com/'),
        'instagram' => env('SOCIAL_INSTAGRAM_URL', 'https://www.instagram.com/'),
        'tiktok' => env('SOCIAL_TIKTOK_URL', 'https://www.tiktok.com/'),
    ],

    'whatsapp' => [
        'number' => env('WHATSAPP_NUMBER', '9779840002796'),
    ],

    'facebook' => [
    'page_id' => env('FACEBOOK_PAGE_ID'),
    'page_access_token' => env('FACEBOOK_PAGE_ACCESS_TOKEN'),
],

'instagram' => [
    'business_account_id' => env('IG_BUSINESS_ACCOUNT_ID'),
    'access_token' => env('IG_ACCESS_TOKEN'),
],

'tiktok' => [
    'client_key' => env('TIKTOK_CLIENT_KEY'),
    'client_secret' => env('TIKTOK_CLIENT_SECRET'),
    'redirect_uri' => env('TIKTOK_REDIRECT_URI'),
],

];
