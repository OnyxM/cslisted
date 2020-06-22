@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>My postings</h1>
    <div class="content-page">
      <h3><button class="btn btn-info" onclick="window.location.href='{{ route('posting.create') }}'"> <i class="fa fa-plus"></i> Add posting</button></h3>
      <div class="search mb-3 text-center">
        <form action="{{ route('posting.index') }}" method="GET">
          <h4 class="text-muted">Search</h4>
          <div class="row">
            <div class="form-group col-12 col-md-4">
              <label for="">categories</label>
              <select name="categories[]" id="" class="form-control js-select2" multiple>
                <option disabled >none</option>
                @foreach ($categories as $category)
                  <option 
                    @if ($queries && $queries->has('categories') && in_array($category->id,$queries['categories']))
                      selected
                    @endif
                  value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-12 col-md-4">
              <label for="">cities</label>
              <select name="cities[]" id="" class="form-control js-select2" multiple>
                <option disabled>none</option>
                @foreach ($cities as $city)
                  <option 
                    @if ($queries && $queries->has('cities') && in_array($city->id,$queries['cities']))
                      selected
                    @endif
                  value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-12 col-md-4">
              <label for="">Order</label>
              <select name="order" id="" class="form-control js-select2">
               <option 
                @if ($queries->has('order') && $queries->get('order') === 'DESC')
                  selected
                @endif
               value="DESC">DESC</option>
               <option 
                 @if ($queries->has('order') && $queries->get('order') === 'ASC')
                  selected
                @endif
               value="ASC">ASC</option>
              </select>
            </div>

            <div class="form-group col-12 col-md-4">
              <label for="">Name</label>
             <input type="text" name="name" value="{{ $queries->get('name') }}" class="form-control" >
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-info">search</button>
            @if ($queries->all())
              <a href="{{ route('posting.index') }}" class="text-warning">clear</a>
            @endif
          </div>
        </form>
      </div>
       <table class="table table-responsive">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Categories</th>
            <th>Cities</th>
            <th>Options</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($postings as $posting)
            <tr>
              <td>{{ $posting->id }}</td>
              <td>
                {{ $posting->name }}
              </td>
              <td>
                {{ $posting->regular_price }} XAF
                @if ($posting->discount_price)
                  <span class="badge badge-warning">{{ $posting->discount_price }} XAF</span>
                @endif
              </td>
              <td>
                @if ($posting->quantity == 0)
                  <span class="badge bg-warning">Out of stock</span>
                @endif
                {{ $posting->quantity }}
              </td>
              <td>
                {{ $posting->Categories()->get()->pluck('name')->implode(',') }}
              </td>
              <td>
                {{ $posting->cities()->get()->pluck('name')->implode(',') }}
              </td>
              <td>
                <button class="btn btn-info" onclick="window.location.href='{{ route('posting.edit',$posting) }}'">Edit</button>
                <button class="btn btn-danger" onclick="if(confirm('are you sure you want to delete product : {{$posting->name}} and all his children?')){ document.querySelector('.delete-product-{{ $posting->id }}').submit(); }">delete</button>

                <form method='POST' action="{{route('posting.destroy',['posting'=>$posting])}}" class="delete-product-{{ $posting->id }}">
                  @method('DELETE')
                  @csrf()
                </form>
              </td>
            </tr>          
          @endforeach
        </tbody>

      </table>

      {{ $postings->links() }}
    </div>
  </div>
<!-- END CONTENT -->

<script>
  window.productFiles = 
</script>
@endsection
