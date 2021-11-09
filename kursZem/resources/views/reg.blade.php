@extends('layout')
@section('title')
    Регистрация
@endsection
@section('main_content')
    <div class="box is-vcentered">
        <h1 class="title is-3">Регистрация</h1>

        <form action="{{route("register_proc")}}"  class="" method="POST">
            @csrf
            <div clas="block">
                <input name="name" type="text" class="input is-input @error('email') is-danger @enderror" placeholder="Имя" />
                @error('name')
                <p class="has-text-danger">{{$message}}</p>
                @enderror
            </div>
            <div clas="block">
                <input name="email" type="text" class="input is-input @error('email') is-danger @enderror" placeholder="Email" />
                @error('email')
                <p class="has-text-danger">{{$message}}</p>
                @enderror
            </div>
            <div clas="block">
                <input name="passw" type="password" class="input is-input @error('passw') is-danger @enderror" placeholder="Пароль" />
                @error('passw')
                <p class="has-text-danger">{{$message}}</p>
                @enderror
            </div>
            <div clas="block">
                <input name="passw_confirmation" type="password" class="input is-input @error('passw_confirmation') is-danger @enderror" placeholder="Подтверждение пароля" />
                @error('passw_confirmation')
                <p class="has-text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="block">
                <a href="{{route('login')}}" class="has-text-link">Уже есть аккаунт?</a>
            </div>

            <button type="submit" class="button is-success">Зарегистрироваться</button>
        </form>
    </div>
@endsection
