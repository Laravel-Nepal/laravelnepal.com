<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PageType;
use App\Models\Page;
use App\Settings\SiteSettings;
use Illuminate\Database\Seeder;

final class PageSeeder extends Seeder
{
    public function run(
        SiteSettings $siteSettings
    ): void {
        Page::query()
            ->firstOrCreate([
                'type' => PageType::LandingPage,
            ], [
                'title' => 'Home',
                'description' => $siteSettings->description,
                'tags' => ['laravel', 'nepal', 'community'],
            ]);

        Page::query()
            ->firstOrCreate([
                'type' => PageType::IndexPage,
                'name' => 'post',
            ], [
                'title' => 'Blogs',
                'description' => sprintf('Explore all blogs published in %s', $siteSettings->name),
                'tags' => ['blogs', 'articles', 'posts'],
            ]);

        Page::query()
            ->firstOrCreate([
                'type' => PageType::IndexPage,
                'name' => 'project',
            ], [
                'title' => 'Projects',
                'description' => sprintf('Explore all projects showcased in %s', $siteSettings->name),
                'tags' => ['projects', 'showcase', 'software'],
            ]);

        Page::query()
            ->firstOrCreate([
                'type' => PageType::IndexPage,
                'name' => 'package',
            ], [
                'title' => 'Packages',
                'description' => sprintf('Explore all packages shared in %s', $siteSettings->name),
                'tags' => ['packages', 'libraries', 'tools'],
            ]);

        Page::query()
            ->firstOrCreate([
                'type' => PageType::IndexPage,
                'name' => 'tips',
            ], [
                'title' => 'Tips',
                'description' => sprintf('Explore all tips shared in %s', $siteSettings->name),
                'tags' => ['tips', 'tricks', 'hacks'],
            ]);

        Page::query()
            ->firstOrCreate([
                'type' => PageType::IndexPage,
                'name' => 'artisan',
            ], [
                'title' => 'Artisans',
                'description' => sprintf('Explore all artisans featured in %s', $siteSettings->name),
                'tags' => ['artisans', 'developers', 'authors'],
            ]);

        Page::query()
            ->firstOrCreate([
                'type' => PageType::IndexPage,
                'name' => 'series',
            ], [
                'title' => 'Series',
                'description' => sprintf('Explore all series published in %s', $siteSettings->name),
                'tags' => ['series', 'collections', 'posts', 'videos'],
            ]);
    }
}
