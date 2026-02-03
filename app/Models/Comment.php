<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Votable;
use App\Traits\CanBeVoted;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Override;

/**
 * @property int $id
 * @property string $commentable_type
 * @property string $commentable_id
 * @property string $visitor
 * @property string $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Guest|null $guest
 * @property-read int $total_votes
 * @property-read bool $voted
 * @property-read Collection<int, Vote> $votes
 * @property-read int|null $votes_count
 *
 * @method static Builder<static>|Comment newModelQuery()
 * @method static Builder<static>|Comment newQuery()
 * @method static Builder<static>|Comment query()
 * @method static Builder<static>|Comment whereCommentableId($value)
 * @method static Builder<static>|Comment whereCommentableType($value)
 * @method static Builder<static>|Comment whereContent($value)
 * @method static Builder<static>|Comment whereCreatedAt($value)
 * @method static Builder<static>|Comment whereId($value)
 * @method static Builder<static>|Comment whereUpdatedAt($value)
 * @method static Builder<static>|Comment whereVisitor($value)
 *
 * @mixin \Eloquent
 */
final class Comment extends Model implements Votable
{
    use CanBeVoted;

    #[Override]
    public function getKey(): int
    {
        /** @var int */
        return $this->getAttribute('id');
    }

    public function getConnectionName(): ?string
    {
        /** @var string|null */
        return config('database.default');
    }

    // @phpstan-ignore-next-line
    public function commentable(): MorphTo
    {
        return $this->morphTo('commentable');
    }

    /** @return BelongsTo<Guest, $this> */
    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class, 'visitor', 'visitor_id');
    }
}
