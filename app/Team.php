<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'klak_teams';
    protected $fillable = [
        'name',
        'slug',
        'img',
    ];

    /*———————————————————————————————————*\
                    Users
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
             
            @return    Tous les utilisateurs d'une team
    */
    public function users() {
        return $this->belongsToMany('App\User', 'klak_teamUsers', 'id_team', 'id_user');
    }
}
