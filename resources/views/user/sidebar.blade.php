  <!-- BEGIN SIDEBAR -->
  <div class="sidebar col-md-3 col-sm-3">
    <ul class="list-group margin-bottom-25 sidebar-menu">
      @admin
      <li class="list-group-item clearfix"><a href="{{ route('orders.index') }}"><i class="fa fa-angle-right"></i> &nbsp; Admin | Orders</a></li>
      <li class="list-group-item clearfix"><a href="{{ route('category.index') }}"><i class="fa fa-angle-right"></i> &nbsp; Admin | Categories</a></li>
      <li class="list-group-item clearfix"><a href="{{ route('city.index') }}"><i class="fa fa-angle-right"></i> &nbsp; Admin | Cities</a></li>
      <li class="list-group-item clearfix"><a href="{{ route('tag.index') }}"><i class="fa fa-angle-right"></i> &nbsp; Admin | Tags</a></li>
      <li class="list-group-item clearfix"><a href="{{ route('page.index') }}"><i class="fa fa-angle-right"></i> &nbsp; Admin | Pages</a></li>
      <li class="list-group-item clearfix"><a href="{{ route('post_type.index') }}"><i class="fa fa-angle-right"></i> &nbsp; Admin | Post Type</a></li>
      <li class="list-group-item clearfix"><a href="{{ route('review.index') }}"><i class="fa fa-angle-right"></i> &nbsp; Admin | Reviews</a></li>
      <li class="list-group-item clearfix"><a href="{{ route('carousel.index') }}"><i class="fa fa-angle-right"></i> &nbsp; Admin | Carousel</a></li>
      @endadmin
      <li class="list-group-item clearfix"><a href="{{ route('user.account') }}"><i class="fa fa-user"></i> &nbsp; My account</a></li>
      <li class="list-group-item clearfix"><a href="{{ route('posting.index') }}"><i class="fa fa-list-ol"></i> &nbsp; Posting</a></li>
    <li class="list-group-item clearfix"><a href="{{ route('user-orders.index') }}"><i class="fa fa-money"></i> &nbsp; My Orders</a></li>
      <li class="list-group-item clearfix"><a href="{{ route('chat') }}"><i class="fa fa-address-book"></i> &nbsp; Chat</a></li>
      <li class="list-group-item clearfix">
        <a href="{{ route('user.wishlist') }}">
          <i class="fa fa-heart-o"> &nbsp;</i>
          Wishlist
        </a>
      </li>
      <li class="list-group-item clearfix">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" style="padding: 0px" class="btn btn-link margin-left-0 padding-left-0">
            <i class="fa fa fa-sign-out"> &nbsp;</i>
            Logout
          </button>
        </form>
      </li>
    </ul>
  </div>
  <!-- END SIDEBAR -->