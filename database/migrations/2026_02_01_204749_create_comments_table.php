<?php

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
        Schema::create('comments', function (Blueprint $blueprint): void {
            $blueprint->id();

            $blueprint->string('commentable_type');
            $blueprint->string('commentable_id');

            $blueprint->string('visitor')->index();

            $blueprint->text('content');

            $blueprint->timestamps();

            $blueprint->index(['commentable_type', 'commentable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
