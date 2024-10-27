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
        // Schema::create('organization_positions', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
        //     $table->string('name');
        // });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreignId('organization_position_id')->constrained()->cascadeOnDelete()->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('organization_positions');
    }
};
