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
@section('content')
<section class="container">
    
    @header([
        'type'        => 'team',
        'id'          => $team->id,
        'projectName' => '',
        'teamName'    => $team->name,
        'teamSlug'    => $team->slug,
        'image'       => $team->img,
        'allMember'   => $team->users,
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
                'id'=>$team->id,
            ])
            @endaddProject
        </div>
        <div class="addUser">
            <h3>Manege team</h3>
            @foreach($team->users as $member)
                @avatar( [
                    'type'    => 'small',
                    'idUser'  => $member->id,
                    'name'    => $member->name,
                    'surname' => $member->surname,
                    'img'     => $member->imgSmall,
                    'isName'  => true,
                ])
                @endavatar
                <form class='' action="{{ route('removeUserTeam') }}" method="post">
                    @csrf
                    <input type="submit" value="Remove user" name="submit">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id_user" value='{{$member->id}}'>
                    <input type="hidden" name="id_team" value='{{$team->id}}'>
                </form>
            @endforeach

            @addUser([
                'id'=>$team->id,
            ])
            @endaddUser
        </div>

        
    </div>
</section>
@endsection