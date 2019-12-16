<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckListEmployeeDetail extends Model
{
    protected $table = 'check_list_employee_detail';

    protected $fillable = [
        'check_list_employee_id',
        'check_list_id',
        'day',
        'created_at',
        'updated_at',
    ];

}
