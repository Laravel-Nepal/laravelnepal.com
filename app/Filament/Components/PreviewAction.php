<?php

declare(strict_types=1);

namespace App\Filament\Components;

use AchyutN\LaravelSEO\Contracts\HasColumns;
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

        $this->visible(
            function (Record $record): bool {
                /** @var Record & HasColumns $record */
                return $record->getURLValue() !== null;
            }
        );

        $this->url(
            function (Record $record): ?string {
                /** @var Record & HasColumns $record */
                return $record->getURLValue();
            }
        );

        $this->openUrlInNewTab();
    }

    public static function getDefaultName(): string
    {
        return 'preview';
    }
}
