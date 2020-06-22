@extends('layouts.app')

@section('content')
   <div class="page-title-wrapper" aria-label="Page title">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
            <li class="breadcrumb-item"><a href="#">Search</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
   <div class="row">
      @include('front.sidebar')
      <div class="col-lg-9">
        <h3>
          Search: {{ Request::get('q') }}
          @isset ($category)
              , Category: {{ $category->name }}
          @endisset
        </h3>
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
        <nav aria-label="Page navigation my-2">
          {{ $postings->links() }}
        </nav>
      </div>
    </div>
@endsection