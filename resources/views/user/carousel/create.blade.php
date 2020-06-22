@extends('layouts.user')

@section('user.content')
  <!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Add Carousel image</h1>
    <div class="content-page">
      <div class="content-form-page">
        <form role="form" method='POST' action="{{ route('carousel.store') }}" class="form-horizontal form-without-legend">
          <div class="form-group">
            <label class="label-control" for="first-name">Carousel alternative text <span class="require">*</span></label>
            <input type="text" id="name" name="alt" class="form-control">
          </div>
          <div class="form-group">
            <label class="label-control" for="first-name">Priority<span class="require">*</span></label>
            <input type="number" id="priority" value="1" name="index" class="form-control">
          </div>
          <div class="form-group">
            <label class="control-label">
              Image <span class="require">*</span>
            </label>
            <div class="needsclick dropzone" id="document-dropzone">

            </div>
            <p class="help-block">Max: 2M</p>
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
