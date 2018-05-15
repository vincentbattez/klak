<?php
/*———————————————————————————————————*\
    $ CARD TASK
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $modifier         @optional   @type String   Modificateur
  * @var $type             @number     @type String   Type du todo (0:todo, 1:doing, 2:done)
  * @var $nb               @requirer   @type Number   Nombre de la stat
  * @var $large            @optional   @type Bolean   Modificateur
*/
switch ($type) {
  case 0:
    $typeName = 'todo';
    break;
  case 1:
    $typeName = 'doing';
    break;
  case 2:
    $typeName = 'done';
    break;
}

if(!isset($large)){
  $large = false;
}

?>

<div class="card card--todo {{ !$large ? 'todo--small' : 'todo--large' }} {{$typeName}} {{$modifier ?? ''}}">
  <span class="todo__nb">{{$nb}}</span>
  <div class="f-y">
    <span class="todo__type">{{ucfirst($typeName)}}</span>
    <span class="todo__icon">@icon("icon-$typeName", "icon-$typeName white")</span>
  </div>
</div>