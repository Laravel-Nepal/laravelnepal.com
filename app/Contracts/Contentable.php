<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface Contentable
{
    public function votes(): MorphMany;

    public function getTotalVotes(): int;

    public function vote(): void;
    public function removeVote(): void;

    public function contentIsVoted(): bool;

    public function getKeyType(): string;

    public function getIncrementing(): bool;

    public function submission(): MorphOne;

    public function contentIsSubmittedToLaravelNews(): bool;

    public function getTotalViews(): int;
}
