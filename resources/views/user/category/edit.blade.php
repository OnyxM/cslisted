@extends('layouts.user')

@section('user.content')
  <!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Edit category</h1>
    <div class="content-page">
      <div class="content-form-page">
        <form role="form" method='POST' action="{{ route('category.update',$category) }}" class="form-horizontal form-without-legend">
            <div class="form-group">
                <label class="col-lg-2 control-label" for="first-name">Category Name En <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="name" name="name_en" class="form-control" value="{{$category->getTranslation("name","en")}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="first-name">Category Name Fr <span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="name" name="name_fr" value="{{$category->getTranslation("name","fr")}}" class="form-control">
                </div>
            </div>
          @isset ($categories)
            <div class="form-group">
              <label class="col-md-2 control-label">parent</label>
              <div class="col-md-8">
                <select class="form-control" name="parent_id">
                    <option value="">None</option>
                  @foreach ($categories as $cat)
                    @if ($cat->id != $category->id)
                      <option value='{{ $cat->id }}'
                        @if ($cat->parent() && ($cat->parent()->id == $cat->id))
                          selected
                        @endif
                      >{{ $cat->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
          @endisset
          <div class="form-group">
            <label class="col-lg-2 control-label">Featured image <span class="require">*</span></label>
            <div class="col-lg-8">
             <div class="needsclick dropzone" id="document-dropzone">

              </div>
              <p class="help-block">Max: 2M</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
              <button class="btn btn-primary" type="submit">edit</button>
            </div>
          </div>
          @csrf()
          @method('PUT')
        </form>
      </div>
    </div>
  </div>
  <script>
  window.files = {!! $category->getMedia("categories")->map(function($item){
    $item->url = $item->getUrl();
    return $item;
  }) !!}
</script>

  <!-- END CONTENT -->
@endsection
