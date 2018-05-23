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

			@avatar( [
				'type' => 'medium',
				'idUser' => $user->id,
				'name' => $user->name,
				'surname' => $user->surname,
				'img' => $user->img,
			])
			@endavatar


			<div class="profilUser__changeimage">

				<form action="{{ URL::to('upload/user/picture/'.$user->id) }}" method="post" enctype="multipart/form-data" data-pjax-body>
					<label>Select image to upload:</label>
					<input type="file" name="file" id="file" required value="{{ old('file') }}">
					<input type="submit" value="Upload" name="submit">
					<input name="_method" type="hidden" value="PUT">
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