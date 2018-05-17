<?php
/*———————————————————————————————————*\
    $ ADD USER
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $id         @required   @type Number   Id
*/

?>


<form class='forms' action="{{ URL::to('create/userteam') }}" method="post" data-pjax-main>
                
  <input type="text" placeholder='Email' name="email" value="{{ old('email') }}" required><br>
  <input type="submit" value="Add user" name="submit">
  
  <input type="hidden" name="id_team" value='{{$id}}'>
  <input type="hidden" value="{{ csrf_token() }}" name="_token">

</form>

