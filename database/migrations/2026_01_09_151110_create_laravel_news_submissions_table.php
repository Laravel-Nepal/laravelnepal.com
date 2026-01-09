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
        Schema::create('laravel_news_submissions', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->string('submittable_id');
            $blueprint->string('submittable_type');
            $blueprint->integer('response_id');
            $blueprint->timestamps();

            $blueprint->unique(
                ['submittable_id', 'submittable_type'],
                'laravel_news_submission_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laravel_news_submissions');
    }
};
