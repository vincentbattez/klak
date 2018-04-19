<?php
/*———————————————————————————————————*\
    $ AVATAR
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $type           @optional   @type String   Class
  * @var $idUser         @optional   @type Number   Id
  * @var $name           @optional   @type String   Name
  * @var $surname        @optional   @type String   Surname
  * @var $img            @optional   @type String   Image
  * @var $isName         @optional   @type Bolean   Image
*/

?>

<div class="member">

  <div class="member__avatar {{$type}}">
    <a href="/profile/{{$idUser}}">

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
  
  @if($isName)
    <div class="member__name">
      {{$surname}} {{$name}} 
    </div>
  @endif

</div>