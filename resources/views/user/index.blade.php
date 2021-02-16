@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Пользователи</h1>
    <table class="table mt-2">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Создан</th>
            @auth
                <th>Действия</th>
            @endauth
        </tr>
        </thead>

        @if($users->isNotEmpty())
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        @auth
                            <a href="{{route('users.show', $user)}}">
                                {{$user->name}}
                            </a>
                        @endauth
                        @guest
                            {{$user->name}}
                        @endguest
                    </td>
                    <td>{{$user->created_at->format('d.m.Y')}}</td>
                    @auth
                        <td>
                            <a href="{{route('users.edit', $user)}}">
                                Изменить
                            </a>
                        </td>
                    @endauth
                </tr>
            @endforeach
        @endif
    </table>
@endsection
