<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckListProgressDetail extends Model
{
    protected $table = 'check_list_progress_detail';

    protected $fillable = [
        'check_list_progress_id',
        'check_list_id',
        'picture',
        'note',
        'status',
        'created_at',
        'updated_at',
    ];

    public function checkList()
    {
        return $this->belongsTo(CheckList::class, 'check_list_id');
    }

}
