@extends('welcome')
@section('title', 'Список преподов')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Преподаватели</h3>
            <div class="col-12 d-flex flex-column align-items-center">
                @foreach($teachers as $teacher)
                    <div class="p-3 my-3 shadow rounded fs-3">{{$teacher -> name}}</div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
