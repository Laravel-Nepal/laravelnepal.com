<?php

declare(strict_types=1);

namespace App\Filament\Resources\Tips;

use App\Filament\Resources\Tips\Pages\ListTips;
use App\Filament\Resources\Tips\Pages\ViewTip;
use App\Filament\Resources\Tips\Schemas\TipInfolist;
use App\Filament\Resources\Tips\Tables\TipsTable;
use App\Models\Tip;
use BackedEnum;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class TipResource extends Resource
{
    protected static ?string $model = Tip::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::RectangleStack;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function infolist(Schema $schema): Schema
    {
        return TipInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TipsTable::configure($table);
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
            'index' => ListTips::route('/'),
            'view' => ViewTip::route('/{record}'),
        ];
    }
}
