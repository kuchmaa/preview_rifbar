<div class="dropdown col between" id="nav-menu">
	<div class="flex col">
		<div id="closeMeinMenu" class="close">
			<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
				<path d="M480-424 284-228q-11 11-28 11t-28-11q-11-11-11-28t11-28l196-196-196-196q-11-11-11-28t11-28q11-11 28-11t28 11l196 196 196-196q11-11 28-11t28 11q11 11 11 28t-11 28L536-480l196 196q11 11 11 28t-11 28q-11 11-28 11t-28-11L480-424Z" />
			</svg>
		</div>

		<a class="size_sl {{ Request::is('services.index') ? 'light-orange' : ''}}" href="{{ route('services.index') }}"><strong>Services</strong></a>
		<a class="size_sl {{ Request::is('about') ? 'light-orange' : ''}}" href="{{ route('about') }}"><strong>About Us</strong></a>
		<a class="size_sl {{ Request::is('contacts') ? 'light-orange' : ''}}" href="{{ route('contacts') }}"><strong>Contacts</strong></a>
		<a class="size_sl {{ Request::is('tracking') ? 'light-orange' : ''}}" href="{{ route('tracking') }}"><strong>Tracking</strong></a>
		<a class="size_sl {{ Request::is('calculator') ? 'light-orange' : ''}}" href="{{ route('calculator') }}"><strong>Calculator</strong></a>
	</div>
	<div class="flex col">
		<div id="nav-contacts" class="flex col">
			<a href="mailto:info@dumashipping.com" class="span_svg flex row aic">
				<div class="icon flex-center">
					<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M20 0H0V16H20V0ZM18 4L10 9L2 4V2L10 7L18 2V4Z" fill="black" />
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
		<a href="/calculator">
			<button>Calculate<br />Shipping Cost</button>
		</a>
	</div>
</div>
