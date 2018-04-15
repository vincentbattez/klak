<?php
    /**
    * Variables
    *
    * @var $modifier         @optional   @type String   Modificateur
    * @var $imageUrl         @required   @type String   Image du projet
    * @var $alt              @required   @type String   Alt de l'image du projet
    * @var $title            @required   @type String   Titre du projet
    * @var $team             @required   @type String   Nom de l'équipe
    * @var $link             @required   @type String   url du lien vers le projet
    */
?>
<article class="card {{ $modifier ?? '' }}">
  {{-- Header --}}  
  <div class="card__header">
    <a href="{{$link}}">
      <img src="{{ URL::asset('images/'.$imageUrl.'') }}" alt="{{$alt}}" class="card__image">
    </a>
  </div>
  {{-- Content --}}  
  <div class="card__content">
    <h4 class="card__title"><a href="{{$link}}">{{$title}}</a></h4>
    <span class="card__subtitle">
      @empty($team)
        Personal project
      @else
        Team: {{$team}}
      @endempty
    </span>
    <div class="card__link-container">
      <a class="card__link" href="{{$link}}">Go to project @icon('icon-arrow', 'icon-arrow')</a>
    </div>
  </div>
</article>