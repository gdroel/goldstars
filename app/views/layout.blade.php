<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gold Stars || Give your Students Gold Stars</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/ajax.js"></script>
  </head>
  <body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ action('HomeController@index') }}">Gold Stars</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav pull-right">
        @if(Auth::check())
        <li><a class="btn btn-info" href="{{ action('HomeController@show', Auth::user()->id) }}">My Students</a></li>
        <li><a href="{{ action('HomeController@doLogout') }}">Logout</a></li>
        @else
        <li><a class="btn btn-info" href="{{ action('HomeController@showRegister') }}">I'm a Leader</a></li>
        <li><a href="{{ action('HomeController@showLogin') }}">Login</a></li>
        @endif
        <li><a class="pull-right" id="searchbutton"><span class="glyphicon glyphicon-search"></span></a></li>
        {{ Form::open(array('action'=>'HomeController@doSearch','class'=>'navbar-form navbar-right','id'=>'search'))}}
        <div class="form-group">
        {{ Form::text('query', null, array('class'=>'form-control', 'placeholder'=>'Search Students'))}}
        </div>
       {{ Form::close() }}
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    @yield('content') 	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <div class="col-md-12" id="footer">
      <p><a class="white" href="http://gaberoeloffs.com">&copy 2014 Gabe Roeloffs</a><a class="pull-right white" href="http://github.com/gdroel/goldstars">Fork this on Github</a></p>
    </div>
  <script>
$(document).ready(function(){

  $("#search").hide();
  $('#searchbutton').click(function(){

    $("#search").show();

  });
});
  </script>
  </body>
</html>