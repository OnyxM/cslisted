@extends('layouts.app')


@section('content')   
   @include('front.sidebar')
    <!-- END SIDEBAR & CONTENT -->
     <div class="col-xl-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Wishlist</a></li>
          </ol>
        </nav>
        <h2>My wishlist</h2>
        <div class="">       
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart">
                  <tr>
                    <th class="goods-page-image">Image</th>
                    <th class="goods-page-description">Description</th>
                    <th class="goods-page-stock">Stock</th>
                    <th class="goods-page-price" colspan="2">Unit price</th>
                  </tr>
                  <tr>
                    @foreach ($wishlist as $item)
                      <td class="goods-page-image">
                        <a href="javascript:;"><img src="{{$item->getFirstMediaUrl('postings')}}" alt="{{ $item->name }}"></a>
                      </td>
                      <td class="goods-page-description">
                        <h3><a href="{{ route('single-posting',['id'=>$item->id,'slug'=>$item->slug]) }}">{{ $item->name }}</a></h3>
                        <em><a href="{{ route('single-posting',['id'=>$item->id,'slug'=>$item->slug]) }}">More info is here</a></em>
                      </td>
                      <td class="goods-page-stock">
                        @if ($item->is_available)
                          Unavailable
                        @else    
                          In Stock
                        @endif
                      </td>
                      <td class="goods-page-price">
                        <strong>{{ $item->formatted_price }} <span>FCFA</span></strong>
                      </td>
                      <td class="del-goods-col">
                        <form method="POST" id='remove-wishlit-{{$item->id}}' action="{{ route('user.wishlist.remove') }}">
                          @csrf
                          <input type="hidden" name="posting_id" value="{{ $item->id }}">
                          <a href='#' onclick="$('#remove-wishlit-{{$item->id}}').submit()" class="del-goods" href="javascript:;">&nbsp;</a>
                        </form>
                      </td>
                    </tr>
                  @endforeach    
                </table>
                </div>
              </div>
            </div>
          </div>
        <div class='clearfix'></div>
      </div>
      <div class='clearfix'></div>
@endsection