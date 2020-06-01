<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CheckListEmployee extends Model
{
    protected $table = 'check_list_employee';

    protected $fillable = [
        'user_id',
        'location_id',
        'day',
        'check_list_id',
        'created_at',
        'updated_at',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function users()
    {
        $company = Auth::user()->company;
        return $this->belongsTo(User::class, 'user_id', 'email')->where('company', $company);
    }

    public function checkListEmployeeDetail()
    {
        return $this->hasMany(CheckListEmployeeDetail::class);
    }

    public function operTugasFromUser()
    {
        return $this->hasOne(CheckListOperTugas::class, 'from_user_id', 'user_id');
    }

}
