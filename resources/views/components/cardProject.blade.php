<?php
    /**
    * Variables
    *
    * @var $modifier         @optional   @type String   Modificateur
    * @var $imageUrl         @required   @type String   Image du projet
    * @var $alt              @required   @type String   Alt de l'image du projet
    * @var $title            @required   @type String   Titre du projet
    * @var $team             @required   @type String   Nom de l'équipe
    * @var $link_project     @required   @type String   url vers le projet
    * @var $link_team        @required   @type String   url la team
    */
?>
<article class="card {{ $modifier ?? '' }}">
  {{-- Header --}}  
  <div class="card__header">
    <a href="{{$link_project}}">
      <img src="{{ URL::asset('images/'.$imageUrl.'') }}" alt="{{$alt}}" class="card__image">
    </a>
  </div>
  {{-- Content --}}  
  <div class="card__content-container">
    <div class="card__content">
      <h4 class="card__title"><a href="{{$link_project}}">{{$title}}</a></h4>
      <span class="card__subtitle">
        @empty($team)
          Personal project
        @else
          <a href="{{$link_team}}">{{$team}}</a>
        @endempty
      </span>
    </div>
    <div class="card__link-container">
      <a class="card__link" href="{{$link_project}}">@icon('icon-arrow', 'icon-arrow')</a>
    </div>
  </div>
</article>