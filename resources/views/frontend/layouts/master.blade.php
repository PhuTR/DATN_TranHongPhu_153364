<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from code-theme.com/html/findhouses/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Aug 2023 04:55:38 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Find Houses - HTML5 Template</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="font/flaticon.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/aos2.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/maps.css">
    <link rel="stylesheet" id="color" href="css/colors/pink.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
</head>

<body class="homepage-9 hp-6 homepage-1 mh">
    <div id="wrapper">
        @include('frontend.layouts.header')
  
        @yield('content')
        @include('frontend.layouts.footer')

          <!-- ARCHIVES JS -->
          <script src="js/jquery-3.5.1.min.js"></script>
          <script src="js/rangeSlider.js"></script>
          <script src="js/tether.min.js"></script>
          <script src="js/moment.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script src="js/mmenu.min.js"></script>
          <script src="js/mmenu.js"></script>
          <script src="js/animate.js"></script>
          <script src="js/aos.js"></script>
          <script src="js/aos2.js"></script>
          <script src="js/slick.min.js"></script>
          <script src="js/fitvids.js"></script>
          <script src="js/jquery.waypoints.min.js"></script>
          <script src="js/typed.min.js"></script>
          <script src="js/jquery.counterup.min.js"></script>
          <script src="js/imagesloaded.pkgd.min.js"></script>
          <script src="js/isotope.pkgd.min.js"></script>
          <script src="js/smooth-scroll.min.js"></script>
          <script src="js/lightcase.js"></script>
          <script src="js/search.js"></script>
          <script src="js/owl.carousel.js"></script>
          <script src="js/jquery.magnific-popup.min.js"></script>
          <script src="js/ajaxchimp.min.js"></script>
          <script src="js/newsletter.js"></script>
          <script src="js/jquery.form.js"></script>
          <script src="js/jquery.validate.min.js"></script>
          <script src="js/searched.js"></script>
          <script src="js/forms-2.js"></script>
          <script src="js/leaflet.js"></script>
          <script src="js/leaflet-gesture-handling.min.js"></script>
          <script src="js/leaflet-providers.js"></script>
          <script src="js/leaflet.markercluster.js"></script>
          <script src="js/map-style2.js"></script>
          <script src="js/range.js"></script>
          <script src="js/color-switcher.js"></script>


          <script>
              $(window).on('scroll load', function() {
                  $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
              });
  
          </script>
  
          <!-- Slider Revolution scripts -->
          <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
          <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
          
          <script>
              var typed = new Typed('.typed', {
                  strings: ["House ^2000", "Apartment ^2000", "Plaza ^4000"],
                  smartBackspace: false,
                  loop: true,
                  showCursor: true,
                  cursorChar: "|",
                  typeSpeed: 50,
                  backSpeed: 30,
                  startDelay: 800
              });
  
          </script>
          
          <script>
              $('.slick-lancers2').slick({
                  infinite: false,
                  slidesToShow: 4,
                  slidesToScroll: 1,
                  dots: true,
                  arrows: true,
                  adaptiveHeight: true,
                  responsive: [{
                      breakpoint: 1292,
                      settings: {
                          slidesToShow: 2,
                          slidesToScroll: 2,
                          dots: true,
                          arrows: false
                      }
                  }, {
                      breakpoint: 993,
                      settings: {
                          slidesToShow: 2,
                          slidesToScroll: 2,
                          dots: true,
                          arrows: false
                      }
                  }, {
                      breakpoint: 769,
                      settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1,
                          dots: true,
                          arrows: false
                      }
                  }]
              });
  
          </script>
  
          <script>
              $('.slick-lancers').slick({
                  infinite: false,
                  slidesToShow: 5,
                  slidesToScroll: 1,
                  dots: true,
                  arrows: true,
                  adaptiveHeight: true,
                  responsive: [{
                      breakpoint: 1292,
                      settings: {
                          slidesToShow: 2,
                          slidesToScroll: 2,
                          dots: true,
                          arrows: false
                      }
                  }, {
                      breakpoint: 993,
                      settings: {
                          slidesToShow: 2,
                          slidesToScroll: 2,
                          dots: true,
                          arrows: false
                      }
                  }, {
                      breakpoint: 769,
                      settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1,
                          dots: true,
                          arrows: false
                      }
                  }]
              });
  
          </script>
  
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
                    var maxLength = 20;
                    if (originalText.length > maxLength) {
                        var truncatedText = originalText.slice(0, maxLength) + '...';
                        element.textContent = truncatedText;
                    }
                });

                title_long.forEach(function (element) {
                    var originalText = element.textContent;

                    // Giới hạn độ dài của văn bản và thêm dấu "..."
                    var maxLength = 55;
                    if (originalText.length > maxLength) {
                        var truncatedText = originalText.slice(0, maxLength) + '...';
                        element.textContent = truncatedText;
                    }
                });
            </script>




  
          <!-- MAIN JS -->
          <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
          <script src="js/script.js"></script>
          {!! Toastr::message() !!}
    </div>
</body>