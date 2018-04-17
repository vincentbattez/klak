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

    <ul>
        @foreach($projects as $p)
            <li><a href="/project/{{$p->id}}">{{$p->name}}</a></li>
            <li>{{$p->team->name}}</li>
        @endforeach
    </ul>  
</section>
@endsection
