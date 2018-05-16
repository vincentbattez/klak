<?php
/*———————————————————————————————————*\
    $ ADD PROJECT
\*———————————————————————————————————*/
/**
  * Variables
  *
*/

?>


<form class='forms' action="{{ URL::to('create/team') }}" method="post" enctype="multipart/form-data" data-pjax-main>

  <label for="name">Team name *</label><br>
  <input type="text" name="name"><br>
  <label for="img">Team image *</label><br>
  <input type="file" name="img"><br>
  <input type="submit" value="Upload" name="submit">
  
  <input type="hidden" name="id_user" value='{{Auth::user()->id}}'>
  <input type="hidden" value="{{ csrf_token() }}" name="_token">

</form>

