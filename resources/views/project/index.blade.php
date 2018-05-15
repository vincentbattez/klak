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
        
        {{-- TODO: créer composant list todo --}}
        <section>
            <h3 class="h3">My tasks</h3>
            <div class='list list-tasks'>
                <section>
                    @cardTodo(['type' => '0', 'nb' => $myTasks->todo->count, 'large' => true])@endcardTodo 
                    @foreach($myTasks->todo->tasks as $t)
                        @cardTask( [
                            'id'         => $t->id,
                            'title'      => $t->name,
                            'status'     => 'todo',
                            'priority'   => 'low',
                        ])
                        @endcardTask
                    @endforeach
                </section>
                <section>                
                    @cardTodo(['type' => '1', 'nb' => $myTasks->doing->count, 'large' => true])@endcardTodo
                    @foreach($myTasks->doing->tasks as $t)
                        @cardTask( [
                            'id'         => $t->id,
                            'title'      => $t->name,
                            'status'     => 'doing',
                            'priority'   => 'low',
                        ])
                        @endcardTask
                    @endforeach
                </section>
                <section>                
                    @cardTodo(['type' => '2', 'nb' => $myTasks->done->count, 'large' => true])@endcardTodo
                    @foreach($myTasks->done->tasks as $t)
                        @cardTask( [
                            'id'         => $t->id,
                            'title'      => $t->name,
                            'status'     => 'done',
                            'priority'   => 'low',
                        ])
                        @endcardTask
                    @endforeach
                </section>
            </div>
            <a href="/project/{{$project->slug}}/tasks">see all task</a>         
        </section>
        
        <div class="projectSingle__projectTasks">
            <section>
                <h3 class="h3">Project tasks</h3>
                <div class="list list-projectTasks">
                    <ul>
                        <h1>@icon('icon-todo')  <span class="h1"> {{$projectTasks->todo->count}}  </span></h1>
                        <h1>@icon('icon-doing') <span class="h1"> {{$projectTasks->doing->count}} </span></h1>
                        <h1>@icon('icon-done')  <span class="h1"> {{$projectTasks->done->count}}  </span></h1>
                    </ul>
                </div>
            </section>
            
            <div class="projectSingle__deadline">
                <h3 class="h3">Deadline</h3>
                @deadline([
                    'start' => '2 mai 2018',
                    'end'   => '6 juin 2018',
                    'timer' => '2 mois 4 jours',
                    ])
                @enddeadline
            </div>

            <div class="projectSingle__addUser">
                <h3 class="h3">Add task</h3>
                @addTask([
                    'idProject' => $project->id,
                    'allMember' => $project->team->users,
                ])
                @endaddTask
            </div>
        </div>
    </div>
</section>
@endsection