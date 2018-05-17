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
        @list([ 'title'      => 'My projects',
                'modifier'   => 'list-projects']) 
            @foreach($projects as $p)
                @cardProject( [
                    'imageUrl'     => $p->imgSmall,
                    'alt'          => 'image du projet '.$p->name,
                    'title'        => $p->name,
                    'team'         => $p->team->name,
                    'link_project' => "/project/$p->slug",
                    'link_team'    => '/team/'.$p->team->slug,
                ])
                @endcardProject
            @endforeach
        @endlist
    </section>
        
</section>
@endsection