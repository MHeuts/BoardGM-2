<html>
<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="Head" style="background-color: #287ccf; height: 150px; padding: 0px" >
    <div id="HeadContainer" style="width: 1000px; margin: auto">
        <img src="{{ asset('images/main/Logo.png') }}"/>
    </div>

</div>
<div id="content" style="width: 1000px; margin: auto">
    @yield('content')
</div>



</body>
</html>