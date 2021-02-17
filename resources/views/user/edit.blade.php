@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Изменение данных пользователя: {{ $user->id }}</h1>
    {{ Form::model($user, ['method' => 'PATCH', 'url' => route('users.update', $user), 'class' => 'w-50', 'files' => true]) }}
    <div class="form-group">
        {{ Form::label('name', 'Имя') }}
        {{ Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Электронная почта') }}
        {{ Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email']) }}
    </div>
    <div class="form-group">
        {{ Form::label('region_id', 'Регион') }}
        {{ Form::select('region_id', $regions, old('region_id'),
            ['class' => 'form-control', 'id' => 'region_id', 'placeholder' => '----------']) }}
    </div>
    <div class="form-group">
        {{ Form::label('image', 'Фото') }}
        {{ Form::file('image', ['class' => ['form-control'], 'id' => 'image']) }}
    </div>
    {{ Form::submit('Обновить', ['class' => ['btn', 'btn-primary']]) }}
    {{ Form::close() }}

@endsection


<form method="POST" action="{{ route('register') }}">
    {{--@csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email"
               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password"
               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror" name="password"
                   required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm"
               class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control"
                   name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row">
        <label for="region_id"
               class="col-md-4 col-form-label text-md-right">{{ __('Regions') }}</label>

        <div class="col-md-6">
            <select id="region_id" name="region_id" class="form-control"
                    value="{{ old('region_id') }}" required>
                @if($regions->isNotEmpty())
                    <option disabled>Выберите регион</option>
                    @foreach($regions as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                    @endforeach
                @endif
            </select>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
--}}
