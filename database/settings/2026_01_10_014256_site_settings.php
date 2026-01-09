<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.footer_text', 'Officially permitted by the Laravel team. Not officially affiliated with or endorsed by Laravel.');
    }
};
