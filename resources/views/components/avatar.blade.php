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
          {{ ucfirst(trans($surname[0]))}}{{ ucfirst(trans($name[0]))}}
          @endif
        </div>
      @endif

    </a>
  </div>

