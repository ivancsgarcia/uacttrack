<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'organization',
        'position',
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    public function organization() 
    {
        return $this->belongsTo(Organization::class);
    }

    public function adminPosition() 
    {
        return $this->belongsTo(AdminPosition::class);
    }

    public function organizationPosition() 
    {
        return $this->belongsTo(OrganizationPosition::class);
    }

    public function apf() 
    {
        return $this->hasMany(ActivityForm::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
