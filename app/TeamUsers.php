<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamUsers extends Model
{
    protected $table = 'klak_teamUsers';
    protected $fillable = [
        'id_user',
        'id_team',
    ];
    public $timestamps  = false;
}
