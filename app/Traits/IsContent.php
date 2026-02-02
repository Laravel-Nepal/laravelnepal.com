<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Comment;
use App\Models\LaravelNewsSubmission;
use CyrildeWit\EloquentViewable\View;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Orbit\Concerns\Orbital;
use Override;

trait IsContent
{
    use CanBeVoted;
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

    /**
     * @return MorphOne<LaravelNewsSubmission, $this>
     */
    public function submission(): MorphOne
    {
        return $this->morphOne(LaravelNewsSubmission::class, 'submittable');
    }

    /** @return MorphMany<Comment, $this> */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderByDesc('created_at');
    }

    public function contentIsSubmittedToLaravelNews(): bool
    {
        return cache()->remember(
            sprintf('content:laravel-news-submitted:%s:%s', self::class, $this->getKey()),
            now()->addMinutes(30),
            fn (): bool => $this->submissions()->exists(),
        );
    }

    public function getTotalViews(): int
    {
        $modelkey = $this->getKey();

        return cache()
            ->remember(
                sprintf('views:%s:%s', self::class, $modelkey),
                now()->addMinutes(15),
                fn (): int => View::on('mysql')
                    ->where('viewable_type', self::class)
                    ->where('viewable_id', $modelkey)
                    ->distinct('visitor')
                    ->count(),
            );
    }

    public function imageValue(): ?string
    {
        return route(
            'page.openGraphImage',
            [
                'model' => mb_strtolower(class_basename($this)),
                'key' => $this->getKey(),
            ]
        );
    }

    /** @return Attribute<int, null> */
    protected function totalComments(): Attribute
    {
        return Attribute::make(
            get: fn (): int => Comment::on('mysql')
                ->where('commentable_type', self::class)
                ->where('commentable_id', $this->getKey())
                ->count(),
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
            get: fn (): bool => $this->contentIsSubmittedToLaravelNews(),
        );
    }

    /** @return Attribute<int, null> */
    protected function totalViews(): Attribute
    {
        $this->getKey();

        return Attribute::make(
            get: fn (): int => $this->getTotalViews(),
        );
    }
}
