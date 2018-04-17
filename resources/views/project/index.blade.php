<?php
    /**
    * Variables
    *
    * @var $categories           @type [{}]      @mean All categories
    * @var $category->name       @type String    @mean Name of category
    */

    $currentPage = [
        'title' => 'Project',
        'bodyClass' => 'project'
    ];
?>
@extends('layouts.app')
{{----------------
    HEADER
----------------}}
@section('main-header')

@endsection
{{----------------
    CONTENT
----------------}}
@section('content')
<section class="container">
    
    @header([
        'projectName' => 'test',
        'teamName' => 'test',
        'image' => 'project1/ad0d333f062449843308684370333dda.jpg',
    ])
    @endheader

    <div class="projectSingle">

    </div>
</section>
@endsection