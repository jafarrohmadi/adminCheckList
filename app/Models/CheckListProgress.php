<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckListProgress extends Model
{
    protected $table = 'check_list_progress';

    protected $fillable = [
        'user_id',
        'date',
        'location_id',
        'note',
        'created_at',
        'updated_at',
    ];

    public function checkListProgressDetail ()
    {
        return $this->hasMany(CheckListProgressDetail::class);
    }

    public function location ()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

}
