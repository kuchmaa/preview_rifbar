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
$partnerPath = "/imgs/partners/";
$partners = array_chunk([
[
'logo' => $partnerPath . '305 post.webp',
'name' => '305 POST',
],
[
'logo' => $partnerPath . 'akiba.webp',
'name' => 'Akiba',
],
[
'logo' => $partnerPath . 'All city building.webp',
'name' => 'All city building',
],
[
'logo' => $partnerPath . 'Baltic shipping.webp',
'name' => 'Baltic shipping express',
],
[
'logo' => $partnerPath . 'Dnipro llc.webp',
'name' => 'Dnipro llc',
],
[
'logo' => $partnerPath . 'fantasy vertical blinds.webp',
'name' => 'Fantasy vertical blinds',
],
[
'logo' => $partnerPath . 'frank and sal.webp',
'name' => 'Frank and Sal',
],
[
'logo' => $partnerPath . 'ice bar.webp',
'name' => 'ICEBAR',
],
[
'logo' => $partnerPath . 'MD.webp',
'name' => 'MD',
],
[
'logo' => $partnerPath . 'MK-contractors.webp',
'name' => 'MK Contractors Co',
],
[
'logo' => $partnerPath . 'netmarketer.webp',
'name' => 'Netmarketer',
],
[
'logo' => $partnerPath . 'showplace.webp',
'name' => 'Showplace',
],
[
'logo' => $partnerPath . 'todays_entry_doors.webp',
'name' => 'Todays entry doors',
],

], 7);
@endphp



@extends('layouts.app')

@section('meta_title', 'NYC Freight Shipping, Trucking & Package Delivery | Duma Shipping')
@section('meta_description', 'NYC freight shipping and package delivery across New York City and the East Coast. LTL & small freight, local trucking in NYC, door-to-door delivery. Get a quote today.')

@section('content')

<section id="hero1" class="wrapper hero flex-center">
    <img src="/imgs/home-hero-img.webp" fetchpriority="high" alt="NYC freight shipping and package delivery by Duma Shipping" class="hero_section_img">
    <div class="flex hero-content col aic">
        <div class="flex hero-text col tai_c aic">
            <h1>NYC Freight Shipping & Package Delivery</h1>
            <p class="size_lg" style="max-width:740px">
            Reliable New York freight company for LTL & small freight, local trucking in NYC,
            and door-to-door package delivery across the East Coast.
            </p>
        </div>
        <a href="/calculator" class="button btn_blue">
            Calculate shipping cost
            <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
            </svg>
        </a>
    </div>
	{{-- <div class="flex hero-content col aic">
		<div class="flex hero-text col">
			<span class="size_lg">Welcome to <strong>Duma Shipping</strong></span>
			<div>

				<div id="animation-text-wrapper" class="color-blue h1 flex col">
					<div id="animation-text">
						<div>Shipping</div>
						<div>mini moving</div>
						<div>delivery</div>
					</div>
				</div>
				<h2>
					of every type of goods <br /> in the USA
				</h2>
			</div>
		</div>
		<a href="/calculator" class="button btn_blue">
			Calculate shipping cost
			<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
			</svg>
		</a>
	</div> --}}
</section>
<section id="nyc-freight-overview" class="wrapper section-content">
  <div class="flex col">
    <h2 class="h1 color-blue">Freight Companies in New York & NYC Package Delivery</h2>
    <p>
      As a New York freight company, we provide freight shipping New York businesses trust:
      LTL, small freight and trucking in NYC with experienced local drivers.
      Need NYC package delivery? Our door-to-door couriers handle boxes, appliances and e-commerce orders.
    </p>
    <ul class="size_md">
      <li><span>NYC freight & New York freight for business and residential customers</span></li>
      <li><span>Freight shipping NYC / NY with on-time pickup and tracking</span></li>
      <li><span>Package delivery New York & NYC package delivery service same- or next-day</span></li>
      <li><span>Trucking in NYC: compliant loading, curbside & white-glove options</span></li>
      <li><span>New York cargo moves along our East Coast lanes (NY → FL and back)</span></li>
    </ul>
  </div>
