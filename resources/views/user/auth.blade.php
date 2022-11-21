@extends('welcome')
@section('title', 'Авторизация')
@section('content')

    @error('error')
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong>Внимание!</strong> {{$message}}
    </div>
    @enderror

    <form action="/auth" method="POST" class="w-25 mx-auto mt-5">
        @csrf
        <h4>Авторизация</h4>
        <div class="form-group">
            <input type="text" class="form-control mt-2" id="InputLogin" name="login" placeholder="Логин">
        </div>
        <div class="form-group">
            <input type="password" class="form-control mt-2" id="InputPassword" name="password" placeholder="Пароль">
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-primary mt-2" type="submit">Войти</button>
        </div>
    </form>
@endsection
