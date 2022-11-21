@extends('welcome')
@section('title', 'Админка')
@section('content')

    <div class="container">
        @if (!Auth::guest() && Auth::user()->role_id == 1)

                <div class="navbar navbar-expand-lg container-lg justify-content-center my-4">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item fw-bold mx-2">
                            <a class="btn btn-primary" style="width: 300px;" href="{{ route('adminInfo') }}">Информация</a>
                        </li>
                    </ul>
                </div>
        @endif
        <div class="row">
            <div class="col-4">

                <div class="card text-center">
                    <div class="card-header">
                        <p>Добавление пользователя</p>
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul class="p-0">
                                    @foreach($errors->all() as $error)
                                        <li class="nav-link text-danger">{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <form action="/addUser" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputState">ФИО</label>
                                    <div class="justify-content-end">
                                        <input type="text" class="form-control" name="name" placeholder="Введите ФИО">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputState">Логин</label>
                                    <div class="justify-content-end">
                                        <input type="text" class="form-control" name="login" placeholder="Введите логин">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputState">Пароль</label>
                                    <div class="justify-content-end">
                                        <input type="password" class="form-control" name="password" placeholder="Введите пароль">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputState">Роль</label>
                                    <div class="justify-content-end">
                                        <select name="role_id" id="inputState" class="form-control">

                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                            <div class="form-row">
                                <div class="mt-5">Только для студента (может быть пустым)</div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputState">Группа</label>
                                    <div class="justify-content-end">
                                        <select name="group_id" id="inputState" class="form-control">
                                            <option>-</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-center">
                    <div class="card-header">
                        <p>Добавление предмета</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <form action="/addSubject" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputState">Название предмета</label>
                                    <div class="justify-content-end">
                                        <input type="text" class="form-control" name="name" placeholder="Название предмета">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-center">
                    <div class="card-header">
                        <p>Добавление кабинета</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <form action="/addCabinet" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputState">Кабинет</label>
                                    <div class="justify-content-end">
                                        <input type="text" class="form-control" name="name" placeholder="Имя кабинета">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="mt-5 card text-center">
                    <div class="card-header">
                        <p>Добавление группы</p>
                    </div>
                    <div class="card-body">
                        @error('err')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <p class="card-text">
                        <form action="/addGroup" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputState">Группа</label>
                                    <div class="justify-content-end">
                                        <input type="text" class="form-control" name="name" placeholder="Имя группы">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
