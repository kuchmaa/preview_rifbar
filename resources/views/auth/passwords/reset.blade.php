@extends('layouts.app')

@section('content')
    <h2>Новый пароль</h2>
    <form method="POST" action="{{ route('password.update') }}">
      @csrf

      <input type="hidden" name="token" value="{{ $token }}">

      <label for="email">Email:</label>
      <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required>
      @error('email') <div class="text-danger">{{ $message }}</div> @enderror

      <label for="password">Пароль:</label>
      <input id="password" type="password" name="password" required>
      @error('password') <div class="text-danger">{{ $message }}</div> @enderror

      <label for="password_confirmation">Повтор пароля:</label>
      <input id="password_confirmation" type="password" name="password_confirmation" required>

      <button type="submit">Сбросить пароль</button>
    </form>
@endsection