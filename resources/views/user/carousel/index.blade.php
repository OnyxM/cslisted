@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Carousel images</h1>
    <div class="content-page">
      <h3><button class="btn btn-info" onclick="window.location.href='{{ route('carousel.create') }}'">Add Carousel image</button></h3>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Order</th>
            <th>Name</th>
            <th>Options</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($carousel_images as $image)
            <tr>
              <td>{{ $image->id }}</td>
              <td>{{ $image->index }}</td>
              <td>
                {{ $image->alt }}
                <img src="{{ $image->getFirstMediaUrl('carousel') }}" width="100px">
              </td>
              <td>
                <button class="btn btn-danger" onclick="if(confirm('are you sure you want to delete image : {{$image->alt}}?')){ document.querySelector('.delete-image-{{ $image->id }}').submit(); }">delete</button>
                <form method='POST' action="{{route('carousel.destroy',['image'=>$image])}}" class="delete-image-{{ $image->id }}">
                  @method('DELETE')
                  @csrf()
                </form>
              </td>
            </tr>          
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
<!-- END CONTENT -->    
@endsection
