<?php

use Illuminate\Support\Str;

return [

    /*
    |----------------------------------------------------------------------
    | Default Session Driver
    |----------------------------------------------------------------------
    |
    | Cette option détermine le driver de session par défaut utilisé pour
    | les requêtes entrantes. Utilise le driver "array" pour désactiver
    | les sessions.
    |
    | Supported: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'array'),  // Utilise 'array' pour ne pas persister de session

    /*
    |----------------------------------------------------------------------
    | Session Lifetime
    |----------------------------------------------------------------------
    |
    | La durée de vie de la session. Cela ne s'appliquera plus avec 'array'.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |----------------------------------------------------------------------
    | Session Encryption
    |----------------------------------------------------------------------
    |
    | Optionnellement, tu peux définir la session pour être cryptée, mais
    | cela ne sera pas utilisé si tu choisis le driver 'array'.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |----------------------------------------------------------------------
    | Session File Location
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera plus utilisé avec 'array'.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |----------------------------------------------------------------------
    | Session Database Connection
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec le driver 'array'.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |----------------------------------------------------------------------
    | Session Database Table
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec le driver 'array'.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |----------------------------------------------------------------------
    | Session Cache Store
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec le driver 'array'.
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |----------------------------------------------------------------------
    | Session Sweeping Lottery
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec le driver 'array'.
    |
    */

    'lottery' => [2, 100],

    /*
    |----------------------------------------------------------------------
    | Session Cookie Name
    |----------------------------------------------------------------------
    |
    | Le nom du cookie de session. Cela ne sera pas utilisé avec 'array'.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |----------------------------------------------------------------------
    | Session Cookie Path
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec 'array'.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |----------------------------------------------------------------------
    | Session Cookie Domain
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec 'array'.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |----------------------------------------------------------------------
    | HTTPS Only Cookies
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec 'array'.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |----------------------------------------------------------------------
    | HTTP Access Only
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec 'array'.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |----------------------------------------------------------------------
    | Same-Site Cookies
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec 'array'.
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |----------------------------------------------------------------------
    | Partitioned Cookies
    |----------------------------------------------------------------------
    |
    | Ce paramètre ne sera pas utilisé avec 'array'.
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),
];
