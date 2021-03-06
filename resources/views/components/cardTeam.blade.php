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
    @if($imageUrl)
    <img src="{{ URL::asset('images/team/'.$imageUrl.'') }}" alt="{{$alt}}" class="card__image">
    @else
    <img src="{{ URL::asset('images/team/bg-default.jpg') }}" alt="{{$alt}}" class="card__image">
    @endif
  </div>

  {{-- Content --}}  
  <div class="card__content-container">
    <div class="card__content">
      <h4 class="card__title"><a href="{{$link_team}}" data-pjax-main>&#64;{{$title}}</a></h4>
    </div>
    <div class="card__link-container">
      <div class="card__link">@icon('icon-arrow', 'icon-arrow')</div>
    </div>
  </div>

</article>