<?php
/*———————————————————————————————————*\
    $ ADD PROJECT
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $id         @required   @type Number   Id
*/

?>


<form class='forms' action="{{ URL::to('create/project') }}" method="post" enctype="multipart/form-data" data-pjax-main>
  @csrf
  <input type="text" placeholder='Project Name' name="name"><br>
  <input type="file" name="img"><br>
  <input type="date" name="deadline"><br>
  <input type="submit" value="Upload" name="submit">
  
  <input type="hidden" name="id_user" value='{{Auth::user()->id}}'>
  <input type="hidden" name="id_team" value='{{$id}}'>

</form>

