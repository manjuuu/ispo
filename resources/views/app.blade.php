
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/library.css') }}">
    <link rel="shortcut icon" href="favicon.ico">
    <style>
      body {
        padding-top: 70px;
      }
      a > .glyphicon:before { margin-right: 5px; }
      .brand-icon-primary { color: #FF8700; }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        @if(Auth::check())
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><span class="brand-icon-primary glyphicon glyphicon-earphone" aria-hidden="true"></span> {{ config('app.name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            @if(Auth::user()->admin == 0 && 1 == 2)

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Editor <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Permissions & Users</li>
                <li><a href="#"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Groups</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Forms & Questions</li>
                <li><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Forms</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Option Groups</a></li>
              </ul>
            </li>
            @endif

            @if(Auth::user()->admin == 1)
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Permissions & Users</li>
                <li><a href="#"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Groups</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Forms & Questions</li>
                <li><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Forms</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Option Groups</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Usage</li>
                <li><a href="#"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> Active Users</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Responses</a></li>
              </ul>
            </li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="https://mystats.services.conduent.com/support"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>Help</a></li>
                <li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
        @else
        <div class="navbar-header">
          <a class="navbar-brand" href="/"><span class="brand-icon-primary glyphicon glyphicon-earphone" aria-hidden="true"></span> {{ config('app.name') }}</a>
        </div>
        @endif

      </div>
    </nav>

    <div class="container">
      @if($errors->count() > 0)
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach($errors as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>
      @endif
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @yield('content')
        </div>
      </div>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ mix('/js/library.js') }}"></script>
    @if(session('message'))
      <script>
      swal({
        text: '{{ session('message')['message'] }}',
        timer: {{ session('message')['time'] }},
        type: '{{ session('message')['type'] }}',
      })
      </script>
    @endif
    <script>
      function newPopup(url) {
      	popupWindow = window.open(
      		url,'popUpWindow','height=500,width=400,left=5,top=5,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no')
      }
      </script>
      @stack('scripts')

  </body>
</html>
