<?php
/*———————————————————————————————————*\
    $ CARD TASK
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $modifier         @optional   @type String   Modificateur
  * @var $title            @required   @type String   Titre de la tâche
  * @var $priority         @required   @type String   Priorité de la tâche
  * @var $status           @required   @type String   todo, doing, done
*/
  $priotityModifier = ($priority == "high") ? "high-priority " : '';
?>

<article class="card card--task {{$priotityModifier}}{{$modifier ?? ''}}">
  {{-- Content --}}
  <div class="card__content">
    <form action="#">
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