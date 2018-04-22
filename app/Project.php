<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Project extends Model
{
    protected $table = 'klak_projects';
    protected $fillable = [
        'id_user',
        'id_team',
        'name',
        'slug',
        'description',
        'img',
        'imgSmall',
        'deadline',
    ];

    /*———————————————————————————————————*\
                    Tasks
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
    
            @return    Toutes les tâches d'un projet
    */
    public function tasks()
    {
        return $this->hasMany('App\Task', 'id_project');
    }

    /*———————————————————————————————————*\
                    Team
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
    
            @return    La team d'un projet
    */
    public function team()
    {
        return $this->belongsTo('App\Team', 'id_team');
    }

    /*———————————————————————————————————*\
                    myProject
    \*———————————————————————————————————/*
            @type      [Query]
    
            @return    Projet de l'utilisateur connecté
    */
    public function scopeMyProject($query) {
        return $query->where('id_user', Auth::id());
    }

    /*———————————————————————————————————*\
                    byTeam
    \*———————————————————————————————————/*
            @type      [Query]
             
            @return    get project by team
    */
    public function scopeByTeam($query, $idTeam) {
        return $query->where('id_team', $idTeam);
    }
}


