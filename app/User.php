<?php

namespace App;

use Auth;
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
        'imgSmall',
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
                    teams
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
             
            @return    Toutes les teams d'un l'utilisateur
    */
    public function teams() {
        return $this->belongsToMany('App\Team', 'klak_teamUsers', 'id_user', 'id_team');
    }

    /*———————————————————————————————————*\
                    me
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
             
            @return    L'utilisateur connecté
    */
    public function scopeMe($query) {
        return $query->where('id', Auth::id())->first();
    }

    /*———————————————————————————————————*\
                    myTeams
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
             
            @return    Toutes les équipes de l'utilisateur connecté
    */
    public function scopeMyTeams($query) {
        return $query->me()->teams;
    }

    /*———————————————————————————————————*\
                    myProjects
    \*———————————————————————————————————/*
            @type      [Data]
            @dataType  {}
             
            @return    Tous les projets de l'utilisateur connecté
    */
    public function scopeMyProjects() {
        $project = Project::select('*');
        $myTeam = User::myTeams();
        if (sizeof($myTeam) > 0) {
            foreach ($myTeam as $team) {
                $allProject = $project->orWhere('id_team', $team->id);
            }
            return $allProject->orderBy('id_team')->get();
        }else{
            return $allProject=[];
        }
        
    }
}
