<div class="container mb-5">
<div class="owl-carousel" data-owl-carousel='{ "nav": false, "dots": true, "loop": true, "margin": 30, "autoplay": true, "autoplayTimeout": 4000}'>
  	@foreach ($carousel_images as $carousel_image)
	    <img src="{{ $carousel_image }}" style='object-fit: cover;object-position:bottom' alt="Carousel Image"/>
  	@endforeach
  </div>
</div>
