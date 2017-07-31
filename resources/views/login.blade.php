@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Login to {{ config('app.name') }}</div>
    <div class="panel-body">
      {!! BootForm::open(['url' => 'login']) !!}
      {!! BootForm::text('username', 'Username (WIN ID)') !!}
      {!! BootForm::password('password', 'Password') !!}
      {!! BootForm::submit('Login') !!}
      {!! BootForm::close() !!}
      <div class="text-muted">Login using your Conduent SSO credentials. If you can not login, reset your password <a href="https://aim.acs-inc.com/sspr">here</a></div>
    </div>
  </div>
@endsection
