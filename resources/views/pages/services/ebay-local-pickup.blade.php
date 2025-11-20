@extends('layouts.app')

@section('meta_title', 'eBay Local Pick-Up Service | Duma Shipping')
@section('meta_description', 'Convenient eBay pick-up service: we collect your purchases and deliver them directly to your door. Save time and hassle with Duma Shipping.')

@section('content')

<section id="hero1" class="hero wrapper flex-center">
	<img loading="lazy" src="/imgs/home-hero-img.webp" alt="Courier collecting an eBay package" class="hero_section_img">
	<div class="hero-content flex col aic">
		<div class="hero-text flex col">
			<h1 class="color-blue flex col">
				eBay Local Pick-Up
			</h1>
			<p>
				We Handle Your eBay Purchases from Seller to Your Door
			</p>
		</div>
		<a href="/contacts" class="button btn_blue">
			<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
			</svg>
			<strong>Get Quote</strong>
		</a>
	</div>
</section>

<section id="ebay" class="wrapper flex section-content section-content_left">
	<div class="flex ais">
		<div class="section-text flex col">
			<div class="section-h flex col">
				<div class="service-card flex row aic">
					<div class="service-svg svg-ebay"></div>
					<span>From Seller to Your Doorstep</span>
				</div>
				<h2>Simplify your eBay shipping with our local pick‑up network.</h2>
                <p>
                    <span>
                        Found the perfect items on eBay but facing pickup challenges? Our eBay collection service handles the logistics for you.<br>
                        We coordinate with sellers, verify item condition, and provide secure transportation to your location.
                    </span>
                    Need hassle-free eBay item collection and delivery?
                </p>
			</div>

			<a href="/contacts" class="flex row aic uppercase color-blue">
				<strong>Contact Us</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
		<div class="section-img-box">
			<div class="section_img_container">
				<img loading="lazy" src="/imgs/0_01.webp" alt="Courier collecting eBay packages for delivery" class="section-img">
			</div>
		</div>
	</div>
</section>

<section id="benefits" class="wrapper section-content">
    <div class="flex-center col section-remove-db_lr">
        <h2>Benefits</h2>
        <ul class="flex w-full wrap row">
            <li class="service-card flex col">
                <div class="flex col">
                    <div class="service-svg svg-coordinates"></div>
                    <h3><strong>Hassle-Free Collection</strong></h3>
                    <p>
                        No coordination with multiple sellers.
                    </p>
                </div>
            </li>
            <li class="service-card flex col">
                <div class="flex col">
                    <div class="service-svg svg-clock"></div>
                    <h3><strong>Flexible Windows</strong></h3>
                    <p>
                        Schedule pickup times that fit your day.
                    </p>
                </div>
            </li>
            <li class="service-card flex col">
                <div class="flex col">
                    <div class="service-svg svg-secure"></div>
                    <h3><strong>Secure Handling</strong></h3>
                    <p>
                        Professional packaging and signature confirmation.
                    </p>
                </div>
            </li>
        </ul>
</section>

<section id="how-it-works" class="wrapper section-content">
    <span class="section-border section-border_top_l"></span>

	<div class="section-h flex col aic">
		<h2>How It Works</h2>
	</div>

	<!-- Timeline Process -->
	<div class="process-timeline">
		<div class="timeline-line"></div>

		<div class="timeline-step flex row">
			<div class="timeline-content">
				<div class="step-badge">
					<span class="step-number">1</span>
				</div>
				<div class="step-info">
					<h3>FREE CONSULTATION</h3>
					<p>We assess your moving needs and provide a detailed, no-obligation quote with transparent pricing.</p>
				</div>
			</div>
		</div>

		<div class="timeline-step">
			<div class="timeline-content">
				<div class="step-badge">
					<span class="step-number">2</span>
				</div>
				<div class="step-info">
					<h3>PLANNING & SCHEDULING</h3>
					<p>Our team creates a customized moving plan and schedules your move at your convenience.</p>
				</div>
			</div>
		</div>
		<div class="timeline-step timeline-step-left">
			<div class="timeline-content">
				<div class="step-badge">
					<span class="step-number">3</span>
				</div>
				<div class="step-info">
					<h3>PROFESSIONAL PACKING</h3>
					<p>Expert packing using high-quality materials to ensure your belongings are protected during transport.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="how-it-works" class="wrapper section-content section-content_left">
	<div class="flex ais">
		<div class="section-text flex col">
			<div class="section-h flex col">
				{{-- <div class="service-card flex row aic">
					<div class="service-svg svg-specialty"></div>
					<span>Specialty Item Moving</span>
				</div> --}}
				<h2>How It Works</h2>
			</div>
			<p>
				<span>
					Our <strong>specialty moving services</strong> include pianos, artwork, antiques, electronics, and other high-value items. We use custom crating, specialized equipment, and extra care protocols to ensure your precious belongings arrive safely.
				</span>
				Expert handling for items that require special attention and care.
			</p>
			<a href="/contacts" class="flex row aic uppercase color-blue">
				<strong>Specialty Moving</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
		<div class="section-img-box">
            <div class="section_img_container">
    			<img loading="lazy" loading="lazy" src="/imgs/service-boxs.webp" alt="Careful handling of fragile artwork and antiques" class="section-img">
            </div>
        </div>
	</div>
