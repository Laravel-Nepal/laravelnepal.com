<?php

declare(strict_types=1);

namespace App\Filament\Components;

use AchyutN\LaravelNews\Data\Link;
use AchyutN\LaravelNews\Enums\LinkCategory;
use AchyutN\LaravelNews\Facades\LaravelNews;
use AchyutN\LaravelSEO\Services\SEOService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model as Record;
use Illuminate\Support\Facades\Log;
use Throwable;

final class LaravelNewsAction extends Action
{
    public ?LinkCategory $linkCategory = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Submit to Laravel News');

        $this->icon(Heroicon::OutlinedArrowUpOnSquare);

        $this->color(Color::Red);

        $this->requiresConfirmation();

        $this->hidden(
            fn (Record $record): bool => cache()
                ->rememberForever(
                    key: sprintf(
                        'laravel_news_submitted_%s_%s',
                        $record->getTable(),
                        // @phpstan-ignore-next-line
                        $record->getKey()
                    ),
                    // @phpstan-ignore-next-line
                    callback: fn (): bool => $record->is_submitted_to_laravel_news,
                ),
        );

        $this->action(fn (Record $record) => $this->submitToLaravelNews($record));
    }

    public static function getDefaultName(): string
    {
        return 'laravel-news';
    }

    public function type(LinkCategory $linkCategory): self
    {
        $this->linkCategory = $linkCategory;

        return $this;
    }

    public function submitToLaravelNews(Record $record): void
    {
        $seoService = resolve(SEOService::class);

        ['title' => $title, 'url' => $url] = $seoService->getModelValues($record);
        try {
            $link = new Link(
                title: $title ?? 'Laravel Nepal',
                url: $url ?? 'https://laravelnepal.com',
                category: $this->getType(),
            );

            $response = LaravelNews::post($link);

            if (method_exists($record, 'submission')) {
                // @phpstan-ignore-next-line
                $record->submission()
                    ->firstOrCreate([
                        'response_id' => $response->id,
                    ]);

                cache()->forever(
                    key: sprintf(
                        'laravel_news_submitted_%s_%s',
                        $record->getTable(),
                        // @phpstan-ignore-next-line
                        $record->getKey()
                    ),
                    value: true,
                );
            }

            Notification::make()
                ->title('Link submitted to Laravel News successfully.')
                ->success()
                ->send();
        } catch (Throwable $throwable) {
            Log::error('Failed to submit link to Laravel News', [
                'error' => $throwable->getMessage(),
                'link' => isset($link) ? $link->toPostArray() : null,
                'trace' => $throwable->getTraceAsString(),
            ]);

            Notification::make()
                ->title('Failed to submit the link to Laravel News.')
                ->body($throwable->getMessage())
                ->danger()
                ->send();
        }
    }

    protected function getType(): LinkCategory
    {
        return $this->evaluate($this->linkCategory) ?? LinkCategory::Tutorial;
    }
}
