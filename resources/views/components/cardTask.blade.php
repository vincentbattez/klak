<?php
/*———————————————————————————————————*\
    $ CARD TASK
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $modifier         @optional   @type String   Modificateur
  * @var $id               @required   @type Number   ID de la tâche
  * @var $title            @required   @type String   Titre de la tâche
  * @var $priority         @required   @type String   Priorité de la tâche
  * @var $status           @required   @type String   todo, doing, done
*/
  $priotityModifier = ($priority == "high")
    ? "high-priority "
    : '';

  if ($status == "todo") {
    $idStatus = 0;
  } elseif ($status == "doing") {
    $idStatus = 1;
  } else {
    $idStatus = 2;
  }
?>

<article class="card card--task {{$priotityModifier}}{{$modifier ?? ''}}">
  {{-- Content --}}
  <div class="card__content">
  <form action="{{ route('updateStatusTask', $id) }}" method="post">
      @csrf
      <input type="hidden" name="idStatus" value="{{$idStatus}}">
      
      <button class="changeStatus" type="submit">@icon("icon-$status", "icon-$status")</button>
    </form>
    <div>
      <h4 class="card__title">{{$title}}</h4>
    </div>
  </div>
  <div class="card__action">
    <span class="timePassed">1:50:10</span>
    <form action="#">
      <button class="launchTimer" type="submit"> @icon('icon-timer', 'icon-timer') </button>
    </form>
  </div>
  {{-- Footer --}}
  {{-- <div class="card__footer">
    <div class="card__deadline">
      <span class="card__deadline-date">{{$deadline}}</span>
      <span class="card__deadline-bar"></span>
    </div>
  </div> --}}
</article>