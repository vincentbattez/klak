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
        
        {{-- TODO: créer composant list todo --}}
        <section>
            <h2 class="h2">My tasks</h2>
            <div class='list list-tasks'>
                <section>
                    @cardTodo(['type' => '0', 'nb' => $myTasks->todo->count,])@endcardTodo 
                    @foreach($myTasks->todo->tasks as $t)
                        @cardTask( [
                            'title'      => $t->name,
                            'status'     => 'todo',
                            'priority'   => 'low',
                        ])
                        @endcardTask
                    @endforeach
                </section>
                <section>                
                    @cardTodo(['type' => '1', 'nb' => $myTasks->doing->count,])@endcardTodo
                    @foreach($myTasks->doing->tasks as $t)
                        @cardTask( [
                            'title'      => $t->name,
                            'status'     => 'doing',
                            'priority'   => 'low',
                        ])
                        @endcardTask
                    @endforeach
                </section>
                <section>                
                    @cardTodo(['type' => '2', 'nb' => $myTasks->done->count,])@endcardTodo
                    @foreach($myTasks->done->tasks as $t)
                        @cardTask( [
                            'title'      => $t->name,
                            'status'     => 'done',
                            'priority'   => 'low',
                        ])
                        @endcardTask
                    @endforeach
                </section>
            </div>
        </section>
        
        <h2 class="h2">Project tasks</h2>
        <ul>
            <h1>@icon('icon-todo')  <span class="h1"> {{$projectTasks->todo->count}}  </span></h1>
            <h1>@icon('icon-doing') <span class="h1"> {{$projectTasks->doing->count}} </span></h1>
            <h1>@icon('icon-done')  <span class="h1"> {{$projectTasks->done->count}}  </span></h1>
        </ul>
        {{-- 
        {{$teamTodos}} {{$teamDoing}} {{$teamDone}}
      </div> --}}
</section>
@endsection