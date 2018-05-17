<?php
/**
  * Variables
  *
  * @var $modifier       @optional   @type String   Modificateur
  * @var $url            @optional   @type String   URL
  * @var $link_title     @optional   @type String   link-title

  * @var $title          @required   @type String   Title
*/
?>
<section>
  @if(isset($title))
    <h3 class="h3">{{$title}}</h3>
  @endif

  <div class="list {{$modifier ?? ''}}">
    {{ $slot }}
  </div>

  @if(isset($url) && isset($link_title))
    <a href="/project/{{$url}}/tasks" data-pjax-main>{{$link_title}}</a>
  @endif
</section>