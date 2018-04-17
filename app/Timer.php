<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    protected $table = 'klak_timer';
    protected $fillable = [
        'id_task',
        'id_user',
        'start_time',
        'end_time',
    ];
}
