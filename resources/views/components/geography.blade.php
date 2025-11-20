<section id="geography" class="wrapper flex row aic section-content">
	<span class="section-border section-border_top_r"></span>
	<div class="flex row">
		<div class="section-text flex col">
			<span class="color-blue h1">{{$title}}</span>
			<img id="map" loading="lazy" src="/imgs/map.webp" alt="NYC and East Coast delivery coverage map">
			<span><strong>{{$desc}}</strong></span>
			<div id="tags" class="flex row">
				@foreach ($tags as $tag)
				<div class="tag color-blue uppercase flex row aic">
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M14 23.5C14 23.5 20 15.2371 20 11.7727C20 8.3084 17.3137 5.5 14 5.5C10.6863 5.5 8 8.3084 8 11.7727C8 15.2371 14 23.5 14 23.5ZM14 14.2273C15.2246 14.2273 16.2174 13.1894 16.2174 11.9091C16.2174 10.6288 15.2246 9.59091 14 9.59091C12.7754 9.59091 11.7826 10.6288 11.7826 11.9091C11.7826 13.1894 12.7754 14.2273 14 14.2273Z" />
					</svg>
					{{$tag}}
				</div>
				@endforeach
			</div>
			<span>{{$footer}}</span>
			<div class="flex wrap row">
				<a href="/services" class="flex row aic uppercase color-blue">
					<strong>{{$linkText}}</strong>
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
					</svg>
				</a>
                <span class="size_md" style="margin-left:14px text-wrap: wrap;">
                    or get a <a href="/calculator"><strong>freight shipping New York quote</strong></a>
                    from our <a href="/contacts"><strong>New York freight company</strong></a>
                </span>
			</div>
		</div>
	</div>
</section>
