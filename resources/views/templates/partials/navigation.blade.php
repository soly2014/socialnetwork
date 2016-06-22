<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">facemash</a>
        </div>
        <div class="collapse navbar-collapse">
             @if (Auth::check()) 
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('timeline') }}">Timeline</a></li>
                    <li><a href="{{ route('friends') }}">Friends</a></li>
                </ul>
            {!! Form::open(['url'=>'/search','role'=>'search','class'=>'navbar-form navbar-left','method'=>'get']) !!}

                    <div class="form-group">
         {!! Form::text('query','',[ 'class'=>'form-control', 'placeholder'=>'Find people']) !!}        
                                   </div>
         {!! Form::submit('Search',['class'=>'btn btn-default']) !!}        

              {!! Form::token() !!}
            {!! Form::close() !!}

            @endif 
            <ul class="nav navbar-nav navbar-right">
                 @if (Auth::check())
                    <li><a href="{{ route('profile',Auth::user()->username) }}">{{ Auth::user()->getName() }}</a></li>
                    <li><a href="{{ route('update',Auth::user()->id) }}">Update profile</a></li>
                    <li><a href="/auth/logout">Sign out</a></li>
                @else 
                    <li><a href="/auth/register">Sign up</a></li>
                    <li><a href="/auth/login">Login in</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
