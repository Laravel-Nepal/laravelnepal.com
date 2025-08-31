<?php

declare(strict_types=1);

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Settings\SiteSettings;
use BackedEnum;
use Exception;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

final class ManageSiteSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::GlobeAlt;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static string $settings = SiteSettings::class;

    protected static ?string $cluster = SettingsCluster::class;

    /**
     * @throws Exception
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Site Details')
                    ->description('These details are used in various places throughout the application, such as the site title and meta tags.')
                    ->aside()
                    ->schema([
                        TextInput::make('name')
                            ->label('Site Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('description')
                            ->label('Site Description')
                            ->required()
                            ->maxLength(500),
                    ]),
                Section::make('Site Images')
                    ->description('Images used for branding and social media sharing.')
                    ->aside()
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Site Logo')
                            ->image()
                            ->directory('site')
                            ->maxSize(1024)
                            ->nullable()
                            ->helperText('The site logo is displayed in the top-left corner of the admin panel. Recommended size: 64x64 pixels.'),
                        FileUpload::make('favicon')
                            ->label('Favicon')
                            ->image()
                            ->directory('site')
                            ->maxSize(512)
                            ->nullable()
                            ->helperText('The favicon is displayed in the browser tab. Recommended size: 32x32 pixels.'),
                        FileUpload::make('og_image')
                            ->label('Open Graph Image')
                            ->image()
                            ->directory('site')
                            ->maxSize(2048)
                            ->nullable()
                            ->helperText('The Open Graph image is used when sharing links on social media. Recommended size: 1200x630 pixels.'),
                    ]),
                Section::make('Custom Scripts')
                    ->description('Add custom scripts to the header or footer of your site')
                    ->schema([
                        CodeEditor::make('header_scripts')
                            ->language(Language::Html)
                            ->label('Header Scripts')
                            ->helperText('Scripts added here will be included in the <head> section of your site.'),
                        CodeEditor::make('footer_scripts')
                            ->language(Language::Html)
                            ->label('Footer Scripts')
                            ->helperText('Scripts added here will be included before the closing </body> tag of your site.'),
                    ])
                    ->aside(),
            ]);
    }
}
