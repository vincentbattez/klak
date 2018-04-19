<?php
/*———————————————————————————————————*\
    $ ADD PROJECT
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $idProject         @required   @type Number   Id du project
  * @var $allMember         @required   @type Array    all participent in project
*/

?>


<form class='forms' action="{{ URL::to('create/task') }}" method="post">
                
  <input type="text" placeholder='Task name' name="name"><br>

  
  <select name="id_user">
    @foreach($allMember as $member)
      <option value="{{$member->id}}">{{$member->surname}} {{$member->name}}</option>
    @endforeach  
  </select><br>

  <input type="submit" value="Add task" name="submit">

  <input type="hidden" value='0' name='status'>
  <input type="hidden" value='{{$idProject}}' name='id_project'>
  <input type="hidden" value="{{ csrf_token() }}" name="_token">

</form>

