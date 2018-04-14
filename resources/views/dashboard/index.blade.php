<?php
    /**
    * Variables
    *
    * @var $categories           @type [{}]      @mean All categories
    * @var $category->name       @type String    @mean Name of category
    */

    $currentPage = [
        'title' => 'Dashboard',
        'bodyClass' => 'dashboard'
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
    Dashboard
    <h3 class="h3">Lastest projects</h3>
    <article class="card">
        <div class="card__header">
            <img src="{{ URL::asset('images/profils/avatar-default.png') }}" alt="image du projet" class="card__image">
        </div>
        <div class="card__content">
            <h4 class="card__title">Prismashop</h4>
            <span class="card__subtitle">Team: Wexperience</span>
            <a class="card__link" href="#">Go to project @icon('icon-arrow', 'icon-arrow')</a>
        </div>
    </article>
</section>
@endsection
