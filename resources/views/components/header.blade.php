<header class="flex-center">
	<div class="flex aic row wrapper">
		<div class="flex aic row header-child">
			<a href="/"><img src="{{asset('/svg/logo-white.svg')}}" alt="logo" class="logo"></a>
			@include('components.nav')
		</div>
		<div class="flex row header-child">
			<div id="header-contacts" class="flex col">
				<a href="mailto:info@dumashipping.com" class="span_svg flex row aic">
					<div class="icon flex-center">
						<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M20 0H0V16H20V0ZM18 4L10 9L2 4V2L10 7L18 2V4Z" />
						</svg>
					</div>
					<span class="size_sl">info@dumashipping.com</span>
				</a>
				<a class="flex row aic" href="tel:+16314314242">
					<div class="span_svg flex aic row color-blue">
						<div class="icon flex-center">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20.0001 17.92V14.92C20.0123 14.4296 20 13.9999 20 13.9999L14 11.9999C14 11.9999 13.632 12.3711 13.3601 12.64L12.0901 13.91C9.58657 12.4864 7.51367 10.4135 6.09012 7.91L7.36012 6.64C7.62898 6.36811 8 5.99995 8 5.99995L6 -5.50726e-05C6 -5.50726e-05 5.59542 -0.00477508 5.11012 1.36602e-06H2.11012H0L0.120117 2.18C0.44836 5.271 1.5001 8.24121 3.19012 10.85C4.72545 13.2662 6.77394 15.3147 9.19012 16.85C11.7871 18.5341 14.743 19.5856 17.8201 19.92L20 19.9999L20.0001 17.92Z" />
							</svg>
						</div>
						<span class="phone"><strong>+1 (631) 431-4242</strong></span>
					</div>
				</a>
			</div>
			<a id="header-phone" href="tel:+16314314242" class="flex-center">
				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M24 21.92V18.92C24.0122 18.4296 23.9999 17.9999 23.9999 17.9999L17.9999 15.9999C17.9999 15.9999 17.6319 16.3711 17.36 16.64L16.09 17.91C13.5864 16.4864 11.5136 14.4135 10.09 11.91L11.36 10.64C11.6289 10.3681 11.9999 9.99995 11.9999 9.99995L9.99988 3.99994C9.99988 3.99994 9.5953 3.99522 9.11 4H6.11H3.99988L4.12 6.18C4.44824 9.271 5.49997 12.2412 7.19 14.85C8.72533 17.2662 10.7738 19.3147 13.19 20.85C15.787 22.5341 18.7428 23.5856 21.82 23.92L23.9999 23.9999L24 21.92Z" fill="#304FFF" />
				</svg>
			</a>
			<a class="flex-center" href="/cabinet">
				<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M24 12.5C24 15.5376 21.5376 18 18.5 18C15.4624 18 13 15.5376 13 12.5C13 9.46243 15.4624 7 18.5 7C21.5376 7 24 9.46243 24 12.5Z" />
					<path d="M9 29C9 24.0294 13.0294 20 18 20C22.9706 20 27 24.0294 27 29H9Z" />
				</svg>
			</a>

			<a href="/calculator" id='header-calc-btn'><button>Calculate<br />Shipping Cost</button></a>
			<div id="menu-button" class="flex-center">
				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6 15L22 15V13L6 13V15Z" fill="black" />
					<path d="M9 21L22 21V19H9V21Z" fill="black" />
					<path d="M12 9L22 9V7L12 7V9Z" fill="black" />
				</svg>
			</div>
		</div>
	</div>
</header>
