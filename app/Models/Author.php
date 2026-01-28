<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Contracts\HasMarkup;
use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use App\Contracts\Contentable;
use App\Models\Scopes\SkipExcluded;
use App\Schemas\AuthorSchema;
use App\Traits\IsContent;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;

#[ScopedBy(SkipExcluded::class)]
/**
 * @property string $name
 * @property string $username
 * @property string|null $email
 * @property string|null $linkedin
 * @property string|null $github
 * @property string|null $x
 * @property string|null $website
 * @property string|null $bio
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $avatar
 * @property-read string|null $github_url
 * @property-read bool $is_submitted_to_laravel_news
 * @property-read string|null $linkedin_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Package> $packages
 * @property-read int|null $packages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Post> $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Project> $projects
 * @property-read int|null $projects_count
 * @property-read \AchyutN\LaravelSEO\Models\SEO|null $seo
 * @property-read array $social_links
 * @property-read LaravelNewsSubmission|null $submission
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Tip> $tips
 * @property-read int|null $tips_count
 * @property-read int $total_views
 * @property-read int $total_votes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \CyrildeWit\EloquentViewable\View> $views
 * @property-read int|null $views_count
 * @property-read bool $voted
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vote> $votes
 * @property-read int|null $votes_count
 * @property-read string|null $x_url
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author submissions()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereX($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 *
 * @mixin \Eloquent
 */
final class Author extends Model implements Contentable, HasMarkup, Viewable
{
    use AuthorSchema;
    use InteractsWithSEO;
    use InteractsWithViews;
    use IsContent;

    public string $titleColumn = 'name';

    public string $descriptionColumn = 'bio';

    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('name');
        $blueprint->string('username');
        $blueprint->string('email')->nullable();
        $blueprint->string('linkedin')->nullable();
        $blueprint->string('github')->nullable();
        $blueprint->string('x')->nullable();
        $blueprint->string('website')->nullable();
        $blueprint->string('bio')->nullable();
    }

    public function getKeyName(): string
    {
        return 'username';
    }

    /** @return HasMany<Tip, $this> */
    public function tips(): HasMany
    {
        return $this->hasMany(Tip::class, 'author_username', 'username');
    }

    /** @return HasMany<Package, $this> */
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class, 'author_username', 'username');
    }

    /** @return HasMany<Project, $this> */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'author_username', 'username');
    }

    /** @return HasMany<Post, $this> */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_username', 'username');
    }

    public function authorValue(): ?string
    {
        /** @phpstan-var string|null */
        return config('app.name');
    }

    public function authorUrlValue(): string
    {
        return route('page.landingPage');
    }

    public function publisherValue(): ?string
    {
        return $this->getAuthorValue();
    }

    public function publisherUrlValue(): ?string
    {
        return $this->getAuthorUrlValue();
    }

    public function urlValue(): string
    {
        return route('page.artisan.view', $this);
    }

    /** @return array<Breadcrumb> */
    public function breadcrumbs(): array
    {
        return [
            new Breadcrumb('Home', route('page.landingPage')),
            new Breadcrumb('Artisans', route('page.artisan.index')),
            new Breadcrumb($this->getTitleValue(), $this->getURLValue()),
        ];
    }

    /**
     * @return Attribute<string, null>
     */
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $imageDirectory = sprintf('storage/images/profile/%s.webp', $this->username);

                if (file_exists(public_path($imageDirectory))) {
                    return asset($imageDirectory);
                }

                /** @var string $email */
                $email = $this->getAttribute('email');
                /** @var string $email */
                $name = $this->getAttribute('name');

                if (filled($email)) {
                    $emailHash = md5(mb_strtolower(trim($email)));

                    return sprintf('https://www.gravatar.com/avatar/%s?s=128&d=identicon', $emailHash);
                }

                $nameIsValid = filled($name) && is_string($name);
                /** @phpstan-var string $name */
                $name = $nameIsValid ? $name : 'Laravel Nepal';

                return 'https://ui-avatars.com/api/?name='.urlencode($name).'&size=128';
            },
        );
    }

    /** @return Attribute<string|null, null> */
    protected function linkedinUrl(): Attribute
    {
        return Attribute::make(
            get: function (): ?string {
                /** @var string $linkedin */
                $linkedin = $this->getAttribute('linkedin');
                if (filled($linkedin)) {
                    return 'https://linkedin.com/in/'.$linkedin;
                }

                return null;
            },
        );
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
    protected function xUrl(): Attribute
    {
        return Attribute::make(
            get: function (): ?string {
                /** @var string $x */
                $x = $this->getAttribute('x');
                if (filled($x)) {
                    return 'https://www.x.com/'.$x;
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
                    'LinkedIn' => $this->linkedin_url,
                    'GitHub' => $this->github_url,
                    'X' => $this->x_url,
                    'Website' => filled($website) ? $website : null,
                ]);
            },
        );
    }
}
