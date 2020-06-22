@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>My Categories</h1>
    <div class="content-page">
      <h3><button class="btn btn-info" onclick="window.location.href='{{ route('category.create') }}'">Add Category</button></h3>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Options</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>
                @if ($parent = $category->parent())
                  {{ $parent->name }} >>
                @endif
                {{ $category->name }}
              </td>
              <td>
                <button class="btn btn-info" onclick="window.location.href='{{ route('category.edit',$category) }}'">Edit</button>
                <button class="btn btn-danger" onclick="if(confirm('are you sure you want to delete category : {{$category->name}} and all his children?')){ document.querySelector('.delete-category-{{ $category->id }}').submit(); }">delete</button>

                <form method='POST' action="{{route('category.destroy',['category'=>$category])}}" class="delete-category-{{ $category->id }}">
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
