<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\LaravelNewsSubmission;
use CyrildeWit\EloquentViewable\View;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Orbit\Concerns\Orbital;

trait IsContent
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

    /**
     * @return MorphOne<LaravelNewsSubmission>
     */
    public function submission(): MorphOne
    {
        return $this->morphOne(LaravelNewsSubmission::class, 'submittable');
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
