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
				<form action="">
					<input type="file" name='img' class="inputfile">
				</form>
			</div>
		</div>
		
		<h1 class="profilUser__name">
			{{$user->name}}
		</h1>

		<div>
			{{$user->email}}
		</div>

	</div>
</section>
@endsection