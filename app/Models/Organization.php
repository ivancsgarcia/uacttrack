<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'adviser_first_name',
        'adviser_last_name',
    ];

    public function users() 
    {
        return $this->hasMany(User::class);
    }
}
