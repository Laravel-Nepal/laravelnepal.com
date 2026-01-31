<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Pulse\Support\PulseMigration;

return new class extends PulseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! $this->shouldRun()) {
            return;
        }

        Schema::create('pulse_values', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->unsignedInteger('timestamp');
            $blueprint->string('type');
            $blueprint->mediumText('key');
            match ($this->driver()) {
                'mariadb', 'mysql' => $blueprint->char('key_hash', 16)->charset('binary')->virtualAs('unhex(md5(`key`))'),
                'pgsql' => $blueprint->uuid('key_hash')->storedAs('md5("key")::uuid'),
                'sqlite' => $blueprint->string('key_hash'),
            };
            $blueprint->mediumText('value');

            $blueprint->index('timestamp'); // For trimming...
            $blueprint->index('type'); // For fast lookups and purging...
            $blueprint->unique(['type', 'key_hash']); // For data integrity and upserts...
        });

        Schema::create('pulse_entries', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->unsignedInteger('timestamp');
            $blueprint->string('type');
            $blueprint->mediumText('key');
            match ($this->driver()) {
                'mariadb', 'mysql' => $blueprint->char('key_hash', 16)->charset('binary')->virtualAs('unhex(md5(`key`))'),
                'pgsql' => $blueprint->uuid('key_hash')->storedAs('md5("key")::uuid'),
                'sqlite' => $blueprint->string('key_hash'),
            };
            $blueprint->bigInteger('value')->nullable();

            $blueprint->index('timestamp'); // For trimming...
            $blueprint->index('type'); // For purging...
            $blueprint->index('key_hash'); // For mapping...
            $blueprint->index(['timestamp', 'type', 'key_hash', 'value']); // For aggregate queries...
        });

        Schema::create('pulse_aggregates', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->unsignedInteger('bucket');
            $blueprint->unsignedMediumInteger('period');
            $blueprint->string('type');
            $blueprint->mediumText('key');
            match ($this->driver()) {
                'mariadb', 'mysql' => $blueprint->char('key_hash', 16)->charset('binary')->virtualAs('unhex(md5(`key`))'),
                'pgsql' => $blueprint->uuid('key_hash')->storedAs('md5("key")::uuid'),
                'sqlite' => $blueprint->string('key_hash'),
            };
            $blueprint->string('aggregate');
            $blueprint->decimal('value', 20, 2);
            $blueprint->unsignedInteger('count')->nullable();

            $blueprint->unique(['bucket', 'period', 'type', 'aggregate', 'key_hash']); // Force "on duplicate update"...
            $blueprint->index(['period', 'bucket']); // For trimming...
            $blueprint->index('type'); // For purging...
            $blueprint->index(['period', 'type', 'aggregate', 'bucket']); // For aggregate queries...
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pulse_values');
        Schema::dropIfExists('pulse_entries');
        Schema::dropIfExists('pulse_aggregates');
    }
};
