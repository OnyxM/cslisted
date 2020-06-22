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
          <li class="breadcrumb-item"><a href="#">Checkout</a>
          </li>
          </li>
        </ol>
      </nav>
      <h1 class="page-title">Checkout</h1><span class="d-block mt-2 text-muted"></span>
      <hr class="mt-4">
    </div>
  </div>
  <div class="container pb-4">
    <div class="row">       
      <div class="col-md-9">
        <h3>Your Personal Details</h3>
        @if(isset($errors))
        @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
          @endif
        @endif
        <form action="{{ route('order.store') }}" method="POST">
          <div class="form-group">
            <label for="name">Name <span class="require">*</span></label>
            <input type="text" id="name" value='@auth{{auth()->user()->name}}@endauth' name="customer_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="address">Address <span class="require">*</span></label>
            <input type="text" id="address" name="customer_address" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">E-Mail <span class="require">*</span></label>
            <input type="text" id="email" value='@auth{{auth()->user()->email}}@endauth' name="customer_email" class="form-control">
          </div>
          <div class="form-groupl">
            <label for="telephone">Telephone <span class="require">*</span></label>
            <input type="text" id="telephone" name="customer_phone" class="form-control">
          </div>
          <div class="form-groupl">
            <label for="telephone">City <span class="require">*</span></label>
            <select name="city_id" class="form-control" id="">
              @foreach ($globalCities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="fax">Comment</label>
            <textarea class="form-control" name="comment" id="" rows="6"></textarea>
          </div>
          @csrf
          <h4>Total:  {{ Cart::getTotal() }} XAF</h4>

          <button type="submit" class="btn btn-info">submit</button>   
        </form> 
      </div>
    </div>
  </div>
@endsection