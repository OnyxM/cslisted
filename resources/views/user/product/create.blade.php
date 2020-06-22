@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Create products</h1>
    <div class="content-page">
       <div class="content-form-page">
          <form role="form" class="form-horizontal form-without-legend" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Name <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" id="first-name" class="form-control" name="name">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Categories <span class="require">*</span></label>
              <div class="col-md-8">
                <select class="form-control js-select2" multiple name="categories[]">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->complete_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Tags</label>
              <div class="col-md-8">
                <select class="form-control js-select2" multiple name="tags[]">
                  @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Quantity <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" id="Quantity" class="form-control" name="quantity">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Regular price <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" id="regular-price" class="form-control" name="regular-price">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Discount price</label>
              <div class="col-lg-8">
                <input type="text" id="discount-price" class="form-control" name="discount_price">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Cities <span class="require">*</span></label>
              <div class="col-md-8">
                <select class="form-control js-select2" multiple name="cities[]">
                  @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="col-lg-2 control-label">Featured image <span class="require">*</span></label>
              <div class="col-lg-8">
               <div class="needsclick dropzone" id="document-dropzone">

                </div>
                <p class="help-block">Max: 2M</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="message">Description</label>
              <div class="col-lg-8">
                <textarea class="form-control" name="description" rows="6"></textarea>
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
