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
  * @var $link             @required   @type String   Url du lien vers la tâche
  * @var $imageUrl         @required   @type String   Image de l'employer qui travail sur la tâche
  * @var $alt              @required   @type String   Alt de l'image de l'employer
  * @var $nameWorker       @required   @type String   Nom de l'employer
  * @var $deadline         @required   @type String   Deadline de la tâche
*/
  $priotityModifier = ($priority == "high") ? "card--high-priority " : '';
?>

<article class="card card--task {{$priotityModifier}}{{$modifier ?? ''}}">
  {{-- Content --}}
  <div class="card__content">
    <div>
      <h4 class="card__title">{{$title}}</h4>
      <span class="card__subtitle">{{$priority}} priority</span>
    </div>
    <form action="#">
      <button type="submit">@icon('icon-done', 'icon-done')</button>
    </form>
  </div>
  {{-- Footer --}}
  <div class="card__footer">
    <div class="card__deadline">
      <span class="card__deadline-date">{{$deadline}}</span>
      <span class="card__deadline-bar"></span>
    </div>
  </div>
</article>