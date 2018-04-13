<?php
    /**
    * Variables
    *
    * @var $categories           @type [{}]      @mean All categories
    * @var $category->name       @type String    @mean Name of category
    */

    $currentPage = [
        'title' => 'Loading',
        'bodyClass' => 'LoadingPage'
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
    Landing page
</section>
@endsection