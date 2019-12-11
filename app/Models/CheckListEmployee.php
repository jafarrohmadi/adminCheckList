<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckListEmployee extends Model
{
    protected $table = 'check_list_employee';

    protected $fillable = [
        'user_id',
        'location_id',
        'check_list_ids',
        'days',
        'created_at',
        'updated_at',
    ];

}
