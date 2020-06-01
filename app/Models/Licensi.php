<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licensi extends Model
{
    protected $fillable = [
        'user_id',
        'license',
        'amount',
        'created_at',
        'updated_at',
    ];
}
