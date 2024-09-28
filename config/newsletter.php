<?php

return [
    'services' => [
        'sender' => [
            'api_token' => env('SENDER_API_TOKEN'),
            'url' => env('SENDER_SUBSCRIBE_URL'),
            'group' => env('SENDER_GROUP_ID'),
        ]
    ]
];
