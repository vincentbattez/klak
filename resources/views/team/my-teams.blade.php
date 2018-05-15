<?php
    /**
    * Variables
    *
    * @var $categories           @type [{}]      @mean All categories
    * @var $category->name       @type String    @mean Name of category
    */

    $currentPage = [
        'title' => 'My projects | Klak',
        'bodyClass' => 'my-project'
    ];
?>
@extends('layouts.app')
{{----------------
    CONTENT
----------------}}
<?php

?>
@section('content')
<section class="container">
        
    <section class="my-project">
        @listTeam([
            'title'=>'My teams',
            'teams'=>$teams,
        ])
        @endlistTeam
    </section>
        
</section>
@endsection