
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="/{{ env('APP_FOLDER').'css/app.css' }}">
    <link rel="stylesheet" href="/{{ env('APP_FOLDER').'css/library.css' }}">
    <link rel="shortcut icon" href="favicon.ico">
    <style>
      body {
        padding-top: 70px;
      }
      a > .glyphicon:before { margin-right: 5px; }
      .brand-icon-primary { color: #FF8700; }
      @font-face {
        font-family: 'Glyphicons Halflings';
        src: url(/{{ env('APP_FOLDER') }}fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.eot?f4769f9bdb7466be65088239c12046d1);
        src: url(/{{ env('APP_FOLDER') }}fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.eot?f4769f9bdb7466be65088239c12046d1) format("embedded-opentype"), url(/{{ env('APP_FOLDER') }}fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.woff2?448c34a56d699c29117adc64c43affeb) format("woff2"), url(/{{ env('APP_FOLDER') }}fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.woff?fa2772327f55d8198301fdb8bcfc8158) format("woff"), url(/{{ env('APP_FOLDER') }}fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.ttf?e18bbf611f2a2e43afc071aa2f4e1512) format("truetype"), url({{ env('APP_FOLDER') }}fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.svg?89889688147bd7575d6327160d64e760) format("svg");
      }
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
          <a class="navbar-brand" href="/{{ env('APP_FOLDER') }}"><span class="brand-icon-primary glyphicon glyphicon-earphone" aria-hidden="true"></span> {{ config('app.name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            @if(Auth::user()->admin == 1 or Auth::user()->groups()->where('can_edit', 1)->exists())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Editor <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ action('FormController@index') }}"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Forms</a></li>
                <li><a href="{{ action('OptionGroupController@index') }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Option Groups</a></li>
              </ul>
            </li>
            @endif
              <li><a href="{{ action('QueueController@index') }}">Queues</a></li>
              <li><a href="{{ action('ResponseController@forms') }}">Reports</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="https://mystats.services.conduent.com/support"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>Help</a></li>
                <li><a href="{{ action('AuthController@logout') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
        @else
        <div class="navbar-header">
          <a class="navbar-brand" href="{{ action('HomeController@index') }}"><span class="brand-icon-primary glyphicon glyphicon-earphone" aria-hidden="true"></span> {{ config('app.name') }}</a>
        </div>
        @endif

      </div>
    </nav>

    <div class="container-fluid">
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

    <script src="/{{ env('APP_FOLDER').'js/app.js' }}"></script>
    <script src="/{{ env('APP_FOLDER').'js/library.js' }}"></script>
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
      		url,'popUpWindow','height=500,width=400,left=5,top=5,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no')
      }
      </script>
      <script>
        function keepAlive(){
          $.ajax({type:"get", url:"/{{ env('APP_FOLDER','') }}ping"});
        }
        setTimeout(keepAlive(),300000);
        keepAlive();
        </script>

      @stack('scripts')

  </body>
</html>
