@extends('layouts.app')

@section('before-end')
<!-- Leave a Review-->
<form class="needs-validation modal fade" id="leaveReview" tabindex="-1" method="POST" action="{{ route('review.store') }}">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Leave a review</h4>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="review-name">Your name</label>
							<input class="form-control" type="text" id="review-name" name='owner_name' required>
							@error('owner_name')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="review-email">Your email</label>
							<input class="form-control" type="email" id="review-email" name="owner_email" required>
							@error('owner_email')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="review-rating">Rating</label>
							<select class="form-control custom-select" id="review-rating" name="rating" required>
								<option value>Choose rating...</option>
								<option value="1">1 Star</option>
								<option value="2">2 Stars</option>
								<option value="3">3 Stars</option>
								<option value="4">4 Stars</option>
								<option value="5">5 Stars</option>
							</select>
							<div class="row">
								<div class="col">qua
									<div class="rateit" data-rateit-backingfld="#review-rating"></div>
								</div>
							</div>
							@error('rating')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>
				@csrf
				<input type="hidden" name="posting_id" value="{{ $posting->id }}">
				<div class="form-group">
					<label for="review-message">Review</label>
					<textarea class="form-control" id="review-message" rows="8" name="content" required></textarea>
					@error('review')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="submit">Submit review</button>
			</div>
		</div>
	</div>
</form>
@endsection


@section('content')
<!-- Page Title-->
<div class="page-title-wrapper" aria-label="Page title">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="mt-n1 mr-1"><i data-feather="home"></i></li>
				<li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a>
				</li>
				<li class="breadcrumb-item"><a href="#">{{ $posting->categories->first()->name }}</a>
				</li>
				<li class="breadcrumb-item"><a href="#">{{ $posting->name }}</a>
				</li>
			</ol>
		</nav>
		<h1 class="page-title">{{ $posting->name }}</h1><span class="d-block mt-2 text-muted"></span>
		<hr class="mt-4">
	</div>
