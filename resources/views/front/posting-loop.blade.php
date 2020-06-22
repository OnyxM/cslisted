<style>
    .product-thumb-overlay{
        cursor: pointer;
    }
</style>
<!-- Products grid-->
<div class="row no-gutters">
  @foreach ($postings as $posting)
      <!-- Product-->
    <div class="col-xl-3 col-sm-4 col-6 border">
      <div class="">
        <div class="product-thumb">
          <div class="product-thumb-overlay d-flex align-self-center justify-content-center" data-url="{{ route('single-posting',[
            'slug'=>$posting->slug,
            'id'=>$posting->id
          ]) }}">
            <form data-url="{{ route('single-posting',[
            'slug'=>$posting->slug,
            'id'=>$posting->id
          ]) }}" method="POST" action="{{ route('user.wishlist.add') }}" style="flex-wrap: wrap-reverse;" class="align-content-center d-flex justify-content-center">
              <input type="hidden" name="posting_id" value="{{ $posting->id }}">
                @csrf              
              <button type='submit' class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i data-feather="heart"></i></button>
              <a class="btn btn-primary bg-purple" style="top: 1px;position: relative;" href="{{ route('add-cart',[
                'id' => $posting->id
              ]) }}"  data-toggle="tooltip" data-placement="right" title="Add to cart"><i data-feather="shopping-cart"></i></a>
              <a class="btn btn-primary bg-dark border-dark" style="top: 1px;position: relative;" href="{{ route('compare.add',[
                'id' => $posting->id
              ]) }}"  data-toggle="tooltip" data-placement="right" title="Compare"><i data-feather="shuffle"></i></a>
            </form>
          </div>
          <a class="product-thumb-link" href="{{ route('single-posting',[
            'slug'=>$posting->slug,
            'id'=>$posting->id
          ]) }}"></a>
          <img src="{{ $posting->getFirstOrDefaultMediaUrl() }}" alt="{{ str_slug($posting->name) }}">
        </div>
        <div class="product-card-body">
          <div class="d-flex flex-wrap justify-content-between pb-1">
            <a class="product-meta" href="{{ route('category',[
            'slug'=>$posting->categories->first()->slug,
            'id'=> $posting->categories->first()->id
          ]) }}">
            {{ $posting->categories->first()->complete_name }}
          </a>
          <div class="py-3">
            <i data-feather='map-pin'></i>
            @php
              $cities = $posting->cities;
              $numberCitiesToShow = $cities->count() < 3 ? $cities->count() : 3;  
            @endphp
            @foreach ($cities->random($numberCitiesToShow) as $city)
              <a class="product-meta" href="{{ route('city',[
                'slug'=>$city->slug,
                'id'=> $city->id
              ]) }}">
                {{ $city->name }}
              </a>
              @if (!$loop->last),@endif
            @endforeach
          </div>
          @if ($posting->rating != 0)
            <div class="star-rating"><span class="sr-label mr-1">{{ $posting->rating }}</span><i class="sr-star active" data-feather="star"></i></div>
          @endif
          </div>
          <h3 class="product-card-title">
            <a href="{{ route('single-posting',[
            'slug'=>$posting->slug,
            'id'=>$posting->id
          ]) }}">{{ $posting->name }}</a>
          </h3>
          <span class="text-primary">
            {{ $posting->formatted_price }} FCFA
            @if ($posting->hasDiscount())
              <del class="text-danger mr-1">{{ $posting->formatted_regular_price }} FCFA</del>
            @endif      
        </span>
        @isset($addCompare)
            <div class="row">
                <a href="{{ route("compare.remove",["id"=>$posting->id]) }}" class="btn btn-danger btn btn-sm mt-2">Remove <span class="d-none d-md-none">to compare</span></a>
            </div>
        @endisset
        </div>
        <div class="product-card-body body-hidden pt-2">
          @if (!$posting->isSellable())
            <p>
              {{ str_limit($posting->description,50) }}
            </p>
          @endif
        </div>
      </div>
    </div>
  @endforeach
  @if (!count($postings))
    <div class="col-12 text-center">
    	<h3>No postings found!</h3>
    </div>
  @endif
</div>
<script>
    var postings = document.querySelectorAll(".product-thumb-overlay");
    postings.forEach(function(posting){
        posting.addEventListener("click",function(e){
            window.location = e.target.dataset["url"];
        });
    });
</script>