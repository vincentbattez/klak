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
        <h3 class='h3'>Add team</h3>
        @addTeam
        @endaddTeam
    </div>
    
</section>
@endsection
