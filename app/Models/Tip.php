<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Contracts\HasMarkup;
use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Schemas\BlogSchema;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use App\Models\Scopes\SkipExcluded;
use App\Settings\SiteSettings;
use App\Traits\HasReadTime;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

#[ScopedBy(SkipExcluded::class)]
/**
 * @property string $title
 * @property string $slug
 * @property string $author_username
 * @property \Illuminate\Support\Carbon $date
 * @property array<array-key, mixed> $tags
 * @property string|null $content
 * @property int $excluded
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Author|null $author
 * @property-read int $minutes_read
 * @property-read string $minutes_read_text
 * @property-read \AchyutN\LaravelSEO\Models\SEO|null $seo
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereAuthorUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereExcluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
final class Tip extends Model implements HasMarkup
{
    use BlogSchema;
    use HasReadTime;
    use InteractsWithSEO;
    use Orbital;

    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('title');
        $blueprint->string('slug');
        $blueprint->string('author_username');
        $blueprint->date('date');
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
        return route('page.tips.view', $this);
    }

    public function imageValue(): string
    {
        $siteSettings = resolve(SiteSettings::class);

        return $siteSettings->og_image;
    }

    /** @return array<Breadcrumb> */
    public function breadcrumbs(): array
    {
        return [
            new Breadcrumb('Home', route('page.landingPage')),
            new Breadcrumb('Tips', route('page.tips.index')),
            new Breadcrumb($this->getTitleValue(), $this->getURLValue()),
        ];
    }

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'date' => 'date',
        ];
    }
}
