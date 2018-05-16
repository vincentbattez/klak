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
            <div class='list list--tasks'>
                <section>
                    @cardTodo(['type' => '0', 'nb' => $myTasks->todo->count, 'large' => true])@endcardTodo 
                    <div class="list__content">
                        @foreach($myTasks->todo->tasks as $t)
                            @cardTask( [
                                'id'         => $t->id,
                                'title'      => $t->name,
                                'status'     => 'todo',
                                'priority'   => 'low',
                            ])
                            @endcardTask
                        @endforeach
                    </div>
                </section>
                <section>                
                    @cardTodo(['type' => '1', 'nb' => $myTasks->doing->count, 'large' => true])@endcardTodo
                    <div class="list__content">                    
                        @foreach($myTasks->doing->tasks as $t)
                            @cardTask( [
                                'id'         => $t->id,
                                'title'      => $t->name,
                                'status'     => 'doing',
                                'priority'   => 'low',
                            ])
                            @endcardTask
                        @endforeach
                    </div>
                </section>
                <section>                
                    @cardTodo(['type' => '2', 'nb' => $myTasks->done->count, 'large' => true])@endcardTodo
                    <div class="list__content">                    
                        @foreach($myTasks->done->tasks as $t)
                            @cardTask( [
                                'id'         => $t->id,
                                'title'      => $t->name,
                                'status'     => 'done',
                                'priority'   => 'low',
                            ])
                            @endcardTask
                        @endforeach
                    </div>
                </section>
            </div>
            <a href="/project/{{$project->slug}}/tasks" data-pjax-main>see all task</a>         
        </section>
        
        <div class="projectSingle__projectTasks">
            <section class="projectSingle__addUser">
                <h3 class="h3">Add task</h3>
                @addTask([
                    'idProject' => $project->id,
                    'allMember' => $project->team->users,
                ])
                @endaddTask
            </section>
            
            <section class="projectSingle__deadline">
                <h3 class="h3">Deadline</h3>
                @deadline([
                    'start' => $project->date_formated->humans->created,
                    'end'   => $project->date_formated->humans->deadline,
                    'timer' => $project->date_formated->humans->diffWithDeadline,
                    ])
                @enddeadline
            </section>

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
        </div>
    </div>
</section>
@endsection