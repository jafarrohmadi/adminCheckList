<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'division',
        'department',
        'grade',
        'nik',
        'designation',
        'access',
        'phone_number',
        'firebase_uid',
        'company',
        'phone_code',
        'user_phone',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkListEmployee()
    {
        return $this->hasMany(CheckListEmployee::class, 'user_id', 'email');
    }

    public function getcompany()
    {
        return $this->belongsTo(Company::class, 'company');
    }
}
