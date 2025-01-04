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
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->string('status')->default('PENDING');

            $table->dateTime('start_date');
            $table->dateTime('end_date');
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

            $table->string('college_dean_status')->default('PENDING');
            $table->string('osa_status')->default('PENDING');
            $table->string('vpaa_status')->default('PENDING');
            $table->string('vpa_status')->default('PENDING');

            $table->text('college_dean_remarks')->nullable();
            $table->text('osa_remarks')->nullable();
            $table->text('vpaa_remarks')->nullable();
            $table->text('vpa_remarks')->nullable();

            $table->boolean('proponent')->default(false);
            $table->boolean('security')->default(false);
            $table->boolean('eamo')->default(false);
            $table->boolean('janitorial')->default(false);
            $table->boolean('photoLab')->default(false);
            $table->boolean('sports')->default(false);
            $table->boolean('ppgs')->default(false);
            $table->boolean('hotel')->default(false);
            $table->boolean('soundSystem')->default(false);
            $table->boolean('others_specify')->default(false);

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
