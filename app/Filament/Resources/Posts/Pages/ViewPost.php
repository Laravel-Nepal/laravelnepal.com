<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Components\LaravelNewsAction;
use App\Filament\Resources\Posts\PostResource;
use Filament\Resources\Pages\ViewRecord;

final class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LaravelNewsAction::make(),
        ];
    }
}
