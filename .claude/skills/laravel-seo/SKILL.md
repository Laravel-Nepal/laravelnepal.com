---
name: laravel-seo
description: Apply opinionated conventions for the achyutn/laravel-seo package to add, manage, and configure SEO metadata, sitemaps, and schema.org markup for Laravel Eloquent models.
license: MIT
tags:
  - laravel
  - seo
  - sitemap
  - schema
  - eloquent
  - achyutn/laravel-seo
metadata:
  author: Achyut Neupane
---

# AchyutN Laravel SEO

## Context

You are working in a Laravel app using `achyutn/laravel-seo` (a wrapper around `ralphjsmit/laravel-seo`) to generate SEO metadata, schema markup, and sitemaps directly from Eloquent models.

## Rules

- Publish this package's config + migration stub with `php artisan vendor:publish --tag="laravel-seo"`.
- Do not publish the dependency (`ralphjsmit/laravel-seo`) config/migration; the README warns that it breaks this package.
- Add `AchyutN\LaravelSEO\Traits\InteractsWithSEO` to any model that should have SEO.
- Ensure the `seo` table exists. The provided stub uses `morphs('model')` (`model_type`/`model_id`) and the trait relation is `morphOne(..., 'model')` (`database/create_seo_table.php.stub`, `src/Traits/InteractsWithSEO.php`).
- Backfill existing records with `php artisan seo:generate` (use `--regenerate` to rebuild existing rows) (`src/Commands/GenerateSEO.php`).
- `seo:generate` discovers models by scanning only `app/Models` in the consuming app (`src/Services/SEOService.php`).
- Customize values using the package's resolution order: `*Value()` method -> `$*Column` property -> default column name (`src/Traits/HasColumns.php`). Prefer `titleValue()`, `descriptionValue()`, `tagsValue()`, `urlValue()`, etc.
- Schema markup: implement `AchyutN\LaravelSEO\Contracts\HasMarkup` and use one of `BlogSchema`, `PageSchema`, `ProductSchema`. In this repo the method signature is `buildSchema(SchemaCollection $schema): SchemaCollection` and schemas call `$this->resolveSEO()` internally (`src/Contracts/HasMarkup.php`, `src/Schemas/*`).
- Breadcrumb markup: override `breadcrumbs(): array` to return `AchyutN\LaravelSEO\Data\Breadcrumb` instances (`src/Data/Breadcrumb.php`, `src/Traits/InteractsWithSEO.php`).

## Examples

- Install/publish + run backfill:

```bash
php artisan vendor:publish --tag="laravel-seo"
php artisan migrate
php artisan seo:generate
```

- Model setup and customization examples: `references/code-examples.md`.

## Anti-patterns / Gotchas

- Route caching: sitemap routes are registered as closures in `SEOProvider` and typically break `php artisan route:cache` in consuming apps (`src/SEOProvider.php`).
- Config mismatch: `config('seo.sitemap')` exists, but routes are currently hard-coded to `/sitemap.xml` and `/sitemap.txt` (`config/seo.php`, `src/SEOProvider.php`).
- URL getter mismatch in this repo: `HasColumns` defines `getURLValue()` but other code calls `getUrlValue()`; if URL resolution breaks, check for this mismatch (`src/Contracts/HasColumns.php`, `src/Traits/HasColumns.php`, `src/Traits/InteractsWithSEO.php`, `src/Services/SEOService.php`).
- `InteractsWithSEO::getDynamicSEOData()` references `$seo` without defining it; test SEO rendering paths that call this method (`src/Traits/InteractsWithSEO.php`).
- `ResolvedSEO` currently requires non-null `author`/`publisher` strings; make sure your model resolves them (or you will hit a `TypeError`) (`src/Data/ResolvedSEO.php`, `src/Traits/InteractsWithSEO.php`).
- Migration mismatch risk: the stub stores `meta_keywords` and `robots` as `string`, while the SEO model casts them as `array` (`database/create_seo_table.php.stub`, `src/Models/SEO.php`).
- Upstream convention risk: this package uses morph name `model`, but the wrapped upstream model docs reference `seoable_*`; verify sitemap/model relations resolve in your app (`database/create_seo_table.php.stub`, `src/Models/SEO.php`, `src/Services/SitemapService.php`).

## References

- README: `README.md`
- Provider + routes: `src/SEOProvider.php`
- Model integration: `src/Traits/InteractsWithSEO.php`
- Value resolution: `src/Traits/HasColumns.php`
- Schema traits: `src/Schemas/*`
- Sitemap rendering: `src/Services/SitemapService.php`
- Backfill command: `src/Commands/GenerateSEO.php`
- Github: `https://github.com/achyutkneupane/laravel-seo`
