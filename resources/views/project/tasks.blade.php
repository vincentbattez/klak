<?php
    /**
    * Variables
    *
    * @var $categories           @type [{}]      @mean All categories
    * @var $category->name       @type String    @mean Name of category
    */

    $currentPage = [
        'title' => 'Project',
        'bodyClass' => 'project-tasks'
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

        
    
    <section class="projectTasks list--tasks">
        
        <h2 class="h2 projectTasks__titre">All tasks</h2>
        <section class="projectTasks__list">
            <div class="list__content">            
                @cardTodo(['type' => '0', 'nb' => $projectTasks->todo->count, 'large'=>true])@endcardTodo 
                @foreach($projectTasks->todo->tasks as $t)
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
        
        <section class="projectTasks__list">
            <div class="list__content">            
                @cardTodo(['type' => '1', 'nb' => $projectTasks->doing->count, 'large'=>true])@endcardTodo
                @foreach($projectTasks->doing->tasks as $t)
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
        
        <section class="projectTasks__list">
            <div class="list__content">            
                @cardTodo(['type' => '2', 'nb' => $projectTasks->done->count, 'large'=>true])@endcardTodo
                @foreach($projectTasks->done->tasks as $t)
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
    </section>
        
</section>
@endsection