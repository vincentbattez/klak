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
<section class="container">
    <div class="dashboard__content">
        @listProject([
            'title'=>'Latest projects',
            'projects'=>$projects,
        ])
        @endlistProject

        @listTodo([
            'title'=>'All Tasks Statistics',
            'todos'=>$todos,
            'doing'=>$doing,
            'done'=>$done,
        ])
        @endlistTodo
        
        <div class="addProject">
            <h3 class='h3'>Create a new team</h3>
            @addTeam
            @endaddTeam
        </div>
    </div>
</section>
@endsection
