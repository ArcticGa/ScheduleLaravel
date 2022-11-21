@extends('welcome')
@section('title', 'Информация')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="mt-5 card text-center">
                    <div class="card-header">
                        <p>Кабинеты</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Удаление</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($cabinets as $cabinet)
                                <tr>
                                    <th scope="row">{{ $cabinet->id }}</th>
                                    <td>
                                        <form action="/infoPost" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$cabinet->id}}">
                                            <input name="cabinet_name" onchange="this.form.submit()" class="w-25 text-center" type="text" value="{{ $cabinet -> name }}">
                                        </form>
                                    </td>
                                    <td><a href="/deleteCabinet{{ $cabinet->id }}">Удалить</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="mt-5 card text-center">
                    <div class="card-header">
                        <p>Преподаватели</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Удаление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <th scope="row">{{ $teacher->id }}</th>
                                    <td>
                                        <form action="/infoPost" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$teacher->id}}">
                                            <input name="user_name" onchange="this.form.submit()" class="w-75 text-center" type="text" value="{{ $teacher -> name }}">
                                        </form>
                                    </td>
                                    <td><a href="/deleteUser{{$teacher->id}}">Удалить</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="mt-5 card text-center">
                    <div class="card-header">
                        <p>Студенты</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Удаление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{ $student->id }}</th>
                                    <td>
                                        <form action="/infoPost" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$student->id}}">
                                            <input name="user_name" onchange="this.form.submit()" class="w-75 text-center" type="text" value="{{ $student -> name }}">
                                        </form>
                                    </td>
                                    <td><a href="/deleteUser{{$student->id}}">Удалить</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="mt-5 card text-center">
                    <div class="card-header">
                        <p>Предметы</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название предмета</th>
                                <th scope="col">Удаление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <th scope="row">{{ $subject->id }}</th>
                                    <td>
                                        <form action="/infoPost" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$subject->id}}">
                                            <input name="subject_name" onchange="this.form.submit()" class="w-75 text-center" type="text" value="{{ $subject -> name }}">
                                        </form>
                                    </td>
                                    <td><a href="/deleteSubject{{$subject->id}}">Удалить</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="mt-5 card text-center">
                    <div class="card-header">
                        <p>Группы</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название группы</th>
                                <th scope="col">Удаление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <th scope="row">{{ $group->id }}</th>
                                    <td>
                                        <form action="/infoPost" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$group->id}}">
                                            <input name="group_name" onchange="this.form.submit()" class="w-75 text-center" type="text" value="{{ $group -> name }}">
                                        </form>
                                    </td>
                                    <td><a href="/deleteGroup{{$group->id}}">Удалить</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
