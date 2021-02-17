@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Страница пользователя: {{ $user->id }}
        <a href="{{route('users.edit', $user)}}">&#9881;</a>
    </h1>
    @isset($user->avatar_path)
        <p><img src="{{asset('/storage/' . $user->avatar_path)}}" width="100" height="100"  alt="{{$user->name}}"></p>
    @endisset
    <p>Имя: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Регион: {{ $user->region->name }}</p>
    <a href="{{route('users.edit', $user)}}">Изменить данные пользователя</a>
@endsection
