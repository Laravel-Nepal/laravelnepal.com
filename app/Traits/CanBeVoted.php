<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Vote;
use CyrildeWit\EloquentViewable\Visitor;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait CanBeVoted
{
    /** @return MorphMany<Vote, $this> */
    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    public function vote(): void
    {
        $visitor = resolve(Visitor::class)->id();

        $this->votes()->firstOrCreate(
            ['visitor' => $visitor],
        );

        $this->removeVoteCache();
    }

    public function removeVote(): void
    {
        $visitor = resolve(Visitor::class)->id();

        $this->votes()
            ->where('visitor', $visitor)
            ->delete();

        $this->removeVoteCache();
    }

    public function getTotalVotes(): int
    {
        return cache()
            ->remember(
                sprintf('votes:%s:%s', self::class, $this->getKey()),
                now()->addMinutes(15),
                fn (): int => $this->votes()->count(),
            );
    }

    public function contentIsVoted(): bool
    {
        $visitor = resolve(Visitor::class)->id();

        return cache()
            ->remember(
                sprintf('content:voted:%s:%s:%s', self::class, $this->getKey(), $visitor),
                now()->addMinutes(15),
                fn (): bool => $this->votes()
                    ->where('visitor', $visitor)
                    ->exists(),
            );
    }

    /** @return Attribute<int, null> */
    protected function totalVotes(): Attribute
    {
        return Attribute::make(
            get: fn (): int => $this->getTotalVotes(),
        );
    }

    /** @return Attribute<bool, null> */
    protected function voted(): Attribute
    {
        return Attribute::make(
            get: fn (): bool => $this->contentIsVoted(),
        );
    }

    private function removeVoteCache(): void
    {
        $visitor = resolve(Visitor::class)->id();

        cache()->forget(
            sprintf('content:voted:%s:%s:%s', self::class, $this->getKey(), $visitor),
        );

        cache()->forget(
            sprintf('votes:%s:%s', self::class, $this->getKey()),
        );
    }
}
