<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>@yield('title','DATN - Kênh Thông Tin Phòng Trọ Số 1 Việt Nam')</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo-icon.png')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

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
    <link rel="stylesheet" id="color" href="{{asset('css/default.css')}}">
    <script src='https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.css' rel='stylesheet' />
   
   
</head>
<body class="inner-pages homepage-4 agents hp-6 full hd-white">
    <div id="wrapper" >
        @include('frontend.pages.category.layouts_category.header_category')
          @yield('content_category')
        @include('frontend.pages.category.layouts_category.footer_category')
    </div>

    <!-- ARCHIVES JS -->
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/rangeSlider.js')}}"></script>
    <script src="{{asset('js/tether.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/mmenu.min.js')}}"></script>
    <script src="{{asset('js/mmenu.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/aos2.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/slick4.js')}}"></script>
    <script src="{{asset('js/smooth-scroll.min.js')}}"></script>
    <script src="{{asset('js/lightcase.js')}}"></script>
    <script src="{{asset('js/search.js')}}"></script>
    <script src="{{asset('js/light.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/popup.js')}}"></script>
    <script src="{{asset('js/searched.js')}}"></script>
    <script src="{{asset('js/ajaxchimp.min.js')}}"></script>
    <script src="{{asset('js/newsletter.js')}}"></script>
    <script src="{{asset('js/inner.js')}}"></script>
    <script src="{{asset('js/color-switcher.js')}}"></script>
    {{-- <script src="{{asset('js/favorite.js')}}" type="text/javascript"></script> --}}
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    {!! Toastr::message() !!}

    <script>
        $(".dropdown-filter").on('click', function() {

            $(".explore__form-checkbox-list").toggleClass("filter-block");

        });

    </script>
    <script>
        var elements = document.querySelectorAll('.ellipsis');
        var title_long = document.querySelectorAll('.title-long')
        var title_room_new = document.querySelectorAll('.title_room_new')
        elements.forEach(function (element) {
            var originalText = element.textContent;

            // Giới hạn độ dài của văn bản và thêm dấu "..."
            var maxLength = 100;
            if (originalText.length > maxLength) {
                var truncatedText = originalText.slice(0, maxLength) + '...';
                element.textContent = truncatedText;
            }
        });

        title_room_new.forEach(function (element) {
            var originalText = element.textContent;

            // Giới hạn độ dài của văn bản và thêm dấu "..."
            var maxLength = 50;
            if (originalText.length > maxLength) {
                var truncatedText = originalText.slice(0, maxLength) + '...';
                element.textContent = truncatedText;
            }
        });

        title_long.forEach(function (element) {
            var originalText = element.textContent;

            // Giới hạn độ dài của văn bản và thêm dấu "..."
            var maxLength = 65;
            if (originalText.length > maxLength) {
                var truncatedText = originalText.slice(0, maxLength) + '...';
                element.textContent = truncatedText;
            }
        });
    </script>
    @include('frontend.pages.favourite.localStorage_favourite')
    <script>
        
        $('#abc').on('click','.btn-close i' , function(){
            $.ajax({
                url: 'delete-item-favourite/'+$(this).data('id'),
                type: 'GET',
            }).done(function(response){
                RenderFavorite(response);
                toastr.success('Xoá thành công!', 'Thành công', { positionClass: 'toast-bottom-right' });
            });
        });
       
        function RenderFavorite(response){
            $('#change-item-favourite').empty();
            $('#change-item-favourite').html(response);
        }
    </script>
   

</body>
</html>