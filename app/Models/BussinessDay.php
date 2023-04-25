<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class BussinessDay extends Model
{
    use HasFactory;
   

    protected $guarded=[];
    protected $casts=[
        'time'=>'datetime:H:i'
    ];
    protected $fillable = [
        'user_id',
        'date',
        'time',
    ];
    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