</div>
<div class="container pb-4">
	<div class="row">
		<div class="col-lg-7">
			<!-- Product gallery-->
			<div class="product-gallery">
				@if ($posting->hasDiscount())
				<span class="badge badge-danger">Sale -{{ $posting->discount }}%</span>
				@endif
				<ul class="product-thumbnails">
					@forelse ($posting->getMedia('postings') as $media)
					<li class="active">
						<a href="#{{ $media->id }}">
							<img src="{{ $media->getFullUrl() }}" alt="{{ $posting->slug }}">
						</a>
					</li>
					@empty
					<li class="active">
						<a href="#default">
							<img src="{{ $posting->getFirstOrDefaultMediaUrl() }}" alt="default">
						</a>
					</li>
					@endforelse
				</ul>
				<div class="product-carousel owl-carousel">
					@forelse ($posting->getMedia('postings') as $media)
					<a href="{{ $media->getFullUrl() }}" data-fancybox="prod-gallery" data-hash="{{ $media->id }}"><img src="{{ $media->getFullUrl() }}" alt="{{ $posting->slug }}"></a>
					@empty
					<a href="{{ $posting->getFirstOrDefaultMediaUrl() }}" data-fancybox="prod-gallery" data-hash="default"><img src="{{ $posting->getFirstOrDefaultMediaUrl() }}" alt="default" style="max-width: 15rem"></a>
					@endforelse
				</div>
			</div>
		</div>
		<!-- Product details    -->
		<div class="col-lg-5 pt-4 pt-lg-0">
			<div class="pb-4"><a class="d-inline-block scroll-to" href="#reviews">
					<div class="star-rating">
						@for ($i = 1; $i <= 5; $i++) <i class="sr-star @if ($i <= $posting->rating)
		              		active
		              	@endif" data-feather="star"></i>
							@endfor
					</div>
					<span class="d-inline-block align-middle font-size-sm mt-1 ml-1 text-body">{{ $posting->reviews->count() }} reviews</span>
				</a>
				<h3 class="h1 font-weight-light pt-3 pb-2">
					@if ($posting->hasDiscount())
					<del class="lead text-muted mr-2">{{ $posting->formatted_regular_price }} FCFA</del>
					@endif
					<span class="text-primary">{{ $posting->formatted_price }} FCFA</span>
				</h3>
				<p>Quantity: {{$posting->quantity}}</p>
				@if($posting->delivery_time)
				    <p>Delivery time: {{$posting->delivery_time}}</p>
				@endif
				<p>Posted By: {{$posting->user->name}} ({{$posting->user->phonenumber}}) &nbsp;<a href="https://wa.me/237{{str_replace(" ","",$posting->user->phonenumber) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" /></svg></a></p>

				<div class="d-flex align-items-center pt-2">
					<a class="btn btn-primary btn-block bg-purple" href="{{ route('add-cart',[
		              'id' => $posting->id
		            ]) }}"><i class="mr-2" data-feather="shopping-cart"></i>Add to cart</a>
				</div>
				<div class="d-flex flex-wrap align-items-center pt-3">
					<form method="POST" action="{{ route('user.wishlist.add') }}">
						<input type="hidden" name="posting_id" value="{{ $posting->id }}">
						@csrf
						<button class="btn box-shadow-0 nav-link-inline px-4" type="submit">
							<i class="align-middle mr-1" data-feather="heart" style="width: 1.1rem; height: 1.1rem;"></i>
							Add to wishlist
						</button>
					</form>
				</div>
				<form action="{{ route('chat.start') }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="user_id" value="{{ $posting->user_id }}">
					<button type="submit" class="btn btn-info">Chat with {{ $posting->user->name }}</button>
				</form>
				<div class="d-flex flex-wrap align-items-center pt-3">
					<!-- AddToAny BEGIN -->
					<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
						<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
						<a class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
						<a class="a2a_button_email"></a>
						<a class="a2a_button_sms"></a>
						<a class="a2a_button_whatsapp"></a>
					</div>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
					<!-- AddToAny END -->
				</div>
			</div>
		</div>
	</div>
	<!-- Product info-->
	<div class="bg-secondary pt-5 pb-4 mt-5" id="product-details" data-offset-top="-5">
		<div class="container pt-sm-3 pb-sm-3">
			<div class="row">
				<div class="col-md-12">
					<h3 class="h5 mb-3">Details</h3>
					<p>
						{!! html_entity_decode(nl2br($posting->description)) !!}
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Reviews-->
	<div class="container pt-5 pb-1 pb-md-4" id="reviews" data-offset-top="-5">
		<div class="row pt-sm-3">
			<div class="col-md-12 pb-5">
				<h2 class="h3">
					Latest reviews
				</h2>
				<div class="py-2">
					<a class="btn btn-warning btn-block" href="#leaveReview" data-toggle="modal">Leave a review</a>
				</div>
				@forelse($posting->activeSortedReviews() as $review)
				<div class="blockquote comment border-top-0 border-left-0 border-right-0 px-0 pt-0">
					<div class="d-sm-flex align-items-center pb-2">
						<span class="d-none d-sm-inline font-weight-bold">{{ $review->owner_name }} &nbsp;</span>
						<div class="star-rating">
							@for ($i = 1; $i <= 5 ; $i++) <i class="sr-star @if ($i < $review->rating)
				            		active
				            	@endif" data-feather="star"></i>
								@endfor
						</div>
					</div>
					<p>
						{{ $review->content }}
					</p>
					<div class="media align-items-center mb-2">
						<div class="media-body">
							<span class="d-block font-size-sm text-muted">{{ $review->created_at }}</span>
						</div>d
					</div>
				</div>
				@empty
				<p>No review</p>
				@endforelse
			</div>
		</div>
	</div>
	<!-- recommandation-->
	@if($recommandations->isNotEmpty())
	<div class="container pb-1 pb-md-4" id="reviews" data-offset-top="-5">
		<div class="row pt-sm-3">
			<div class="col-md-12 pb-5">
				<h2 class="h3">
					Also see
				</h2>
				@include("front.posting-loop",["postings"=>$recommandations])
			</div>
		</div>
	</div>
	@endif
</div>
@endsection