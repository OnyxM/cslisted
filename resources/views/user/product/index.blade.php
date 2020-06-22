@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>My products</h1>
    <div class="content-page">
      <h3><button class="btn btn-info" onclick="window.location.href='{{ route('product.create') }}'">Add products</button></h3>
      <div class="search mb-3 text-center">
        <form action="{{ route('product.index') }}" method="GET">
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
                @if ($queries->has('order') && $queries->get('order') === 'ASC')
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
              <a href="{{ route('product.index') }}" class="text-warning">clear</a>
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
          @foreach ($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>
                {{ $product->name }}
              </td>
              <td>
                {{ $product->regular_price }} XAF
                @if ($product->discount_price)
                  <span class="badge badge-warning">{{ $product->discount_price }} XAF</span>
                @endif
              </td>
              <td>
                @if ($product->quantity == 0)
                  <span class="badge bg-warning">Out of stock</span>
                @endif
                {{ $product->quantity }}
              </td>
              <td>
                {{ $product->Categories()->get()->pluck('name')->implode(',') }}
              </td>
              <td>
                {{ $product->cities()->get()->pluck('name')->implode(',') }}
              </td>
              <td>
                <button class="btn btn-info" onclick="window.location.href='{{ route('product.edit',$product) }}'">Edit</button>
                <button class="btn btn-danger" onclick="if(confirm('are you sure you want to delete product : {{$product->name}} and all his children?')){ document.querySelector('.delete-product-{{ $product->id }}').submit(); }">delete</button>

                <form method='POST' action="{{route('product.destroy',['product'=>$product])}}" class="delete-product-{{ $product->id }}">
                  @method('DELETE')
                  @csrf()
                </form>
              </td>
            </tr>          
          @endforeach
        </tbody>

      </table>

      {{ $products->links() }}
    </div>
  </div>
<!-- END CONTENT -->

<script>
  window.productFiles = 
</script>
@endsection
