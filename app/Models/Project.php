<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Contracts\HasMarkup;
use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use App\Contracts\Contentable;
use App\Models\Scopes\SkipExcluded;
use App\Schemas\ProjectSchema;
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
 * @property string $title
 * @property string|null $slug
 * @property string $author_username
 * @property string $github
 * @property string|null $website
 * @property array<array-key, mixed> $tags
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Author|null $author
 * @property-read string|null $github_url
 * @property-read bool $is_submitted_to_laravel_news
 * @property-read \AchyutN\LaravelSEO\Models\SEO|null $seo
 * @property-read array $social_links
 * @property-read LaravelNewsSubmission|null $submission
 * @property-read int $total_views
 * @property-read int $total_votes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \CyrildeWit\EloquentViewable\View> $views
 * @property-read int|null $views_count
 * @property-read bool $voted
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vote> $votes
 * @property-read int|null $votes_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project submissions()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereAuthorUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 *
 * @mixin \Eloquent
 */
final class Project extends Model implements Contentable, HasMarkup, Viewable
{
    use InteractsWithSEO;
    use InteractsWithViews;
    use IsContent;
    use ProjectSchema;

    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('title');
        $blueprint->string('slug')->nullable();
        $blueprint->string('author_username');
        $blueprint->string('github');
        $blueprint->string('website')->nullable();
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
        return 'Project';
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
        return route('page.project.view', $this);
    }

    /** @return array<Breadcrumb> */
    public function breadcrumbs(): array
    {
        return [
            new Breadcrumb('Home', route('page.landingPage')),
            new Breadcrumb('Projects', route('page.project.index')),
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

    /** @return Attribute<array<string|null>, null> */
    protected function socialLinks(): Attribute
    {
        return Attribute::make(
            get: function (): array {
                /** @var string $website */
                $website = $this->getAttribute('website');

                return array_filter([
                    'GitHub' => $this->github_url,
                    'Website' => filled($website) ? $website : null,
                ]);
            },
        );
    }
}
