<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Aug 2023 04:57:56 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Login</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-5-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" id="color" href="{{asset('css/default.css')}}">
</head>

<body class="inner-pages hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
  

        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>Đăng nhập</h1>
                    <h2><a href="index-2.html">Admin </a> &nbsp;/&nbsp; Đăng nhập</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION LOGIN -->
        <div id="login">
            <div class="login">
                <form  autocomplete="off" method="POST">
                @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                        <i class="icon_mail_alt"></i>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                        <i class="icon_lock_alt"></i>
                    </div>
                    {{-- <div class="fl-wrap filter-tags clearfix add_bottom_30">
                        <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Bạn quên mật khẩu?</a></div>
                    </div> --}}
                    <button type="submit" class="btn_1 rounded full-width">Đăng nhập</button>
                    {{-- <div class="text-center add_top_10"><strong><a href="{{route('get_admin.register')}}">Tạo tài khoản mới!</a></strong></div> --}}
                </form>
            </div>
        </div>
        <!-- END SECTION LOGIN -->

       

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

      

        <!-- ARCHIVES JS -->
        <script  href="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script  href="{{asset('js/tether.min.js')}}"></script>
        <script  href="{{asset('js/popper.min.js')}}"></script>
        <script  href="{{asset('js/bootstrap.min.js')}}"></script>
        <script  href="{{asset('js/mmenu.min.js')}}"></script>
        <script  href="{{asset('js/mmenu.js')}}"></script>
        <script  href="{{asset('js/smooth-scroll.min.js')}}"></script>
        <script  href="{{asset('js/ajaxchimp.min.js')}}"></script>
        <script  href="{{asset('js/newsletter.js')}}"></script>
        <script  href="{{asset('js/color-switcher.js')}}"></script>
        <script  href="{{asset('js/inner.js')}}"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Aug 2023 04:57:56 GMT -->
</html>
