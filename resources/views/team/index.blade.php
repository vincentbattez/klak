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
        'type'        => 'team',
        'projectName' => '',
        'teamName'    => $name,
        'teamSlug'    => $slug,
        'image'       => $img,
        'allMember'   => $allMember,
    ])
    @endheader

    <div class="projectSingle">
        @listProject([
            'title'=>'Projects List',
            'projects'=>$projects,
            ])
        @endlistProject
        
        
        <div class="addProject">
            <h3>Add project</h3>
            @addProject([
                'id'=>$id,
            ])
            @endaddProject
        </div>

        
    </div>
</section>
@endsection