@extends('layouts.app')

@section('content')
  <div class="page-title-wrapper" aria-label="Page title">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Compare</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title">Compare
        </h1><span class="d-block mt-2 text-muted"></span>
        <hr class="mt-4">
      </div>
    </div>
  <div class="row m">
    @include('front.sidebar')
    <div class="col-lg-9">
      <div class="pb-4 mb-2"></div>
      @include('front.posting-loop')
    </div>
  </div>
@endsection