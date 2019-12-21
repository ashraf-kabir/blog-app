<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"> --}}
    @notify_css
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            <div class="container">
                <div class="row">
                    @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories') }}">View All Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tags') }}">View All Tags</a>
                            </li>
                            @if (Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('users') }}">View All Users</a>
                                </li>
                            @else
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('posts') }}">View All  Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts.trashed') }}">View All Trashed Posts</a>
                            </li>

                            @if (Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('user.create') }}">Create New User</a>
                                </li>
                            @else
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('category.create') }}">Create New Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tag.create') }}">Create New Tag</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('post.create') }}">Create New Post</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('user.profile') }}">My Profile</a>
                            </li>
                            @if (Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('settings') }}">Settings</a>
                                </li>
                            @else
                            @endif
                        </ul>
                    </div>
                    @endif
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

    </div>

    <!-- scripts -->
    {{-- <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script> --}}
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea.content',
            width: 685,
            height: 300
        });
    </script>
</body>
    @notify_js
    @notify_render
</html>
