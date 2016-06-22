@extends('templates.master')
@section('content')


<div class="row">
    <div class="col-lg-6">
        <form role="form" action="{{ route('status') }}" method="post">
            <div class="form-group {{ $errors->has('status')? ' has-error' : '' }}">
                <textarea placeholder="What's up {{ Auth::user()->name }}?" name="status" class="form-control" rows="2"></textarea>
           @if($errors->has('status'))
           			<span class="help-block">{{ $errors->first('status') }}</span>
           @endif
            </div>
            <button type="submit" class="btn btn-default">Update status</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-5">

    	@if(!$status->count())
    		<p> <strong>Unfortunately </strong>there are no status Found  lol</p>
    	@endif
		    	
		@foreach($status as $state)
		<div class="media">
		    <a class="pull-left" href="{{ route('profile',$state->users->username) }}">
		        <img class="media-object" alt="" src="{{ $state->users->getAvatar() }}">
		    </a>
		    <div class="media-body">
		        <h4 class="media-heading"><a href="{{ route('profile',$state->users->username) }}">{{ $state->users->name }}</a></h4>
		        <p>{{ $state->body }}.</p>
		        <ul class="list-inline">
		            <li>{{ $state->created_at->diffForHumans() }}</li>
		            <li><a href="#">Like</a></li>
		            <li>10 likes</li>
		        </ul>
<!-- 		foreach
		        <div class="media">
		            <a class="pull-left" href="#">
		                <img class="media-object" alt="" src="">
		            </a>
		            <div class="media-body">
		                <h5 class="media-heading"><a href="#"></a></h5>
		                <p>!</p>
		                <ul class="list-inline">
		                    <li>8 minutes ago.</li>
		                    <li><a href="#">Like</a></li>
		                    <li>4 likes</li>
		                </ul>
		            </div>
		        </div>
		endforeach
 -->		        <form role="form" action="{{ route('status.reply',$state->id) }}" method="post">
		            <div class="form-group {{ $errors->has("reply-{$state->id}")? ' has-error' : '' }}">
		                <textarea name="reply-{{$state->id}}" class="form-control " rows="2" placeholder="Reply to this status"></textarea>
		                      @if($errors->has("reply-{$state->id}"))
           			<span class="help-block">{{ $errors->first("reply-{$state->id}") }}</span>
          						 @endif

		            </div>
		            <input type="submit" value="Reply" class="btn btn-default btn-sm">
 		           <input type="hidden" name="_token" value="{{ Session::token() }}">

		        </form>
		    </div>
		</div>
		@endforeach
    </div>
</div>
        <!-- status body -->
@stop