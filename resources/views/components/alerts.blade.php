<?php
/*———————————————————————————————————*\
    $ ALERTS
\*———————————————————————————————————*/
/**
  * Variables
  *
  * @var $type   @required   @type String   Type de l'alert (danger, valid...)
*/
?>
@if ($errors->any())
    <div class="alert alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif