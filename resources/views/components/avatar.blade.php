<?php
/*———————————————————————————————————*\
    $ AVATAR
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $type           @optional   @type String   Modificateur
  * @var $idUser         @optional   @type String   Modificateur
  * @var $name           @optional   @type String   Modificateur
  * @var $surname        @optional   @type String   Modificateur
  * @var $img            @optional   @type String   Modificateur
*/

?>


<div class="avatar {{$type}}">
    <a href="/profile/{{$idUser}}">

      @if($img)
        <div class='avatar__content'>
          <img src="{{ URL::asset('images/profils/'.$img) }}" alt="Photo de {{$name}} {{$surname}}"/>
        </div>
      @else
        <div class='avatar__content'>
          @if($name && $surname)
          {{ ucfirst(trans($name[0]))}}{{ ucfirst(trans($surname[0]))}}
          @endif
        </div>
      @endif

    </a>
  </div>

