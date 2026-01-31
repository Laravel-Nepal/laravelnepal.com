<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $post_slug
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Post|null $post
 *
 * @method static Builder<static>|News newModelQuery()
 * @method static Builder<static>|News newQuery()
 * @method static Builder<static>|News onlyTrashed()
 * @method static Builder<static>|News query()
 * @method static Builder<static>|News whereCreatedAt($value)
 * @method static Builder<static>|News whereDeletedAt($value)
 * @method static Builder<static>|News whereId($value)
 * @method static Builder<static>|News wherePostSlug($value)
 * @method static Builder<static>|News whereUpdatedAt($value)
 * @method static Builder<static>|News withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|News withoutTrashed()
 *
 * @mixin \Eloquent
 */
final class News extends Model
{
    use SoftDeletes;

    public function getConnectionName(): ?string
    {
        /** @var string|null */
        return config('database.default');
    }

    /** @return BelongsTo<Post, $this> */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_slug', 'slug');
    }
}
