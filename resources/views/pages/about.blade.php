@extends('layouts.app')

@section('meta_title', 'About Duma Shipping | NYC\'s Trusted Freight & Logistics Provider')
@section('meta_description', 'Learn about Duma Shipping\'s commitment to reliable freight services across the East Coast. With 10+ years of experience, we provide dependable NYC-based shipping solutions.')


@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
<link rel="stylesheet" href="{{asset('css/media/about/laptop.css')}}" media="(max-width:1200px)">
<link rel="stylesheet" href="{{asset('css/media/about/tablet.css')}}" media="(max-width:860px)">
@endpush

@section('content')
<section id="hero1" class="wrapper hero flex-center">
	<img loading="lazy" src="/imgs/02.webp" alt="Transfer of parcel with completion of delivery label - logistics, courier service, dispatch of goods" class="hero_section_img">
	<div class="flex hero-content col aic">
		<div class="flex hero-text col">
			<h1 class="color-blue flex col">
				About Duma Shipping
			</h1>
			<span>
				More Than Just a Logistics Provider
			</span>

		</div>
		<!-- <div id="scroll">
			<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M21 16L14 20L7 16L7 14L14 18L21 14V16Z" fill="black" />
				<path d="M12.9998 18.1424L12.9997 8L14.9998 8.0003L14.9999 18.1427L12.9998 18.1424Z" fill="black" />
			</svg>
		</div> -->
	</div>
</section>
<section id="checkOut" class="wrapper section-content">
	<span class="section-border section-border_top_l"></span>
	<div class="flex col aic tai_c">
		<h2 class="txt-block">Duma Shipping <br> operates as</h2>
		<p class="txt-block">
			a premier logistics provider delivering specialized shipping solutions <br> throughout the Eastern United States
		</p>
	</div>
	<span class="section-border section-border_bottom_r"></span>
</section>

<section id="geography1" class="wrapper flex-center aic section-content">
	<div class="flex-center row tai-c">
		<img loading="lazy" src="/imgs/duma_on_map.webp" id="dumaOnMap" alt="">
		<div class="section-text flex col">
			<div class="section-h flex col">
				<div class="service-card flex row aic">
					<svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect y="0.5" width="60" height="60" rx="30" fill="#304FFF" />
						<path d="M37.4 43.4983L26 43.4987L26.0004 31.4855L37.4004 31.4851L37.4 43.4983Z" fill="white" />
						<path d="M38.92 30.1643L27.52 30.1647L32.6 26L44 25.9996L38.92 30.1643Z" fill="white" />
						<path d="M38.92 41.915V30.1643L44 25.9996V36.5L38.92 41.915Z" fill="white" />
						<path d="M39.5 28.5002L32 28.5005L32.0002 20.9129L39.5002 20.9127L39.5 28.5002Z" fill="white" />
						<path d="M40.5 20.0784L33 20.0787L37 16.5002L44.5 16.5L40.5 20.0784Z" fill="white" />
						<path d="M40.5 27.5002V20.0002L44.5 16.5V23.9218L40.5 27.5002Z" fill="white" />
						<path d="M43.4399 29.8855L38.6399 29.8857L41.1999 27.5002L45.9999 27.5L43.4399 29.8855Z" fill="white" />
						<path d="M43.4399 34.8332V29.8334L45.9999 27.5V32.4477L43.4399 34.8332Z" fill="white" />
						<path d="M22 25.5H31V27.5H22V25.5Z" fill="white" />
						<path d="M14 41.5H24V43.5H14V41.5Z" fill="white" />
						<path d="M26 21.5H31V23.5H26V21.5Z" fill="white" />
						<path d="M19 37.5H24V39.5H19V37.5Z" fill="white" />
					</svg>


					<span>We are your dedicated partner for seamless <br>and reliable shipping across the East Coast and beyond</span>
				</div>
				<h2>the United States</h2>
			</div>
		</div>
	</div>
	</div>
