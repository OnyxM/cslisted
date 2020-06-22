@extends('layouts.app')


@section('content')
<!-- Page Title-->
  <div class="page-title-wrapper" aria-label="Page title">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
          </li>
          <li class="breadcrumb-item"><a href="#">Cart</a>
          </li>
        </ol>
      </nav>
      <h1 class="page-title">Cart</h1><span class="d-block mt-2 text-muted"></span>
      <hr class="mt-4">
    </div>
  </div>
<div class="row">
  <div class="col-xl-9 col-md-8">
    <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary"><span>Products</span><a class="font-size-sm" href="{{ route('home') }}"><i data-feather="chevron-left" style="width: 1rem; height: 1rem;"></i>Continue shopping</a></h2>
    @foreach ($cartContent as $content)
      <!-- Item-->
      <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
        <div class="media d-block d-sm-flex text-center text-sm-left"><a class="cart-item-thumb mx-auto mr-sm-4" href="shop-single-apparel.html"><img src="{{ $content->attributes['image_url'] }}" alt="Product"></a>
          <div class="media-body pt-3">
            <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="shop-single-apparel.html">{{$content->name}}</a></h3>
            <div class="font-size-lg text-primary pt-2">{{ $content->price }}</div>
          </div>
        </div>
        <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
          <div class="form-group mb-2">
            <label for="quantity1">Quantity</label>
            <input class="form-control form-control-sm" type="number" id="quantity1" value="{{ $content->quantity }}">
          </div>
          <button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button"><i class="mr-1" data-feather="refresh-cw"></i>Update cart</button>
          <a href="{{ route('remove-cart',[
            'id' => $content->id
          ]) }}" class="btn btn-outline-danger btn-sm btn-block mb-2"><i class="mr-1" data-feather="trash-2"></i>Remove</a>
        </div>
      </div>
    @endforeach
  </div>
  <!-- Sidebar-->
  <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
    <h2 class="h6 px-4 py-3 bg-secondary text-center">Subtotal</h2>
    <div class="h3 font-weight-semibold text-center py-3">{{ Cart::getTotal() }} <span>FCFA</span></div>
    <hr>
    <a class="btn btn-primary btn-block" href="{{ route('checkout') }}"><i class="mr-2" data-feather="credit-card"></i>Proceed to Checkout</a>
  </div>
</div>
@endsection
