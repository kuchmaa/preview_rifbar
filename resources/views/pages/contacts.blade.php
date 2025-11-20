@extends('layouts.app')

@section('meta_title', 'Contact Duma Shipping | NYC Freight & Delivery Services | Get a Quote')
@section('meta_description', 'Contact Duma Shipping for reliable NYC freight services. Get shipping quotes, track packages, or speak with our logistics team. Serving New York to Florida with door-to-door delivery.')

@section('content')
<section id="contactsUs" class="hero wrapper section-content flex-center">
	<img loading="lazy" src="/imgs/laptop-box.webp" alt="The boxes on the laptop" class="hero_section_img">
	{{--
		<div id="contactsUsInfo" class="flex row color-blue aie">
			<div class="flex col color-blue ais">
				<a href="mailto:info@dumashipping.com" class="span_svg flex aic row">
					<div class="icon flex-center">
						<svg width="36" height="30" viewBox="0 0 36 30" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M35.8569 0.714294H0.142578V29.2857H35.8569V0.714294ZM32.2854 7.85715L17.9997 16.7857L3.71401 7.85715V4.28572L17.9997 13.2143L32.2854 4.28572V7.85715Z" fill="#304FFF" />
						</svg>
					</div>
					<span>info@dumashipping.com</span>
				</a>
				<!-- <div class="span_svg flex row aic">
					<div class="icon flex-center">
						<svg width="22" height="34" viewBox="0 0 22 34" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M10.9994 33.0714C10.9994 33.0714 21.7137 18.3162 21.7137 12.1299C21.7137 5.94355 16.9168 0.928558 10.9994 0.928558C5.08211 0.928558 0.285156 5.94355 0.285156 12.1299C0.285156 18.3162 10.9994 33.0714 10.9994 33.0714ZM10.9994 16.513C13.1863 16.513 14.9591 14.6596 14.9591 12.3734C14.9591 10.0871 13.1863 8.23375 10.9994 8.23375C8.8126 8.23375 7.03981 10.0871 7.03981 12.3734C7.03981 14.6596 8.8126 16.513 10.9994 16.513Z" fill="#304FFF" />
						</svg>
					</div>
					<span>2824 86 Street, Brooklyn,<br>NY 11223</span>
				</div> -->
				<div class="span_svg flex row aic">
					<div class="icon flex-center">
						<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M42.8571 39.1429V33.7857C42.8788 32.91 42.8569 32.1428 42.8569 32.1428L32.1426 28.5714C32.1426 28.5714 31.4854 29.2342 30.9999 29.7143L28.7321 31.9822C24.2615 29.4401 20.5599 25.7385 18.0178 21.2679L20.2856 19C20.7658 18.5145 21.4283 17.8571 21.4283 17.8571L17.8569 7.14278C17.8569 7.14278 17.1344 7.13436 16.2678 7.14289H10.9106H7.14258L7.35707 11.0357C7.94322 16.5554 9.82132 21.8593 12.8392 26.5179C15.5809 30.8325 19.2389 34.4905 23.5535 37.2322C28.191 40.2396 33.4693 42.1172 38.9642 42.7143L42.8569 42.8571L42.8571 39.1429Z" fill="#304FFF" />
						</svg>
					</div>
					<h2 id="contactUsPhone"><strong>+1 (631) 431-4242</strong></h2>
				</div>

			</div>
			<div class="flex row social-links-wrapper">
				<a target="_black" class="social-oval" href="https://www.facebook.com/share/1LGLtdT4Pp/">
					<svg viewBox="0 0 24 24" fill="black" xmlns="http://www.w3.org/2000/svg">
						<path xmlns="http://www.w3.org/2000/svg" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
					</svg>
				</a>
			</div>
		</div>
		--}}

