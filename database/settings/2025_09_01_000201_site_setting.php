<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.header_scripts', '');
        $this->migrator->add('site.footer_scripts', '');
    }
};
