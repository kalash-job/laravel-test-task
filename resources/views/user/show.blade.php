@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Страница пользователя: {{ $user->id }}
        <a href="{{route('users.edit', $user)}}">&#9881;</a>
    </h1>
    @if(isset($user->avatar_path))
        <p><img src="{{$user->avatar_path}}" width="50" height="50" alt="{{$user->name}}"></p>
    @endif
    <p>Имя: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Регион: {{ $user->region->name }}</p>
@endsection