</section>
<section id="center-content" class="wrapper flex col aic">
	{{-- <h1 class="tai_c" id="hiddenH1">NYC's Trusted Freight & Shipping Solutions</h1> --}}
	<div class="flex row aic">
		<div class="number-item flex col">
			<div class="flex row">
				<span class="h1">5</span>
				<span>
					<strong>YEARS</strong>
				</span>

			</div>
			<span>of industry experience</span>
		</div>
		<div class="number-item flex col">
			<div class="flex row">
				<span class="h1">95</span>
				<span>
					<strong>%</strong>
				</span>
			</div>
			<span>customer satisfaction rate</span>
		</div>
		<div class="number-item flex col">
			<div class="flex row">
				<span class="h1">100</span>
				<span>
					<strong>%</strong>
				</span>
			</div>
			<span>shipment transparency with <br> real-time tracking technology</span>
		</div>
		<div class="number-item flex col">
			<div class="flex row">
				<span class="h1">10+</span>
				<span>
					<strong>STATES</strong>
				</span>
			</div>
			<span>covered with <br> reliable delivery service</span>
		</div>
	</div>
</section>
<section id="logistic" class="wrapper section-content section-content_left">
	<div class="flex ais">
		<div class="section-text">
			<div class="section-h flex col">
				<h2>
					<span class="size_lg">
						At Duma Shipping,<br>
					</span>
					we provide effective logistics solutions tailored to your specific needs.
				</h2>
			</div>
			<p>
				<span>
					From NYC freight shipping to convenient mini-moves, our door-to-door service ensures every shipment gets the attention it deserves with on-time delivery you can count on.
				</span>
			</p>
			<a href="/about" class="flex row aic uppercase color-blue">
				<strong>More About Us</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
		<div class="section-img-box flex ">
			<div class="section_img_container">
				<img loading="lazy" class="section-img" src="/imgs/home-logistic.webp" alt="New York freight company handling boxes">
			</div>
		</div>
	</div>
</section>
<section id="services" class="section-content wrapper ">
  <span class="section-border section-border_top_l"></span>
  <div class="flex aic col section-remove-db_lr">
    <div class="flex-center col">
        <h2 class="h1 color-blue">Services</h2>
        <span class="size_lg" style="max-width:920px; padding: 0 15px;">
            NYC Freight & Shipping Solutions —
            <a href="/calculator"><strong>freight shipping New York quote</strong></a>,
            <a href="/services"><strong>NYC package delivery service</strong></a>,
            and local <a href="/services"><strong>trucking in NYC</strong></a>.
        </span>
    </div>

    <!-- Доп. абзац с анкорами под ключи -->
    <p class="size_md" style="max-width:920px;margin:18px auto 6px; padding: 0 15px;" class="tai_c">
      We’re a New York freight company focused on <a href="/calculator"><strong>freight shipping New York quotes</strong></a>,
      reliable <a href="/services"><strong>NYC package delivery service</strong></a> and local
      <a href="/services"><strong>trucking in NYC</strong></a> for LTL & small freight.
    </p>

    <div id="services_cards" class="flex row">
      <div class="service-card flex col">
        <div class="flex col">
          <div class="service-svg svg-door"></div>
          <h3><strong>Door-to-door delivery</strong></h3>
          <p>
            Expert handling of interstate small and medium freight throughout the NYC metro area and beyond —
            <strong>freight shipping NYC</strong> with on-time pickup and clear communication.
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
            Residential relocations, furniture and appliance transport — plus fast
            <strong>package delivery NYC</strong> for bulky and fragile items with careful handling.
          </p>
        </div>
        <a href="/services#moving" class="flex row aic uppercase color-blue">
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
            Convenient collection of online purchases with direct <strong>New York package delivery</strong>
            to homes and offices across the five boroughs.
          </p>
        </div>
        <a href="/services#eBay" class="flex row aic uppercase color-blue">
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
            Secure last-mile transport from fulfillment centers with dependable
            <strong>NYC package delivery service</strong> and scheduled drop-offs.
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
            Our commitment keeps <strong>New York cargo</strong> moving on schedule — clear ETAs and proactive updates.
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
            Monitor <strong>freight shipping NY</strong> and local deliveries with live status and location visibility.
          </p>
        </div>
        <span class="size_md uppercase" style="color: var(--gray)"><strong>Coming soon</strong></span>
      </div>
    </div>

    <div class="flex-center col">
      <span>Our reliable freight and shipping network operates throughout:</span>
      <span class="size_lg">Every package moves through our efficient logistics network with careful attention to detail</span>
      <!-- Доп. анкор на калькулятор -->
      <p style="margin-top:10px">
        Get a fast <a href="/calculator"><strong>freight shipping New York quote</strong></a> or
        <a href="/contacts"><strong>contact our New York freight team</strong></a>.
      </p>
    </div>
  </div>
</section>

<x-geography
	title="Geography"
	desc="Our operations cover delivery and moving across"
	:tags="['New York', 'Manhattan', 'Brooklyn', 'Queens', 'Bronx', 'Staten Island', 'New Jersey', 'Pennsylvania', 'Delaware', 'Maryland', 'District of Columbia', 'Virginia', 'North Carolina', 'South Carolina', 'Georgia', 'Florida', ]"
	footer="ensuring every package is delivered with care"
    linkText="Our services"
	/>
<section class="section_call w-full flex-center bg-blue">
  <div class="wrapper flex-center section-content">
    <div class="flex col aic color-white">
      <div class="flex col aic tai_c ">
        <span>Start with NYC freight shipping and package delivery you can trust.</span>
        <span class="h2">
          Your cargo deserves professional handling.
        </span>
      </div>
      <div class="flex row aic">
        <a href="/calculator" class="button border-white">
          Calculate shipping cost
          <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
          </svg>
        </a>
        <a href="/contacts" class="button border-white">
          <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
          </svg>
          Contact Us
        </a>
      </div>
    </div>
  </div>
</section>
<section id="setsUs" class="wrapper flex section-content section-content_right">
	<div class="flex aic section-remove-db_lr">

		<div class="section-child">
			<div class="section_img_container">
				<img loading="lazy" class="section-img" src="/imgs/0_01.webp" alt="Trucking in NYC loading boxes">
			</div>
		</div>

		<div class="section-text flex col">
			<div class="section-h flex col">
				<span class="size_lg">
					Our commitment to transparency,
				</span>
				<span>
					backed by customer-focused operations, makes
				</span>
				<h2>Duma Shipping a leading NYC freight and logistics provider.</h2>
			</div>
			<p>
				<span>At Duma Shipping, we work hard to exceed expectations.</span>
				<span>Trust New York's reliable shipping partner and experience solid logistics service.</span>
			</p>
			<a href="/about" class="flex row aic uppercase color-blue">
				<strong>More About Us</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
	</div>
</section>
<section id="calculator" class="wrapper section-content section-content_left">
	<div class="flex aic">
		<div class="section-text flex col">
			<div class="section-h flex col">
				<h2>NYC Shipping Cost Calculator</h2>
			</div>
			<p>
				<span>
					Quickly estimate shipping costs with our easy-to-use calculator tool.
				</span>
				<span>
					Whether you're planning a local move, managing interstate freight, or shipping specialized items across the Eastern Seaboard, Duma Shipping delivers consistent reliability at every stage.
				</span>
			</p>
			<a href="/calculator" class="flex row aic uppercase color-blue">
				<strong>Calculate Shipping Cost</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" class="section-img" src="/imgs/laptop-box.webp" alt="Calculate New York shipping cost online">
			</div>
		</div>
	</div>
</section>
<section id="call2" class="section_call w-full flex-center bg-blue">
  <div class="wrapper section-content aic">
    <div class="flex col color-white">
      <div class="flex col">
        <p class="size_lg">
          <span>Whether you’re relocating, managing box delivery in the USA,</span>
          <br>
          or handling fragile and oversized shipments,
        </p>
        <h2>
          Duma Shipping ensures reliability
          <br>
          every step of the way
        </h2>
      </div>
      <div class="flex col">
        <h2>
          From <strong>freight shipping New York</strong> to local <strong>trucking in NYC</strong>,
          your logistics deserve the best
        </h2>
        <div class="flex row aic">
          <a href="/calculator" class="button border-white">
            Сalculate shipping cost
            <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
            </svg>
          </a>
          <a href="/contacts" class="button border-white">
            <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
            </svg>
            Contact Us
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <section id="player-section" class="wrapper flex-center bg-blue">
	<div id="player" class="flex-center">
	</div>
</section> -->
<section id="client" class="wrapper section-content">
	<div class="flex col aic section-remove-db_lr">
		<div>
			<span class="h1 color-blue">what our clients says</span>
			<p class="flex-center">Experience seamless logistics with Duma Shipping service as our clients!</p>
		</div>
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
        <div id="comment-form-wrapper" class="flex-center col w-full">
            <h3>Provide Your Comments</h3>
            <p></p>
            <form id="comment-form" action="/comments" method="POST" class="wrap row w-full flex-center">
                @csrf
                <div id="data-wrapper" class="row w-full flex justify-center wrap">
                    <div class="flex col w-full">
                        <div id="comment_name" class="text-input w-full flex col" >
                            <span>Name</span>
                            <input type="text" name="author_name" placeholder="" required>
                            <span class="error-message"></span>
                        </div>
                        <div id="comment_email" class="text-input w-full flex col">
                            <span>Email</span>
                            <input type="email" name="author_email" placeholder="" required>
                            <span class="error-message"></span>
                        </div>
                    </div>
                    <div id="comment-content" class="text-input flex w-full col">
                        <span>Content</span>
                        <textarea name="content"  class="w-full border-box" style="height: 100%;" required name="content" cols="30" minlength="10" placeholder="Comment text min least 10 characters" maxlength="1000"></textarea>
                        <span class="error-message"></span>
                    </div>
                </div>
                <button type="submit">Leave a comment</button>
            </form>
        </div>
	</div>
</section>
<section id="partners" class="wrapper section-content">
	<span class="section-border section-border_top_l"></span>
	<div class="flex col aic">
		<div>
			<h2 class="h1 color-blue">Partners</h2>
		</div>
		<div class="slider flex row aic" id="partners-slider">
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
			<div class="slider-pages flex col aic">
				@foreach ($partners as $index => $partnerChunk)
				<div class="slider-page flex row" {{ $index === 0 ? 'current' : '' }}>
					@foreach ($partnerChunk as $partner)
					<div class="partner-item flex col aic">
						<div class="partner-item_avatar_wrapper flex-center">
							@if ($partner['logo'])
							<img loading="lazy" src="{{ $partner['logo'] }}" class="partner-item_avatar" alt="{{ $partner['name'] }}">
							@else
							<div class="partner-item_avatar"></div>
							@endif
						</div>
						<span class="tai_c"><strong>{{ $partner['name'] }}</strong></span>
					</div>
					@endforeach
				</div>
				@endforeach
				<div class="ellipses flex row aic">
				</div>
			</div>

		</div>
	</div>

	<span class="section-border section-border_bottom_r"></span>

</section>
<section id="faqs" class="wrapper section-content">
	<div class="flex row aic section-remove-db_lr">
		<div class="section-text">
			<div class="section-h col aic flex">
				<h2 class="h1 color-blue">
					Common Questions
				</h2>
				<span>About Our NYC Shipping Service</span>
			</div>
		</div>
		<div id="faqsAccordion" class="accordion flex col aic">
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>

					<h3><strong>Which freight companies in New York offer same-day pickup?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
                    Duma Shipping provides NYC freight pickup with same-day options across the five boroughs, plus next-day lanes to the East Coast.
                </span>
			</div>
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>

					<h3><strong>Do you handle freight shipping in NYC for small or LTL loads?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
                    Yes. We specialize in small freight and LTL in NYC with door-to-door service, liftgate assistance and real-time updates.
                </span>
			</div>
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>
					<h3><strong>Is package delivery in New York available for residential addresses?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
                    Absolutely. Our NYC package delivery service covers apartments, walk-ups and offices. We can schedule windowed deliveries and call ahead.
                </span>
			</div>
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>
					<h3><strong>What’s included in your trucking in NYC service?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
                    Local trucking in NYC with experienced drivers, building compliance, COI support and curbside or white-glove delivery.
                </span>
			</div>
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>

					<h3><strong>What tracking systems do you use for NYC and interstate freight?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
					You can track your shipments in real-time through our online tracking portal. Your tracking number is listed in the order confirmation. Enter your tracking number and click the "Tracking" button on our website.
				</span>
			</div>
			<div class="flex row aic">
				<span>or feel free to</span>
				<a href="/contacts" class="flex-center button btn_transparent">
					<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
					</svg>
					Contact Us
				</a>
			</div>
		</div>

	</div>

</section>
<section id="whetherYouNeed" class="section_call w-full bg-blue flex-center">
	<div class="wrapper section-content">
		<div class="flex col aci">
			<div>
				<p class="color-white">Whether you need</p>
				<h2 class="color-white">international delivery from the USA <br> or local door, furniture, and appliance delivery,</h2>
			</div>
			<div class="tai_r">
				<h2 class="color-white">our platform makes placing <br> your order <strong>fast and efficient</strong></h2>
			</div>
		</div>
	</div>
</section>
<section id="checkOut" class="wrapper section-content">
	<span class="section-border section-border_top_l"></span>
	<div class="flex col aic">
		<h2 class='txt-block'>Check out</h2>
		<p class='txt-block'>
			Finalize your order with Duma Shipping <br> using our simple and secure check-out process
		</p>
	</div>
	<span class="section-border section-border_bottom_r"></span>
</section>

<section class="section_call w-full flex-center ">
  <div class="wrapper flex-center section-content">
    <div class="flex col aic">
      <div class="flex col aic tai_c">
        <h2>
          Experience seamless logistics with our New York freight company
        </h2>
        <p>— from <strong>NYC freight</strong> and <strong>package delivery New York</strong> to East Coast lanes.</p>
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

<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>

@endsection

@push('styles')
<!-- Стили, специфичные только для этой страницы -->
<link rel="stylesheet" href="{{ asset('css/components/geography.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/service_svg.css') }}">
<link rel="stylesheet" href="{{asset('css/media/home/laptop.css')}}" media="(max-width:1300px)">
<link rel="stylesheet" href="{{asset('css/media/home/tablet.css')}}" media="(max-width:1024px)">
<link rel="stylesheet" href="{{asset('css/media/home/mobile.css')}}" media="(max-width:860px)">
@endpush

@push('scripts')
<!-- Скрипты, специфичные только для этой страницы -->
@vite(['resources/js/pages/home.js'])
@endpush
