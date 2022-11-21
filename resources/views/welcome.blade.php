<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/bootstrap-grid.min.css') }}">
    <title>@yield('title', 'Главная')</title>
    <style>
        .del {
            position: absolute;
            right: 0;
        }
        .upd {
            position: absolute;
            left: 0;
        }
    </style>
</head>
<body>
<header class="navbar-light bg-light  position-relative">
    <div class="navbar navbar-expand-lg container-lg d-flex justify-content-between">
        <ul class="navbar-nav mr-auto d-flex justify-content-between w-100">
            <div class="d-flex">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('welcome')}}">Главная</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{route('main', ['date' => \Carbon\Carbon::now()->toDateString(), 'group_id' => 'all'])}}"
                    >
                        Расписание
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('list')}}">Список преподов</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('callers')}}">Расписание звонков</a>
                </li>
            </div>

            @if (Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth') }}">Авторизация</a>
                </li>
            @endif
            @if (Auth::user())
                <div class="d-flex">
                    @if(Auth::user()->role_id == 1)
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="{{ route('admin') }}">Панель управления для Админа</a>
                        </li>
                    @endif

                </div>
            <li class="nav-item d-flex align-items-center">
                <div>@if(\Illuminate\Support\Facades\Auth::user()) {{\Illuminate\Support\Facades\Auth::user()->name}} @endif</div>
                <a class="nav-link" href="{{ route('logout') }}">Выход</a>
            </li>
            @endif
        </ul>
    </div>
</header>

<div class="container-lg">
    @section('content')
        <main role="main">
            <div class="mt-5 starter-template mx-auto text-center">
                <a type="button" class="btn btn-outline-primary" href="/main/{{\Carbon\Carbon::now()->toDateString()}}/all">Перейти к расписанию</a>
            </div>

        </main>
    @endsection

    @yield('content')
</div>
<script src="resources/js/helper.js"></script>
</body>
</html>
