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
    CONTENT
----------------}}
<?php

?>
@section('content')
<section class="container">
    @header([
        'type'        => 'project',
        'id'          => $project->id,
        'projectName' => $project->name,
        'image'       => $project->img,
        'teamName'    => $project->team->name,
        'teamSlug'    => $project->team->slug,
        'allMember'   => $project->team->users,
    ])
    @endheader

    <div class="projectSingle">
        <div class="addUser">
            <h3>Add task</h3>
            @addTask([
                'idProject' => $project->id,
                'allMember' => $project->team->users,
            ])
            @endaddTask
        </div>
        {{--
            @cardTodo(['type' => '0', 'nb' => $myTasks->nbTodo,])@endcardTodo 
            @cardTodo(['type' => '1', 'nb' => $myTasks->nbDoing,])@endcardTodo 
            @cardTodo(['type' => '2', 'nb' => $myTasks->nbDone,])@endcardTodo
        --}}
        
        <h1 class="h1">My tasks</h1>
        <ul>
            <h2>MY: TODO {{$myTasks->todo->count}}</h2>
            @foreach($myTasks->todo->tasks as $t)
                <li>- {{$t->name}}</li>
            @endforeach

            <h2>MY: DOING {{$myTasks->doing->count}}</h2>
            @foreach($myTasks->doing->tasks as $t)
                <li>- {{$t->name}}</li>
            @endforeach

            <h2>MY: DONE {{$myTasks->done->count}}</h2>
            @foreach($myTasks->done->tasks as $t)
                <li>- {{$t->name}}</li>
            @endforeach
        </ul>
        
        
        <h1 class="h1">Project tasks</h1>
        <ul>
            <h2>MY: TODO {{$projectTasks->todo->count}}</h2>
            @foreach($projectTasks->todo->tasks as $t)
                <li>- {{$t->name}}</li>
            @endforeach

            <h2>MY: DOING {{$projectTasks->doing->count}}</h2>
            @foreach($projectTasks->doing->tasks as $t)
                <li>- {{$t->name}}</li>
            @endforeach

            <h2>MY: DONE {{$projectTasks->done->count}}</h2>
            @foreach($projectTasks->done->tasks as $t)
                <li>- {{$t->name}}</li>
            @endforeach
        </ul>
        {{-- 
        {{$teamTodos}} {{$teamDoing}} {{$teamDone}}
      </div> --}}
</section>
@endsection