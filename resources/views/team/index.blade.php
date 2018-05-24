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

        @list([ 'title'      => 'Projects List',
                'modifier'   => 'list-projects']) 
            @foreach($projects as $p)
                @cardProject( [
                    'imageUrl'     => $p->imgSmall,
                    'alt'          => 'image du projet '.$p->name,
                    'title'        => $p->name,
                    'team'         => $p->team->name,
                    'link_project' => "/project/$p->slug",
                    'link_team'    => '/team/'.$p->team->slug,
                ])
                @endcardProject
            @endforeach
        @endlist
        
        
        <div class="addProject">
        @list([ 'title' => 'Add project'])
            @addProject([
                'id'=>$team->id,
            ])
            @endaddProject
        @endlist
        </div>
        <div class="addUser">
            @list([ 'title' => 'Manage team'])
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
                    <form class='' action="{{ route('removeUserTeam') }}" method="post" data-pjax-main>
                        @csrf
                        <input type="submit" value="Remove user" name="submit">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id_user" value='{{$member->id}}'>
                        <input type="hidden" name="id_team" value='{{$team->id}}'>
                    </form>
                @endforeach
            @endlist

            @addUser([
                'id'=>$team->id,
            ])
            @endaddUser
        </div>

        
    </div>
</section>
@endsection