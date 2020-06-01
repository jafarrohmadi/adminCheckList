<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CheckListProgress extends Model
{
    protected $table = 'check_list_progress';

    protected $fillable = [
        'user_id',
        'date',
        'location_id',
        'note',
        'check_list_oper_tugas_id',
        'note_status',
        'created_at',
        'updated_at',
        'userUpdate',
    ];

    public function checkListProgressDetail()
    {
        return $this->hasMany(CheckListProgressDetail::class);
    }

    public function checkListOperTugas()
    {
        return $this->belongsTo(CheckListOperTugas::class);
    }

    public function checkListEmployee()
    {
        return $this->hasMany(CheckListEmployee::class, 'user_id', 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function checkListUser()
    {
        $company = Auth::user()->company;
        return $this->belongsTo(User::class, 'user_id', 'email')->where('status', 1)->where('company',$company);
    }


}
