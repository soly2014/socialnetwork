@extends('templates.master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<div class="page-header">
				@if(Auth::user()->id === $user->id)
					<h3>you are in your profile mr  <small>{{ Auth::user()->name }} {{ $user->id }} </small></h3>
				@else
					<h3>you are visiting  <small>{{ $user->name }}  {{ $user->id }} </small> Profile</h3>
				@endif
					</div>
				</div>
				<div class="col-md-2">
				@if(Auth::user()->HasFriendRequestsPending($user))

               			<button type="button" class="btn btn-block btn-md btn-success">Friend Request Sent</button>
               @elseif(Auth::user()->HasFriendRequestsRecieved($user))

               			<a href="{{ route('acceptfriend',['username'=>$user->username]) }}"  type="button" class="btn btn-block btn-md btn-success">Accept Friend Request</a>
             
               @elseif(Auth::user()->isFriendWith($user))

               			<p> you and {{ $user->name }} are friends</p>

               @elseif(Auth::user()->id === $user->id)

               @else
               
                  		<a href="{{ route('addfriend',['username'=>$user->username]) }}" type="button" class="btn btn-block btn-md btn-primary">Add Friend</a>


               @endif


				</div>
						<div class="col-md-6">
		                </div>

			</div>
		</div>
	</div>

	<div class="raw">
		<div class="col-lg-5">

				<div class="media">
				    <a class="pull-left" href="{{ route('profile',$user->username) }}">
				        <img class="media-object" alt="{{ $user->username }}" src="{{ $user->getAvatar() }}">
				    </a>
				    <div class="media-body">
				        <h4 class="media-heading"><a href="{{ route('profile',$user->username) }}">{{ $user->name }}</a></h4>
				    	@if($user->location)
				    		<p>{{ $user->location }}</p>
				    	@endif
				    </div>
				</div>
				    <hr>


		</div>
		<div class="col-lg-4 col-lg-offset-3">

			<h4>{{ $user->name }} 's friends</h4>

			@if(!$user->friends()->count())

				<p>{{ $user->name }} has no friends</p>
			@else

					@foreach($user->friends() as $user)

						<div class="media">
						    <a class="pull-left" href="{{ route('profile',$user->username) }}">
						        <img class="media-object" alt="" src="{{ $user->getAvatar() }}">
						    </a>
						    <div class="media-body">
						        <h4 class="media-heading"><a href="{{ route('profile',$user->username) }}">{{ $user->name }}</a></h4>
						    	@if($user->location)
						    		<p>{{ $user->location }}</p>
						    	@endif
						    </div>
						</div>


					@endforeach

			@endif

		</div>
	</div>

@stop