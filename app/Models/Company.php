<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Scopes\SkipExcluded;
use App\Traits\IsContent;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

#[ScopedBy(SkipExcluded::class)]
/**
 * @property string $name
 * @property string $slug
 * @property string|null $email
 * @property string|null $website
 * @property string|null $city
 * @property string|null $linkedin
 * @property array<array-key, mixed>|null $tech_stack
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $avatar
 * @property-read bool $is_submitted_to_laravel_news
 * @property-read LaravelNewsSubmission|null $submission
 * @property-read int $total_views
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \CyrildeWit\EloquentViewable\View> $views
 * @property-read int|null $views_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company submissions()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereTechStack($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 *
 * @mixin \Eloquent
 */
final class Company extends Model implements Viewable
{
    use InteractsWithViews;
    use IsContent;

    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('name');
        $blueprint->string('slug');
        $blueprint->string('email')->nullable();
        $blueprint->string('website')->nullable();
        $blueprint->string('city')->nullable();
        $blueprint->string('linkedin')->nullable();
        $blueprint->json('tech_stack')->nullable();
    }

    public function getKeyName(): string
    {
        return 'slug';
    }

    protected function casts(): array
    {
        return [
            'tech_stack' => 'array',
        ];
    }

    /**
     * @return Attribute<string, null>
     */
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $imageDirectory = sprintf('storage/images/logos/%s.avif', $this->slug);

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
}
