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
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function collegeDean()
    {
        return $this->hasOne(User::class)->where('position', 'College Dean');
    }
}
