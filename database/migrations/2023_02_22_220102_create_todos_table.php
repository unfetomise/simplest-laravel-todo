<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * https://stackoverflow.com/questions/26437342/laravel-migration-best-way-to-add-foreign-key
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\User::class)->constrained()->onDelete('cascade');
            $table->string('title');
            $table->tinyText('description')->nullable();
            $table->boolean('completed')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function(Blueprint $table)
        {
            $table->dropForeignIdFor(App\Models\User::class);
        });
        Schema::dropIfExists('todos');
    }
};
