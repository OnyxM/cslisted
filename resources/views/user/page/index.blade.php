@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Pages</h1>
    <div class="content-page">
      <h3><button class="btn btn-info" onclick="window.location.href='{{ route('page.create') }}'">Add page</button></h3>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Options</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($pages as $page)
            <tr>
              <td>{{ $page->id }}</td>
              <td>
                {{ $page->name }}
              </td>
              <td>
                <button class="btn btn-info" onclick="window.location.href='{{ route('page.edit',$page) }}'">Edit</button>

                <button class="btn btn-danger" onclick="if(confirm('are you sure you want to delete page : {{$page->name}} and all his children?')){ document.querySelector('.delete-page-{{ $page->id }}').submit(); }">delete</button>

                <form method='POST' action="{{route('page.destroy',['page'=>$page])}}" class="delete-page-{{ $page->id }}">
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
