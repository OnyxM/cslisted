<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


    {!! SEO::generate(true) !!}
    <!-- SEO Meta Tags-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#111" href="safari-pinned-tab.svg">
    <link rel="stylesheet" media="screen" href="{{ asset('css/vendor.min.css') }}">

    <link rel="stylesheet" media="screen" href="{{ asset('css/custom.css?ver='.time()) }}">
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet"  href="{{ asset('css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-stars.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/select2.min.css') }}">
    <style>
        #short-message, #maximizeChat, #minimizeChatMinifiedBtn{
            background-color: #5c0352;
        }
    </style>
    @yield('stylesheets')
  </head>
  <!-- Body-->
  <body>
    @include('common.offcanvas')
    <!-- Navbar Multilevel-->
    <!-- First line: Topbar-->
    @include('common.topbar')
    @include('common.navbar')
    <!-- Page Content-->
    @include('common.notifications')
    <div class="container pb-5 mb-4">
      @yield('content')
    </div>
    <!-- Footer-->
    <footer class="page-footer bg-dark">
      <!-- first row-->
      <div class="pt-5 pb-0 pb-md-4">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="widget widget-links pb-4">
                <h3 class="widget-title text-white border-light">{{__("common.categories")}}</h3>
                <ul>
                  @foreach ($globalCategories as $category)
                    <li><a class="nav-link-inline nav-link-light" href="{{
                      route('category',[
                        'id'=>$category->id,
                        'slug'=>$category->slug
                      ])
                     }}"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">{{ $category->name }}</span></a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="widget widget-links pb-4">
                <h3 class="widget-title text-white border-light">{{__("common.account")}}</h3>
                <ul>
                  <li><a class="nav-link-inline nav-link-light" href="{{ route('login') }}"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Your account</span></a></li>
                </ul>
              </div>
              <div class="widget widget-links pb-4">
                <h3 class="widget-title text-white border-light">Pages</h3>
                <ul>
                    @foreach($footerPages as $page)
                        <li><a class="nav-link-inline nav-link-light" href="{{$page->url}}"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">{{ $page->name }}</span></a></li>
                    @endforeach
                </ul>
              </div>
            </div>
            <div class="col-xl-4 offset-xl-1 col-md-5">
              <div class="widget">
                <!-- Subscription form (MailChimp)-->
                <h3 class="widget-title text-white border-light">Stay informed</h3>
                <form class="validate pb-4" action="https://cslisted.us19.list-manage.com/subscribe/post?u=1a0126b7b6f7a22d41e44002d&amp;id=d95c97ad43" method="get" name="mc-embedded-subscribe-form" id="mc-embedded-subscribe-form">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend"><span class="input-group-text" style="background-color: #e8e8e8;"><i data-feather="mail"></i></span></div>
                    <input class="form-control border-0 box-shadow-0 bg-secondary" type="email" name="EMAIL" id="mce-EMAIL" value="" placeholder="Your email" required>
                  </div>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_1a0126b7b6f7a22d41e44002d_d95c97ad43" tabindex="-1">
                  </div>
                  <button class="btn btn-primary btn-block" type="submit" name="subscribe" id="mc-embedded-subscribe">Subscribe*</button>
                  <p class="font-size-xs text-white opacity-60 pt-2 mb-2" id="mc-helper">*Subscribe to our newsletter to receive early discount offers, updates and new products info.</p>
                  <!-- Subscription status-->
                  <div class="subscribe-status"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- third row-->
      <div class="pt-5 pb-4" style="background-color: #1f1f1f;">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 text-center text-sm-left">
              <div class="mb-4 mb-sm-0"><a class="d-inline-block" href="index.html"><img width="100" src="{{ asset('img/logo-light.png') }}" alt="CS"/></a>
              </div>
            </div>
            <div class="col-sm-6 text-center text-sm-right"><a class="social-btn sb-facebook sb-light mx-1 mb-2" href="#"><i class="flaticon-facebook"></i></a><a class="social-btn sb-twitter sb-light mx-1 mb-2" href="#"><i class="flaticon-twitter"></i></a><a class="social-btn sb-instagram sb-light mx-1 mb-2" href="#"><i class="flaticon-instagram"></i></a>
              <a class="social-btn sb-vimeo sb-light mx-1 mb-2" href="#"><i class="flaticon-vimeo"></i></a>
              <a class="social-btn sb-vimeo sb-light mx-1 mb-2" href="#"><i class="flaticon-whatsapp"></i></a>
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-sm-6 text-center text-sm-left">
              <ul class="list-inline font-size-sm">
                <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Outlets</a></li>
                <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Affiliates</a></li>
                <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Support</a></li>
                <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Privacy</a></li>
                <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Terms of use</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="py-3" style="background-color: #1a1a1a;">
        <div class="container font-size-xs text-center" aria-label="Copyright"><span class="text-white opacity-60 mr-1">© All rights reserved. Made by</span><a class="nav-link-inline nav-link-light" href="#" target="_blank">CS</a></div>
      </div>
    </footer>
    @yield('before-end')
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.barrating.min.js') }}"></script>
    <script>
        $("#review-rating").barrating({
        theme: 'fontawesome-stars'
      });
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!--Start of Tawk.to Script-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163851406-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-163851406-1');
</script>

<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e6d7170eec7650c33201147/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    @yield('javascripts')
  </body>

</html>
