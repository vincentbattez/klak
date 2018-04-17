<?php
/*———————————————————————————————————*\
    $ HEADER
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $image         @optional   @type String   Modificateur
  * @var $teamName            @required   @type String   Titre de la tâche
  * @var $projectName         @required   @type String   Priorité de la tâche
*/

?>

<div class="header" style='background-image:url({{ URL::asset("images/project/$image") }})'>
<h1 class='header__titre h2'>&#35;{{$projectName}}<span>&nbsp;by&nbsp;</span><a href='#'>&#64;{{$teamName}}</a></h1>
</div>