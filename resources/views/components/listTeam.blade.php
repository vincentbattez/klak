<?php
    /**
    * Variables
    *
    * @var $title      @require   @type String   title
    * @var $projects   @require   @type Object   content
    */
?>


@if($teams)
  <section>
    <h3 class='h3'>{{$title}}</h3>
    <div class='list list-team'>
      @foreach($teams as $t)
        @cardTeam( [
            'imageUrl'     => $t->imgSmall,
            'alt'          => 'image du projet '.$t->name,
            'title'        => $t->name,
            'link_team'    => '/team/'.$t->slug,
        ])
        @endcardTeam
      @endforeach
    </div>
  </section>
@endif