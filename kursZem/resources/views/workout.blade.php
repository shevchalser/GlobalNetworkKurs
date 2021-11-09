@extends('layout')
@section('title')
    Тренировка
@endsection
@section('main_content')
    <div class="columns is-desktop">
        <div class="column is-desktop has-text-centered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Название упражнения</th>
                        <th>Подходов</th>
                        <th>Повторений</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wdt as $el)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td>{{$el->sets}}</td>
                            <td>{{$el->reps}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="block">
        <a class="button is-success is-active" href="{{route('home')}}">На главную</a>
    </div>

@endsection
