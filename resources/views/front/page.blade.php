@extends('layouts.app')


@section('content')
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40 ">
      <div class="col-md-9 col-sm-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Page</li>
            <li class="breadcrumb-item active">{{ $page->name }}</li>
          </ol>
        </nav>
        <h2>{{ $page->name }}</h2>
        <div class="row">
          <div class="container">
            {!! $page->content !!}
          </div>				
        </div>
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
@endsection