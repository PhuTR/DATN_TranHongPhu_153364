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
    {{-- <link rel="stylesheet" href="{{asset('asset_admin/vendors/datatable/css/jquery.dataTables.min.css')}}"/> --}}
    {{-- <link rel="stylesheet" href="{{asset('asset_admin/vendors/datatable/css/responsive.dataTables.min.css')}}"/> --}}
    {{-- <link rel="stylesheet" href="{{asset('asset_admin/vendors/datatable/css/buttons.dataTables.min.css')}}"/> --}}
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

    {{-- morris chartjs --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    {{-- table --}}
    <link rel="stylesheet" href="{{asset('css/datatable/dataTables.bootstrap5.min.css')}}">
    <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
    {{-- select-2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  
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
    <script src="{{asset('asset_admin/vendors/chart_am/core.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chart_am/charts.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chart_am/animated.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chart_am/kelly.js')}}"></script>
    <script src="{{asset('asset_admin/vendors/chart_am/chart-custom.js')}}"></script>
    <script src="{{asset('asset_admin/js/custom.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script>
      new DataTable('#example');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
      $(document).ready(function() {
          $('.select2').select2();
      })
    </script>
    {!! Toastr::message() !!}
  </body>

</html>
