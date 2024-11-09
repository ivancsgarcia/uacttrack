<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'status',
        'check_payment_or_cash',
        'food',
        'supplies',
        'reproduction',
        'others',
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
        'others_file',
        'college_dean_status',
        'osa_status',
        'vpaa_status',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
