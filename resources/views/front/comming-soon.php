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
    </style>
  </head>
  <!-- Body-->
  <body>
    <div class="container pb-5 mb-4">
      @yield('content')
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
