@extends('layouts.app')

@section('meta_title', 'Duma Shipping Services | Comprehensive Freight & Delivery Solutions Meta Description: Explore our range of NYC freight, moving, eBay pick‑up, Amazon delivery, and guaranteed on‑time services. Choose Duma Shipping for reliability and transparency.')
@section('meta_description', 'Professional NYC shipping services including door-to-door delivery, moving assistance, eBay/Amazon deliveries, and real-time tracking. Reliable freight solutions for the East Coast.')

@section('content')
@php
    $clients = [
[
'avatar' => '/imgs/clients/David Reynolds.webp',
'name' => 'David Reynolds',
'role' => 'Operations Manager at Skyline Distributors',
'review' => "We've been working with Duma Shipping for over two years now, and they've completely transformed our logistics operations. Their NYC to Florida route is consistently reliable, even during peak seasons. What stands out most is their real-time tracking system that gives us total visibility – our customers appreciate the transparency, and it's saved our team countless hours of fielding \"where's my order\" calls."
],
[
'avatar' => '/imgs/clients/Jennifer Martinez.webp',
'name' => 'Jennifer Martinez',
'role' => 'E-commerce Business Owner',
'review' => "As a small business shipping products across the East Coast, finding Duma Shipping was a game-changer for me. Their rates are competitive, but it's their customer service that keeps me loyal. When a snowstorm threatened deliveries last winter, their team proactively rerouted my packages and every single one arrived on time. That level of problem-solving is rare in the shipping industry."
],
[
'avatar' => '/imgs/clients/Michael Chang.webp',
'name' => 'Michael Chang',
'role' => 'Retail Store Manager',
'review' => "When we expanded to three locations across NYC, coordinating shipments became a nightmare until we partnered with Duma. Their local knowledge of New York traffic patterns and loading restrictions has saved us from thousands in potential fines. Their drivers know our staff by name and always go the extra mile – sometimes literally – to ensure our deliveries arrive exactly when needed."
],
[
'avatar' => '/imgs/clients/Amanda Wilson.webp',
'name' => 'Amanda Wilson',
'role' => 'Art Gallery Director',
'review' => "Shipping valuable artwork requires exceptional care, and Duma delivers exactly that. Their special handling service for our gallery's pieces provides peace of mind that I haven't found with larger carriers. They've created custom crating solutions for oddly shaped sculptures and always treat each piece like it's irreplaceable – because for our clients, it is."
],
[
'avatar' => '/imgs/clients/Robert Turner.webp',
'name' => 'Robert Turner',
'role' => 'Logistics Coordinator at Eastside Manufacturing',
'review' => "The freight shipping industry is full of promises, but Duma consistently delivers on theirs. We've reduced our shipping costs by 14% since switching to them for our inter-state deliveries, and their dedicated account manager understands our business needs without having to explain them repeatedly. When you've got time-sensitive manufacturing components needing delivery, this kind of reliability is invaluable."
]
];
@endphp
<section id="hero1" class="hero wrapper flex-center">
	<img loading="lazy" src="/imgs/services-hero.webp" alt="A man puts a box in the car" class="hero_section_img">
	<div class="hero-content flex col aic">
		<div class="hero-text flex col">
			<h1 class="color-blue flex col">
				Our Services
			</h1>
			<h2>
				Tailored Shipping & Logistics Solutions
            </h2>
            <p>At Duma Shipping, we offer end-to-end freight, moving, and delivery services customized to your needs. From small packages to full household moves, our experts handle every shipment with care and precision.</p>
		</div>
		<a href="/calculator" class="button btn_blue">
			<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
			</svg>
			<strong>Get a Quote</strong>
		</a>
	</div>
</section>

