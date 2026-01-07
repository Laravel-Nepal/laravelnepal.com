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
        Schema::create('seo', function (Blueprint $blueprint): void {
            $blueprint->id();

            $this->morphs($blueprint, 'model');

            $blueprint->string('meta_title')->nullable();
            $blueprint->text('meta_description')->nullable();
            $blueprint->string('meta_keywords')
                ->nullable();

            $blueprint->string('og_title')->nullable();
            $blueprint->text('og_description')->nullable();
            $blueprint->string('og_image')->nullable();
            $blueprint->string('og_url')->nullable();

            $blueprint->string('canonical')->nullable();
            $blueprint->string('robots')
                ->nullable();

            $blueprint->string('author')->nullable();
            $blueprint->string('publisher')->nullable();
            $blueprint->timestamps();
        });
    }

    public function morphs(Blueprint $blueprint, string $name): void
    {
        $blueprint->string($name . '_id');
        $blueprint->string($name . '_type');
        $blueprint->unique(
            [$name . '_type', $name . '_id'],
            $name . '_morph_index'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo');
    }
};
