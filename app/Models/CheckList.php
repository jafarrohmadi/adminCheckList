<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    protected $table = 'check_list';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];
}
