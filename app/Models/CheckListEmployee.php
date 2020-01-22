<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckListEmployee extends Model
{
    protected $table = 'check_list_employee';

    protected $fillable = [
        'user_id',
        'location_id',
        'created_at',
        'updated_at',
    ];

    public function location()
    {
    	return $this->belongsTo(Location::class);
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
