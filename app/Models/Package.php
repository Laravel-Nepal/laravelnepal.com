<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Contracts\HasMarkup;
use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use App\Contracts\Contentable;
use App\Models\Scopes\SkipExcluded;
use App\Schemas\PackageSchema;
use App\Traits\IsContent;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;

#[ScopedBy(SkipExcluded::class)]
/**
 * @property string $name
 * @property string|null $slug
 * @property string $author_username
 * @property string|null $github
 * @property string|null $packagist
 * @property array<array-key, mixed> $tags
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Author|null $author
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Comment> $comments
 * @property-read int|null $comments_count
 * @property-read string|null $github_url
 * @property-read bool $is_submitted_to_laravel_news
 * @property-read string|null $packagist_url
 * @property-read \AchyutN\LaravelSEO\Models\SEO|null $seo
 * @property-read array $social_links
 * @property-read LaravelNewsSubmission|null $submission
 * @property-read int $total_comments
 * @property-read int $total_views
 * @property-read int $total_votes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \CyrildeWit\EloquentViewable\View> $views
 * @property-read int|null $views_count
 * @property-read bool $voted
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vote> $votes
 * @property-read int|null $votes_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package submissions()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereAuthorUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package wherePackagist($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 *
 * @mixin \Eloquent
 */
final class Package extends Model implements Contentable, HasMarkup, Viewable
{
    use InteractsWithSEO;
    use InteractsWithViews;
    use IsContent;
    use PackageSchema;

    public string $titleColumn = 'name';

    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('name');
        $blueprint->string('slug')->nullable();
        $blueprint->string('author_username');
        $blueprint->string('github')->nullable();
        $blueprint->string('packagist')->nullable();
        $blueprint->json('tags');
    }

    public function getKeyName(): string
    {
        return 'slug';
    }

    /** @return BelongsTo<Author, $this> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_username', 'username');
    }

    public function categoryValue(): string
    {
        return 'Package';
    }

    public function authorValue(): ?string
    {
        /** @phpstan-var string|null */
        return $this->author?->getAttribute('name');
    }

    public function authorUrlValue(): string
    {
        return route('page.artisan.view', $this->author);
    }

    public function publisherValue(): ?string
    {
        /** @phpstan-var string|null */
        return config('app.name');
    }

    public function publisherUrlValue(): string
    {
        return route('page.landingPage');
    }

    public function urlValue(): string
    {
        return route('page.package.view', $this);
    }

    /** @return array<Breadcrumb> */
    public function breadcrumbs(): array
    {
        return [
            new Breadcrumb('Home', route('page.landingPage')),
            new Breadcrumb('Packages', route('page.package.index')),
            new Breadcrumb($this->getTitleValue(), $this->getURLValue()),
        ];
    }

    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }

    /** @return Attribute<string|null, null> */
    protected function githubUrl(): Attribute
    {
        return Attribute::make(
            get: function (): ?string {
                /** @var string $github */
                $github = $this->getAttribute('github');
                if (filled($github)) {
                    return 'https://www.github.com/'.$github;
                }

                return null;
            },
        );
    }

    /** @return Attribute<string|null, null> */
    protected function packagistUrl(): Attribute
    {
        return Attribute::make(
            get: function (): ?string {
                /** @var string $packagist */
                $packagist = $this->getAttribute('packagist');
                if (filled($packagist)) {
                    return 'https://packagist.org/packages/'.$packagist;
                }

                return null;
            },
        );
    }

    /** @return Attribute<array<string|null>, null> */
    protected function socialLinks(): Attribute
    {
        return Attribute::make(
            get: function (): array {
                return array_filter([
                    'GitHub' => $this->github_url,
                    'Packagist' => $this->packagist_url,
                ]);
            },
        );
    }
}
