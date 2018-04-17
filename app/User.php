<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'klak_users';
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'phone',
        'img',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*———————————————————————————————————*\
                    Teams
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
             
            @return    Toutes les teams d'un l'utilisateur
    */
    public function teams() {
        return $this->belongsToMany('App\Team', 'klak_teamUsers', 'id_user', 'id_team');
    }
}
