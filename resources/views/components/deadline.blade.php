<?php
    /**
    * Variables
    *
    * @var $start  @required   @type String   Date de commencement du projet
    * @var $end    @required   @type String   Date de fin du projet
    * @var $timer  @required   @type String   Temps calculé
    */
?>
<div class="deadline">
  <div class="deadline__dates-container">
    <span class="deadline__date date-start">{{$start}}</span>
    <span class="deadline__date date-end">{{$end}}</span>
  </div>
  <span class="deadline__line"></span>
  <div class="deadline__timer-container">
    @icon('icon-timer')<span class="deadline__timer">{{$timer}}</span>
  </div>
</div>