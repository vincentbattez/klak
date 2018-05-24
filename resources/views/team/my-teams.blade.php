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
        @list([ 'title'      => 'My teams',
                'modifier'   => 'list-team']) 
            @foreach($teams as $t)
                @cardTeam( [
                    'imageUrl'     => $t->imgSmall,
                    'alt'          => 'image du projet '.$t->name,
                    'title'        => $t->name,
                    'link_team'    => '/team/'.$t->slug,
                ])
                @endcardTeam
            @endforeach
        @endlist
    </section>
        
</section>
@endsection