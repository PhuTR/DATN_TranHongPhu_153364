<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Find Houses - HTML5 Template</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo-v1.png')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    {{-- goongjs --}}
    <script src="https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@goongmaps/goong-geocoder@1.1.1/dist/goong-geocoder.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@goongmaps/goong-geocoder@1.1.1/dist/goong-geocoder.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">

    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashbord-mobile-menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/fileinput.css')}}">
    <link rel="stylesheet" id="color" href="{{asset('css/default.css')}}">
	<link rel="stylesheet" href="{{asset('css/fileinput.css')}}">
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

    

</head>
<body class="inner-pages maxw1600 m0a dashboard-bd">
    <div id="wrapper" class="int_main_wraapper">
        @include('user.layouts.header_user')
        <section class="user-page section-padding pt-5">
            <div class="container-fluid">
                <div class="row">
                    @include('user.layouts.sidebar_user')
                    @yield('content_user')
                   
                </div>
            </div>
        </section>    
    </div>

    <!-- START PRELOADER -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- END PRELOADER -->


     <!-- ARCHIVES JS -->
  <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.js')}}"></script>
  <script src="{{asset('js/tether.min.js')}}"></script>
  <script src="{{asset('js/moment.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/mmenu.min.js')}}"></script>
  <script src="{{asset('js/mmenu.js')}}"></script>
  <script src="{{asset('js/swiper.min.js')}}"></script>
  <script src="{{asset('js/swiper.js')}}"></script>
  <script src="{{asset('js/slick.min.js')}}"></script>
  <script src="{{asset('js/slick2.js')}}"></script>
  <script src="{{asset('js/fitvids.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
  <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('js/smooth-scroll.min.js')}}"></script>
  <script src="{{asset('js/lightcase.js')}}"></script>
  {{-- <script src="{{asset('js/search.js')}}"></script> --}}
  <script src="{{asset('js/owl.carousel.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/ajaxchimp.min.js')}}"></script>
  <script src="{{asset('js/newsletter.js')}}"></script>
  <script src="{{asset('js/jquery.form.js')}}"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('js/searched.js')}}"></script>
  <script src="{{asset('js/dashbord-mobile-menu.js')}}"></script>
  <script src="{{asset('js/forms-2.js')}}"></script>
  <script src="{{asset('js/color-switcher.js')}}"></script>



  {{-- <script src="{{asset('js/fileinput/fileinput.js')}}"  type="text/javascript"></script>
  <script src="{{asset('js/fileinput/vi.js')}}"  type="text/javascript"></script> --}}


 <!-- MAIN JS -->

 <script src="{{asset('js/script.js')}}"></script>
 {{-- <script src="{{asset('js/profile.js')}}" ></script> --}}

 <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 {!! Toastr::message() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/fileinput/fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('js/fileinput/vi.js')}}" type="text/javascript"></script>
<script src="{{asset('js/fileinput/selectize.js')}}" type="text/javascript"></script>

<script type="text/javascript">
    $('#file-5').fileinput({
      theme: 'fa',
      language: 'vi',
      showUpload: false,
      allowedFileExtensions: ['jpg', 'png', 'gif']
    });
</script>
<script>
    $(".dropzone").dropzone({
        dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
    });

</script>
<script>
    $(".header-user-name").on("click", function() {
        $(".header-user-menu ul").toggleClass("hu-menu-vis");
        $(this).toggleClass("hu-menu-visdec");
    });

</script>
</html>