<div class="navbar bg-purple py-2 px-0">
  <div class="container px-3">
    <!-- contact info-->
    <ul class="list-inline mb-0 w-100">
      <li class="list-inline-item opacity-75 mr-2">
        <i class="text-light mr-2" data-feather="phone" style="width: 13px; height: 13px;"></i>
        <a class="text-light font-size-sm py-1 pl-0 pr-2" href="https://wa.me/+237673970274" target="__blank">673 97 02 74/666 63 10 98</a>
      </li>
      <li class="list-inline-item opacity-75 mr-2">
        <i class="text-light mr-2" data-feather="mail" style="width: 13px; height: 13px;"></i>
        <a class="text-light font-size-sm py-1 pl-0 pr-2" href="mailto:info@example.com">info@cs.com</a>
      </li>
    @foreach($headerPages as $page)
        <li class="list-inline-item opacity-75 mr-2 float-md-right"><a href="@if($page->active){{$page->url}} @else # @endif"  class="text-light font-size-sm py-1 pl-0 pr-2" href="">{{ $page->name }}</a></li>
    @endforeach
    </ul>
    <div class="d-flex">
      <!-- topbar menu-->
      <ul class="list-inline mb-0 d-none d-lg-block">
          @foreach($navPages as $page)
              <li class="list-inline-item mr-2">
                  <a class="text-light font-size-sm opacity-75 py-1 pl-0 pr-2 border-right border-light" href="@if($page->active){{$page->url}} @else # @endif">{{ $page->name }}</a>
              </li>
          @endforeach
      </ul>
    </div>
  </div>
</div>
