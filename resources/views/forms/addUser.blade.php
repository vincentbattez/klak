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


<form class='forms' action="{{ URL::to('create/project') }}" method="post" enctype="multipart/form-data">
                
  <input type="text" placeholder='Add User' name="name"><br>
  <input type="submit" value="Upload" name="submit">
  
  <input type="hidden" name="id_team" value='{{$id}}'>
  <input type="hidden" value="{{ csrf_token() }}" name="_token">

</form>

