<?php

namespace App\Filament\Resources\Tips\Pages;

use App\Filament\Resources\Tips\TipResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTips extends ListRecords
{
    protected static string $resource = TipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
