<?php

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

    protected function totalViews(): Attribute
    {
        return Attribute::make(
            get: fn () => cache()
                ->remember(
                    sprintf('views:%s:%s', self::class, $this->getKey()),
                    now()->addMinutes(15),
                    fn () => View::on('mysql')
                        ->where('viewable_type', self::class)
                        ->where('viewable_id', $this->getKey())
                        ->count(),
                ),
        );
    }
}
