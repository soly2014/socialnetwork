@extends('templates.master')
@section('content')

<h3>Update your profile</h3>

<div class="row">
    <div class="col-lg-6">
                {!! Form::open(['url' => route('update',Auth::user()->id),'method'=>'post','class'=>'form-vertical','role'=>'form']) !!}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="first_name" class="control-label"> Name</label>
                                     {!! Form::text('name',Request::old('name')?:Auth::user()->name,['id'=>'first_name','class'=>'form-control']) !!}

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="last_name" class="control-label">Email</label>
                            {!! Form::text('email',Request::old('email')?:Auth::user()->email,['id'=>'last_name','class'=>'form-control']) !!}

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="location" class="control-label">Location</label>
                    {!! Form::text('location',Request::old('location')?:Auth::user()->location,['id'=>'location','class'=>'form-control']) !!}

            </div>
            {{ csrf_field() }}
            <div class="form-group">
             {!! Form::submit('update',['class'=>'btn btn-success']) !!}
            </div>
         {!! Form::close() !!}
    </div>
</div>
@stop
