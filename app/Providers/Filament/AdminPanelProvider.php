<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use AchyutN\FilamentLogViewer\FilamentLogViewer;
use App\Enums\UserRole;
use App\Filament\Commands\FileGenerators\Resources\ResourceClassGenerator;
use App\Filament\Commands\FileGenerators\Resources\ResourceInfolistSchemaClassGenerator;
use App\Models\Scopes\LowerRoleOnly;
use App\Models\User;
use App\Settings\SiteSettings;
use Awcodes\Gravatar\GravatarPlugin;
use Awcodes\Gravatar\GravatarProvider;
use DutchCodingCompany\FilamentDeveloperLogins\FilamentDeveloperLoginsPlugin;
use Exception;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Commands\FileGenerators\Resources\ResourceClassGenerator as BaseResourceClassGenerator;
use Filament\Commands\FileGenerators\Resources\Schemas\ResourceInfolistSchemaClassGenerator as BaseSchemasResourceInfolistSchemaClassGenerator;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;
use pxlrbt\FilamentEnvironmentIndicator\EnvironmentIndicatorPlugin;

final class AdminPanelProvider extends PanelProvider
{
    protected SiteSettings $settings;

    public function __construct($app)
    {
        parent::__construct($app);

        $this->settings = resolve(SiteSettings::class);
    }

    /**
     * @throws Exception
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName(fn (): ?string => $this->settings->name)
            ->brandLogo(fn () => $this->settings->logo ? '/storage/'.$this->settings->logo : null)
            ->brandLogoHeight('3rem')
            ->favicon(fn () => $this->settings->favicon ? '/storage/'.$this->settings->favicon : null)
            ->login()
            ->passwordReset()
            ->emailVerification(isRequired: app()->environment('production'))
            ->colors([
                'primary' => Color::hex('#fc6a3e'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                FilamentLogViewer::make()
                    ->authorize(fn (): bool => auth()->user()?->role === UserRole::Admin),
                EnvironmentIndicatorPlugin::make()
                    ->visible(fn (): bool => auth()->user()?->role === UserRole::Admin)
                    ->showDebugModeWarning()
                    ->showGitBranch(),
                GravatarPlugin::make()
                    ->default('initials')
                    ->size(200),
                FilamentEditProfilePlugin::make()
                    ->slug('edit-profile')
                    ->setIcon('heroicon-o-user')
                    ->setTitle('Profile')
                    ->setNavigationLabel('Profile')
                    ->setNavigationGroup('Profile')
                    ->shouldRegisterNavigation(false)
                    ->shouldShowAvatarForm(false)
                    ->shouldShowDeleteAccountForm(true)
                    ->shouldShowEmailForm(false),
                FilamentDeveloperLoginsPlugin::make()
                    ->enabled(app()->isLocal())
                    ->users(
                        fn () => User::query()
                            ->withoutGlobalScope(LowerRoleOnly::class)
                            ->pluck('email', 'name')
                            ->toArray()
                    ),
            ])
            ->userMenuItems([
                'profile' => Action::make('profile')
                    ->label('Edit Profile')
                    ->url(fn (): string => EditProfilePage::getUrl())
                    ->icon(Heroicon::OutlinedPencilSquare),
            ])
            ->defaultAvatarProvider(GravatarProvider::class)
            ->maxContentWidth(Width::Full)
            ->globalSearch(false)
            ->sidebarCollapsibleOnDesktop()
            ->databaseTransactions()
            ->unsavedChangesAlerts()
            ->spa();
    }

    public function boot(): void
    {
        Table::configureUsing(
            fn (Table $table): Table => $table
                ->defaultDateDisplayFormat('F j, Y')
                ->defaultTimeDisplayFormat('g:i A')
                ->defaultDateTimeDisplayFormat('F j, Y, g:i A')
                ->deferFilters(false)
                ->deferColumnManager(false)
        );

        Schema::configureUsing(
            fn (Schema $schema): Schema => $schema
                ->defaultDateDisplayFormat('F j, Y')
                ->defaultTimeDisplayFormat('h:i A')
                ->defaultDateTimeDisplayFormat('F j, Y, h:i A')
        );

        TextEntry::configureUsing(
            fn (TextEntry $textEntry): TextEntry => $textEntry
                ->placeholder('N/A')
        );

        TextColumn::configureUsing(
            fn (TextColumn $textColumn): TextColumn => $textColumn
                ->placeholder('N/A')
        );

        FileUpload::configureUsing(
            fn (FileUpload $fileUpload): FileUpload => $fileUpload
                ->preserveFilenames()
                ->disk('public')
                ->helperText('Please keep the aspect ratio in mind since cropping may occur. Press the pencil icon to edit the image after uploading.')
                ->visibility('public')
        );

        ImageColumn::configureUsing(
            fn (ImageColumn $imageColumn): ImageColumn => $imageColumn
                ->disk('public')
                ->visibility('public')
        );

        ImageEntry::configureUsing(
            fn (ImageEntry $imageEntry): ImageEntry => $imageEntry
                ->disk('public')
                ->visibility('public')
        );

        CreateAction::configureUsing(
            fn (CreateAction $createAction): CreateAction => $createAction
                ->slideOver()
        );

        EditAction::configureUsing(
            fn (EditAction $editAction): EditAction => $editAction
                ->slideOver()
        );

        ViewAction::configureUsing(
            fn (ViewAction $viewAction): ViewAction => $viewAction
                ->slideOver()
        );

        RichEditor::configureUsing(
            fn (RichEditor $richEditor): RichEditor => $richEditor
                ->extraInputAttributes([
                    'style' => 'overflow-y: scroll; max-height: 600px;',
                ])
        );
    }

    public function register(): void
    {
        parent::register();

        $this->app->bind(BaseSchemasResourceInfolistSchemaClassGenerator::class, ResourceInfolistSchemaClassGenerator::class);
        $this->app->bind(BaseResourceClassGenerator::class, ResourceClassGenerator::class);
    }
}
