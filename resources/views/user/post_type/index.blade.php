@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Post Types</h1>
    <div class="content-page">
      <h3><button class="btn btn-info" onclick="window.location.href='{{ route('post_type.create') }}'">Add Post Type</button></h3>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Options</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($post_types as $post_type)
            <tr>
              <td>{{ $post_type->id }}</td>
              <td>
                {{ $post_type->name }}
              </td>
              <td>
                <button class="btn btn-info" onclick="window.location.href='{{ route('post_type.edit',$post_type) }}'">Edit</button>
                <button class="btn btn-danger" onclick="if(confirm('are you sure you want to delete post type : {{$post_type->name}} and all his children?')){ document.querySelector('.delete-post_type-{{ $post_type->id }}').submit(); }">delete</button>

                <form method='POST' action="{{route('post_type.destroy',['post_type'=>$post_type])}}" class="delete-post_type-{{ $post_type->id }}">
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