</section>
<section id="formSection" class="wrapper flex-center">
	<div id="formWrapper" class="section-content flex-center">
		<form id="form" class="flex col" method="POST" action="{{ route('contact.store') }}">
			<div>
				<h1 class="tai_c">Contact Us</h1>
				<p class="tai_c">Have questions or ready to ship? Reach out to Duma Shipping today for fast, reliable NYC logistics solutions!</p>
			</div>
			@if(session('message'))
			<div id="successMessage" class="success-message">
				<div class="success-content">
					<h3>Thank you for contacting us!</h3>
					<p>Your request has been successfully sent. We will contact you soon.</p>
					<button class="btn_blue flex-center close-success-message">Close</button>
				</div>
			</div>
			@endif
			@csrf
			<div id="name" class="text-input flex col">
				<span>Name</span>
				<div class="inputWrapper flex row aic">
					<span class="placeholder flex-center" hidden>Name</span>
					<input type="text" name="name" id="" placeholder="type your name..." required minlength="1" maxlength="255">
				</div>
				<span class="error-message"></span>
			</div>
			<div id="phone" class="text-input flex col">
				<span>Phone<strong class="light-orange">*</strong></span>
				<div class="text-input-select flex row">
					<span id="phoneCode">+1</span>
					<input type="phone" name="phone" required placeholder="555 444 6666" minlength="6" maxlength="10">
				</div>
			</div>
			<div id="emailInputWrapper" class="text-input flex col">
				<span>Email<strong class="light-orange">*</strong></span>
				<div class="inputWrapper flex row aic">
					<span class="placeholder flex-center" hidden>Email</span>
					<input type="email" name="email" required placeholder="type your Email..." minlength="5" maxlength="255">
				</div>
				<span class="error-message"></span>
			</div>
			<div class="flex col">
				<span>Reason for Contact</span>
				<div id="notifyType" class="flex row">
					<div class="notifyType-item notifyType-item_blue" id="question">
						<input type="checkbox" name="reasons[0][name]" value="Delivery question" style="display: none;">
						<span class="size_sl">Delivery question</span>
					</div>
					<div class="notifyType-item notifyType-item_blue" id="problem">
						<input type="checkbox" name="reasons[1][name]" value="Order problem" style="display: none;">
						<span class="size_sl">Order problem</span>
					</div>
				</div>
				<span class="error-message" id="reasonsError"></span>
			</div>
			<textarea id="messageTextArea" name="message" placeholder="Write your message..."></textarea>
			<button class="btn_blue flex-center" type="submit">
				Submit
				<svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.5 7L20.5 14L16.5 21H14.5L18.5 14L14.5 7L16.5 7Z" />
					<path d="M18.6424 15.0002L8.5 15.0003L8.5003 13.0002L18.6427 13.0001L18.6424 15.0002Z" />
				</svg>
			</button>
		</form>
	</div>
</section>
<x-geography
	title="Geography"
	desc="Our operations cover delivery and moving across"
	:tags="['New York', 'New Jersey', 'Pennsylvania', 'Delaware', 'Maryland', 'District of Columbia', 'Virginia', 'North Carolina', 'South Carolina', 'Georgia', 'Florida']"
	footer="ensuring every package is delivered with care"
	linkText="Learn More"
	/>
<section class="section_call flex-center">
	<div class="section-content wrapper">
		<div class="flex col aic">
			<div class="flex col aic tai_c">
				<p>Start your seamless shipping journey with Duma Shipping today</p>
				<h2>
					— because your logistics needs <br>
					to deserve <strong>the best</strong>
				</h2>
			</div>
			<div class="flex row aic">
				<a href="/calculator">
					<button class="btn_white">
						Сalculate shipping cost
						<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
						</svg>
					</button>
				</a>
				<a href="/contacts">
					<button class="flex-center btn_blue">
						<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
						</svg>

						Contact Us
					</button>
				</a>
			</div>
		</div>
	</div>
</section>
<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>

@endsection

@push('styles')
<!-- Стили, специфичные только для этой страницы -->
<link rel="stylesheet" href="{{ asset('css/contacts.css') }}">

<link rel="stylesheet" href="{{ asset('css/components/geography.css') }}">
<style>
	.success-message {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.5);
		display: flex;
		justify-content: center;
		align-items: center;
		z-index: 1000;
	}

	.success-content {
		background-color: white;
		padding: 2rem;
		border-radius: 8px;
		max-width: 500px;
		text-align: center;
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
	}

	.success-content h3 {
		color: #304FFF;
		margin-bottom: 1rem;
	}
</style>
@endpush

@push('scripts')
<!-- Скрипты, специфичные только для этой страницы -->
@vite(['resources/js/pages/contacts.js'])
@endpush
