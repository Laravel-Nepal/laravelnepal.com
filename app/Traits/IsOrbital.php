<?php

declare(strict_types=1);

namespace App\Traits;

use CyrildeWit\EloquentViewable\View;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    /** @return Attribute<int, null> */
    protected function totalViews(): Attribute
    {
        /** @var string $modelkey */
        $modelkey = $this->getKey();

        return Attribute::make(
            get: fn (): int => cache()
                ->remember(
                    sprintf('views:%s:%s', self::class, $modelkey),
                    now()->addMinutes(15),
                    fn (): int => View::on('mysql')
                        ->where('viewable_type', self::class)
                        ->where('viewable_id', $modelkey)
                        ->count(),
                ),
        );
    }
}
