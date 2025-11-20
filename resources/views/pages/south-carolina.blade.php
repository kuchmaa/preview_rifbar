@php
$clients = [
[
'avatar' => '/imgs/clients/Katherine Charleston.webp',
'name' => 'Katherine Charleston',
'role' => 'Historic District Hospitality Manager',
'review' => "Charleston's tourism industry demands flawless execution, and Duma's delivery South Carolina services deliver with Southern grace coast-to-coast. Their understanding of historic district regulations extends perfectly to hospitality clients nationwide. Whether it's wedding supplies for Charleston venues or restaurant inventory for our sister properties across America, they handle every shipment with expertise."
],
[
'avatar' => '/imgs/clients/Robert Columbia.webp',
'name' => 'Robert Columbia',
'role' => 'State Capitol Operations Director',
'review' => "Government operations require precision and security, and Duma's South Carolina delivery services understand state protocols completely. Their team navigates Capitol complex security seamlessly and coordinates inter-agency deliveries with professionalism throughout the US. Our SC delivery requirements for sensitive documents and equipment are handled with the utmost care, whether destined for Columbia or Washington DC."
],
[
'avatar' => '/imgs/clients/Jennifer Greenville.webp',
'name' => 'Jennifer Greenville',
'role' => 'Manufacturing Supply Chain Director',
'review' => "Greenville's industrial corridor requires partners who understand manufacturing timelines nationwide. Duma's freight South Carolina network connects our facilities with suppliers across America efficiently. Their real-time tracking and just-in-time delivery coordination keeps our production lines running smoothly, even during coast-to-coast supply chain disruptions."
],
[
'avatar' => '/imgs/clients/David Mount Pleasant.webp',
'name' => 'David Mount Pleasant',
'role' => 'Coastal Development Logistics Coordinator',
'review' => "Coastal construction projects require specialized equipment and materials handling from suppliers nationwide. Duma's delivery services South Carolina network navigates our salt marsh communities expertly while maintaining connections across America. Their white-glove service ensures luxury home furnishings and marine equipment arrive in perfect condition despite challenging logistics from sea to shining sea."
],
[
'avatar' => '/imgs/clients/Maria Spartanburg.webp',
'name' => 'Maria Spartanburg',
'role' => 'Automotive Parts Distribution Manage',
'review' => "The automotive industry demands precise timing and quality control across the entire supply chain. Duma's shipping South Carolina services support our BMW parts distribution with German efficiency and Southern reliability coast-to-coast. Their temperature-controlled transport and automotive-grade security protocols ensure our high-value components reach dealers and service centers throughout America in perfect condition."
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

@section('meta_title', 'Duma Shipping | South Carolina Delivery Services & Freight Solutions | All-America Palmetto State Logistics')
@section('meta_description', 'Premier delivery services from South Carolina offering reliable freight solutions from Charleston to Columbia across America. Professional South Carolina delivery services throughout the US from our Palmetto State hub. Get your SC delivery quote today!')

@section('content')

<section id="hero1" class="wrapper hero flex-center">
	<img loading="lazy" src="/imgs/home-hero-img.webp" alt="A man loads boxes into a Duma Shipping vehicle" class="hero_section_img">
	<div class="flex hero-content col aic">
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
					of every type of goods <br /> from South Carolina across America
				</h2>
			</div>
		</div>
		<a href="/calculator" class="button btn_blue">
			Calculate shipping cost
			<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
			</svg>
		</a>
	</div>
</section>
<section id="center-content" class="wrapper flex col aic">
	<h1 class="tai_c" id="hiddenH1">South Carolina's Premier Delivery Services & All-America Freight Solutions</h1>
	<div class="flex row aic">
		<div class="number-item flex col">
			<div class="flex row">
				<span class="h1">5</span>
				<span>
					<strong>YEARS</strong>
				</span>

			</div>
			<span>of delivery South Carolina experience across America</span>
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
			<span>US states covered with <br> reliable delivery service from our Palmetto State hub</span>
		</div>
	</div>
</section>
<section id="logistic" class="wrapper section-content section-content_left">
	<div class="flex ais">
		<div class="section-text">
			<div class="section-h flex col">
				<h2>
					<span class="size_lg">
						As South Carolina's trusted logistics specialists,<br>
					</span>
					we provide smart delivery solutions designed for the Palmetto State and beyond.
				</h2>
			</div>
			<p>
				<span>
					From coast-to-coast delivery South Carolina services throughout Charleston's historic port to Columbia's government district and Greenville's industrial corridor, our South Carolina shipping company ensures every shipment gets the attention it deserves with guaranteed nationwide results from our SC operations.
				</span>
			</p>
			<a href="/about" class="flex row aic uppercase color-blue">
				<strong>Discover Our South Carolina Services</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
		<div class="section-img-box flex ">
			<div class="section_img_container">
				<img loading="lazy" class="section-img" src="/imgs/home-logistic.webp" alt="Boxes by the door">
			</div>
		</div>
	</div>
</section>
<section id="services" class="section-content wrapper ">
	<span class="section-border section-border_top_l"></span>
	<div class="flex aic col section-remove-db_lr">
		<div class="flex-center col">
			<h2 class="h1 color-blue">Services</h2>
			<span class="size_lg">South Carolina Delivery Services & All-America Freight Solutions</span>
		</div>
		<div id="services_cards" class="flex row">
			<div class="service-card flex col">
				<div class="flex col">
					<div class="service-svg svg-door"></div>
					<h3><strong>Door-to-door delivery</strong></h3>
					<p>
						Expert handling of freight from South Carolina to all 50 states and shipments to South Carolina from coast to coast. Reliable delivery South Carolina services for all your shipping needs from Charleston's historic district to nationwide destinations.
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
						Professional moving services to and from South Carolina with full US coverage. Careful handling of residential relocations, corporate moves, and military transfers from the coast to the Appalachian foothills and across America.
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
						Convenient eBay pickup service from South Carolina sellers with direct delivery anywhere in America. Professional handling across the US from our Palmetto State hub from Myrtle Beach to Anderson.
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
						Secure Amazon fulfillment and South Carolina delivery services throughout the US. Reliable transportation from distribution centers in Charleston, Columbia, Greenville to anywhere in America.
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
						Our commitment ensures your South Carolina deliveries arrive exactly when scheduled anywhere in the US. Dependable shipping South Carolina services you can trust for business and tourism operations coast-to-coast.
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
						Monitor your South Carolina shipments anywhere in America through our advanced tracking platform. Complete visibility for all delivery services from our South Carolina operations throughout the US.
					</p>
				</div>
				<span class="size_md uppercase" style="color: var(--gray)"><strong>Coming soon</strong></span>
			</div>
		</div>
		<div class="flex-center col">
			<span>Our reliable South Carolina shipping network operates across America:</span>
			<span class="size_lg">Every package moves through our efficient SC logistics network with careful attention to detail for coast-to-coast delivery</span>
		</div>
	</div>
</section>
<x-geography
	title="Service Areas"
	desc="All-America delivery services from South Carolina covering every major city and region throughout the US"
	:tags="['Charleston Hub', 'Columbia Hub', 'Mount Pleasant', 'Rock Hill', 'Spartanburg', 'Summerville', 'Florence', 'Anderson', 'Myrtle Beach', 'Hilton Head', 'Aiken']"
	footer="ensuring every package travels safely from the Palmetto State to every corner of America"
    linkText="Explore Our South Carolina Services"
	/>
<section class="section_call w-full flex-center bg-blue">
	<div class="wrapper flex-center section-content">
		<div class="flex col aic color-white">
			<div class="flex col aic tai_c ">
				<span>Start your coast-to-coast delivery experience with South Carolina's most trusted shipping company.</span>
				<span class="h2">
					Your cargo deserves professional Palmetto State handling with America-wide reach.
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
					Our commitment to Southern hospitality and reliability,
				</span>
				<span>
					backed by deep South Carolina market knowledge, makes
				</span>
				<h2>Duma Shipping the smart choice for delivery South Carolina services across America.</h2>
			</div>
			<p>
				<span>At Duma Shipping, we work hard to exceed expectations.</span>
                <span>Trust America's most reliable shipping company with Palmetto State specialization for superior SC delivery services from Charleston's charm to Greenville's innovation - and everywhere in between.</span>
			</p>
			<a href="/about" class="flex row aic uppercase color-blue">
				<strong>Discover Our South Carolina Services</strong>
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
				<h2>All-America South Carolina Shipping Calculator</h2>
			</div>
			<p>
				<span>
					Get instant quotes for delivery South Carolina services across the country with our user-friendly calculator.
				</span>
				<span>
                    Whether you need shipping South Carolina for Charleston's tourism industry, Columbia's government sector, or Greenville's manufacturing hub throughout the US, our specialists ensure reliable, cost-effective SC delivery solutions coast-to-coast.
                </span>
			</p>
			<a href="/calculator" class="flex row aic uppercase color-blue">
				<strong>Calculate South Carolina Shipping Cost</strong>
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
					<span>Whether you're expanding to or from South Carolina, managing delivery across America,</span>
					<br>
					or coordinating coastal tourism logistics,
				</p>
				<h2>
					Duma Shipping ensures reliability
					<br>
					every step of the way
				</h2>
			</div>
			<div class="flex col">
				<h2>
					because America <br>deserves South Carolina's very best with Palmetto State expertise
				</h2>
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
			<p class="flex-center">Experience seamless logistics with our coast-to-coast South Carolina delivery services as our clients do!</p>
		</div>
		<div id="clientSlider" class="slider flex row aic" id="comments-slider">
			<div class="slider-pages flex row">


				@foreach($clients as $index => $client)
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
				<span>About Our All-America South Carolina Delivery & Freight Services</span>
			</div>
		</div>
		<div id="faqsAccordion" class="accordion flex col aic">
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>

					<h3><strong>What is your standard delivery timeline for coast-to-coast South Carolina shipments?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
					Most orders placed before 2 PM EST ship the same day. For delivery South Carolina services throughout the US, transit times vary by region - typically 1-2 business days for Southeast deliveries, and 2-5 days for coastal resort areas and destinations across America. All packages include real-time tracking.
				</span>
			</div>
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>

					<h3><strong>Do you offer specialized freight services from South Carolina across America?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
					Yes, we provide comprehensive South Carolina shipping services including tourism and hospitality logistics, automotive parts distribution, textile transport, and military base deliveries throughout the US. Our freight South Carolina network handles everything from historic preservation materials to aerospace components coast-to-coast.
				</span>
			</div>
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>
					<h3><strong>What are your policies regarding returns and all-America South Carolina delivery services?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
					Return shipping is available for most items, with exceptions for hazardous materials and oversized cargo. Our delivery South Carolina network includes special return arrangements for resort properties, manufacturing clients, and military installations throughout the US. Contact our customer service team for specific SC delivery return options.
				</span>
			</div>
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>
					<h3><strong>How do replacement shipments work for coast-to-coast South Carolina deliveries?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
					If your South Carolina delivery is damaged or lost while in our care and covered under our standard shipping protection, replacement shipping throughout our all-America network is provided at no additional cost. For tourism and manufacturing clients, expedited replacement protocols ensure minimal disruption to operations coast-to-coast.
				</span>
			</div>
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>

					<h3><strong>What tracking systems do you use for South Carolina to nationwide shipments?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
					Track all South Carolina deliveries in real-time through our online portal. Your tracking number works for all delivery services from South Carolina throughout Charleston, Columbia, Greenville, Myrtle Beach, and to destinations across America. Resort and business clients receive enhanced tracking with delivery confirmation and guest notification services.
				</span>
			</div>
			<div class="accordion-item flex col">
				<div class="accordion-item_header flex row aic">
					<svg width="21" height="28" viewBox="0 0 21 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.57812 10.8711L0.410156 10.0898C1.50391 3.98307 5.05208 0.929688 11.0547 0.929688C14.0755 0.929688 16.4583 1.73047 18.2031 3.33203C19.9479 4.92057 20.8203 6.89323 20.8203 9.25C20.8203 10.2917 20.6445 11.2422 20.293 12.1016C19.9544 12.9609 19.5117 13.6706 18.9648 14.2305C18.431 14.7773 17.5586 15.4935 16.3477 16.3789C15.4232 17.056 14.8307 17.5508 14.5703 17.8633C14.3229 18.1628 14.1536 18.6055 14.0625 19.1914H7.57812C7.57812 17.6159 7.71484 16.4831 7.98828 15.793C8.27474 15.0898 8.85417 14.3477 9.72656 13.5664C11.0417 12.3815 11.862 11.5026 12.1875 10.9297C12.513 10.3438 12.6758 9.66667 12.6758 8.89844C12.6758 8.09115 12.4609 7.47266 12.0312 7.04297C11.6016 6.60026 11.0677 6.37891 10.4297 6.37891C8.54167 6.37891 7.59115 7.8763 7.57812 10.8711ZM14.8047 20.8711V28H7.32422V20.8711H14.8047Z" fill="#F59A17" />
					</svg>

					<h3><strong>What areas do your South Carolina shipping services cover?</strong></h3>
					<svg width="28" height="28" class="accordion-item_header-arrow" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6L17 14L12 22H10L15 14L10 6L12 6Z" fill="black" />
					</svg>
				</div>
				<span class="accordion-item_body">
					Our delivery South Carolina services cover all 50 states from the Blue Ridge foothills to the Atlantic coast, Charleston's historic peninsula to the Upstate industrial corridor. We provide comprehensive shipping South Carolina solutions connecting resort destinations with urban centers throughout America.
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
				<h2 class="color-white">shipping South Carolina to worldwide destinations <br> or coast-to-coast delivery, hospitality, and industrial services,</h2>
			</div>
			<div class="tai_r">
				<h2 class="color-white">our South Carolina shipping platform makes placing <br> your order <strong>fast and efficient</strong></h2>
			</div>
		</div>
	</div>
</section>
<section id="checkOut" class="wrapper section-content">
	<span class="section-border section-border_top_l"></span>
	<div class="flex col aic">
		<h2 class='txt-block'>Check out</h2>
		<p class='txt-block'>
			Finalize your coast-to-coast South Carolina shipping order with Duma <br> using our simple and secure check-out process
		</p>
	</div>
	<span class="section-border section-border_bottom_r"></span>
</section>

<section class="section_call w-full flex-center ">
	<div class="wrapper flex-center section-content">
		<div class="flex col aic">
			<div class="flex col aic tai_c">
				<h2>
					Experience premier South Carolina delivery services <br>with Duma shipping specialists
				</h2>
				<p>and get your cargo moving from the Palmetto State across America today!</p>
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
