<?php

declare(strict_types=1);

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CompanyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Profile')
                    ->description('Company information')
                    ->schema([
                        ImageEntry::make('avatar')
                            ->columnSpanFull()
                            ->circular()
                            ->placeholder('N/A')
                            ->hiddenLabel(),
                        TextEntry::make('name')
                            ->placeholder('N/A'),
                        TextEntry::make('email')
                            ->url(fn (string $state): string => 'mailto:'.$state)
                            ->placeholder('N/A'),
                        TextEntry::make('city')
                            ->placeholder('N/A'),
                        TextEntry::make('tech_stack')
                            ->badge()
                            ->label('Tech Stack')
                            ->placeholder('N/A'),
                    ])
                    ->columns()
                    ->aside(),
                Section::make('Socials')
                    ->description('Company social media links')
                    ->schema([
                        TextEntry::make('linkedin')
                            ->url(fn (string $state): string => 'https://linkedin.com/company/'.$state)
                            ->openUrlInNewTab()
                            ->placeholder('N/A')
                            ->label('LinkedIn'),
                        TextEntry::make('website')
                            ->label('Website')
                            ->placeholder('N/A')
                            ->url(fn (string $state): string => str_starts_with($state, 'http') ? $state : 'https://'.$state)
                            ->openUrlInNewTab(),
                    ])
                    ->columns()
                    ->aside(),
                Section::make('About')
                    ->description('More information about the company')
                    ->schema([
                        TextEntry::make('content')
                            ->label('Description')
                            ->placeholder('N/A')
                            ->markdown()
                            ->columnSpanFull()
                            ->hiddenLabel(),
                    ])
                    ->columns()
                    ->aside(),
            ]);
    }
}
