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
  <input type="text"   name="name"     value="{{ old('name') }}"     required min=2 placeholder='Project Name'><br>
  <input type="file"   name="img"      value="{{ old('img') }}"      required><br>
  <input type="date"   name="deadline" value="{{ old('deadline') }}" required placeholder='jj/mm/aaaa'><br>
  <input type="submit" name="submit"   value="Upload">
  
  <input type="hidden" name="id_user" value='{{Auth::user()->id}}'>
  <input type="hidden" name="id_team" value='{{$id}}'>

</form>

