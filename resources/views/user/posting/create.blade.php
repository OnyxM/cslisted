@extends('layouts.app')

@section('content')
<div class="page-title-wrapper" aria-label="Page title">

  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">Create posting</a>
        </li>
      </ol>
    </nav>
    <h1 class="page-title">Create posting</h1>
    <hr class="mt-4">
  </div>
</div>
<div class="col-md-12 col-sm-12 mx-auto">
  <div class="row">
    <div class="col-12">
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
    </div>
  </div>
  <!-- BEGIN SIDEBAR & CONTENT -->
  <div class="row margin-bottom-40 ">
    <div class="col-md-12 col-sm-12">
      <div class="row">
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 mx-0">
          <div class="content-page">
            <div class="content-form-page">
              <form role="form" id="create-form" class="form-horizontal form-without-legend" method="POST" action="{{ route('posting.store') }}" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-lg-2 control-label" for="first-name">Title<span class="require">*</span></label>
                  <div class="col-lg-10">
                    <input type="text" id="first-name" class="form-control" name="name" value="{{ old("name") }}" placeholder="What you are selling, the service you are offering, ect ...">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-lg-2 control-label" for="message">Description</label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="description" rows="6">{{ old("description") }}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Post type</label>
                  <div class="col-md-8">
                    @foreach ($post_types as $post_type)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" id="post_type{{ $post_type->id }}" type="radio" name="post_type" value="{{ $post_type->id }}">
                      <label for="post_type{{ $post_type->id }}">{{ $post_type->name }}</label>
                    </div>
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Categories <span class="require">*</span></label>
                  <div class="col-md-10">
                    <select class="form-control js-select2" multiple name="categories[]">
                      @foreach ($categories as $category)
                        @php
                            $subCategories = $category->children();
                        @endphp
                        @if (!$subCategories->isEmpty())
                            <optgroup label="{{ $category->complete_name }}">
                                @foreach($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->complete_name }}</option>
                                @endforeach
                            </optgroup>
                        @else
                            <option value="{{ $category->id }}">{{ $category->complete_name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Tags</label>
                  <div class="col-md-10">
                    <select class="form-control js-select2" multiple name="tags[]">
                      @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row px-3">
                  <div class="col-md-4">
                    <div class="form-group row">
                      <label class="col-lg-4 control-label" for="first-name">Quantity <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="text" id="Quantity" class="form-control" name="quantity" value="{{ old("quantity") }}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-lg-4 control-label" for="first-name">Delivery time</label>
                      <div class="col-lg-8">
                        <input type="text" id="deliveryt" class="form-control" name="delivery_time" value="{{ old("delivery_time") }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label" for="first-name">Regular price <span class="require">*</span></label>
                  <div class="col-lg-10">
                    <input type="number" id="regular-price" class="form-control" name="regular-price">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label" for="first-name">Discount price</label>
                  <div class="col-lg-10">
                    <input type="number" id="discount-price" class="form-control" name="discount_price" value="{{ old("discount_price") }}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Cities <span class="require">*</span></label>
                  <div class="col-md-10">
                    <select class="form-control js-select2" multiple name="cities[]">
                      @foreach ($cities as $city)
                      <option value="{{ $city->id }}">{{ $city->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-lg-2 control-label">Image <span class="require">*</span></label>
                  <div class="col-lg-10">
                    <div class="needsclick dropzone" id="document-dropzone">

                    </div>
                    <p class="help-block">Max: 2M</p>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </div>
                @csrf()
              </form>
            </div>
          </div>
        </div>
        <!-- END CONTENT -->
      </div>
    </div>
    <!-- END CONTENT -->
  </div>
  <!-- END SIDEBAR & CONTENT -->
</div>
@endsection

@section('stylesheets')
<link href="{{ asset('assets/plugins/dropzone.css') }}" rel="stylesheet">
@endsection


@section('javascripts')
<script src="{{ asset('assets/plugins/dropzone.js') }}" type="text/javascript"></script>
<script>
  Dropzone.autoDiscover = false;
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: '{{ route('posting.media.store') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    maxFiles: 5,
    acceptedFiles: ".jpeg,.jpg,.png",
    success: function(file, response) {
      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function(file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
    },
    init: function() {
      @if(isset($hasFiles))
      var files = window.files
      for (var i in files) {
        var file = files[i]
        this.options.addedfile.call(this, file)
        this.options.thumbnail.call(this, file, file.url); //uploadsfolder is the folder where you have all those uploaded files

        file.previewElement.classList.add('dz-complete')
        $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
      }
      @endif
    }
  }
  var mydropzone = new Dropzone("div#document-dropzone");
    $("#create-form").submit(function () {
      if (mydropzone.getUploadingFiles().length != 0) {
        alert("Please, wait until all the images are uploaded");
        return false;
      }
    });
</script>
@endsection