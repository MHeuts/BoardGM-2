<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Board GM</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{asset('js/bootstrap-select.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">BOARDGM</a>
				
				<ul class="navbar-nav">
					@foreach($items as $item)
						@if(count($item['children']) > 0)
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="{{ $item->url }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  {{ $item->name }}
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									@foreach($item['children'] as $child)
										<a class="dropdown-item" href="{{ $child->url }}">{{ $child->name }}</a>
									@endforeach
								</div>
							</li>
						@else
							<li class="nav-item">
								<a class="nav-link" href="{{ $item->url }}">{{ $item->name }}</a>
							</li>
						@endif
					@endforeach
				</ul>
				
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <form class="navbar-form navbar-left" action="{{ route('search') }}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" placeholder="Search" style="width: 500px">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <a href="{{ route('cart') }}" class="btn btn-primary">
								<i class="fa fa-shopping-cart fa-lg"></i>
								@if(Session::has('cart'))
								<span class="badge badge-light">
								{{ Session::get('cart.totalQty') }}
								@endif
								</span>
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if( Auth::user()->isAdmin() )
                                    <a class="dropdown-item" href="{{ route('cms') }}">
                                       CMS
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('userDetails') }}">
                                        Edit profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">	
            @yield('content')
        </main>
    </div>
</body>
</html>
