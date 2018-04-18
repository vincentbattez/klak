<?php
/*———————————————————————————————————*\
    $ HEADER
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $type            @optional   @type String   Modificateur
  * @var $image           @optional   @type String   Modificateur
  * @var $teamName        @required   @type String   Titre de la tâche
  * @var $teamSlug        @required   @type String   Priorité de la tâche
  * @var $projectName     @required   @type String   Priorité de la tâche
*/

?>

@if($image)
  <div class="header" style='background-image:url({{ URL::asset("images/$type/$image") }})'>
@else
  <div class="header" style='background-image:url({{ URL::asset("images/$type/bg-default.jpg") }})'>
@endif

    <h1 class='header__titre h2'>
      @if($projectName)
        &#35;{{$projectName}}
        <span>&nbsp;by&nbsp;</span>
      @endif

      @if($teamSlug)
        <a href='/team/{{$teamSlug}}'>&#64;{{$teamName}}</a>
      @endif
    </h1>


    <div class="header__members">
      @foreach($allMember as $member)
        @avatar( [
          'type' => 'small',
          'idUser' => $member->id,
          'name' => $member->name,
          'surname' => $member->surname,
          'img' => $member->imgSmall,
        ])
        @endavatar
      @endforeach

    </div>

  </div>