<?php

declare(strict_types=1);

namespace App\Filament\Resources\Tips\Pages;

use App\Filament\Resources\Tips\TipResource;
use Filament\Resources\Pages\ViewRecord;

final class ViewTip extends ViewRecord
{
    protected static string $resource = TipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
