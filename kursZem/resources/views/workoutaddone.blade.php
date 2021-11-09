@extends('layout')
@section('title')
    Справонька
@endsection
@section('main_content')
    <div class="columns is-desktop has-text-centered">
        <div class="column is-desktop is-vcentered">
            <div class="box">
                <h3 class="title is-3">{{$wo->name}}</h3>
            </div>
            <div class="box is-vcentered">
                <div class="block">
                    Тренировочка будет выглядеть вот так:
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Название упражнения</th>
                            <th>Подходы</th>
                            <th>Повторения</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wd as $e)
                       <tr>
                           <td>{{$e->name}}</td>
                           <td>{{$e->sets}}</td>
                           <td>{{$e->reps}}</td>
                       </tr>
                    @endforeach
                    <tr>
                        <a class="button is-success is-active" href="{{route('workoutaddvar',$wo->id)}}">Добавить упражнение</a>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>


@endsection

