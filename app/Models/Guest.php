<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $visitor_id
 * @property string|null $name
 * @property string|null $email
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Comment> $comments
 * @property-read int|null $comments_count
 * @property-read Collection<int, Vote> $votes
 * @property-read int|null $votes_count
 *
 * @method static Builder<static>|Guest newModelQuery()
 * @method static Builder<static>|Guest newQuery()
 * @method static Builder<static>|Guest onlyTrashed()
 * @method static Builder<static>|Guest query()
 * @method static Builder<static>|Guest whereCreatedAt($value)
 * @method static Builder<static>|Guest whereDeletedAt($value)
 * @method static Builder<static>|Guest whereEmail($value)
 * @method static Builder<static>|Guest whereId($value)
 * @method static Builder<static>|Guest whereName($value)
 * @method static Builder<static>|Guest whereUpdatedAt($value)
 * @method static Builder<static>|Guest whereVisitorId($value)
 * @method static Builder<static>|Guest withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Guest withoutTrashed()
 *
 * @mixin \Eloquent
 */
final class Guest extends Model
{
    use SoftDeletes;

    /** @return HasMany<Comment, $this> */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'visitor', 'visitor_id');
    }

    /** @return HasMany<Vote, $this> */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'visitor', 'visitor_id');
    }
}
