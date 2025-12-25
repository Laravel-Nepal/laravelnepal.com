<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserRole;
use Exception;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class UserForm
{
    /**
     * @throws Exception
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns()
                    ->columnSpanFull()
                    ->components([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        Select::make('role')
                            ->options(self::roleOptions())
                            ->default('user')
                            ->required(),
                        TextInput::make('password')
                            ->password()
                            ->required(),
                    ]),
            ]);
    }

    /**
     * @return array<string, string>
     */
    private static function roleOptions(): array
    {
        if (auth()->user() === null) {
            return [];
        }

        return collect(auth()->user()->lowerRoles())
            ->mapWithKeys(
                /** @return array<UserRole, string> */
                fn (UserRole $userRole): array => [
                    $userRole->value => $userRole->getLabel(),
                ]
            )
            ->all();
    }
}
