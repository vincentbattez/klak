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
        $deadline          = Carbon::parse($this->deadline);

        $humansDeadline = Carbon::parse($this->deadline)->format('l j F Y');
        if (
            Carbon::now()->diffInDays($deadline) === 0 || // Moins d'un jours 
            Carbon::now()->diffInDays($deadline) > 6 && Carbon::now()->diffInMonths($deadline) < 0 ||   // Plus d'une semaine ET moins d'une mois
            Carbon::now()->diffInDays($deadline) > 0 && Carbon::now()->diffInDays($deadline) < 7 // Plus d'un jours ET moins d'une semaine
        )
            $nbShow = 2;
        else
            $nbShow = 3;

        $humansDeadlineDiff = Carbon::now()->diffForHumans($deadline, true, false, $nbShow);
        $deadlineDiff       = Carbon::now()->diff($deadline);

        if($deadlineDiff->invert === 1) { 
            $humansDeadlineDiff = "Passed since " . $humansDeadlineDiff;
        }

        if (
            $deadline->timestamp - $dateCreated->timestamp == 0 ||
            Carbon::now()->timestamp > $deadline->timestamp
        ) {
            $diffWithDeadline_pourcent = 100;
        } else {

            $diffWithDeadline_pourcent = ((Carbon::now()->timestamp - $dateCreated->timestamp) * 100) / ($deadline->timestamp - $dateCreated->timestamp);
        }
        
        $date_formated = (object) [
            'humans'   => (object) [
                'created'               => $humansDateCreated,
                'deadline'              => $humansDeadline,
                'diffWithDeadline'      => $humansDeadlineDiff,
            ],
            'diffWithDeadline'          => $deadlineDiff,
            'diffWithDeadline_pourcent' => round($diffWithDeadline_pourcent, 2),
        ];
        
        return $date_formated;
    }
}


