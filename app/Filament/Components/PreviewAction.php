<?php

declare(strict_types=1);

namespace App\Filament\Components;

use AchyutN\LaravelSEO\Contracts\HasColumns;
use Filament\Actions\Action;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;

final class PreviewAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Preview');

        $this->icon(Heroicon::ArrowTopRightOnSquare);

        $this->color(Color::Green);

        $this->visible(fn (HasColumns $hasColumns): bool => $hasColumns->getURLValue() !== null);

        $this->url(fn (HasColumns $hasColumns): ?string => $hasColumns->getURLValue());

        $this->openUrlInNewTab();
    }

    public static function getDefaultName(): string
    {
        return 'preview';
    }
}
