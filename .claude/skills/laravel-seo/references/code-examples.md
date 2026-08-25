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

Notes about this repo's current implementation:
- Value override methods are `titleValue()`, `descriptionValue()`, `tagsValue()`, `urlValue()`, etc. (resolved by `src/Traits/HasColumns.php`).
- The public getter method on the contract/trait is `getURLValue()` (uppercase `URL`) (`src/Contracts/HasColumns.php`, `src/Traits/HasColumns.php`). Some internal code calls `getUrlValue()` (lowercase `l`), so if you hit URL-related issues, check that mismatch.
- Breadcrumb items are `AchyutN\LaravelSEO\Data\Breadcrumb` and the constructor takes named args `label:` and `url:` (`src/Data/Breadcrumb.php`).
- Schema contract signature is `buildSchema(SchemaCollection $schema): SchemaCollection` and schema traits call `$this->resolveSEO()` internally (`src/Contracts/HasMarkup.php`, `src/Schemas/*`).

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

### 5) Backfill Existing Records

```bash
php artisan seo:generate
php artisan seo:generate --regenerate
```

### 6) Add suffix to title

Publish (if not already) and update the `seo.php` config file and add the `title.suffix` key:

```php
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
```

## Anti-patterns / Gotchas

- If your tests/app create models using `InteractsWithSEO`, ensure the `seo` table exists (this package publishes a migration stub via `--tag="laravel-seo"`).
- Sitemap routes are closures (`/sitemap.xml`, `/sitemap.txt`) which typically break `php artisan route:cache`.
- If sitemap rendering returns empty entries, confirm the SEO model relation used by the sitemap (`with('model')`) matches your DB morph columns and upstream model conventions.

## References

- Skill: `resources/boost/skills/laravel-seo/SKILL.md`
- Package wiring: `src/SEOProvider.php`
- Traits/contracts: `src/Traits/InteractsWithSEO.php`, `src/Traits/HasColumns.php`, `src/Contracts/HasMarkup.php`
- Schema traits: `src/Schemas/*`