</section>

<section id="packingServices" class="wrapper section-content section-content_left">
	<div class="flex ais">
		<div class="section-img-box">

			<div class="section_img_container"><img loading="lazy" loading="lazy" src="/imgs/laptop-box.webp" alt="Professional packing materials and boxes" class="section-img"></div>

        </div>
		<div class="section-text flex col">
			<div class="section-h flex col">
				<div class="service-card flex row aic">
					<div class="service-svg svg-packing"></div>
					<span>Packing & Unpacking Services</span>
				</div>
				<h2>Complete Packing Solutions</h2>
			</div>
			<p>
				<span>
					Save time and ensure protection with our <strong>professional packing services</strong>. We provide all materials and expertly pack your belongings using industry-best practices. Full unpacking services available at your destination.
				</span>
				Professional packing to protect your belongings during the move.
			</p>
			<a href="/contacts" class="flex row aic uppercase color-blue">
				<strong>Packing Services</strong>
				<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
				</svg>
			</a>
		</div>
	</div>
</section>

<!-- Moving Process Section -->
<section id="movingProcess" class="wrapper section-content">
	<div class="section-h flex col aic">
		<h2>Our Moving Process</h2>
		<span>Simple, transparent, and stress-free moving experience</span>
	</div>

	<!-- Timeline Process -->
	<div class="process-timeline">
		<div class="timeline-line"></div>

		<div class="timeline-step timeline-step-left">
			<div class="timeline-content">
				<div class="step-badge">
					<span class="step-number">1</span>
				</div>
				<div class="step-info">
					<h3>FREE CONSULTATION</h3>
					<p>We assess your moving needs and provide a detailed, no-obligation quote with transparent pricing.</p>
				</div>
			</div>
		</div>

		<div class="timeline-step timeline-step-right">
			<div class="timeline-content">
				<div class="step-badge">
					<span class="step-number">2</span>
				</div>
				<div class="step-info">
					<h3>PLANNING & SCHEDULING</h3>
					<p>Our team creates a customized moving plan and schedules your move at your convenience.</p>
				</div>
			</div>
		</div>

		<div class="timeline-step timeline-step-left">
			<div class="timeline-content">
				<div class="step-badge">
					<span class="step-number">3</span>
				</div>
				<div class="step-info">
					<h3>PROFESSIONAL PACKING</h3>
					<p>Expert packing using high-quality materials to ensure your belongings are protected during transport.</p>
				</div>
			</div>
		</div>

		<div class="timeline-step timeline-step-right">
			<div class="timeline-content">
				<div class="step-badge">
					<span class="step-number">4</span>
				</div>
				<div class="step-info">
					<h3>SAFE TRANSPORTATION</h3>
					<p>Secure loading and careful transportation with real-time tracking and updates throughout the journey.</p>
				</div>
			</div>
		</div>

		<div class="timeline-step timeline-step-left">
			<div class="timeline-content">
				<div class="step-badge">
					<span class="step-number">5</span>
				</div>
				<div class="step-info">
					<h3>DELIVERY & SETUP</h3>
					<p>Careful unloading, unpacking, and placement of items in your new location exactly where you want them.</p>
				</div>
			</div>
		</div>

		<div class="timeline-step timeline-step-right">
			<div class="timeline-content">
				<div class="step-badge">
					<span class="step-number">6</span>
				</div>
				<div class="step-info">
					<h3>FOLLOW-UP</h3>
					<p>We ensure your complete satisfaction and address any concerns after your move is complete.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- CTA Section -->
<section id="movingCTA" class="wrapper section-content bg-blue">
	<div class="cta-content flex col aic">
		<h2 class="color-white">Ready to Make Your Move?</h2>
		<p class="color-white">Get a free, no-obligation quote for your moving needs today</p>
		<div class="cta-buttons flex row">
			<a href="/contacts" class="button btn_white">
				<strong>Get Free Quote</strong>
			</a>
			<a href="/calculator" class="button btn_outline_white">
				<strong>Calculate Cost</strong>
			</a>
		</div>
	</div>
</section>

<x-footer contactsText="Ready to move? Contact us today for a free quote and let our professional moving team handle your relocation with care and expertise." />

@endsection

@push('styles')
    <link rel="stylesheet" href="/css/services/ebay-local-pick-up.css">
@endpush
