<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seriesables', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->foreignIdFor(App\Models\Series::class)
                ->constrained()
                ->cascadeOnDelete();
            $blueprint->string('seriesable_type');
            $blueprint->string('seriesable_id');
            $blueprint->bigInteger('order')
                ->default(0);
            $blueprint->timestamps();

            $blueprint->index(['seriesable_type', 'seriesable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seriesables');
    }
};
