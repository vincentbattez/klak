<?php
    /**
    * Variables
    *
    * @var $title      @require   @type String   title
    * @var $todos       @require   @type Object   content
    */
?>


@if($todos)
  <section>
    <h3 class='h3'>{{$title}}</h3>
    <div class='list list-todo'>
        @cardTodo( [
          'type' => '0',
          'nb'   => $todos,
          'large'=> true,
        ])
        @endcardTodo
        @cardTodo( [
          'type' => '1',
          'nb'   => $doing,
          'large'=> true,          
        ])
        @endcardTodo
        @cardTodo( [
          'type' => '2',
          'nb'   => $done,
          'large'=> true,          
        ])
        @endcardTodo
    </div>
  </section>
@endif