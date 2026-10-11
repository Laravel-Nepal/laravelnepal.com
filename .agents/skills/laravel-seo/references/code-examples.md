---
name: laravel-seo-code-examples
description: Copy/paste examples for integrating achyutn/laravel-seo with Eloquent models (traits, overrides, breadcrumbs, schema traits).
license: MIT
tags:
  - laravel
  - seo
  - eloquent
  - schema
  - sitemap
metadata:
  author: Achyut Neupane
---

# Laravel SEO Code Examples (achyutn/laravel-seo)

## Context

These examples are for consumers of `achyutn/laravel-seo`.

Notes about this package's implementation:
- Value override methods are `titleValue()`, `descriptionValue()`, `tagsValue()`, `urlValue()`, etc. (resolved by `src/Traits/HasColumns.php`).
- The public getter method is `getURLValue()` (uppercase `URL`); PHP treats method names case-insensitively, so `getUrlValue()` resolves to the same method.
- Breadcrumb items are `AchyutN\LaravelSEO\Data\Breadcrumb` and the constructor takes named args `label:` and `url:` (`src/Data/Breadcrumb.php`).
- Schema contract signature is `buildSchema(SchemaCollection $schema): SchemaCollection` and schema traits call `$this->resolveSEO()` internally (`src/Contracts/HasMarkup.php`, `src/Schemas/*`).
- Site-level `Organization`/`WebSite` schema and optional AEO hooks (`seoFaqs`, `seoHowTo`, `seoSpeakable`) are built into `InteractsWithSEO` (`src/Traits/InteractsWithSEO.php`).

## Examples

### 1) Basic Model Setup (Columns)

```php
<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use Illuminate\Database\Eloquent\Model;

final class Post extends Model
{
    use InteractsWithSEO;

    protected $guarded = [];

    // Map model fields to SEO fields (HasColumns resolution uses these properties).
    public string $titleColumn = 'name';
    public string $descriptionColumn = 'excerpt';
    public string $imageColumn = 'thumbnail_path';
}
```

### 2) Computed Values (Methods Win Over Columns)

```php
<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use Illuminate\Database\Eloquent\Model;

final class Product extends Model
{
    use InteractsWithSEO;

    protected $guarded = [];

    // Prefer *Value() overrides when the value is computed.
    public function titleValue(): ?string
    {
        /** @var string|null $name */
        $name = $this->getAttribute('name');

        /** @var float|int|string|null $price */
        $price = $this->getAttribute('price');

        if ($name === null) {
            return null;
        }

        return $price !== null ? sprintf('%s - %s', $name, $price) : $name;
    }

    /** @return array<int, string>|null */
    public function tagsValue(): ?array
    {
        // Return normalized keywords.
        return ['products', 'shop'];
    }

    public function urlValue(): ?string
    {
        // Use a canonical URL in your app.
        return url('/products/'.$this->getKey());
    }
}
```

### 3) Breadcrumbs (Schema BreadcrumbList)

```php
<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use Illuminate\Database\Eloquent\Model;

final class Article extends Model
{
    use InteractsWithSEO;

    public function urlValue(): ?string
    {
        return url('/blog/'.$this->getKey());
    }

    /** @return array<int, Breadcrumb> */
    public function breadcrumbs(): array
    {
        return [
            new Breadcrumb(label: 'Home', url: url('/')),
            new Breadcrumb(label: 'Blog', url: url('/blog')),
            new Breadcrumb(label: (string) $this->getAttribute('title'), url: $this->urlValue()),
        ];
    }
}
```

### 4) Schema Traits (Blog/Page/Product)

```php
<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Contracts\HasMarkup;
use AchyutN\LaravelSEO\Schemas\BlogSchema;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use Illuminate\Database\Eloquent\Model;

final class BlogPost extends Model implements HasMarkup
{
    use InteractsWithSEO;
    use BlogSchema;

    protected $guarded = [];

    // Example: point author/published date at your columns.
    public string $authorColumn = 'author_name';
    public string $publishedAtColumn = 'published_at';
}
```

### 5) Multiple Sitemap Images

```php
<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Data\SitemapImage;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use Illuminate\Database\Eloquent\Model;

final class GalleryPost extends Model
{
    use InteractsWithSEO;

    /** @return array<int, string|SitemapImage|array<string, mixed>> */
    public function sitemapImages(): array
    {
        return [
            SitemapImage::make(
                url: 'https://example.com/photos/cover.jpg',
                title: 'Cover Photo',
                caption: 'Featured photo of the gallery',
                geoLocation: 'Kathmandu, Nepal'
            ),
            'https://example.com/photos/photo-2.jpg',
        ];
    }
}
```

### 6) Sitemap Videos (YouTube Embeds or Direct Files)

