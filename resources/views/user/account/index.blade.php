@extends('layouts.user')

@section('user.content')
  <!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>My account</h1>
    <div class="content-page">
      <div class="content-form-page">
        <form role="form" method='POST' action="{{ route('user.update') }}" class="form-horizontal form-without-legend">
          <div class="form-group">
            <label class="col-lg-2 control-label" for="first-name">Name <span class="require">*</span></label>
            <div class="col-lg-8">
              <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label" for="description">Description</label>
            <div class="col-lg-8">
              <textarea name="profile_description" class="form-control" id="description" rows="5">{{ $user->profile_description }}</textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Profile picture</label>
            <div class="col-lg-8">
              <div class="needsclick dropzone" id="document-dropzone">

              </div>
              <p class="help-block">Max: 2M</p>
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
  <script>
    window.files = {!! $user->getMedia("users")->map(function($item){
      $item->url = $item->getUrl();
      return $item;
    }) !!}
  </script>
  <!-- END CONTENT -->    
@endsection
