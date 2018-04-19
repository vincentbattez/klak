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
    </div>
</section>
@endsection