@layout('layouts.main')
@section('content')
<div class="row">
 
    <div class="six columns offset-by-two">

          <h1>Login To Your Dashboard</h1>
          </div>
          </div>
            <div class="row">
    <div class="six columns offset-by-two">
         {{ Form::open(action('home.users@login'),'POST') }}
        <!-- check for login errors flash var -->
        {{Form::token()}}
        @if (Session::has('login_errors'))
            {{ Alert::error("Username or password incorrect.") }}
        @endif
        <!-- username field -->
        <p>{{ Form::label('username', 'Username') }}</p>
        <p>{{ Form::text('username',null,array('placeholder'=>'Username')) }}</p>
        <!-- password field -->
        <p>{{ Form::label('password', 'Password') }}</p>
        <p>{{ Form::password('password',array('placeholder'=>'Password')) }}</p>
        <!-- submit button -->
        <p>{{ Form::submit('Login', array('class' => 'btn-large')) }}</p>
    {{ Form::close() }}
      
    </div> <!-- /container -->
     
  
@endsection
