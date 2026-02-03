<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model as Record;

final class PreviewAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Preview');

        $this->icon(Heroicon::ArrowTopRightOnSquare);

        $this->color(Color::Green);

        $this->visible(fn (Record $record): bool => $record->getURLValue() !== null);

        $this->url(fn (Record $record) => $record->getURLValue());

        $this->openUrlInNewTab();
    }

    public static function getDefaultName(): string
    {
        return 'preview';
    }
}
