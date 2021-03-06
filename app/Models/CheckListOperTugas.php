<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CheckListOperTugas extends Model
{
    protected $table = 'check_list_oper_tugas';

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'location_id',
        'reason',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    public static function whereDate(string $string, string $string1, string $date)
    {
    }

    public function fromUser()
    {
        $company = Auth::user()->company;
        return $this->belongsTo(User::class, 'from_user_id', 'email')->where('company', $company);
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id', 'email');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
