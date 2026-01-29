<?php

declare(strict_types=1);

namespace App\Traits;

use Orbit\Concerns\Orbital;
use Override;

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


    #[Override]
    public function getKey(): string
    {
        /** @var string $key */
        $key = parent::getKey();

        return $key === null ? '' : $key;
    }
}