<section id="services-cards" class="wrapper section-content">
    <div class="flex-center col">
        <h2>Service Summary</h2>
        <div class="flex w-full wrap row">
          <div class="service-card flex col">
            <div class="flex col">
              <div class="service-svg svg-door"></div>
              <h3><strong>Door-to-door delivery</strong></h3>
              <p>
                Expert handling of small and medium freight from your location to its final destination.
              </p>
            </div>
            <a href="/services#deliveryMan" class="flex row aic uppercase color-blue">
              <strong>read more</strong>
              <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
              </svg>
            </a>
          </div>

          <div class="service-card flex col">
            <div class="flex col">
              <div class="service-svg svg-box"></div>
              <h3><strong>Moving assistance</strong></h3>
              <p>
                Professional movers and packing specialists for residential and commercial relocations
              </p>
            </div>
            <a href="{{ route('services.moving-assistance') }}" class="flex row aic uppercase color-blue">
              <strong>read more</strong>
              <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
              </svg>
            </a>
          </div>

          <div class="service-card flex col">
            <div class="flex col">
              <div class="service-svg svg-ebay"></div>
              <h3><strong>eBay local pick-up</strong></h3>
              <p>
                We collect your eBay purchases and deliver them directly to your door.
              </p>
            </div>
            <a href="{{ route('services.ebay-local-pickup') }}" class="flex row aic uppercase color-blue">
              <strong>read more</strong>
              <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
              </svg>
            </a>
          </div>

          <div class="service-card flex col">
            <div class="flex col">
              <div class="service-svg svg-amazon"></div>
              <h3><strong>Amazon delivery</strong></h3>
              <p>
                Secure transport of Amazon orders with flexible time slots and white‑glove options.
              </p>
            </div>
            <a href="services#amazon" class="flex row aic uppercase color-blue">
              <strong>read more</strong>
              <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
              </svg>
            </a>
          </div>
          <div class="service-card flex col">
            <div class="flex col">
              <div class="service-svg svg-clock"></div>
              <h3><strong>On-time delivery guarantee</strong></h3>
              <p>
                Shipments arrive when promised or you receive a refund—no exceptions.
              </p>
            </div>
            <a href="/services#onTime" class="flex row aic uppercase color-blue">
              <strong>read more</strong>
              <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
              </svg>
            </a>
          </div>

          <div class="service-card flex col">
            <div class="flex col">
              <div class="service-svg svg-time-tracking"></div>
              <h3><strong>Real-time tracking</strong></h3>
              <p>
                Full visibility into your cargo’s journey through our digital platform.
            </div>

            <span class="size_md uppercase" style="color: var(--gray)"><strong>Coming soon</strong></span>
          </div>
        </div>
        <a href="/services" class="button btn_blue">Read More About All Services</a>
    </div>
</section>

<section id="choose" class="wrapper section-content">
    <span class="section-border section-border_top_l"></span>
    <div class="flex-center col">
        <h2 class="tai_c">Why Choose Us</h2>
        <ul id="choose-list" class="flex row wrap">
            <li class="choose-item">
                <div>
                    <h3><span class="h2 color-white icon">5</span><strong class="size_lg">Years of Expertise</strong></h3>

                    <p>Trusted in the NYC metro area with a 95% satisfaction rate.</p>
                </div>
            </li>
            <li class="choose-item">
                <div>

                    <h3><div class="service-svg svg-state-coverage icon"></div><strong class="size_lg">Multi-State Coverage</strong></h3>
                    <p>Serving 10+ states from New York to Florida.</p>
                </div>
            </li>
            <li class="choose-item">
                <div>
                    <h3><div class="icon service-svg svg-dollar"></div><strong class="size_lg">Transparent Pricing</strong></h3>
                    <p>No hidden fees—complete cost breakdown before booking</p>
                </div>
            </li>
            <li class="choose-item">

                <div>
                    <h3><div class="icon service-svg svg-support"></div><strong class="size_lg">Dedicated Support</strong></h3>
                    <p>Real people respond promptly to every phone call and email.</p>
                </div>
            </li>
        </ul>
    </div>
</section>
<x-geography
	title="Coverage"
	desc="Our network spans the Eastern Seaboard, covering:"
	:tags="['New York', 'New Jersey', 'Pennsylvania', 'Delaware', 'Maryland', 'D.C', 'Virginia', 'North Carolina', 'South Carolina', 'Georgia', 'Florida', ]"
	footer="Explore our detailed coverage map below to see exactly where we deliver."
    linkText="Our services"
	/>

