<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface Contentable
{
    public function votes(): MorphMany;

    /** @return Attribute<int, null> */
    public function totalVotes(): Attribute;

    /** @return Attribute<bool, null> */
    public function voted(): Attribute;

    public function getKeyType(): string;

    public function getIncrementing(): bool;

    /** @return MorphOne */
    public function submission(): MorphOne;

    /** @return Builder */
    public function submissions(): Builder;

    /** @return Attribute<bool, null> */
    public function isSubmittedToLaravelNews(): Attribute;

    /** @return Attribute<int, null> */
    public function totalViews(): Attribute;
}
