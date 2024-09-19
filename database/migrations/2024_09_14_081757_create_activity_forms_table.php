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
            $table->string('status')->default('pending');
            $table->boolean('paymentOrCash');
            $table->boolean('food');
            $table->boolean('supplies');
            $table->boolean('reproduction');
            $table->date('date');
            $table->time('fromTime');
            $table->time('toTime');
            $table->integer('numberOfAttendees');
            $table->string('typeOfEvent');
            $table->string('availableVenue');
            $table->text('requirementsOrResourcesNeeded');
            $table->string('activityTitle');
            $table->text('activityDescription');
            $table->string('participant');
            $table->string('paymentOrCashFile')->nullable();
            $table->string('foodFile')->nullable();
            $table->string('suppliesFile')->nullable();
            $table->string('reproductionFile')->nullable();
            $table->string('othersFile')->nullable();
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