{{-- <section id="deliveryMan" class="wrapper section-content section-content_left">
	<div class="flex ais">
		<div class="section-text flex col">
			<div class="section-h flex col">
				<div class="service-card flex row aic">
					<div class="service-svg svg-door"></div>
					<span>Interstate Small and Medium Freight <br> Delivery</span>
				</div>
				<h2>Door-to-door delivery</h2>
			</div>
			<p>
				<span>
					We specialize in freight shipping throughout the USA, transporting <strong>small and medium-sized goods</strong> across state lines with our reliable door-to-door service. From commercial equipment to retail inventory, we handle every shipment with care and efficiency.
				</span>
				Need dependable interstate freight delivery in NYC and beyond?
			</p>
			<a href="/contacts" class="flex row aic uppercase color-blue">
				<strong>Contact Us</strong>
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
<section id="moving" class="wrapper flex section-content section-content_right">
	<div class="flex aic ">

		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/0_01.webp" alt="A man puts a box in the car" class="section-img">
			</div>
		</div>

		<div class="section-text flex col">
			<div class="section-h flex col">
				<div class="service-card flex row aic">
					<div class="service-svg svg-box"></div>
					<span>Perfect for relocating personal belongings, <br>furniture, and appliancese</span>
				</div>
				<h2>Moving assistance</h2>
			</div>
			<p>
				Our specialized moving services are ideal for relocating personal items, furniture, and appliances.<br>
				We streamline the entire process, ensuring your belongings arrive safely and on schedule without the hassle of a full-service moving company.
			</p>
			<a href="/contacts" class="flex row aic uppercase color-blue">
				<strong>Contact Us</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
	</div>
</section>
<section id="eBay" class="wrapper flex section-content section-content_left">
	<div class="flex aic">
		<div class="section-text flex col">
			<div class="section-h flex col">
				<div class="service-card flex row aic">
					<div class="service-svg svg-ebay"></div>
					<span>We collect your eBay purchases directly from sellers and deliver them to your door</span>
				</div>
				<h2>eBay local pick-up</h2>
			</div>
			<p>
				<span>
					Found the perfect items on eBay but facing pickup challenges? Our eBay collection service handles the logistics for you.<br>
					We coordinate with sellers, verify item condition, and provide secure transportation to your location.
				</span>
				Need hassle-free eBay item collection and delivery?
			</p>
			<a href="/contacts" class="flex row aic uppercase color-blue">
				<strong>Contact Us</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/service-boxs.webp" alt="The boxes are on the floor" class="section-img">
			</div>
		</div>
	</div>
</section>
<section id="amazon" class="wrapper flex section-content section-content_right">
	<div class="flex aic ">
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/laptop-box.webp" alt="The boxes on the laptop" class="section-img">
			</div>
		</div>

		<div class="section-text flex col">
			<div class="section-h flex col">
				<div class="service-card flex row aic">
					<div class="service-svg svg-amazon"></div>
					<span>We ensure secure transportation of your orders from Amazon warehouses to your address</span>
				</div>
				<h2>Amazon delivery</h2>
			</div>
			<p>
				Whether you've purchased furniture, electronics, or household items, <br> <strong>we handle your Amazon packages with professional care,</strong> offering fast and <br> reliable delivery throughout our service area. Our Amazon delivery specialists understand the importance of your purchases.
			</p>
			<a href="/contacts" class="flex row aic uppercase color-blue">
				<strong>Contact Us</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
	</div>
</section>
<section id="onTime" class="wrapper flex section-content section-content_left">
	<div class="flex aic">
		<div class="section-text flex col">
			<div class="section-h flex col">
				<div class="service-card flex row aic">
					<div class="service-svg svg-clock"></div>
					<span>We guarantee that your shipments <br>will arrive as scheduled</span>
				</div>
				<h2>On-time delivery guarantee</h2>
			</div>
			<p>
				<span>We understand that timing is critical in today's business environment. That's why we back every shipment with our on-time guarantee. Our logistics team plans thoroughly to prevent delays, giving you confidence and peace of mind with every delivery.</span>
				Need a shipping partner you can rely on for punctuality?
			</p>
			<a href="/contacts" class="flex row aic uppercase color-blue">
				<strong>Contact Us</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/02.webp" alt="Transfer of parcel with completion of delivery label - logistics, courier service, dispatch of goods" class="section-img">
			</div>
		</div>
	</div>
</section>
<section id="tracking" class="wrapper flex section-content section-content_right">
	<div class="flex aic ">
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/04.webp" alt="A man loads boxes into a Duma Shipping vehicle" class="section-img">
			</div>
		</div>
		<div class="section-text flex col">
			<div class="section-h flex col">
				<div class="service-card flex row aic">
					<div class="service-svg svg-time-tracking"></div>
					<span>Monitor your shipment's location and status throughout its journey</span>
				</div>
				<h2>Real-time tracking</h2>
			</div>
			<p>
				<span>
					Stay informed with our advanced tracking technology. Follow your shipment's exact location and status in real time through our user-friendly online platform. With Duma Shipping, you always know where your items are from pickup to final delivery.
				</span>
				Want complete visibility of your shipments?
			</p>
			<span class="size_md" style="color: var(--gray)"><strong>Coming soon</strong></span>
		</div>
	</div>
</section> --}}
{{-- <section id="call" class="section_call flex-center">
	<div class="wrapper section-content aic">
		<div class="flex col">
			<div class="flex col">
				<h2>
					Ready to Ship?
				</h2>
                <p></p>
			</div>
			<div class="flex col">
				<h2>
					From NYC to Florida and<br> across the Eastern Seaboard, <br><strong>we're your trusted shipping partner</strong>.
				</h2>
				<div class="flex row aic">
					<a href="/calculator" class="button border-blue">
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
	</div>
</section> --}}

