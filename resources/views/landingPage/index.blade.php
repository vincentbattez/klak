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
    <h2 class='h2'>Klak is a Task Manager for Team</h2>
    <div>
        You have to <a href='/register'>register</a> or <a href='/login'>loggin</a> to manage your project !
    </div>
</section>
@endsection