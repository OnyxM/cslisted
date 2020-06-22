@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>Reviews</h1>
    <div class="content-page">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Content</th>
            <th>Posting url</th>
            <th>Options</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($reviews as $review)
            <tr>
              <td>{{ $review->id }}</td>
              <td>
                {{ $review->name }}
              </td>
              <td>
                {{ $review->content }}
              </td>
              @php
                $posting = $review->posting()->first()
              @endphp
              <td>
                {{ route('single-posting',[
                    "slug" => $posting->slug,
                    "id" => $posting->id
                  ]) }}
              </td>
              <td>
                  @if ($review->active)
                    <form action="{{ route('review-inactive',['id'=>$review->id]) }}" method="POST">
                      <input type="hidden" value="{{ $review->id }}">
                      <button class="btn btn-warning">Mark as inactive</button>
                      @csrf
                    </form>
                  @else  
                  <form action="{{ route('review-active',['id'=>$review->id]) }}" method="POST">
                      <input type="hidden" value="{{ $review->id }}">
                      <button class="btn btn-success">Mark as active</button>
                      @csrf
                    </form>
                  @endif
                <button class="btn btn-danger" onclick="if(confirm('are you sure you want to delete review: {{$review->name}}?')){ document.querySelector('.delete-review-{{ $review->id }}').submit(); }">delete</button>

                <form method='POST' action="{{route('review.destroy',['review'=>$review])}}" class="delete-review-{{ $review->id }}">
                  @method('DELETE')
                  @csrf()
                </form>
              </td>
            </tr>          
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row">
        <div class="col">{{ $reviews->links() }}</div>
    </div>
  </div>
<!-- END CONTENT -->    
@endsection
