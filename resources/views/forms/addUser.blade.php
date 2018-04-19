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


<form class='forms' action="{{ URL::to('create/userteam') }}" method="post">
                
  <input type="text" placeholder='Email' name="email"><br>
  <input type="submit" value="Add user" name="submit">
  
  <input type="hidden" name="id_team" value='{{$id}}'>
  <input type="hidden" value="{{ csrf_token() }}" name="_token">

</form>

