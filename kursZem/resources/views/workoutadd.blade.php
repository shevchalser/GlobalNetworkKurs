@extends('layout')
@section('title')
    Добавление новой тренировки
@endsection
@section('main_content')
    <div class="columns is-desktop has-text-centered">
        <div class="column is-desktop is-vcentered">
            <div class="field">
                <label class="label">Название тренировки</label>
                <form method="POST" action="{{route('workoutadd_proc', $wo->id)}}">
                    <div class="control">
                        @csrf
                        <input name="woname" class="input" type="text" placeholder="Text input">
                    </div>
                    <button type="submit" class="button is-success is-active">Изменить название</button>
                </form>
            </div>

<!--
            <div class="columns is-desktop">
                <div class="column is-desktop">
                    <div class="block">
                        Тренировочка будет выглядеть вот так:
                    </div>
                    <table class="table">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                    </table>
                </div>
                <div class="column is-desktop">

                </div>
            </div>
-->
        </div>
    </div>
@endsection
