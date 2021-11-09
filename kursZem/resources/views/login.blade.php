@extends('layout')
@section('title')
   Авторизация
@endsection
@section('main_content')
    <div class="box is-vcentered">
        <div class="">
            <h1 class="title is-3">Вход</h1>

            <form method="POST" action="{{route('login_proc')}}" class="">
                @csrf
                <div clas="block is-align-content-center">
                    <input name="email" type="text"  class="input is-input @error('email') is-danger @enderror" placeholder="Email" />
                    @error('email')
                    <p class="has-text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="block">
                    <input name="password" type="password" class="input is-input @error('password') is-danger @enderror" placeholder="Пароль" />
                    @error('password')
                    <p class="has-text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <a href="{{route("reg")}}" class="has-text-link">Регистрация</a>
                </div>

                <button type="submit" class="button is-success">Войти</button>
            </form>
        </div>
    </div>

@endsection
