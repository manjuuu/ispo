
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
    


<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/dataTables.bootstrap4.min.css') }}" />
<script type="text/javascript" src="{{ URL::asset('js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/dataTables.bootstrap4.min.js') }}"></script>
    


     <meta name="csrf-token" content="{{ csrf_token() }}">
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Config <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ action('FormController@index') }}"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Forms</a></li>
                <li><a href="{{ action('OptionGroupController@index') }}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Option Groups</a></li>
                <li><a href="{{ action('UserController@index') }}"><span class="glyphicon glyphicon-user"></span>Users</a></li>
                <li><a href="{{ action('GroupController@index') }}"><span class="glyphicon glyphicon-th-list"></span>Groups</a></li>
                    <li role="separator" class="divider"></li>
                <li><a href="{{ action('ImportController@index') }}"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Queue Import</a></li>
              </ul>
            </li>
            @endif 




               <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-arrow" aria-hidden="true"></span> Form <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="btn btn-success"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Email</a></li>
                
              </ul>
            </li>






              <li><a href="/{{ env('APP_FOLDER') }}">Forms</a></li>
              <li><a href="{{ action('QueueController@index') }}">Queues</a></li>
              <li><a href="{{ action('ResponseController@forms') }}">Reports</a></li>
              <!-- @if(Auth::user()->admin == 1 or Auth::user()->groups()->where('can_edit', 1)->exists())
              <li><a href="/admin_access">Admin access for users</a></li>
              @endif
              <li><a href="/list_all_disposes">All disposes</a></li>
              <li><a href="/email">Serializes data</a></li> -->
              @if(Auth::user()->admin == 1 or Auth::user()->groups()->where('can_edit', 1)->exists())
              <li><a href="/form_from_group">Response Edit</a></li>
              @endif
              <li><a href="/users_exception">Exception Check</a></li>
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

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
              @if($errors->count() > 0)
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach($errors as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>
      @endif
      @if(session('message'))
        <div class="alert alert-info" role="alert">
          {{ session('message')['message'] }}
      </div>
      @endif


      @if(session('message1'))
        <div class="alert alert-danger" role="alert">
          {{ session('message1')['message1'] }}
      </div>
      @endif


       

          @yield('content')
        </div>
      </div>
    </div>

    <script src="/{{ env('APP_FOLDER').'js/app.js' }}"></script>
    <script src="/{{ env('APP_FOLDER').'js/library.js' }}"></script>
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

        <script>

    $(document).ready(function() {
      $.noConflict();
        $('#batchess').DataTable();
    } );
  </script>

      @stack('scripts')

  </body>
</html>
