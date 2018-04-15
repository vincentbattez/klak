<?php
    /**
    * Variables
    *
    * @var $categories           @type [{}]      @mean All categories
    * @var $category->name       @type String    @mean Name of category
    */

    $currentPage = [
        'title' => 'Klak | '.$user->name,
        'bodyClass' => 'profile'
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
@section('content')
<section class="container">
	<div class='profilUser'>


		<div class="profilUser__image">
			@if(($user->img) == '')
			<img src='{{ URL::asset('images/profils/avatar-default.png') }}' alt='Photo de {{$user->name}}'/>
			@else
			<img src='{{ URL::asset('images/profils') }}/{{$user->img}}' alt='Photo de {{$user->name}}'/>
			@endif

			<div class="profilUser__changeimage">

				<form action="{{ URL::to('upload/user/picture/'.$user->id) }}" method="post" enctype="multipart/form-data">
					<label>Select image to upload:</label>
					<input type="file" name="file" id="file">
				  <input type="submit" value="Upload" name="submit">
					<input type="hidden" value="{{ csrf_token() }}" name="_token">
				</form>

			</div>
		</div>
		
		<h1 class="profilUser__name">
			{{$user->name}} {{$user->surname}}
		</h1>

		<div class="profilUser__email">
			{{$user->email}}
		</div>

		<div class="profilUser__myproject">

				{{-- @if($myProjects)
					@php dd($myProjects);
					@endphp
				@endif --}}

		</div>

	</div>
</section>







@endsection