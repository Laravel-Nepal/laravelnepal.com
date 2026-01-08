<?php

declare(strict_types=1);

namespace App\Filament\Resources\Authors\Schemas;

use App\Models\Author;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

final class AuthorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Profile')
                    ->description('Author information')
                    ->schema([
                        ImageEntry::make('avatar')
                            ->columnSpanFull()
                            ->circular()
                            ->placeholder('N/A')
                            ->hiddenLabel(),
                        TextEntry::make('bio')
                            ->columnSpanFull()
                            ->weight(FontWeight::Bold)
                            ->size(TextSize::Large)
                            ->placeholder('N/A')
                            ->hiddenLabel(),
                        TextEntry::make('name')
                            ->placeholder('N/A'),
                        TextEntry::make('username')
                            ->placeholder('N/A'),
                        TextEntry::make('email')
                            ->url(fn (string $state): string => 'mailto:'.$state)
                            ->placeholder('N/A'),
                    ])
                    ->columns()
                    ->aside(),
                Section::make('Socials')
                    ->description('Author social media links')
                    ->schema([
                        TextEntry::make('linkedin')
                            ->url(fn (Author $author): ?string => $author->linkedin_url)
                            ->badge()
                            ->openUrlInNewTab()
                            ->placeholder('N/A')
                            ->label('LinkedIn'),
                        TextEntry::make('github')
                            ->url(fn (Author $author): ?string => $author->github_url)
                            ->badge()
                            ->openUrlInNewTab()
                            ->placeholder('N/A')
                            ->label('GitHub'),
                        TextEntry::make('x')
                            ->url(fn (Author $author): ?string => $author->x_url)
                            ->badge()
                            ->openUrlInNewTab()
                            ->placeholder('N/A')
                            ->label('X (formerly Twitter)'),
                        TextEntry::make('website')
                            ->label('Website')
                            ->placeholder('N/A')
                            ->url(fn (string $state): string => str_starts_with($state, 'http') ? $state : 'https://'.$state)
                            ->openUrlInNewTab(),
                    ])
                    ->columns()
                    ->aside(),
                Section::make('About')
                    ->description('Information about the author')
                    ->schema([
                        TextEntry::make('content')
                            ->markdown()
                            ->placeholder('N/A')
                            ->label('About')
                            ->columnSpanFull()
                            ->hiddenLabel(),
                    ])
                    ->columns()
                    ->aside(),
            ]);
    }
}
