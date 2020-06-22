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
        <link href="{{ asset('css/rateit.css') }}" rel="stylesheet">

    <link rel="stylesheet" media="screen" href="{{ asset('css/custom.css') }}">
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet"  href="{{ asset('css/theme.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/select2.min.css') }}">
    <style>
        #short-message, #maximizeChat, #minimizeChatMinifiedBtn{
            background-color: #5c0352;
        }
        .underline-colored{
            border-bottom: 8px solid #FFD029;
            padding-bottom: 10px;
        }
        .list{
              list-style-image: url('{{ asset("img/cslisticon.png") }}');
        }
    </style>
  </head>
  <!-- Body-->
  <body>
     <div style="background: rgba(0,0,0,0.4) url('{{ asset("img/cs.png") }}');min-height: 100vh;background-size: 100% 100%;background-position: center;background-size: cover;background-blend-mode: multiply;">
        <div class="container-fluid pb-5">
            <div class="container">
                <div class="row pb-md-5 mb-md-5 mb-2">
                    <div class="col-3 my-2"><a href="{{ route("home") }}"><img src="{{ asset("img/logo-dark.png") }}" syle="width:1rem"></a></div>
                </div>
                <div class="row pb-md-5 mb-md-5">
                    <div class="col-mg-8">
                        <h1 class="text-white underline-colored display-3 font-weight-bold mb-4">Coming soon</h1>
                        <h2 class="text-white mb-5">Welcome to CSListed</h2>
                    
                        <ul class="text-white list">
                            <li>CSlisted is easy to use, navigate and reliable</li>
                            <li>CSlisted has a good security for all your transactions</li>
                            <li>CSlisted is the perfect marketplace for you to buy / sell anything.</li>
                            <li>CSlisted the ideal site to find whatever you are looking for</li>
                            <li>CSlisted is a ride to your favorite shop</li>
                            <li>CSlisted brings the world to you</li>
                        </ul>
                        <form class="validate pb-4 mt-5" action="https://cslisted.us19.list-manage.com/subscribe/post?u=1a0126b7b6f7a22d41e44002d&amp;id=d95c97ad43" method="get" name="mc-embedded-subscribe-form" id="mc-embedded-subscribe-form">
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
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center"><a href="{{ route("home") }}" class="text-white">cslisted.com</a></h3>
                    </div>
                </div>
            </div>
        </div>     
     </div>   
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.rateit.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!--Start of Tawk.to Script-->
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
  </body>

</html>
