<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DashBoard Prime Support</title>

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}" >

  <meta http-equiv="refresh" content="300" />
</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Dashboard Prime Support</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Atualizado às {{date("H:i:s")}}</a></li>
    </ul>
      <!--<ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
	@yield('content')
</div>
</body>

<script src="{{ asset('js/jquery.min.js')}}"> </script>
<script src="{{ asset('js/bootstrap.min.js')}}"> </script>

@yield('javascript')
@yield('javascript_backlog')
@yield('javascript_aging')
@yield('javascript_pesquisa')
</html>