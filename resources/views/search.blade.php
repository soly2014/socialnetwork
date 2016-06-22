@extends('templates.master')
@section('content')
			<h1>You searched for {{ Input::get('query') }}</h1>
			@if(!count($search_results))
			<h3> Unfortunately , No Results Found</h3>
			@endif
		@foreach($search_results as $search)

				<div class="media">
				    <a class="pull-left" href="{{ route('profile',$search->username) }}">
				        <img class="media-object" alt="" src="{{ $search->getAvatar() }}">
				    </a>
				    <div class="media-body">
				        <h4 class="media-heading"><a href="{{ route('profile',$search->username) }}">{{ $search->name }}</a></h4>
				    </div>
				</div>

		@endforeach
@stop