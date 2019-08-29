<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">


    <title>Chemical Activity Search</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!--own Styles-->
    <link href="{{ mix('css/c-search.css') }}" rel="stylesheet">

    <!--JSME -->
    
    <script type="text/javascript" language="javascript" src="jsme/jsme.nocache.js" defer></script>
    
    <script defer>
 //this function will be called after the JavaScriptApplet code has been loaded.
    function jsmeOnLoad() {
        jsmeApplet1 = new JSApplet.JSME("jsme_container1", "380px", "340px");
        jsmeApplet2 = new JSApplet.JSME("jsme_container2", "240px", "200px", {"options" : "depict"});
        jsmeApplet3 = new JSApplet.JSME("jsme_container3", "240px", "200px", {"options" : "depict"});
        jsmeApplet4 = new JSApplet.JSME("jsme_container4", "240px", "200px", {"options" : "depict"});
        jsmeApplet5 = new JSApplet.JSME("jsme_container5", "240px", "200px", {"options" : "depict"});
    }
    </script> 


</head>
<!--headまで作成20190509-->
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel ">
            <div class="container">
                <h1 class="navbar-brand">
                    <a href="{{ url('/') }}">Chemical Activity Search</a>
                </h1>
                <ul class="contentlist">
                    <li><a href="/search">検索</a></li>
                    <li><a href="/create">登録</a></li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href=".dropdown-menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            <div id="vueapp">
                <router-view 
                :user="{{Auth::user()}}"
                ></router-view>
            </div>

        </main>
    </div>

   
        <!-- jQuery、Popper.js、Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- タブ整形用プラグインの読み込み -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tabslet.js/1.7.3/jquery.tabslet.min.js"></script>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!--own Script-->
    

        
    
</body>
</html>