<?php

declare(strict_types=1);

use App\Drivers\MarkdownExtendedDriver;
use Orbit\Drivers\Json;
use Orbit\Drivers\Markdown;
use Orbit\Drivers\Yaml;

return [

    'default' => env('ORBIT_DEFAULT_DRIVER', 'md_custom'),

    'drivers' => [
        'md_custom' => MarkdownExtendedDriver::class,
        'md' => Markdown::class,
        'json' => Json::class,
        'yaml' => Yaml::class,
    ],

    'paths' => [
        'content' => base_path('content'),
        'cache' => storage_path('framework/cache/orbit'),
    ],

];
