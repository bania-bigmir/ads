@if(Auth::check())

<p>Hello, {{Auth::user()->username}}</p>
{!! Form::open(['url' => '/logout','method' => 'get']) !!}
{!!Form::submit('Logout',['class' => 'btn btn-success']);!!}
{!! Form::close() !!}
@else
{!! Form::open(['url' => '/login']) !!}
{!!Form::label('username', 'Name');!!}
{!!Form::text('username',null,['class' => 'form-control','required']);!!}
{!!Form::label('password', 'Password');!!}
{!!Form::password('password',['class' => 'awesome form-control','required']);!!}<br>                     
{!!Form::submit('Login',['class' => 'btn btn-primary']);!!}
{!! Form::close() !!}
@endif