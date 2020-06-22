@extends('layouts.user')

@section('user.content')
  <!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Edit City</h1>
    <div class="content-page">
      <div class="content-form-page">
        <form role="form" method='POST' action="{{ route('city.update',$city) }}" class="form-horizontal form-without-legend">
          <div class="form-group">
            <label class="col-lg-2 control-label" for="first-name">City Name <span class="require">*</span></label>
            <div class="col-lg-8">
              <input type="text" id="name" name="name" class="form-control" value="{{ $city->name }}">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-2 control-label" for="first-name">latitude <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="number"  id="name" name="lat" class="form-control" step="any" value="{{ $city->lat }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="first-name">longitude <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="number"  id="lng" name="lng" class="form-control"  step="any" value="{{ $city->lng }}">
                </div>
            </div>
          <div class="row">
            <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
              <button class="btn btn-primary" type="submit">save</button>
            </div>
          </div>
          @csrf()
          @method('PUT')
        </form>
      </div>
    </div>
  </div>
  <!-- END CONTENT -->    
@endsection
