<?php

declare(strict_types=1);

namespace App\Contracts;

interface Votable
{
    public function getKey(): string|int;

    public function getTotalVotes(): int;

    public function vote(): void;

    public function removeVote(): void;

    public function contentIsVoted(): bool;
}
