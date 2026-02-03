<?php

declare(strict_types=1);

namespace App\Filament\Resources\Guests\Pages;

use App\Filament\Resources\Guests\GuestResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateGuest extends CreateRecord
{
    protected static string $resource = GuestResource::class;
}
