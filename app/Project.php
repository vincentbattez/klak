<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Project extends Model
{
    protected $table = 'klak_projects';
    protected $fillable = [
        'id_team',
        'name',
        'slug',
        'description',
        'img',
        'imgSmall',
        'deadline',
    ];
    protected $appends = [
        'date_formated',
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
                    byTeam
    \*———————————————————————————————————/*
            @type      [Query]
             
            @return    get project by team
    */
    public function scopeByTeam($query, $idTeam) {
        return $query->where('id_team', $idTeam);
    }

    /*———————————————————————————————————*\
                date_formated
    \*———————————————————————————————————/*
            @type      [Attribute]
            @dataType  {Object}
    
            @return    Formate et effectue des calculs sur les dates
    */
    public function getDateFormatedAttribute() {
        
        $dateCreated       = Carbon::parse($this->created_at);
        $humansDateCreated = Carbon::parse($this->created_at)->format('l j F Y');
        
        $deadline       = Carbon::parse($this->deadline);
        $humansDeadline = Carbon::parse($this->deadline)->format('l j F Y');

        $humansDeadlineDiff = $dateCreated->diffForHumans($deadline, true, false, 3);
        $deadlineDiff       = $dateCreated->diff($deadline);

        if($deadlineDiff->invert === 0) { 
            $humansDeadlineDiff = "Passed since " . $humansDeadlineDiff;
        } 

        $date_formated = (object) [
            'humans'   => (object) [
                'created'          => $humansDateCreated,
                'deadline'         => $humansDeadline,
                'diffWithDeadline' => $humansDeadlineDiff,
            ],
            'diffWithDeadline'     => $deadlineDiff->invert,
        ];
        return $date_formated;

    }
}


