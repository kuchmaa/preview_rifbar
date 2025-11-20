<footer class="bg-blue">
	<div class="wrapper flex col">
		<div class="footer-section ais row flex">
			<div class='flex col  between'>
				<div id="footer-links" class="flex row ">
					<div class="flex col">
						<a href="/"><strong>Home</strong></a>
						<a href="{{ route('services.index') }}"><strong>Services</strong></a>
						<a href="{{ route('blog.index') }}"><strong>Blog</strong></a>
						<!-- <a href="">Why Choose</a> -->
						<a href="/#geography">Geography</a>
					</div>
					<div class="flex col">
						<a href="{{ route('services.index') }}"><strong>Services</strong></a>
						<a href="/services#deliveryMan">Door-to-door delivery</a>
						<a href="{{ route('services.moving-assistance') }}">Moving assistance</a>
						<a href="/services#eBay">eBay local pick-up</a>
						<a href="/services#amazon">Amazon delivery</a>
						<a href="/services#onTime">On-time delivery guarantee</a>
					</div>
					<div class="flex col">
						<a href="/contacts"><strong>Contacts</strong></a>
						<!-- <a href=""><strong>FAQ</strong></a> -->
						<a href="/calculator"><strong>Calculate Shipping Cost</strong></a>
						<a href="/cabinet"><strong>Your Account</strong></a>
					</div>

				</div>

			</div>
			<div id="footer-contacts" class="flex col border-white">
				<div class="flex col color-white ais">
					<span>{{$contactsText}}</span>
					<a href="/contacts" class="button border-white">
						<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
						</svg>
						Contact Us
					</a>
				</div>
				{{--
				<div class="flex col color-white ais">
					<a class="span_svg flex aic row" href="tel:+16314314242">
						<div class="icon flex-center">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20.0001 17.92V14.92C20.0123 14.4296 20 13.9999 20 13.9999L14 11.9999C14 11.9999 13.632 12.3711 13.3601 12.64L12.0901 13.91C9.58657 12.4864 7.51367 10.4135 6.09012 7.91L7.36012 6.64C7.62898 6.36811 8 5.99995 8 5.99995L6 -5.50726e-05C6 -5.50726e-05 5.59542 -0.00477508 5.11012 1.36602e-06H2.11012H0L0.120117 2.18C0.44836 5.271 1.5001 8.24121 3.19012 10.85C4.72545 13.2662 6.77394 15.3147 9.19012 16.85C11.7871 18.5341 14.743 19.5856 17.8201 19.92L20 19.9999L20.0001 17.92Z" />
							</svg>
						</div>
						<span class="phone"><strong>+1 (631) 431-4242</strong></span>
					</a>
					<a href="mailto:info@dumashipping.com" class="span_svg flex row aic">
						<div class="icon flex-center">
							<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20 0H0V16H20V0ZM18 4L10 9L2 4V2L10 7L18 2V4Z"></path>
							</svg>
						</div>
						<span class="size_sl">info@dumashipping.com</span>
					</a>

				</div>
				--}}
			</div>
		</div>
		{{--
			Ссылки для страниц для определённого штата
		<div class="flex row" id="footer-city">
			<a>NEW YORK</a>
			<a>NEW JERSEY</a>
			<a>PENNSYLVANIA</a>
			<a>DELAWARE</a>
			<a>MARYLAND</a>
			<a>DISTRICT OF COLUMBIA</a>
			<a>VIRGINIA</a>
			<a>NORTH CAROLINA</a>
			<a>SOUTH CAROLINA</a>
			<a>GEORGIA</a>
			<a>FLORIDA</a>
		</div>
		--}}
		<div class="footer-section row flex aic">
			<div class="flex row social-links-wrapper">
				<a class="social-oval" target="_black" href="https://www.facebook.com/share/1LGLtdT4Pp/">
					<svg viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
						<path xmlns="http://www.w3.org/2000/svg" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
					</svg>
				</a>
			</div>
			<div id="footer-terms" class="flex row">
				<a class="size_sl" href="/terms">Terms</a>
				<a class="size_sl" href="/privacy">Privacy</a>
				<a class="size_sl" href="/cookies">Cookies</a>
			</div>
		</div>
	</div>
</footer>
