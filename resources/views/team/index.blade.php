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
    </div>


    
    <div class="addProject">
        <form action="{{ URL::to('create/project') }}" method="post" enctype="multipart/form-data">

            <label>Add project</label><br>
            <input type="text" placeholder='Project Name' name="name" placeh><br>
            <input type="file" name="img"><br>
            <input type="date" name="deadline"><br>
            <input type="submit" value="Upload" name="submit">

            <input type="hidden" name="id_user" value='{{Auth::user()->id}}'>
            <input type="hidden" name="id_team" value='{{$id}}'>
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </form>
    </div>
</section>
@endsection