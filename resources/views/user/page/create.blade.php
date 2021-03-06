@extends('layouts.user')

@section('user.content')
  <!-- BEGIN CONTENT -->
  <div class="col-md-9">
    <h1>Create page</h1>
    <div class="content-page">
      <div class="content-form-page">
        <form role="form" method='POST' action="{{ route('page.store') }}" class="form-horizontal form-without-legend">
          <div class="form-group">
            <label class="col control-label" for="first-name">Page Name <span class="require">*</span></label>
            <div class="col-lg-12">
              <input type="text" id="name" name="name" class="form-control">
            </div>
          </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="first-name">Page Hook<span class="require">*</span></label>
                <div class="col-lg-12">
                    <select multiple name="hooks[]" id="" class="js-select2 hooks form-control">
                        @foreach($pagehooks as $pagehook)
                            <option value="{{ $pagehook->id  }}">{{  $pagehook->label  }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" name="open_on_new_tab" type="checkbox" value="1" id="open_on_new_tab">
                    <label class="form-check-label" for="open_on_new_tab">
                        Open on new tab
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="active" value="1" id="active" checked>
                    <label class="form-check-label" for="active">
                        active
                    </label>
                </div>
            </div>
          <div class="form-group">
                <label class="col-lg-2 control-label" for="first-name">Content<span class="require">*</span></label>
                <div class="col-lg-12">
                    <textarea name="content" class="form-control" id="summernote"></textarea>
                </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-offset-2 padding-left-0 padding-top-20">
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

@section('javascripts')
  <!-- include summernote css/js -->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

  <script type="text/javascript">
      $(document).ready(function() {
    $('#summernote').summernote();
  });

  </script>

@endsection
