<?php

declare(strict_types=1);

namespace App\Contracts;

interface Contentable extends Votable
{
    public function getKey(): string|int;

    public function getKeyType(): string;

    public function getIncrementing(): bool;

    public function contentIsSubmittedToLaravelNews(): bool;

    public function getTotalViews(): int;

    public function imageValue(): ?string;
}
