<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'check_payment_or_cash',
        'food',
        'supplies',
        'reproduction',
        'date',
        'from_time',
        'to_time',
        'attendance_count',
        'event_type',
        'venue',
        'requirements_or_resources_needed',
        'title',
        'description',
        'participant',
        'payment_or_cash_file',
        'food_file',
        'supplies_file',
        'reproduction_file',
        'others_file'
    ];
}
