<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelHelpers\Traits\HasTheSlug;
use AchyutN\LaravelSEO\Contracts\HasMarkup;
use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Models\SEO;
use AchyutN\LaravelSEO\Schemas\PageSchema;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use App\Enums\PageType;
use App\Settings\SiteSettings;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property string|null $content
 * @property string|null $name
 * @property PageType $type
 * @property array<array-key, mixed>|null $tags
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read SEO|null $seo
 *
 * @method static Builder<static>|Page findSimilarSlugs(string $attribute, array<string,string> $config, string $slug)
 * @method static Builder<static>|Page newModelQuery()
 * @method static Builder<static>|Page newQuery()
 * @method static Builder<static>|Page onlyTrashed()
 * @method static Builder<static>|Page query()
 * @method static Builder<static>|Page whereContent($value)
 * @method static Builder<static>|Page whereCreatedAt($value)
 * @method static Builder<static>|Page whereDeletedAt($value)
 * @method static Builder<static>|Page whereDescription($value)
 * @method static Builder<static>|Page whereId($value)
 * @method static Builder<static>|Page whereName($value)
 * @method static Builder<static>|Page whereSlug($value)
 * @method static Builder<static>|Page whereTags($value)
 * @method static Builder<static>|Page whereTitle($value)
 * @method static Builder<static>|Page whereType($value)
 * @method static Builder<static>|Page whereUpdatedAt($value)
 * @method static Builder<static>|Page withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Page withUniqueSlugConstraints(Model $model, string $attribute, array<string,string> $config, string $slug)
 * @method static Builder<static>|Page withoutTrashed()
 *
 * @mixin \Eloquent
 */
final class Page extends Model implements HasMarkup
{
    use HasTheSlug;
    use InteractsWithSEO;
    use PageSchema;
    use SoftDeletes;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categoryValue(): string
    {
        return $this->type->getLabel();
    }

    public function imageValue(): ?string
    {
        $siteSettings = resolve(SiteSettings::class);

        return $siteSettings->og_image;
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

    public function urlValue(): ?string
    {
        if ($this->type === PageType::LandingPage) {
            return route('page.landingPage');
        }

        if ($this->type === PageType::IndexPage) {
            return route(sprintf('page.%s.index', $this->name));
        }

        return null;
    }

    /** @return array<Breadcrumb> */
    public function breadcrumbs(): array
    {
        if ($this->type === PageType::LandingPage) {
            return [
                new Breadcrumb($this->getTitleValue(), $this->getURLValue()),
            ];
        }

        return [
            new Breadcrumb('Home', route('page.landingPage')),
            new Breadcrumb($this->getTitleValue(), $this->getURLValue()),
        ];
    }

    protected function casts(): array
    {
        return [
            'type' => PageType::class,
            'tags' => 'array',
        ];
    }
}
