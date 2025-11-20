@extends('layouts.app')

@section('content')
<section class="wrapper hero flex-center">
	<img src="/imgs/laptop-box.webp" alt="Register" class="hero_section_img">
	<div id="formWrapper" class="section-content flex-center col">
		<div class='flex col'>
			<fieldset class='flex col aic'>
				<legend>
					<h3><strong>Sign Up</strong></h3>
				</legend>
			</fieldset>
			<span class="tai_c">
				Start your seamless shipping journey with your account on Duma Shipping
			</span>
            {{-- Google OAuth Button --}}
			<div id="authBtns" class="flex row w-full">
			    <a href="{{ route('auth.google') }}" class="button w-full flex-center">
    				<i class="google_icon"> </i>
    				Continue with Google
    			</a>
			</div>

			<fieldset class='flex col aic'>
				<legend><span>or better yet...</span></legend>
			</fieldset>
		</div>

		{{-- Форма регистрации --}}
		<form id="form" class="flex col" method="POST" action="{{ route('register') }}">
			@csrf

			{{-- Name --}}
			<div id="name" class="text-input flex col">
				<span>Name<strong class="light-orange">*</strong></span>
				<div class="inputWrapper flex row aic">
					<span class="placeholder flex-center" hidden>Name</span>
					<input type="text" name="name" required placeholder="Type your name..." value="{{ old('name') }}">
				</div>
				<span class="error-message" style="color: red;"></span>
				{{-- Если хотите выводить ошибки Laravel, раскомментируйте:
                @error('name')
                    <span class="error-message" style="color:red;">{{ $message }}</span>
				@enderror
				--}}
			</div>

			{{-- Phone --}}
			<div id="phone" class="text-input flex col">
				<span>Phone<strong>*</strong></span>
				<div class="text-input-select flex row">
					<span id="phoneCode">+1</span>
					<input type="phone" maxlength="10" name="phone" required placeholder="555 444 6666" value="{{ old('phone') }}">
				</div>
				<span class="error-message" style="color: red;"></span>
				{{-- Если хотите выводить ошибки Laravel, раскомментируйте:
                @error('phone')
                    <span class="error-message" style="color:red;">{{ $message }}</span>
				@enderror
				--}}
			</div>

            {{-- Email --}}
			<div id="email" class="text-input flex col">
				<span>Email<strong>*</strong></span>
				<div class="inputWrapper flex row aic">
					<span class="placeholder flex-center" hidden>Email</span>
					<input type="email" name="email" required placeholder="Type your email..." value="{{ old('email') }}">
				</div>
				<span class="error-message" style="color: red;"></span>
				{{-- Если хотите выводить ошибки Laravel, раскомментируйте:
                @error('email')
                    <span class="error-message" style="color:red;">{{ $message }}</span>
				@enderror
				--}}
			</div>

			{{-- Password --}}
			<div id="pass" class="text-input text-input_password flex col">
				<span>Password<strong class="light-orange">*</strong></span>
				<div class="inputWrapper flex row aic">
					<div class='flex row'>
						<input type="password" name="password" required autocomplete="new-password" placeholder="Type your password...">
						<span class="placeholder flex-center" hidden></span>
					</div>
					<div class="showPass"></div>
				</div>
				<span class="error-message" style="color: red;"></span>
				{{-- Если хотите выводить ошибки Laravel, раскомментируйте:
                @error('password')
                    <span class="error-message" style="color:red;">{{ $message }}</span>
				@enderror
				--}}
			</div>

			{{-- Confirm Password --}}
			<div id="varyfPass" class="text-input text-input_password flex col">
				<span>Confirm password<strong class="light-orange">*</strong></span>
				<div class="inputWrapper flex row aic">
					<div class='flex row passInput'>
						{{-- Важно: name="password_confirmation" для правил валидации confirmed --}}
						<input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Your password one more time...">
						<span class="placeholder flex-center" hidden></span>
					</div>
					<div class="showPass"></div>
				</div>
				<span id="error" class="error-message" style="color: red;"></span>
				{{-- Если хотите выводить ошибки Laravel, раскомментируйте:
                @error('password_confirmation')
                    <span class="error-message" style="color:red;">{{ $message }}</span>
				@enderror
				--}}
			</div>
			<span class="error-message" style="font-size: 18px;" id="error"></span>

			<button id="submit" class="btn_blue flex-center uppercase">
				Sign up
				<svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.5 7L20.5 14L16.5 21H14.5L18.5 14L14.5 7L16.5 7Z" />
					<path d="M18.6424 15.0002L8.5 15.0003L8.5003 13.0002L18.6427 13.0001L18.6424 15.0002Z" />
				</svg>
			</button>

			{{-- Divider --}}
			<div class="oauth-divider">
				<span>or</span>
			</div>

			<div class="flex row aic">
				<span>Already have an account?</span>
				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16 7L20 14L16 21H14L18 14L14 7L16 7Z" fill="black" />
					<path d="M18.1424 15.0002L8 15.0003L8.0003 13.0002L18.1427 13.0001L18.1424 15.0002Z" fill="black" />
				</svg>
				<a href="{{ route('login') }}" class="color-blue uppercase underline"><strong>Log in</strong></a>
			</div>
		</form>
	</div>
</section>
<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/signUp.css') }}">
<link rel="stylesheet" href="{{ asset('css/oauth.css') }}">
@endpush

@push('scripts')
{{-- Подключаем ваш signUp.js, который отправляет fetch на /register --}}
@vite(['resources/js/pages/signUp.js'])

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const emailFromQuery = urlParams.get('email');
        if (emailFromQuery) {
            const emailInput = document.querySelector('input[name="email"]');
            if (emailInput) {
                emailInput.value = emailFromQuery;
            }
        }
    });
</script>
@endpush
