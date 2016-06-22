@extends('templates.master')
@section('content')


			<div class="row">
			    <div class="col-lg-6">
			        <h3>Your friends</h3>

					@if(!$friends->count())

						<p>{{ Auth::user()->name }} has no friends</p>
					@else


					@foreach($friends as $friend)


				<div class="media">
				    <a class="pull-left" href="{{ route('profile',$friend->username) }}">
				        <img class="media-object" alt="{{ $friend->username }}" src="{{ $friend->getAvatar() }}">
				    </a>
				    <div class="media-body">
				        <h4 class="media-heading"><a href="{{ route('profile',$friend->username) }}">{{ $friend->name }}</a></h4>
				    	@if($friend->location)
				    		<p>{{ $friend->location }}</p>
				    	@endif
				    </div>
				</div>

					@endforeach			

					 @endif
 				</div>
			    <div class="col-lg-6">
			        <h4>Friend requests</h4>
						@if(!Auth::user()->friendRequests()->count())	

							<h4>you have no friends request now</h4>

						@endif	   

						@foreach(Auth::user()->friendRequests() as $request)  

					<div class="media">
				    <a class="pull-left" href="{{ route('profile',$request->username) }}">
				        <img class="media-object" alt="{{ $request->username }}" src="{{ $request->getAvatar() }}">
				    </a>
				    <div class="media-body">
				        <h4 class="media-heading"><a href="{{ route('profile',$request->username) }}">{{ $request->name }}</a></h4>
				    	@if($request->location)
				    		<p>{{ $request->location }}</p>
				    	@endif
				    </div>
				</div>


						@endforeach   
				    </div>
			</div>
@stop