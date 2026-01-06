<?php

declare(strict_types=1);

use AchyutN\LaravelSEO\Models\SEO;

return [
    'model' => SEO::class,
    'sitemap' => '/sitemap.xml',
    'database' => config('database.default', 'mysql'),
    'title' => [
        'suffix' => sprintf(' - %s', config('app.name')),
    ],
];
