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
}