```php
<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Data\SitemapVideo;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use Illuminate\Database\Eloquent\Model;

final class VideoTutorial extends Model
{
    use InteractsWithSEO;

    /** @return array<int, SitemapVideo|array<string, mixed>> */
    public function sitemapVideos(): array
    {
        return [
            SitemapVideo::make(
                thumbnailLoc: 'https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg',
                title: 'Laravel SEO Tutorial',
                description: 'Complete guide to rich XML sitemaps in Laravel.',
                playerLoc: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                duration: 600,
                publicationDate: '2024-01-15T08:00:00+00:00',
                familyFriendly: true
            ),
        ];
    }
}
```

### 7) GEO: Site-Level Organization and WebSite Entity

```php
<?php

declare(strict_types=1);

// config/seo.php
return [
    'schema' => [
        'organization' => [
            'enabled' => true,
            'name' => config('app.name'),
            'url' => config('app.url'),
            'logo' => 'https://example.com/logo.png',
            'same_as' => [
                'https://x.com/acme',
                'https://www.linkedin.com/company/acme',
            ],
        ],
        'website' => [
            'enabled' => true,
            'search_url' => '/blog?search={search_term_string}',
        ],
    ],
];
```

### 8) AEO: FAQ, HowTo and Speakable Hooks

```php
<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use Illuminate\Database\Eloquent\Model;

final class Article extends Model
{
    use InteractsWithSEO;

    /** @return array<int, array{question: string, answer: string}> */
    public function seoFaqs(): array
    {
        return [
            ['question' => 'What is Laravel SEO?', 'answer' => 'A package that generates metadata, schema and sitemaps from Eloquent models.'],
        ];
    }

    /** @return array{name: string, description: string, steps: array<int, array{name: string, text: string}>} */
    public function seoHowTo(): array
    {
        return [
            'name' => 'Install the package',
            'description' => 'Three steps to a fully optimised blog.',
            'steps' => [
                ['name' => 'Require', 'text' => 'Run composer require achyutn/laravel-seo.'],
                ['name' => 'Publish', 'text' => 'Run php artisan vendor:publish --tag="laravel-seo".'],
                ['name' => 'Backfill', 'text' => 'Run php artisan seo:generate.'],
            ],
        ];
    }

    /** @return array<int, string> */
    public function seoSpeakable(): array
    {
        return ['#summary', '.article-body'];
    }
}
```

### 9) Locale, hreflang Alternates and Article Body

```php
<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use Illuminate\Database\Eloquent\Model;

final class Article extends Model
{
    use InteractsWithSEO;

    public function seoType(): string
    {
        return 'article';
    }

    public function seoLocale(): string
    {
        return app()->getLocale();
    }

    public function seoArticleBody(): string
    {
        return strip_tags((string) $this->getAttribute('content'));
    }

    /** @return array<int, array{hreflang: string, url: string}> */
    public function seoAlternates(): array
    {
        return [
            ['hreflang' => 'en', 'url' => url('/en/blog/'.$this->getKey())],
            ['hreflang' => 'fr', 'url' => url('/fr/blog/'.$this->getKey())],
        ];
    }
}
```

### 10) Backfill Existing Records

```bash
php artisan seo:generate
php artisan seo:generate --regenerate
```

### 11) Add suffix to title

Publish (if not already) and update the `seo.php` config file and add the `title.suffix` key:

```php
<?php

declare(strict_types=1);

use AchyutN\LaravelSEO\Models\SEO;

return [
    'model' => SEO::class,
    'sitemap' => '/sitemap.xml',
    'sitemap_txt' => '/sitemap.txt',
    'database' => config('database.default', 'mysql'),
    'model_paths' => [
        app_path('Models'),
    ],
    'robots_txt' => [
        'enabled' => true,
        'user_agent' => '*',
        'allow' => ['/'],
        'disallow' => ['/admin'],
    ],
    'description' => [
        'limit' => 160,
    ],
    'title' => [
        'suffix' => sprintf(' - %s', config('app.name')),
    ],
];
```

## Anti-patterns / Gotchas

- If your tests/app create models using `InteractsWithSEO`, ensure the `seo` table exists (this package publishes a migration stub via `--tag="laravel-seo"`).
- Sitemap routes are route-cache compatible and use the `seo.sitemap` / `seo.sitemap_txt` config paths.
- Site-level `Organization`/`WebSite` schema is opt-in and off by default; enable it via `seo.schema.organization.enabled` / `seo.schema.website.enabled` if your app does not already emit them.
- If sitemap rendering returns empty entries, confirm the SEO model relation used by the sitemap (`with('model')`) matches your DB morph columns and upstream model conventions.

## References

- Skill: `resources/boost/skills/laravel-seo/SKILL.md`
- Package wiring: `src/SEOProvider.php`
- Traits/contracts: `src/Traits/InteractsWithSEO.php`, `src/Traits/HasColumns.php`, `src/Contracts/HasMarkup.php`
- Data objects: `src/Data/*`
- Schema traits: `src/Schemas/*`
