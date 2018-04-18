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

        @foreach($projects as $p)
            @cardProject( [
                'imageUrl'     => $p->img,
                'alt'          => 'image du projet',
                'title'        => $p->name,
                'team'         => $p->team->name,
                'link_project' => "/project/$p->slug",
                'link_team'    => '/team/'.$p->team->slug,
            ])
            @endcardProject
        @endforeach


    {{$todos}} Tasks done    
    
    {{$todos}} Todos
    {{$doing}} Doing
    {{$done}} Done
</section>
@endsection
