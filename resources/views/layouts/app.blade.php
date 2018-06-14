<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {!! MaterializeCSS::include_full() !!}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <nav>
        <div class="nav-wrapper">
          <a class="brand-logo" href="{{ url('/posts') }}">
            {{ config('app.name', 'Laravel') }}
          </a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            @guest
              <li> <a href="{{ route('login')}}">{{__('Login')}}</a> </li>
              <li> <a href="{{ route('register') }}">{{__('Register')}}</a> </li>
            @else
              <li>
                <a class="dropdown-trigger" href="#!" data-target="admin">
                  {{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i>
                </a>
              </li>
            @endguest
          </ul>
        </div>
      </nav>
      <ul id="admin" class="dropdown-content">
        <li>
          <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>

        <main class="container">
          @yield('content')
        </main>

        <div class="hide">
          @if (session()->has('success'))
            <div class="msg">
              <p>{{ session('success') }}</p>
            </div>
          @endif
        </div>
    </div>
</body>
</html>
