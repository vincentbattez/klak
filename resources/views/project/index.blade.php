<?php
    /**
    * Variables
    *
    * @var $categories           @type [{}]      @mean All categories
    * @var $category->name       @type String    @mean Name of category
    */

    $currentPage = [
        'title' => 'Project',
        'bodyClass' => 'project'
    ];
?>
@extends('layouts.app')
{{----------------
    HEADER
----------------}}
@section('main-header')

@endsection
{{----------------
    CONTENT
----------------}}
<?php

?>
@section('content')
<section class="container">
    
    @header([
        'type'        => 'project',
        'id'          => $id,
        'projectName' => $name,
        'teamName'    => $teamName,
        'teamSlug'    => $teamSlug,
        'image'       => $img,
        'allMember'   => $allMember,
    ])
    @endheader

    <div class="projectSingle">
        <div class="addUser">
            <h3>Add task</h3>
            @addTask([
                'idProject' => $id,
                'allMember' => $allMember,
            ])
            @endaddTask
        </div>

        @cardTodo( [
        'type' => '0',
        'nb'   => $nbTodos,
        ])
        @endcardTodo 
        @cardTodo( [
            'type' => '1',
            'nb'   => $nbDoing,
        ])
        @endcardTodo
        @cardTodo( [
            'type' => '2',
            'nb'   => $nbDone,
        ])
        @endcardTodo

        @foreach($todos as $t)
          {{$t->name}}
        @endforeach

        {{$teamTodos}} {{$teamDoing}} {{$teamDone}}
      </div>
</section>
@endsection