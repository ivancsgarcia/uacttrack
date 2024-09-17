<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'paymentOrCash',
        'food',
        'supplies',
        'reproduction',
        'date',
        'fromTime',
        'toTime',
        'numberOfAttendees',
        'typeOfEvent',
        'availableVenue',
        'requirementsOrResourcesNeeded',
        'activityTitle',
        'activityDescription',
        'participant',
        'paymentOrCashFile',
        'foodFile',
        'suppliesFile',
        'reproductionFile',
        'othersFile'
    ];
}
