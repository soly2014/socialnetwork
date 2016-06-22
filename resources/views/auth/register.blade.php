@extends('templates.master')
@section('content')
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">

				{!! Form::open(['url'=>'/auth/register','class'=>'form-horizontal']) !!}
								@if(count($errors)>0)

					<div class="alert alert-danger">

						<ul>
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>

					</div>

				@endif


  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">

        {!! Form::text('username','',[ 'class'=>'input-xlarge', 'id'=>'username']) !!}        
        <p class="help-block">username can contain any letters or numbers, without spaces</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Name</label>
      <div class="controls">

        {!! Form::text('name','',[ 'class'=>'input-xlarge', 'id'=>'username']) !!}        
        <p class="help-block">name can contain any letters or numbers, without spaces</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
      	{!! Form::email('email','',[ 'class'=>'input-xlarge', 'id'=>'email']) !!}				
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
      	{!! Form::password('password',[ 'class'=>'input-xlarge', 'id'=>'password']) !!}				
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
      {!! Form::password('password_confirmation',[ 'class'=>'input-xlarge', 'id'=>'password_confirm']) !!}        
        <p class="help-block">Please confirm password</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="Upload Image">Upload Image)</label>
      <div class="controls">
    {!! Form::file('image') !!}
        <p class="help-block">Upload Image</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
      				{!! Form::submit('submit',['class'=>'btn btn-info']) !!}		
              {!! Form::token() !!}
			{!! Form::close() !!}

      </div>
    </div>
  </fieldset>
</div>


@stop