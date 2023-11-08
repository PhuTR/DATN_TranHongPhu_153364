{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('asset_admin/{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/jquery-ui.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="{{asset('asset_admin/https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/search.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/dashbord-mobile-menu.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/{{asset('css/styles.css')}}">
    <link rel="stylesheet" id="color" href="{{asset('asset_admin/{{asset('css/default.css')}}">
    <script src="{{asset('asset_admin/{{asset('js/ckeditor.js')}}"></script>
    <script src="{{asset('asset_admin/https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="inner-pages maxw1600 m0a dashboard-bd">
    <div id="wrapper" class="int_main_wraapper">
        @include('admin.layouts.app_header')
        <section class="user-page section-padding">
            <div class="container-fluid">
                <div class="row">
                    @include('admin.layouts.app_sider')
                    @yield('content_admin')
                   
                </div>
            </div>
        </section>


        <a data-scroll href="{{asset('asset_admin/#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->
     
        <!-- ARCHIVES JS -->
        <script src="{{asset('asset_admin/{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/tether.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/moment.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/mmenu.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/mmenu.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/swiper.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/swiper.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/slick.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/slick2.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/fitvids.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/smooth-scroll.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/lightcase.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/search.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/owl.carousel.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/ajaxchimp.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/newsletter.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/jquery.form.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/searched.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/dashbord-mobile-menu.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/forms-2.js')}}"></script>
        <script src="{{asset('asset_admin/{{asset('js/color-switcher.js')}}"></script>

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });

        </script>

        <!-- MAIN JS -->
        <script src="{{asset('asset_admin/http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

        <script src="{{asset('asset_admin/{{asset('js/script.js')}}"></script>
        {!! Toastr::message() !!}
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Management Admin</title>
    <link rel="icon" href="{{asset('asset_admin/img/mini_logo.png')}}" type="image/png" />
    <link rel="stylesheet" href="{{asset('asset_admin/css/bootstrap1.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/themefy_icon/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/niceselect/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/owl_carousel/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/gijgo/gijgo.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/font_awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/tagsinput/tagsinput.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/datepicker/date-picker.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/vectormap-home/vectormap-2.0.2.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/scroll/scrollable.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/datatable/css/jquery.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/datatable/css/responsive.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/datatable/css/buttons.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/text_editor/summernote-bs4.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/morris/morris.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/material_icon/material-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/css/metisMenu.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/css/style1.css')}}" />
    <link rel="stylesheet" href="{{asset('asset_admin/css/colors/default.css')}}" id="colorSkinCSS" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
	<script src="{{asset('asset_admin/js/fileinput/fileinput.js')}}"></script>
    <script src="{{asset('asset_admin/js/fileinput/vi.js')}}"></script>
    <link rel="stylesheet" href="{{asset('asset_admin/css/fileinput.css')}}">
    <script src="{{asset('js/ckeditor.js')}}"></script>

  
  </head>
  <body class="crm_body_bg">
    @include('admin.layouts.app_sider')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.layouts.app_header')
        @yield('content_admin')
    </section>

    <script src="{{asset('asset_admin/js/jquery1-3.4.1.min.js')}}"></script>
    <script src="{{asset('asset_admin/js/popper1.min.js')}}"></script>
    <script src="{{asset('asset_admin/js/bootstrap1.min.js')}}"></script>
    <script src="{{asset('asset_admin/js/metisMenu.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/count_up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chartlist/Chart.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/count_up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datatable/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datepicker/datepicker.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datepicker/datepicker.en.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/datepicker/datepicker.custom.js')}}"></script>
    <script src="{{asset('asset_admin/js/chart.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chartjs/roundedBar.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/progressbar/jquery.barfiller.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/tagsinput/tagsinput.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/text_editor/summernote-bs4.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/am_chart/amcharts.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/scroll/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/scroll/scrollable-custom.js')}}"></script>
    {{-- <script src="{{asset('asset_admin/vendors/vectormap-home/vectormap-2.0.2.min.js')}}"></script> --}}
    {{-- <script src="{{asset('asset_admin/vendors/vectormap-home/vectormap-world-mill-en.js')}}"></script> --}}
    <script src="{{asset('asset_admin/vendors/apex_chart/apex-chart2.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/apex_chart/apex_dashboard.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chart_am/core.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chart_am/charts.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chart_am/animated.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chart_am/kelly.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chart_am/chart-custom.js')}}"></script>
    {{-- <script src="{{asset('asset_admin/js/dashboard_init.js')}}"></script> --}}
    <script src="{{asset('asset_admin/js/custom.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
  </body>

</html>
