<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" ></script> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-3.4.1/css/bootstrap.min.css')}}" data-type="keditor-style" /> -->
        <link rel="stylesheet" type="text/css" href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" data-type="keditor-style" />
        <!-- Start of KEditor styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('/dist/css/keditor.css')}}" data-type="keditor-style" />
        <link rel="stylesheet" type="text/css" href="{{asset('/dist/css/keditor-components.css')}}" data-type="keditor-style" />
        <!-- End of KEditor styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('/plugins/code-prettify/src/prettify.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('/css/examples.css')}}" />

   

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand pr-3" style='border-right:1px solid black;' href="{{ url('/') }}">
                    Jan Rambo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                     @auth('web') 
                    
                    <ul class="navbar-nav mr-auto">
                            <li class='nav-item'>
                                <a class='nav-link' href="{{ route('home') }}">Home</a>
                            </li>

                            <li class='nav-item'>
                                <a class='nav-link' href="{{url('restaurants')}}">Restaurants</a>
                            </li>
                    </ul>
                    
                     @endauth 

                     @auth('owner') 
                    
                    <ul class="navbar-nav mr-auto">
                            
                            <li class='nav-item'>
                                <a class='nav-link' href="{{ route('owner') }}">Home</a>
                            </li>

                            <li class='nav-item'>
                                <a class='nav-link' href="{{ url('owner/bookings',Auth::guard('owner')->user()->id) }}">Bookings</a>
                            </li>

                    </ul>
                    
                     @endauth 


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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     @auth('owner')
                                    <a href="{{url('editLayout')}}" class='dropdown-item'>Edit Layout</a>
                                    @endauth   
                                
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

        @if(Request::is('login') || Request::is('owner/login'))
        
            <div class='container'>
                <div id="myDIV" class='py-4'>
                    <a class="log btn @if(Request::is('login'))active @endif" href="{{url('login')}}">Login as Customer</a>
                    <a class="log btn @if(Request::is('owner/login'))active @endif" href="{{url('owner/login')}}">Login as Owner</a>
                </div> 
            </div>

        @endif
        
        @if(Request::is('register') || Request::is('owner/register'))

            <div class='container'>
                <div id="myDiv" class='py-4'>
                    <a class="log btn @if(Request::is('register'))active @endif" href="{{url('register')}}">Register as Customer</a>
                    <a class="log btn @if(Request::is('owner/register'))active @endif" href="{{url('owner/register')}}">Register as Owner</a>
                </div> 
            </div>

        @endif
     
        <main class="">
            @yield('content')
        </main>
    </div>

   
    <!-- <script src='https://code.jquery.com/jquery-3.3.1.js'></script> -->
    <script src='https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js'></script>
    <script>
    console.log('jani');
    $(document).ready(function() {
    $('#example').DataTable();
} );

// switch
// Get the container element
$( '#myDiv a' ).on( 'click', function () {
	$( '#myDiv' ).find( 'a.active' ).removeClass( 'active' );
	$( this ).parent( 'a' ).addClass( 'active' );
});

    </script>
</body>
</html>
