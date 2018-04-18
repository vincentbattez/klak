<?php
    /**
    * Variables
    *
    * @var $title      @require   @type String   title
    * @var $projects   @require   @type Object   content
    */
?>


@if($projects)
  <section>
    <h3>{{$title}}</h3>
    <div class='list list-projects'>
      @foreach($projects as $p)
        @cardProject( [
            'imageUrl'     => $p->img,
            'alt'          => 'image du projet '.$p->name,
            'title'        => $p->name,
            'team'         => $p->team->name,
            'link_project' => "/project/$p->slug",
            'link_team'    => '/team/'.$p->team->slug,
        ])
        @endcardProject
      @endforeach
    </div>
  </section>
@endif