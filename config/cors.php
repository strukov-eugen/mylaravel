<?php

return [
    'paths' => ['api/*', 'livewire/*', 'admin/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'allowed_headers' => ['Content-Type', 'Authorization', 'X-Requested-With', 'X-Livewire', '*'],
    'max_age' => 0,
    'supports_credentials' => true,
];