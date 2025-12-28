<?php

declare(strict_types=1);

namespace App\Filament\Resources\Packages;

use App\Filament\Resources\Packages\Pages\ListPackages;
use App\Filament\Resources\Packages\Pages\ViewPackage;
use App\Filament\Resources\Packages\Schemas\PackageInfolist;
use App\Filament\Resources\Packages\Tables\PackagesTable;
use App\Models\Package;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Square3Stack3d;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::OutlinedSquare3Stack3d;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $recordTitleAttribute = 'name';

    public static function infolist(Schema $schema): Schema
    {
        return PackageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PackagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPackages::route('/'),
            'view' => ViewPackage::route('/{record}'),
        ];
    }
}
