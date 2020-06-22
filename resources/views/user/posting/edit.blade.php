@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Edit posting</h1>
    <div class="content-page">
       <div class="content-form-page">
          <form role="form" class="form-horizontal form-without-legend" method="POST" action="{{ route('posting.update',['id'=>$posting->id]) }}" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Name <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" id="first-name" class="form-control" value="{{ $posting->name }}" name="name">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Post Type</label>
              <div class="col-md-8">
                @foreach ($post_types as $post_type)
                <div class="inputt-group">
                  <label for="">{{ $post_type->name }}</label>
                  <input type="radio"
                    @if ($post_type->id == $posting->post_type_id)
                      checked
                    @endif
                   name="post_type" value="{{ $post_type->id }}">
                </div>
                @endforeach
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label">Categories <span class="require">*</span></label>
              <div class="col-md-8">
                <select class="form-control js-select2" multiple name="categories[]">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                      @if ($posting->categories()->get()->pluck('id')->contains($category->id))
                        selected
                      @endif
                    >{{ $category->complete_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Tags</label>
              <div class="col-md-8">
                <select class="form-control js-select2" multiple name="tags[]">
                  @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
                      @if ($posting->tags()->get()->pluck('id')->contains($tag->id)))
                        selected
                      @endif
                    >{{ $tag->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Quantity <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" id="Quantity" class="form-control" value="{{ $posting->quantity }}" name="quantity">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Regular price <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="number" id="regular-price" class="form-control" value="{{ $posting->regular_price }}" name="regular-price">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">Discount price</label>
              <div class="col-lg-8">
                <input type="number" id="discount-price" class="form-control" name="discount_price"  value="{{ $posting->discount_price }}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Cities <span class="require">*</span></label>
              <div class="col-md-8">
                <select class="form-control js-select2" multiple name="cities[]">
                  @foreach ($cities as $city)
                    <option value="{{ $city->id }}"
                      @if ($posting->cities()->get()->pluck('id')->contains($city->id))
                       selected
                      @endif
                    >{{ $city->name }}</option>
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
                <textarea class="form-control" name="description" rows="6">
                  {{ $posting->description }}
                </textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
                <button class="btn btn-primary" type="submit">save</button>
              </div>
            </div>
            @method('PUT')

            @csrf()
          </form>
        </div>
    </div>
  </div>
<!-- END CONTENT -->
<script>
  window.files = {!! $posting->getMedia("postings")->map(function($item){
    $item->url = $item->getUrl();
    return $item;
  }) !!}
</script>
@endsection


