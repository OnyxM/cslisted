@extends('layouts.app')

@section('content')
	<div class="page-title-wrapper" aria-label="Page title">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Profile</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title">
        	<a href="{{ $user->profile_picture_url }}">
	    		<img src="{{ $user->profile_picture_url }}" alt="{{ $user->name }}" class="img-fluid" style="max-width: 50px" />
	    	</a>
	    	{{ $user->name }}</h1><span class="d-block mt-2 text-muted"></span>
        	<hr class="mt-4">
      </div>
    </div>
	<div class="row m">
	  <div class="col-lg-9">
	    <p>
	    	@if($user->profile_description)
		    	{{ $user->profile_description }}
		    @else
		    	No profile description
	    	@endif
	    </p>
	  </div>
	</div>
	@if(!$postings->isEmpty())
		<div class="container pb-1 pb-md-4 px-0" id="reviews" data-offset-top="-5">
			<div class="row pt-sm-3">
				<div class="col-md-12 pb-5">
					<h2 class="h3">
						Lastest postings
					</h2>
					@include("front.posting-loop",["postings"=>$postings])
				</div>
			</div>
		</div>
	@endif
@endsection