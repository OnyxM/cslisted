<!-- Second line-->
<header class="navbar navbar-expand-lg navbar-light bg-light px-0"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <div class="container flex-sm-nowrap px-3">
    <!-- navbar brand--><a class="navbar-brand mr-0 mr-sm-4" style="min-width: 100px;" href="{{ route('home') }}"><img width="100" src="{{ asset('img/logo-dark.png') }}" alt="MStore"/></a>
    <!-- navbar buttons-->
    <div class="navbar-btns d-flex position-relative order-sm-3">
      <div class="navbar-toggler navbar-btn collapsed bg-0 border-left-0 my-3" data-toggle="collapse" data-target="#menu">
        <i class="mx-auto mb-2" data-feather="menu"></i>Menu
      </div>
      @guest
        <a class="navbar-btn bg-0 my-3" href="#offcanvas-account" data-toggle="offcanvas">
          <i class="mx-auto mb-1" data-feather="log-in"></i>
          {{__("common.signin_up")}}
        </a>
      @else
        <a class="navbar-btn bg-0 my-3" href="{{ route('user.dashboard') }}" data-toggle="offcanvas">
          <i class="mx-auto mb-1" data-feather="user"></i>
          {{__("common.account")}}
        </a>
      @endguest
      <a class="navbar-btn bg-0 my-3" href="#offcanvas-cart" data-toggle="offcanvas">
        <span class="d-block position-relative">
          <span class="navbar-btn-badge bg-purple text-light">{{ Cart::getTotalQuantity() }}
          </span>
          <i class="mx-auto mb-1" data-feather="shopping-cart"></i>{{ Cart::getTotal() }} FCFA
        </span>
      </a>
    </div>
    <!-- search-box-->
    <div class="flex-grow-1 pb-3 pt-sm-3 my-1 px-sm-2 pr-lg-4 order-sm-2">
      <form action="{{ route('search') }}" method="GET">
        <div class="input-group">
            <div class="input-group-prepend">
              <button type="submit" class="input-group-text rounded-left" id="search-icon">
                <i data-feather="search"></i>
              </button>
            </div>
            <input name='q' class="form-control rounded-right" type="text" id="site-search" placeholder="{{__("common.search")}}" aria-label="{{__("common.search")}}" value="{{ Request::get('q') }}">
            <div class="input-group-append">
              <select name="category_id" class="form-control">
                <option value='' selected>{{__("common.allcategories")}}</option>
                @foreach ($globalCategories as $category)
                @php
                  $subCategories = $category->children();
                @endphp
                @if (!$subCategories->isEmpty())
                  <optgroup label="{{ $category->name }}">
                    @foreach ($subCategories as $sub)
                      <option value="{{ $sub->is }}">{{ $sub->name }}</option>
                    @endforeach
                  </optgroup>
                @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="input-group-append">
              <select name="city_id" class="form-control">
                <option value='' selected>{{__("common.allcities")}}</option>
                @foreach ($globalCities as $city)
                      <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
              </select>
            </div>
        </div>
      </form>
    </div>
  </div>
</header>
<!-- Third line: Navigation-->
<div class="navbar navbar-expand-lg navbar-light bg-light px-0 bg-brown">
    <a class="mt-3 btn btn-info ml-auto d-inline-block d-md-none" href="{{ route('posting.create') }}">Create posting</a>
  <div class="container bg-brown">
    <!-- navbar collapse area-->
    <div class="collapse navbar-collapse" id="menu">
        <div class="navbar-lang-switcher dropdown pr-2">
            <div class="dropdown-toggle" data-toggle="dropdown"><img width="20" src="{{asset("img/flags/".App::getLocale().".png")}}" alt="English"/><span>{{ strtoupper(App::getLocale()) }}</span>
            </div>
            <ul class="dropdown-menu dropdown-menu-left">
                <li><a class="dropdown-item" href="{{route("set-locale",["locale"=>"fr"])}}"><img class="mr-2" width="20" src="{{asset("img/flags/fr.png")}}" alt="Français"/>Français</a></li>
                <li class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route("set-locale",["locale"=>"en"])}}"><img class="mr-2" width="20" src="{{asset('img/flags/en.png')}}" alt="English"/>English</a></li>
            </ul>
        </div>
      <ul class="navbar-nav mx-0 w-100">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">{{__("common.home")}}</a>
        </li>
         <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{__("common.categories")}}</a>
          <ul class="dropdown-menu">
            @foreach ($globalCategories as $category)
              @php
                $subCategories = $category->children();
              @endphp
              @if (!$subCategories->isEmpty())
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">{{ $category->name }}</a>
                  <ul class="dropdown-menu">
                    @foreach ($subCategories as $subCategory)
                      <li><a class="dropdown-item" href="{{ route('category',[
                        'slug' => $category->slug,
                        'id'=>$category->id
                      ]) }}">{{ $subCategory->name }}</a></li>
                      <li class="dropdown-divider"></li>
                    @endforeach
                  </ul>
                </li>
              @else
                <li>
                  <a class="dropdown-item" href="{{ route('category',[
                      'slug' => $category->slug,
                      'id'=>$category->id
                    ]) }}">
                    {{ $category->name }}
                  </a>
                </li>
              @endif
            @endforeach
          </ul>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{__("common.cities")}}</a>
          <ul class="dropdown-menu" style="height: 500px;overflow-y: scroll;">
            @foreach ($globalCities as $city)
              <li><a class="dropdown-item" href="{{ route('city',[
                'name'=>$city->slug,
                'id'=>$city->id
              ]) }}">{{ $city->name }}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('compare') }}" class="nav-link">compare</a>
        </li>
          @foreach($navPages as $page)
              <li class="nav-item"><a href="@if($page->active){{$page->url}} @else # @endif"  class="nav-link" href="">{{ $page->name }}</a></li>
          @endforeach
        <li class="nav-item ml-auto"><a class="mt-3 btn btn-info ml-auto" href="{{ route('posting.create') }}">Create Posting / Request</a></li>
      </ul>
    </div>
  </div>
</div>
@if (Session::has('alert'))
  <div>
    <div class="container">
      <!-- Primary alert -->
      <div class="alert alert-{{ Session::get('alert')['type'] }} alert-dismissible fade show" role="alert">
        {{ Session::get('alert')['message'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
@endif
