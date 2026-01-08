<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The database schema.
     *
     * @var Schema
     */
    protected $schema;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table;

    /**
     * Create a new migration instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->schema = Schema::connection(
            config('eloquent-viewable.models.view.connection')
        );

        $this->table = config('eloquent-viewable.models.view.table_name');
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->schema->create($this->table, function (Blueprint $blueprint): void {
            $blueprint->bigIncrements('id');
            $blueprint->string('viewable_id');
            $blueprint->string('viewable_type');
            $blueprint->text('visitor')->nullable();
            $blueprint->string('collection')->nullable();
            $blueprint->timestamp('viewed_at')->useCurrent();

            $blueprint->unique(
                ['viewable_id', 'viewable_type'],
                'view_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
