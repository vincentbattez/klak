<?php
/*———————————————————————————————————*\
    $ ADD PROJECT
\*———————————————————————————————————*/
/**
  * Variables
  *
*/

?>


<form class='forms' action="{{ URL::to('create/team') }}" method="post" enctype="multipart/form-data">

  <input type="text" placeholder='New team name' name="name"><br>
  <input type="file" name="img"><br>
  <input type="submit" value="Upload" name="submit">
  
  <input type="hidden" name="id_user" value='{{Auth::user()->id}}'>
  <input type="hidden" value="{{ csrf_token() }}" name="_token">

</form>

