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
- `seo:generate` discovers models by scanning the directories configured in `seo.model_paths` (the default is the consuming app's `app/Models`) (`src/Services/SEOService.php`).
- Customize values using the package's resolution order: `*Value()` method -> `$*Column` property -> default column name (`src/Traits/HasColumns.php`). Prefer `titleValue()`, `descriptionValue()`, `tagsValue()`, `urlValue()`, etc.
- Schema markup: implement `AchyutN\LaravelSEO\Contracts\HasMarkup` and use one of `BlogSchema`, `PageSchema`, `ProductSchema`. The method signature is `buildSchema(SchemaCollection $schema): SchemaCollection` and schemas resolve SEO internally (`src/Contracts/HasMarkup.php`, `src/Schemas/*`).
- Breadcrumb markup: override `breadcrumbs(): array` to return `AchyutN\LaravelSEO\Data\Breadcrumb` instances (`src/Data/Breadcrumb.php`, `src/Traits/InteractsWithSEO.php`).
- Multi-image sitemaps: define `sitemapImages(): array` on the model to return string URLs, `AchyutN\LaravelSEO\Data\SitemapImage` DTOs, or associative arrays (`src/Data/SitemapImage.php`, `src/Traits/HasColumns.php`).
- Video sitemaps: define `sitemapVideos(): array` on the model to return `AchyutN\LaravelSEO\Data\SitemapVideo` DTOs or associative arrays supporting `thumbnail_loc`, `title`, `description`, and `player_loc`/`content_loc` (`src/Data/SitemapVideo.php`, `src/Traits/HasColumns.php`).
- GEO (entity/brand signals) is opt-in. Enable `seo.schema.organization.enabled` and `seo.schema.website.enabled` and set `name`, `url`, `logo`, `same_as` (social profiles) and an optional `search_url`; the package then emits `Organization` and `WebSite` JSON-LD on model pages (`src/Traits/InteractsWithSEO.php`).
- AEO (answer engines) hooks, all optional, are read automatically when defined on the model:
  - `seoFaqs(): array<int, array{question: string, answer: string}>` -> `FAQPage` schema (featured snippets / People Also Ask).
  - `seoHowTo(): array{name: string, description?: string, steps: array<int, array{name: string, text: string}>}` -> `HowTo` schema.
  - `seoSpeakable(): array<int, string>` (CSS selectors) -> `SpeakableSpecification` for voice assistants.
- Internationalisation hooks: `seoLocale(): string` sets the SEO locale, and `seoAlternates(): array<int, array{hreflang: string, url: string}>` emits `hreflang` alternates in both the page head and the XML sitemap.
- Article depth for AI: `seoArticleBody(): string` feeds the `articleBody` field of the article schema. Override `seoType(): string` to change the Open Graph/article type (defaults to `article`).
- Sitemap endpoints are route-cache compatible and use the configured paths (`seo.sitemap`, `seo.sitemap_txt`) via `AchyutN\LaravelSEO\Http\Controllers\SitemapController` (`src/SEOProvider.php`).
- Configuration extras (`config/seo.php`): `seo.model_paths` controls which directories `seo:generate` scans; set `seo.robots_txt.enabled` to serve a managed `/robots.txt` containing a `Sitemap:` directive; set `seo.description.limit` to trim long meta descriptions on a word boundary.

## Examples

- Install/publish + run backfill:

```bash
php artisan vendor:publish --tag="laravel-seo"
php artisan migrate
php artisan seo:generate
```

- Model setup and customization examples: `references/code-examples.md`.

## Anti-patterns / Gotchas

- `resolveSEO()` is null-safe, so models without a backfilled SEO row render defaults instead of crashing; still run `php artisan seo:generate` so sitemap entries and per-record overrides exist.
- Site-level `Organization`/`WebSite` schema is opt-in and off by default. Enable it with `seo.schema.organization.enabled` / `seo.schema.website.enabled`, or leave it off if your app already emits them, to avoid duplicates.
- AEO hooks are opt-in per model: FAQ/HowTo/Speakable schema only appears when `seoFaqs()`, `seoHowTo()` or `seoSpeakable()` are defined.
- `og_description` and `og_url` act as fallbacks when `meta_description`/`canonical` are empty, because the upstream `SEOData` exposes a single description/url pair.
- Upstream convention: this package and the wrapped upstream model both use the morph name `model`, so relations resolve. Verify sitemap/model relations if you rename the morph (`database/create_seo_table.php.stub`, `src/Models/SEO.php`, `src/Services/SitemapService.php`).

## References

- README: `README.md`
- Provider + routes: `src/SEOProvider.php`
- Model integration: `src/Traits/InteractsWithSEO.php`
- Value resolution: `src/Traits/HasColumns.php`
- Data objects: `src/Data/*`
- Schema traits: `src/Schemas/*`
- Sitemap rendering: `src/Services/SitemapService.php`
- Backfill command: `src/Commands/GenerateSEO.php`
- Github: `https://github.com/achyutkneupane/laravel-seo`
