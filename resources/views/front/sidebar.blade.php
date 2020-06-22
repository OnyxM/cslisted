<!-- One item + Nav top + Dots + Loop -->
<div class="col-lg-3">
  <!-- Shop sidebar-->
  <div class="offcanvas-sidebar">
    <div class="offcanvas-sidebar-toggle"><span class="toggle-knob"><i data-feather="chevrons-right"></i>Sidebar</span></div>
    <div class="offcanvas-sidebar-body">
      <div class="offcanvas-sidebar-body-inner">
        <!-- Categories-->
        <div class="widget widget-categories mb-4 py-1">
          <h3 class="widget-title">{{__("common.categories")}}</h3>
          <ul id="shopCategories">
            @foreach ($globalCategories as $category)
              @php
                $subCategories = $category->children();
              @endphp
              @if (!$subCategories->isEmpty())
                <li class="has-children">
                  <a href="#{{ $category->slug }}" data-toggle="collapse" daa>
                    <i class="widget-categories-indicator" data-feather="chevron-down"></i>{{ $category->name }}
                  </a>
                  <ul class="collapse" id="{{ $category->slug }}" data-parent="#shopCategories">
                    @foreach ($subCategories as $subCategory)
                      <li><a href="{{ route('category',[
                        'slug'=> $subCategory->slug,
                        'id'=>$subCategory->id
                      ]) }}">{{ $subCategory->name }}<span class="badge text-muted ml-1">({{ $subCategory->postings_count }})</span></a></li>
                    @endforeach
                  </ul>
                </li>
              @else
                <li><a href="{{ route('category',[
                  'slug'=> $category->slug,
                  'id'=>$category->id
                ]) }}">{{ $category->name }}<span class="badge text-muted ml-1">({{ $category->postings_count }})</span>
                </a></li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
