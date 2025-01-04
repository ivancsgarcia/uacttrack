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

        'start_date',
        'end_date',
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
        'vpa_status',

        'college_dean_remarks',
        'osa_remarks',
        'vpaa_remarks',
        'vpa_remarks',

        'proponent',
        'security',
        'eamo',
        'janitorial',
        'photoLab',
        'sports',
        'ppgs',
        'hotel',
        'soundSystem',
        'others_specify',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
