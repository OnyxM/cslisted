@extends('layouts.app')


@section('content')
    <!-- BEGIN SIDEBAR & CONTENT -->
   @include('front.carousel')

   <div class="row">
      @include('front.sidebar')
      <div class="col-lg-9">
        <!-- Toolbar-->
        <div class="d-flex flex-wrap justify-content-center justify-content-sm-between pb-3">
          <div class="form-inline d-none d-md-flex flex-nowrap pb-3">
            <label class="mr-2" for="pager">Page:</label>
            <input class="form-control mr-2" type="number" id="pager" value="{{ $postings->currentPage() }}" style="width: 4rem;"><span class="form-text">/ {{ $postings->lastPage() }}</span>
          </div>
        </div>
        <div class="pb-4 mb-2"></div>
        @include('front.posting-loop')
        <!-- Pagination-->
        <nav aria-label="Page navigation" class="my-2">
          {{ $postings->links() }}
        </nav>
      </div>
    </div>
    @include('common.payment-methods-slider')
    <div class="row" style="margin-bottom: 30px">
      <div class="col-12">
        <h2>{{__("common.availablecities")}}</h2>
        <div id="map" style="height: 500px"></div>
      </div>
    </div>

@endsection

@section('stylesheets')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
       integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
       crossorigin=""/>
@endsection

@section('javascripts')
  <script>
    var cities = {!! $globalCities !!}
  </script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
         integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
         crossorigin=""></script>
  <script src='{{ asset('js/map.js') }}'></script>
@endsection
