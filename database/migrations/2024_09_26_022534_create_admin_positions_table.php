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
        // Schema::create('admin_positions', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        // });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreignId('admin_position_id')->cascadeOnDelete()->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('admin_positions');
    }
};