</section>

<section id="hero2" class="wrapper hero flex-center">
	<img loading="lazy" src="/imgs/0_01.webp" alt="A man puts a box in the car" class="hero_section_img">
	<div class="flex hero-content col aic">
		<div class="flex hero-text col">
			<h2 class="color-blue flex col">
				Our Mission
			</h2>

			<p class="flex-center">
				To simplify logistics through reliability, efficiency, <br>and personalized service that delivers value on every shipment
			</p>
		</div>
	</div>
</section>



<section id="choose" class="wrapper section-content section-content_left">
	<div class="flex">
		<div class="section-text flex col">
			<div class="section-h flex col">
				<h2>Why choose <br>
					Duma Shipping?</h2>
			</div>
			<div class="number-item flex col">
				<div class="service-card flex row aic">
					<span class="flex-center h3"><strong>1</strong></span>
					<span><strong>We are your dedicated partner for seamless <br>and stress-free shipping across</strong></span>
				</div>
				<p>Delivering and moving services across the following states: New York, New Jersey, Pennsylvania, Delaware, Maryland, District of Columbia, Virginia, North Carolina, South Carolina, Georgia, and Florida.</p>
			</div>
			<div class="number-item flex col">
				<div class="service-card flex row aic">
					<span class="flex-center h3"><strong>2</strong></span>
					<span><strong>On-time delivery guarantee</strong></span>
				</div>
				<p>We guarantee your packages will arrive when you require them</p>
			</div>
			<div class="number-item flex col">
				<div class="service-card flex row aic">
					<span class="flex-center h3"><strong>3</strong></span>
					<span><strong>Real-time tracking for complete transparency</strong></span>
				</div>
				<p>Stay updated with real-time shipment monitoring</p>
			</div>
			<div class="number-item flex col">
				<div class="service-card flex row aic">
					<span class="flex-center h3"><strong>4</strong></span>
					<span><strong>Customer-first approach</strong></span>
				</div>
				<p>Flexible and personalized services to suit every client</p>
			</div>
		</div>
		<div class="flex col between">
			<div class="section-img-box">
				<div class="section_img_container">
					<img loading="lazy" src="/imgs/04.webp" alt="A man loads boxes into a Duma Shipping vehicle" class="section-img">
				</div>
			</div>
			<div class="flex col aie">
				<a href="/calculator" class="button">
					Сalculate shipping cost
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
					</svg>
				</a>
				<a href="/contacts" class="flex-center button btn_blue">
					<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
					</svg>
					Contact Us
				</a>
			</div>
		</div>
	</div>
</section>

<section id="logistics" class="wrapper flex section-content section-content_right">
	<div class="flex aic ">
		<div class="section-child">
			<div class="imgBorder">
				<div class="section_img_container">
					<img loading="lazy" src="/imgs/service-boxs.webp" alt="The boxes are on the floor" class="section-img">
				</div>
			</div>
		</div>

		<div class="section-text flex col">
			<div class="section-h flex col">
				<span>
					We understand
				</span>
				<h2>that logistics can be complex, </h2>
			</div>
			<p>
				<span>which is why we focus on providing seamless solutions tailored to your needs.</span>
				Whether it's<strong> box delivery in the USA, storage and cargo delivery, or managing a move </strong>— Duma Shipping is here to simplify the process.
			</p>
		</div>

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
	<div class="wrapper section-content">
		<div class="flex col aic">
			<div class="flex col aic tai_c">
				<p>Start your seamless shipping journey with Duma Shipping today — </p>
				<h2>
					because your logistics needs <br>
					to deserve <strong>the best</strong>
				</h2>
			</div>
			<div class="flex row aic">
				<a href="/calculator" class="button btn_white">
					Сalculate shipping cost
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
					</svg>
				</a>
				<a href="/contacts" class="button btn_blue">
					<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
					</svg>
					Contact Us
				</a>
			</div>
		</div>
	</div>
