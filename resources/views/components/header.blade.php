<?php
/*———————————————————————————————————*\
    $ HEADER
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $id              @optional   @type Numver   id current project / team
  * @var $type            @optional   @type String   Modificateur
  * @var $image           @optional   @type String   Image de fond
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
    
    @if($allMember)
      <div class="header__members">
        @foreach($allMember as $member)
          @avatar( [
            'type' => 'small',
            'idUser' => $member->id,
            'name' => $member->name,
            'surname' => $member->surname,
            'img' => $member->imgSmall,
            'isName' => false,
            ])
          @endavatar
        @endforeach    
      </div>
    @endif

    <div class="header__upload">
      <form class='' action="{{ URL::to('create/addImage') }}" method="post" enctype="multipart/form-data">
        <input type="file" name='img'>
        <input type="submit" value='Upload'>
        <input type="hidden" name='type' value='{{$type}}'>
        <input type="hidden" name='id' value='{{$id}}'>
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
      </form>
    </div>

  </div>