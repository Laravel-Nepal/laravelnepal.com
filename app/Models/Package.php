<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Contracts\HasMarkup;
use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use App\Models\Scopes\SkipExcluded;
use App\Schemas\PackageSchema;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

#[ScopedBy(SkipExcluded::class)]
/**
 * @property string $name
 * @property string|null $slug
 * @property string $author_username
 * @property string|null $github
 * @property string|null $packagist
 * @property array<array-key, mixed> $tags
 * @property string|null $content
 * @property int $excluded
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Author|null $author
 * @property-read \AchyutN\LaravelSEO\Models\SEO|null $seo
 * @property-read array $social_links
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereAuthorUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereExcluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package wherePackagist($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Package whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
final class Package extends Model implements HasMarkup
{
    use InteractsWithSEO;
    use Orbital;
    use PackageSchema;

    public $titleColumn = 'name';

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

    public function getKeyType(): string
    {
        return 'string';
    }

    public function getIncrementing(): bool
    {
        return false;
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
        return $this->author?->name;
    }

    public function authorUrlValue(): string
    {
        return route('page.artisan.view', $this->author);
    }

    public function publisherValue(): ?string
    {
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

    protected function socialLinks(): Attribute
    {
        $links = [];

        if (filled($this->getAttribute('github'))) {
            $links[] = 'https://www.github.com/'.$this->getAttribute('github');
        }

        if (filled($this->getAttribute('packagist'))) {
            $links[] = 'https://packagist.org/packages/'.$this->getAttribute('packagist');
        }

        return Attribute::make(
            get: function () use ($links): array {
                return $links;
            },
        );
    }
}
