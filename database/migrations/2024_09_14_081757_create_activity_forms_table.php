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
        Schema::create('activity_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED', 'FOR_REVISION'])->default('PENDING');

            $table->boolean('check_payment_or_cash');
            $table->boolean('food');
            $table->boolean('supplies');
            $table->boolean('reproduction');

            $table->date('date');
            $table->time('from_time');
            $table->time('to_time');
            $table->integer('attendance_count');
            $table->string('event_type');
            $table->string('venue');
            $table->text('requirements_or_resources_needed');
            $table->string('title');
            $table->text('description');
            $table->string('participant');

            $table->string('payment_or_cash_file')->nullable();
            $table->string('food_file')->nullable();
            $table->string('supplies_file')->nullable();
            $table->string('reproduction_file')->nullable();
            $table->string('others_file')->nullable();

            $table->enum('college_dean_status', ['PENDING', 'APPROVED', 'REJECTED', 'FOR_REVISION'])->default('PENDING');
            $table->enum('osa_status', ['PENDING', 'APPROVED', 'REJECTED', 'FOR_REVISION'])->default('PENDING');
            $table->enum('vpaa_status', ['PENDING', 'APPROVED', 'REJECTED', 'FOR_REVISION'])->default('PENDING');
            $table->text('college_dean_remarks')->nullable();
            $table->text('osa_remarks')->nullable();
            $table->text('vpaa_remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_forms');
    }
};
