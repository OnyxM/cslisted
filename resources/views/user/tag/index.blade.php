@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Tags</h1>
    <div class="content-page">
      <h3><button class="btn btn-info" onclick="window.location.href='{{ route('tag.create') }}'">Add tag</button></h3>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Options</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($tags as $tag)
            <tr>
              <td>{{ $tag->id }}</td>
              <td>
                {{ $tag->name }}
              </td>
              <td>
                <button class="btn btn-info" onclick="window.location.href='{{ route('tag.edit',$tag) }}'">Edit</button>
                <button class="btn btn-danger" onclick="if(confirm('are you sure you want to delete tag : {{$tag->name}} and all his children?')){ document.querySelector('.delete-tag-{{ $tag->id }}').submit(); }">delete</button>

                <form method='POST' action="{{route('tag.destroy',['tag'=>$tag])}}" class="delete-tag-{{ $tag->id }}">
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
