<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <form class="navbar-form navbar-left" >
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="fa fa-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="fa fa-sign-in"></span> Login</a></li>
        </ul>
    </div>

</nav>


<div id="Head" style="background-color: #287ccf; height: 150px; padding: 0px" >
    <div class="row">

        <div class="col-sm-3">
            <div id="HeadContainer" style="width: 1000px; margin: auto">
                <img src="{{ asset('images/main/Logo.png') }}"/>
            </div>
        </div>

        <div class="col-sm-6">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="fa fa-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="fa fa-sign-in"></span> Login</a></li>
            </ul>
        </div>



    </div>
</div>



<div id="content">
    @yield('content')
</div>



</body>
</html>