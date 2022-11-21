@extends('welcome')
@section('title', 'Расписание звонков')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @error('err')
             <p class="text-center text-danger">{{$message}}</p>
            @enderror
            <div class="col-5 shadow m-3 p-3 rounded">
                <div class="fw-bold mb-2 w-50">Вторник, Среда, Четверг, Пятница, Суббота</div>
                <ul class="navbar-nav">
                    @foreach($callers as $caller)
                        @if($caller -> status == 1)
                            <div class="d-flex w-50 mb-2 w-75">
                                <li style="margin-right: 50px;">{{$caller  -> number_lesson}} @if($caller -> number_lesson != 'Обед') пара @endif</li>
                                <form action="/callers" method="Post">
                                    @csrf
                                    <li>
                                        <input type="hidden" name="id" value="{{$caller->id}}">
                                        <input
                                            class="w-75"
                                            type="text"
                                            name="time"
                                            onchange="this.form.submit()"
                                            value="{{$caller -> time}}"
                                            @if(\Illuminate\Support\Facades\Auth::guest()
                                                || \Illuminate\Support\Facades\Auth::user()->role_id != 1)
                                                disabled
                                            @endif
                                        >
                                    </li>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-5 shadow m-3 p-3 rounded">
                <div class="fw-bold mb-2 w-75">Понедельник</div>
                <ul class="navbar-nav w-100">
                    @foreach($callers as $caller)
                        @if($caller -> status == 2)
                            <div class="d-flex w-50 mb-2  w-75">
                                <li style="margin-right: 50px;">{{$caller  -> number_lesson}}  @if($caller -> number_lesson != 'Обед' && $caller -> number_lesson != 'Классный час') пара @endif</li>
                                <form action="/callers" method="Post">
                                    @csrf
                                    <li>
                                        <input type="hidden" name="id" value="{{$caller->id}}">
                                        <input
                                            class="w-75"
                                            type="text"
                                            name="time"
                                            onchange="this.form.submit()"
                                            value="{{$caller -> time}}"
                                            @if(\Illuminate\Support\Facades\Auth::guest()
                                                || \Illuminate\Support\Facades\Auth::user()->role_id != 1)
                                                disabled
                                            @endif
                                        >
                                    </li>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-5 shadow m-3 p-3 rounded">
                <div class="fw-bold mb-2 w-50">Пары по часу</div>
                <ul class="navbar-nav">
                    @foreach($callers as $caller)
                        @if($caller -> status == 3)
                            <div class="d-flex w-50 mb-2  w-75">
                                <li style="margin-right: 50px;">{{$caller  -> number_lesson}} пара</li>
                                <form action="/callers" method="Post">
                                    @csrf
                                    <li>
                                        <input type="hidden" name="id" value="{{$caller->id}}">
                                        <input
                                            class="w-75"
                                            type="text"
                                            name="time"
                                            onchange="this.form.submit()"
                                            value="{{$caller -> time}}"
                                            @if(\Illuminate\Support\Facades\Auth::guest()
                                                || \Illuminate\Support\Facades\Auth::user()->role_id != 1)
                                                disabled
                                            @endif
                                        >
                                    </li>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
