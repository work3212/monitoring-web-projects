<?php

return [
    'body' => [
        'url' => env('VIBER_URL'),
        "event_types" => [
            "delivered",
            "seen",
            "failed",
            "subscribed",
            "unsubscribed",
            "conversation_started"
        ],
        "send_name" => true,
        "send_photo" => true
    ],
    'headers' => ['X-Viber-Auth-Token' => env('VIBER_TOKEN')],
    'connect_url' => 'https://chatapi.viber.com/pa/set_webhook',
    'message_url' => 'https://chatapi.viber.com/pa/broadcast_message',
    'info_url' => 'https://chatapi.viber.com/pa/get_account_info'
];
