<?php

namespace App\Filament\Resources\Tips\Pages;

use App\Filament\Resources\Tips\TipResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTip extends ViewRecord
{
    protected static string $resource = TipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
