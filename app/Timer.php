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
        'total_time'
    ];

    /*———————————————————————————————————*\
                    Tasks
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  String
             
            @return    Un timer à une tache
    */
    public function tasks() {
        return $this->belongsTo('App\Task', 'id_task');
    }

    /*———————————————————————————————————*\
                    Tasks
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  String
             
            @return    Un timer à un user
    */
    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
}
