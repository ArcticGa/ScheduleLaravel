@extends('welcome')
@section('title', 'Удаление пользователя')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col"></div>
            <div class="col-10 d-flex flex-column align-items-center justify-content-center">
                <h3 class="my-5">Вы уверены что хотите удалить данного пользователя <b>{{$user_id -> name}}</b></h3>
                <form method="POST">
                    @csrf
                    <a class="btn btn-primary" href="{{route('adminInfo')}}">Отмена</a>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
