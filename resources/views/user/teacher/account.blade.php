@extends('welcome')
@section('title', 'Панель управления')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mt-5 card text-center">
                    <div class="card-header">
                        <p>Создание расписания</p>
                        @error('err')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <form action="/createSchedule/@if($groupa){{$groupa->id}}@else 0 @endif" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputDate">Дата</label>
                                    <label for="inputDate"></label>
                                    <div class="justify-content-end">
                                        <input type="date" id="start" name="date" class="form-control"
                                               value="{{ \Carbon\Carbon::now()->toDateString() }}"
                                               min="{{ \Carbon\Carbon::now()->toDateString() }}" max="{{ \Carbon\Carbon::now()->addDays(14) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                    <label for="inputState">Группа</label>
                                    <div class="justify-content-end">
                                        @if($groupa)
                                            <select name="group_id" id="inputState" disabled class="form-control">
                                                <option value="{{$groupa -> id}}">{{$groupa->name}}</option>
                                            </select>
                                        @else
                                            <select name="group_id" id="inputState" class="form-control">
                                                @foreach($groups as $group)
                                                    <option value="{{$group -> id}}">{{$group->name}}</option>
                                                @endforeach
                                            </select>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            @for ($i = 0; $i < 7; $i++)
                                <div class="form-row">
                                    <div class="form-group d-flex align-items-center justify-content-between mt-3">
                                        <input type="text" class="text-center" style="width: 5%;" value="{{$i + 1}}" disabled>
                                        <div class="justify-content-end">
                                            <select name="subject_id_{{$i}}" id="inputState" class="form-control">
                                                <option value="">-</option>
                                                @foreach($subjects as $subject)
                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="inputState">Преподаватель</label>
                                        <div class="justify-content-end">
                                            <select name="user_id_{{$i}}" id="inputState" class="form-control">
                                                <option value="">-</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for="inputState">Кабинет</label>
                                        <div class="justify-content-end">
                                            <select name="cabinet_id_{{$i}}" id="inputState" class="form-control">
                                                <option value="">-</option>
                                                @foreach($cabinets as $cabinet)
                                                    <option value="{{$cabinet->id}}">{{$cabinet->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
