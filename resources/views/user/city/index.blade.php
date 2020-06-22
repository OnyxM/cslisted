@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Cities</h1>
    <div class="content-page">
      <h3><button class="btn btn-info" onclick="window.location.href='{{ route('city.create') }}'">Add City</button></h3>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Options</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($cities as $city)
            <tr>
              <td>{{ $city->id }}</td>
              <td>
                {{ $city->name }}
              </td>
              <td>
                <button class="btn btn-info" onclick="window.location.href='{{ route('city.edit',$city) }}'">Edit</button>
                <button class="btn btn-danger" onclick="if(confirm('are you sure you want to delete city : {{$city->name}} and all his children?')){ document.querySelector('.delete-city-{{ $city->id }}').submit(); }">delete</button>

                <form method='POST' action="{{route('city.destroy',['city'=>$city])}}" class="delete-city-{{ $city->id }}">
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
