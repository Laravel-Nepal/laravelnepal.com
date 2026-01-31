<?php

declare(strict_types=1);

namespace App\Traits;

use Orbit\Concerns\Orbital;

trait IsOrbital
{
    use Orbital;

    public function getKeyType(): string
    {
        return 'string';
    }

    public function getIncrementing(): bool
    {
        return false;
    }
}
