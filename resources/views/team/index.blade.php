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
        <div class="addUser">
            <h3>Manege team</h3>
            @foreach($allMember as $member)
                @avatar( [
                    'type' => 'small',
                    'idUser' => $member->id,
                    'name' => $member->name,
                    'surname' => $member->surname,
                    'img' => $member->imgSmall,
                    'isName' => true,
                    ])
                @endavatar
                <form class='' action="{{ URL::to('remove/userteam') }}" method="post">
                    <input type="submit" value="Remove user" name="submit">
                    <input type="hidden" name="id_user" value='{{$member->id}}'>
                    <input type="hidden" name="id_team" value='{{$id}}'>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                </form>
            @endforeach

            @addUser([
                'id'=>$id,
            ])
            @endaddUser
        </div>

        
    </div>
</section>
@endsection