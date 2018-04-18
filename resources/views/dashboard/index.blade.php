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
    <a href="styleguide">styleguide</a>

    @listProject([
        'title'=>'Projects List',
        'projects'=>$projects,
    ])
    @endlistProject

    <div class="addProject">
        <h3>Add team</h3>
        @addTeam
        @endaddTeam
    </div>



    {{$todos}} Tasks done    
    
    {{$todos}} Todos
    {{$doing}} Doing
    {{$done}} Done
</section>
@endsection
