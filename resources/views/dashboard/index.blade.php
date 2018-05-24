<?php
    /**
    * Variables
    *
    * @var $projects           @type [{}]      @mean All projects
    * 
    */

    $currentPage = [
        'title' => 'Dashboard',
        'bodyClass' => 'dashboard'
    ];
?>
@extends('layouts.app')
{{----------------
    CONTENT
----------------}}
@section('content')
<div class="container">
    <div class="dashboard__content">
        @list([ 'title'      => 'My projects',
                'modifier'   => 'list-projects']) 
            @foreach($projects as $p)
                @cardProject( [
                    'imageUrl'     => $p->imgSmall,
                    'alt'          => 'image du projet '.$p->name,
                    'title'        => $p->name,
                    'team'         => $p->team->name,
                    'link_project' => "/project/$p->slug",
                    'link_team'    => '/team/'.$p->team->slug,
                ])
                @endcardProject
            @endforeach
        @endlist
        @list([ 'title'      => 'All Tasks Statistics',
                'modifier'   => 'list-todo']) 
            @cardTodo( [
            'type' => '0',
            'nb'   => $todos,
            'large'=> true,
            ])
            @endcardTodo
            @cardTodo( [
            'type' => '1',
            'nb'   => $doing,
            'large'=> true,          
            ])
            @endcardTodo
            @cardTodo( [
            'type' => '2',
            'nb'   => $done,
            'large'=> true,          
            ])
            @endcardTodo
        @endlist
        <div class="addProject">
            @list(['title' => 'Create a new team'])
                @addTeam
                @endaddTeam
            @endlist
        </div>
    </div>
</div>
@endsection
