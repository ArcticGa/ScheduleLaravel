@extends('welcome')
@section('title', 'Расписание занятий')
@section('content')

    <?php
        function preg($string) {
            $filteredNumbers = array_filter(preg_split("/\D+/", $string));
            $firstOccurence = reset($filteredNumbers);
            $number = $firstOccurence[0];
            return $number;
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(!\Illuminate\Support\Facades\Auth::guest() && \Illuminate\Support\Facades\Auth::user()->role_id == 3)
                    <div class="my-5 text-center">
                        <a class="mx-auto nav-link btn-primary w-25 text-light rounded" href="/main/{{$date}}/{{\Illuminate\Support\Facades\Auth::user()->group_id}}">Мое расписание</a>
                    </div>
                @endif
                <div class="form-row">
                    <form method="post" action="/main">
                        @csrf
                        <div class="text-center form-group  mt-3">
                            <label for="inputDate" class="fs-4 mb-2">Дата</label>
                            <div class="justify-content-end">
                                <input type="hidden" name="group_id" value="{{$group_id}}">
                                <input type="date" id="start" onchange="this.form.submit()" name="date" class="form-control text-center"
                                       value="{{ $date }}"
                                       min="{{ \Carbon\Carbon::now()->toDateString() }}" max="{{ \Carbon\Carbon::now()->addDays(14) }}">
                            </div>
                        </div>
                    </form>
                </div>

                @for($i = 1; $i < 5; $i++)
                    <h3 class="mt-5 mx-4">{{$i}} курс</h3>
                    <div class="text-center d-flex flex-wrap">
                        @foreach($groups as $group)
                            @if(preg($group->name) == $i)
                                <table class="table table-bordered w-25 m-4">
                                    <thead>

                                    <tr class="position-relative">
                                        <th colspan="4">{{$group -> name}}</th>
                                        @if(!Auth::guest() && Auth::user()->role_id != 3)
                                            <th class="del table-borderless border-0"><a href="/deleteLessons/{{$date}}/{{$group->id}}">Удалить</a></th>
                                            <th class="upd table-borderless border-0"><a href="/updLessons/{{$group -> id}}">Изменить</a></th>
                                        @endif
                                    </tr>

                                    </thead>
                                    <tbody>
                                        @foreach($lessons as $lesson)
                                            @if ($group->name == $lesson -> groupName())
                                                @if($lesson -> date  == $date)
                                                    <tr>
                                                        <th scope="row">{{$lesson -> number_id}}</th>
                                                        <td>
                                                            <div>{{$lesson -> subjectName()}}</div>
                                                            <div style="font-size: .8rem; color: #444" class="mt-1">{{$lesson -> teacherName()}}</div>
                                                        </td>
                                                        <td>{{$lesson -> cabinetName()}}</td>
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @endforeach
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
