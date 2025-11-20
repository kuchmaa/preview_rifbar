@extends('layouts.app')

@section('content')
    <h2>Сброс пароля</h2>
    @if (session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <label for="email">Email:</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
      @error('email') <div class="text-danger">{{ $message }}</div> @enderror

      <button type="submit">Отправить ссылку для сброса</button>
    </form>
@endsection