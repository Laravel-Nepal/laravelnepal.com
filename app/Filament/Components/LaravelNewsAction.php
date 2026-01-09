<?php

declare(strict_types=1);

namespace App\Filament\Components;

use AchyutN\LaravelNews\Data\Link;
use AchyutN\LaravelNews\Enums\LinkCategory;
use AchyutN\LaravelNews\Facades\LaravelNews;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
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

        $this->action(function (Model $record): void {
            try {
                $link = new Link(
                    title: $record->getTitleValue(),
                    url: $record->getURLValue(),
                    category: $this->getType(),
                );

                $response = LaravelNews::post($link);

                $record->submissions()
                    ->firstOrCreate([
                        'response_id' => $response->id,
                    ]);

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
        });
    }

    public static function getDefaultName(): ?string
    {
        return 'laravel-news';
    }

    public function type(LinkCategory $linkCategory): self
    {
        $this->linkCategory = $linkCategory;

        return $this;
    }

    protected function getType(): LinkCategory
    {
        return $this->evaluate($this->linkCategory) ?? LinkCategory::Tutorial;
    }
}
