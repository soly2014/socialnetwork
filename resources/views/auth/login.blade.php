@extends('templates.master')
@section('content')

	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			{!! Form::open(['url'=>'/auth/login','method'=>'post']) !!}

				@if(count($errors)>0)

					<div class="alert alert-danger">

						<ul>
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>

					</div>

				@endif
				<form role="form">

				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Email address
					</label>
			{!! Form::email('email',old('email'),[ 'class'=>'form-control', 'id'=>'exampleInputEmail1','placeholder'=>'Enter Your E_Mail']) !!}				
					</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Password
					</label>
			{!! Form::password('password',[ 'class'=>'form-control', 'id'=>'exampleInputPassword1','placeholder'=>'Enter Your Password']) !!}				
				</div>
				<div class="checkbox">
					 
					<label>
			{!! Form::checkbox('remember') !!}		
								Remember Me
						</label>
				</div> 
			{!! Form::submit('submit',['class'=>'btn btn-info']) !!}		
				</button>

				<h4><a href="/password/email">Forget Your Password</a></h4>

<div class="social-wrap b">
    <button class="facebook"><a href="/auth/facebook/">Sign in</a> <em>w/</em> Facebook</button><br>
    <button class="twitter">Sign in <em>w/</em> Twitter</button><br>
    <button class="googleplus">Sign in <em>w/</em> Google</button>
</div>              {!! Form::token() !!}

			{!! Form::close() !!}
				</div>
	


@stop
