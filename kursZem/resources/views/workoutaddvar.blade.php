@extends('layout')
@section('title')
    Добавляем упражнение
@endsection
@section('main_content')
    <div class="columns is-desktop">
        <div class="column is-desktop has-text-centered is-full is-vcentered">
            <div class="block">
                <h3 class="title is-3">Список упражнений</h3>
            </div>
            <div class="block is-centered">
                <form method="POST" action="{{route('woAddVars', $woid)}}">
                    @csrf
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <div class="select">
                                    <select name="name">
                                        @foreach($movelist as $el)
                                            <option>{{$el->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="number" name="sets">
                            </td>
                            <td>
                                <input type="number" name="reps">
                            </td>
                            <td>
                                <button type="submit" class="button is-success is-active">Добавить</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>

            </div>

        </div>
    </div>

@endsection

