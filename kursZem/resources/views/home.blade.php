@extends('layout')
@section('title')
    Главная страница
@endsection
@section('main_content')
    @auth('web')
    <div class="columns is-desktop">
        <div class="column is-desktop has-text-centered">
            <p class="m-auto"><h1 class="title is-1">Удачной тренировки!</h1></p>
            <div class="columns is-desktop is-vcentered">
                <div class="column is-three-quarters-desktop">
                    <div class="block has-text-left">
                        <h3 class="title is-3 has-text-info"> Ваши тренировки: </h3>
                    </div>
                    <div class="block">
                        <table class="table">
                            <tbody>
                            @foreach($workoutlist as $el)
                                <tr>
                                    <td class="has-text-left">{{$el->name}}</td>
                                    <td>Создана {{$el->creationDate}}</td>
                                    <td>
                                        <a class="button is-success is-active" href="{{route('workout',$el->id)}}">Погнали тренить!</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="column is-desktop">
                    <div class="block">
                        <form action="{{route('workoutadd')}}">
                            <button class="button is-success is-active">Добавить тренировку</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth

    @guest('web')
        <div class="columns is-desktop">
            <div class="column is-desktop ">
                <p class="m-auto has-text-centered"><h1 class="title is-1">Приветствую на моём портале составления тренировок!</h1></p>
                <div class="block">
                    <p><h3 class="title is-3">Для составления тренировки авторизуйся, пожалуйста, в системе</h3></p>
                </div>
            </div>
        </div>
    @endguest
@endsection
