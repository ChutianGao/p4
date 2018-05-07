<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Roomie Finder">
    <meta name="author" content="Chutian Gao">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>@yield('pageTitle', 'Roomie Finder')</title>
    <!-- Bootstrap -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- App CSS -->
    <link rel='stylesheet' href='/css/post.css' type='text/css'>

    @stack('head')
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Roomie Finder</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="/posts/">Browse</a></li>
                    <li><a href="/posts/create">Create</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li>
                        <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                    </li>
                @else
                    <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                @endif
                </ul>
            </div>
        </div>
    </nav>
    <form method='POST' id='logout' action='/logout'>
        {{ csrf_field() }}
    </form>
    <div class="container" style="margin-top:0px">
        <div>
            @yield('title')
        </div>

        <div>
            @yield('errors')
        </div>

        <div>
            @yield('messages')
        </div>

        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

        @stack('body')
    </div><!-- /.container -->
</body>
</html>
