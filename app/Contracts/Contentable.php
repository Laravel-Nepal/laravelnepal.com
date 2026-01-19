<?php

declare(strict_types=1);

namespace App\Contracts;

interface Contentable
{
    public function getTotalVotes(): int;

    public function vote(): void;

    public function removeVote(): void;

    public function contentIsVoted(): bool;

    public function getKeyType(): string;

    public function getIncrementing(): bool;

    public function contentIsSubmittedToLaravelNews(): bool;

    public function getTotalViews(): int;

    public function imageValue(): ?string;
}