</section>

<section id="setsUs" class="wrapper flex section-content section-content_left">
	<div class="flex aic">
		<div class="section-text flex col">
			<div class="section-h flex col">
				<h2>We specialize in</h2>
			</div>
			<p>
				a wide range of services, from <strong>door-to-door delivery</strong> in the USA to mini <strong>move services</strong> and <strong>box shipping</strong>
			</p>
			<a href="/services" class="flex row aic uppercase color-blue">
				<strong>Our services</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/laptop-box.webp" alt="The boxes on the laptop" class="section-img">
			</div>
		</div>
	</div>
</section>

<section id="transport" class="wrapper section-content section-content_right">

	<div class="flex aic">
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/0_01.webp" alt="A man puts a box in the car" class="section-img">
			</div>
		</div>
		<div class="section-text flex col">
			<div class="section-h flex col">
				<h2>Need to transport fragile or oversized items?</h2>
			</div>
			<p>
				We specialize in careful handling and secure delivery of complex shipments, ensuring every package arrives safely and on time
			</p>
			<a href="/services" class="flex row aic uppercase color-blue">
				<strong>Our services</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>

	</div>
</section>
<!-- Start your seamless shipping journey with Duma Shipping today - because your logistics needs to deserve the best
<section id="weOffer" class="wrapper section-content bg-blue">
	<div class="flex col">
		<div class="section-text flex col color-white">
			<span>Using cutting-edge technology,</span>
			<h2>we offer <br><strong>real-time tracking</strong></h2>
		</div>
		<div class="section-text tai_r color-white">
			<h2>so you always know the status <br> of your shipment</h2>
		</div>
	</div>
</section>
<section id="tracking_form" class="wrapper bg-blue flex col aic">
	<div class="">
	</div>
</section> -->
<section id="storage" class="wrapper flex section-content section-content_right">
	<div class="flex aic">
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/05.webp" alt="Need to transport" class="section-img">
			</div>
		</div>

		<div class="section-text flex col">
			<div class="section-h flex col">
				<span class="size_lg">
					Our expertise also extends
				</span>
				<h2>to storage <br>
					and cargo delivery</h2>
			</div>
			<p>
				<span>providing flexible solutions for both short-term and long-term needs.</span>
				<span>Whether it's <strong>personal belongings, furniture, or business shipments…</strong> </span>
			</p>
			<a href="/services" class="flex row aic uppercase color-blue">
				<strong>Our services</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
	</div>
</section>
<section id="setsUs2" class="wrapper flex section-content section-content_left">
	<div class="flex ais">
		<div class="section-text flex col">
			<div class="section-h flex col">
				<span class="size_lg">
					This commitment to transparency,
				</span>
				<span>
					combined with a customer-focused approach,
				</span>
				<h2>sets us apart <br>in the logistics <br> industry</h2>
			</div>
			<p>
				<span>At Duma Shipping, we take pride in exceeding expectations.</span>
				<span>Trust us with your shipping needs, and experience a new standard of logistics excellence.</span>
			</p>
			<a href="/services" class="flex row aic uppercase color-blue">
				<strong>Our services</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/deliveryMan.webp" alt="A man holds up Duma Shipping boxes" class="section-img">
			</div>
		</div>
	</div>
</section>

<section class="section_call  flex-center ">
	<div class="wrapper section-content">
		<div class="flex col aic">
			<div class="flex col aic tai_c">
				<p>Duma Shipping is here </p>
				<h2>
					to simplify the process and give you <br>peace of mind
				</h2>
			</div>
			<div class="flex row aic">
				<a href="/calculator" class="button btn_white">
					Сalculate shipping cost
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
					</svg>
				</a>
				<a href='/contacts' class="button btn_blue">
					<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
					</svg>
					Contact Us
				</a>
			</div>
		</div>
	</div>
</section>

<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>

@endsection
