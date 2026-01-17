<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\LaravelNewsSubmission;
use App\Models\Vote;
use CyrildeWit\EloquentViewable\View;
use CyrildeWit\EloquentViewable\Visitor;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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
     * @return MorphOne<LaravelNewsSubmission, $this>
     */
    public function submission(): MorphOne
    {
        return $this->morphOne(LaravelNewsSubmission::class, 'submittable');
    }

    /** @return MorphMany<Vote, $this> */
    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    public function vote(): void
    {
        $visitor = app(Visitor::class)->id();

        $this->votes()->firstOrCreate(
            ['visitor' => $visitor],
        );
    }

    /** @return Builder<LaravelNewsSubmission> */
    #[Scope]
    protected function submissions(): Builder
    {
        return LaravelNewsSubmission::query()
            ->where('submittable_type', get_class($this))
            ->where('submittable_id', $this->getKey());
    }

    /** @return Attribute<bool, null> */
    protected function isSubmittedToLaravelNews(): Attribute
    {
        return Attribute::make(
            get: fn (): bool => $this->submissions()->exists(),
        );
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
                        ->distinct('visitor')
                        ->count(),
                ),
        );
    }

    /** @return Attribute<int, null> */
    protected function totalVotes(): Attribute
    {
        return Attribute::make(
            get: fn (): int => $this->votes()->count(),
        );
    }

    /** @return Attribute<bool, null> */
    protected function voted(): Attribute
    {
        $visitor = app(Visitor::class)->id();

        return Attribute::make(
            get: fn (): bool => $this->votes()
                ->where('visitor', $visitor)
                ->exists(),
        );
    }
}
