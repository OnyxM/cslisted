@extends('layouts.user')

@section('user.content')
  <!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Create Post Type</h1>
    <div class="content-page">
      <div class="content-form-page">
        <form role="form" method='POST' action="{{ route('post_type.store') }}" class="form-horizontal form-without-legend">
          <div class="form-group">
            <label class="col-lg-2 control-label" for="first-name">Post Type Name <span class="require">*</span></label>
            <div class="col-lg-8">
              <input type="text" id="name" name="name" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
              <button class="btn btn-primary" type="submit">save</button>
            </div>
          </div>
          @csrf()
        </form>
      </div>
    </div>
  </div>
  <!-- END CONTENT -->    
@endsection
