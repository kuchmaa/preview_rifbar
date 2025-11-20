@extends('layouts.app')

@section('content')
<section class="wrapper hero flex-center">
	<img src="/imgs/laptop-box.webp" alt="Register" class="hero_section_img">
	<div id="formWrapper" class="section-content flex-center col">
		<div class='flex col'>
			<fieldset class='flex col aic'>
				<legend>
					<h3><strong>Log In</strong></h3>
				</legend>
			</fieldset>
			<span class="tai_c">to your account on Duma Shipping</span>
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

		{{-- Сообщения об ошибках --}}
		@if(session('error'))
			<div class="alert alert-error" style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
				<strong>Ошибка:</strong> {{ session('error') }}
			</div>
		@endif

		@if(session('success'))
			<div class="alert alert-success" style="background: #efe; border: 1px solid #cfc; color: #3c3; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
				{{ session('success') }}
			</div>
		@endif

		{{-- Форма логина --}}
		<form id="form" class="flex col" method="POST" action="{{ route('login') }}">
			@csrf

			<div id="email" class="text-input flex col">
				<span>Email<strong>*</strong></span>
				<div class="inputWrapper flex row aic">
					<span class="placeholder flex-center" hidden>Email</span>
					<input type="text" name="email" required placeholder="type your Email...">
				</div>
				<span class="error-message"></span>
			</div>

			<div id="pass" class="text-input text-input_password flex col">
				<span>Password<strong class="light-orange">*</strong></span>
				<div class="inputWrapper flex row aic">
					<div class='flex row'>
						<input type="password" name="password" required placeholder="Type your password...">
						<span class="placeholder flex-center" hidden></span>
					</div>
					<div class="showPass"></div>
				</div>
				<span class="error-message"></span>
			</div>
			<span id='error' class="error-message" style="font-size: 18px;"></span>
			<div id="remember" class="flex row aic">
				<div class="flex row aic">
					<input type="checkbox" name="remember">
					<span>Remember me</span>
				</div>
				<strong>
					<a class="color-blue uppercase underline size_ml"
						href="{{ route('password.request') }}">
						Forgot password
					</a>
				</strong>
			</div>

			<button id="submit" class="btn_blue flex-center uppercase">
				log in
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
				<span>Don’t have an account?</span>
				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16 7L20 14L16 21H14L18 14L14 7L16 7Z" fill="black" />
					<path d="M18.1424 15.0002L8 15.0003L8.0003 13.0002L18.1427 13.0001L18.1424 15.0002Z" fill="black" />
				</svg>
				<a href="{{ route('register') }}" class="color-blue uppercase underline">
					<strong>Sign up</strong>
				</a>
			</div>
		</form>
	</div>
</section>
<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/oauth.css') }}">
@endpush

@push('scripts')
@vite(['resources/js/pages/login.js'])
@endpush