<section id="client" class="wrapper section-content">
    <span class="section-border section-border_top_l"></span>
    <div class="flex col aic">
        <div class="w-full flex col aic">
            <h2>Client Testimonials</h2>
        <div id="clientSlider" class="slider flex row aic" id="comments-slider">
			<div class="slider-pages flex row">
				@foreach($clients as $index => $client)
				{{-- Открываем обёртку на каждый первый элемент пары --}}
				@if($loop->index % 2 === 0)
				<div class="slider-page flex row">
					@endif

					<div class="comment-item flex col">
						<div class="comment-user flex row aic">
							@if($client['avatar'])
							<img loading="lazy" class="comment-user_avatar" src="{{$client['avatar']}}" />
							@else
							<div class="comment-user_avatar"></div>
							@endif
							<div class="comment-user_info flex col">
								<strong><span>{{ $client['name'] }}</span></strong>
								<span>{{ $client['role'] }}</span>
							</div>
						</div>
						<p class="size-md">
							{{ $client['review'] }}
						</p>
					</div>

					{{-- Закрываем обёртку после каждого второго элемента пары или если это последний элемент --}}
					@if($index % 2 === 1 || $loop->last)
				</div>
				@endif
				@endforeach
			</div>
			<div class="slider-controls flex row">
				<div class="slider-back">
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M15 22.5L10 14.5L15 6.5L17 6.5L12 14.5L17 22.5H15Z" fill="black" />
					</svg>
				</div>
				<div class="slider-next">
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" fill="black" />
					</svg>
				</div>
			</div>
		</div>
        </div>
    </div>
</section>

<section id="checkOut" class="wrapper section-content">
	<span class="section-border section-border_top_l"></span>
	<div class="flex col aic">
		<div class="flex col">
		    <span class='txt-block h2 tai_c'>Ready to Ship? <br>Contact Us Today</span>
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
                    Contact us
                </a>
            </div>
		</div>
	</div>
	<span class="section-border section-border_bottom_r"></span>
</section>

<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>


@endsection

@push('styles')
<!-- Стили, специфичные только для этой страницы -->
<link rel="stylesheet" href="{{ asset('css/services.css') }}">
<link rel="stylesheet" href="{{asset('css/media/services/laptop.css')}}" media="(max-width:1200px)">
<link rel="stylesheet" href="{{asset('css/media/services/tablet.css')}}" media="(max-width:860px)">
@endpush

@vite(["resources/js/pages/services.js"])
