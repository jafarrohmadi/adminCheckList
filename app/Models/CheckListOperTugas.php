<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckListOperTugas extends Model
{
    protected $table = 'check_list_oper_tugas';

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'location_id',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

}
