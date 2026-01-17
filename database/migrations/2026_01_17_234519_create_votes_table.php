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
        Schema::create('votes', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->string('votable_type');
            $blueprint->string('votable_id');
            $blueprint->string('visitor')->index();
            $blueprint->timestamps();

            $blueprint->index(['votable_type', 'votable_id']);
            $blueprint->unique(['votable_type', 'votable_id', 'visitor']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
