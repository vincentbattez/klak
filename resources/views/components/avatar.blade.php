<?php
/*———————————————————————————————————*\
    $ AVATAR
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $type           @required   @type String   Class
  * @var $idUser         @required   @type Number   Id
  * @var $name           @required   @type String   Name
  * @var $surname        @required   @type String   Surname
  * @var $img            @required   @type String   Image
  *
  * @var $modifier       @optional   @type String   Modificateur
  * @var $isName         @optional   @type Bolean   nom de l'avatar
*/
if(!isset($isName)) $isName = false;
?>

<div class="member {{$modifier ?? ''}}">

  <div class="member__avatar {{$type}}">
    <a href="/profile/{{$idUser}}" data-pjax-main>

      @if($img)
        <div class='member__avatar__content'>
          <img src="{{ URL::asset('images/profils/'.$img) }}" alt="Photo de {{$name}} {{$surname}}"/>
        </div>
      @else
        <div class='member__avatar__content'>
          @if($name && $surname)
          {{ucfirst(trans($surname[0]))}}{{ucfirst(trans($name[0]))}}
          @endif
        </div>
      @endif
      
    </a>
  </div>
  
  @if(isset($isName) && $isName)
    <div class="member__name">
      <a href="/profile/{{$idUser}}" data-pjax-main>{{$surname}} {{$name}}</a>
    </div>
  @endif

  {{ $slot }}
</div>