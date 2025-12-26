<?php

declare(strict_types=1);

namespace App\Filament\Resources\Tips\Pages;

use App\Filament\Resources\Tips\TipResource;
use Filament\Resources\Pages\ListRecords;

final class ListTips extends ListRecords
{
    protected static string $resource = TipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
