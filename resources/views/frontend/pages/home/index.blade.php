@extends('frontend.layouts.master')
@section('content')


   <!-- STAR HEADER SEARCH -->
   <section id="hero-area" class="parallax-searchs home15 overlay thome-6 thome-1" data-stellar-background-ratio="0.5">
    <div class="hero-main">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="col-12">
                    <div class="hero-inner">
                        <!-- Welcome Text -->
                        <div class="welcome-text">
                            <h1 class="h1">Find Your Dream
                            <br class="d-md-none">
                            <span class="typed border-bottom"></span>
                        </h1>
                            <p class="mt-4">We Have Over Million Properties For You.</p>
                        </div>
                        <!--/ End Welcome Text -->
                        <!-- Search Form -->
                        <!-- Search Form -->
      <form role="search" method="GET" action="{{ route('get.room.search') }}">
        <div class="col-12 px-0 parallax-searchs">
            <div class="banner-search-wrap">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs_1">
                        <div class="rld-main-search">
                            <div class="row">
    
                                <div class="rld-single-select ml-22">
                                    <select class="select single-select " style="width:220px" name="category_id">
    
                                        @foreach($categoriesGlobal ?? [] as $item)
                                        <option value="{{ $item->id }}" {{ Request::get('category_id') == $item->id ? "selected" : "" }}>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="rld-single-select ml-22">
                                    <select class="select single-select " name="city_id">
                                        <option value="">Chọn thành phố</option>
                                        @foreach($locationsCity ?? [] as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == ($room->city_id ?? (Request::get('city_id'))) ? "selected" : ""}}>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="rld-single-select ml-22">
                                    <select class="select single-select " name="price">
                                        <option value="">Chọn mức giá</option>
                                        @foreach(config('config_search.price') as $key => $item)
                                        <option value="{{ $key }}" {{ Request::get('price') == $key ? "selected" : "" }}>{{ $item }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="rld-single-select ml-22">
                                    <select class="select single-select " name="area">
                                        <option value="">Chọn diện tích</option>
                                        @foreach(config('config_search.area') as $key => $item)
                                        <option value="{{ $key }}" {{ Request::get('area') == $key ? "selected" : "" }}>{{ $item }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                    <button type="submit" class="btn btn-yellow" ><i class="fa-solid fa-magnifying-glass icon  "></i>Tìm kiếm</button>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
     
    <!--/ End Search Form -->
                        <!--/ End Search Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HEADER SEARCH -->

<!-- START SECTION POPULAR PLACES -->
<section class="visited-cities bg-white-1 rec-pro">
    <div class="container-fluid">
       <div class="sec-title">
            <h2><span>Địa điểm phổ biến </span>Nhất</h2>
        </div>
        <div class="row">
            <div class="col-lg-0"></div>
            @foreach ($locationsHot as $item )
            <div class="col-lg-3 col-md-6 pr-1" data-aos="zoom-in" data-aos-delay="150">
                <!-- Image Box -->
                <a href="listing-details.html" class="img-box hover-effect">
                    @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                        <img   class="img-responsive" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                    @else
                        <img  class="img-responsive" id="output1" src="{{ asset('uploads/avatars/' . $item->avatar) }}">
                    @endif
                
                    <div class="img-box-content visible">
                        <h4 class="mb-2 ">{{$item->name}}</h4>
                        
                    </div>
                </a>
            </div>
            @endforeach
       
           
        </div>
    </div>
</section>
<!-- END SECTION POPULAR PLACES -->

<!-- START SECTION FEATURED PROPERTIES -->
<section class="featured portfolio bg-white-2 rec-pro full-l">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><span>Kênh thông tin phòng trọ số 1  </span>việt nam </h2>
          
        </div>
        <div class="row portfolio-items">
            @foreach ($roomVipFive as $item )
            <div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
                <div class="project-single" data-aos="fade-right">
                    <div class="project-inner project-head">
                        <div class="homes">
                            <!-- homes img -->
                            <a href="single-property-1.html" class="homes-img">
                                @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                                     <img src="{{ asset('images/no-avatar.jpg') }}" alt="home-1" class="img-responsive">
                                @else
                                     <img src="{{ asset('uploads/avatars/' . $item->avatar) }}" alt="home-1" class="img-responsive">

                                @endif
                               
                            </a>
                        </div>
                        <div class="button-effect">
                            <a href="single-property-1.html" class="btn"><i class="fa-regular fa-heart"></i></a>
                          
                        </div>
                    </div>
                    <!-- homes content -->
                    <div class="homes-content">
                        <!-- homes address -->
                        <h3><a href="{{route('get.category.detail)',['slug' => $item->slug,'id' => $item->id])}}" >
                            @if ($item->service_hot > 0)
                            @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                            @endfor
                            @endif
                            <span class="title-long">{{$item->name}}</span>
                        </a></h3>
                        <p class="homes-address mb-3">
                            <a href="single-property-1.html">
                                <i class="fa fa-map-marker"></i><span>{{$item->wards->name}} - {{$item->district->name}} - {{$item->city->name}}</span>
                            </a>
                        </p>
                        <!-- homes List -->
                        <ul class="homes-list clearfix pb-3">
                            <li class="the-icons">
                                <i class="fa-solid fa-hashtag"></i> 
                                <span>{{$item->id}}</span>
                            </li>
                            <li class="the-icons">
                                <i class="fa fa-object-group mr-1" aria-hidden="true"></i>
                                <span>{{$item->area}} m²</span>
                            </li>
                            <li class="the-icons">
                                <i class="fa-solid fa-eye"></i> 
                                <span>{{$item->count_view}} lượt xem</span>
                            </li>
                            <li class="the-icons">
                                <i class="fa-solid fa-clock " aria-hidden="true"></i>
                                <span><?php echo time_elapsed_string($item->time_start) ?></span>
                             
                            </li>
                        </ul>
                        <div class="price-properties footer pt-3 pb-0" style="padding-top: 0px!important">
                            <h3 class="title mt-3">
                             <a style="text-transform: none;">{{number_format($item->price/1000000,1)}} triệu/tháng</a>
                            </h3>
                            <div class="compare">
                                <a href="tel:{{$item->user->phone}}" title="Compare">
                                    <i class="fa-solid fa-phone" ></i>
                                </a>
                                <a href="https://zalo.me/{{$item->user->phone}}" title="Share">
                                    <i class="fa-regular fa-message"></i>
                                </a>
                                <a href="#" title="Favorites">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
            
         
        </div>
        <div class="bg-all">
            <a href="{{route('get.home.allview')}}" class="btn btn-outline-light">Xem tất cả</a>
        </div>
    </div>
</section>
<!-- END SECTION FEATURED PROPERTIES -->

<!-- START SECTION WHY CHOOSE US -->
<section class="how-it-works bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><span>Tại sao </span>lại chọn chúng tôi</h2>
            <p>Chúng tôi cung cấp dịch vụ đầy đủ ở mọi bước.</p>
        </div>
        <div class="row service-1">
            <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="150">
                <div class="serv-flex">
                    <div class="art-1 img-13">
                        <img src="images/icons/icon-4.svg" alt="">
                        <h3>Nhiều thuộc tính</h3>
                    </div>
                    
                </div>
            </article>
            <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="250">
                <div class="serv-flex">
                    <div class="art-1 img-14">
                        <img src="images/icons/icon-5.svg" alt="">
                        <h3>Hàng nghìn người tin cậy</h3>
                    </div>
                 
                </div>
            </article>
            <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up" data-aos-delay="350">
                <div class="serv-flex arrow">
                    <div class="art-1 img-15">
                        <img src="images/icons/icon-6.svg" alt="">
                        <h3>Thanh toán dễ dàng</h3>
                    </div>
                  
                </div>
            </article>
            <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt its-2" data-aos="fade-up" data-aos-delay="450">
                <div class="serv-flex">
                    <div class="art-1 img-14">
                        <img src="images/icons/icon-15.svg" alt="">
                        <h3>Chúng tôi ở gần bạn</h3>
                    </div>
                   
                </div>
            </article>
        </div>
    </div>
</section>
<!-- END SECTION WHY CHOOSE US -->        

<!-- START SECTION RECENTLY PROPERTIES -->
<section class="featured portfolio rec-pro disc">
    <div class="container-fluid">
        <div class="sec-title discover">
            <h2><span>Tin </span>Mới cập nhật</h2>
            
        </div>
        <div class="portfolio col-xl-12">
            <div class="slick-lancers">
                @foreach ($roomNew as $item )
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="landscapes">
                        <div class="project-single">
                            <div class="project-inner project-head">
                                <div class="homes" style="max-height:200px">
                                    <!-- homes img -->
                                    <a href="single-property-1.html" class="homes-img">
                                       
                                        @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                                                <img src="{{ asset('images/no-avatar.jpg') }}" alt="home-1" class="img-responsive">
                                        @else
                                                <img src="{{ asset('uploads/avatars/' . $item->avatar) }}" alt="home-1" class="img-responsive">

                                        @endif        
                                    </a>
                                </div>
                              
                            </div>
                            <!-- homes content -->
                            <div class="homes-content">
                                <!-- homes address -->
                             
                                <h3><a href="{{route('get.category.detail)',['slug' => $item->slug,'id' => $item->id])}}" >
                                    @if ($item->service_hot > 0)
                                    @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                                    @endfor
                                    @endif
                                    <span class="title-long">{{$item->name}}</span>
                                </a></h3>
                                <p class="homes-address mb-3">
                                    <a href="single-property-1.html">
                                        <i class="fa fa-map-marker"></i><span>{{$item->wards->name}} - {{$item->district->name}} - {{$item->city->name}}</span>
                                    </a>
                                </p>
                                <!-- homes List -->
                                <ul class="homes-list clearfix pb-3">
                                    <li class="the-icons">
                                        <i class="fa-solid fa-hashtag"></i> 
                                        <span>{{$item->id}}</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="fa fa-object-group mr-1" aria-hidden="true"></i>
                                        <span>{{$item->area}} m²</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="fa-solid fa-eye"></i> 
                                        <span>{{$item->count_view}} lượt xem</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="fa-solid fa-clock " aria-hidden="true"></i>
                                        <span><?php echo time_elapsed_string($item->time_start); ?></span>
                                    </li>
                                </ul>
                                <div class="price-properties footer pt-3 pb-0">
                                    <h3 class="title mt-3">
                                        <a style="text-transform: none;">{{number_format($item->price/1000000,1)}} triệu/tháng</a>
                                    </h3>
                                    <div class="compare">
                                        
                                        <a href="#" title="Favorites">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
             
            </div>
        </div>
    </div>
</section>
<!-- END SECTION RECENTLY PROPERTIES -->


<!-- STAR SECTION PARTNERS -->
<div class="partners bg-white rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><span>Our </span>Partners</h2>
            <p>The Companies That Represent Us.</p>
        </div>
        <div class="owl-carousel style2">
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/11.jpg" alt=""></div>
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/12.jpg" alt=""></div>
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/13.jpg" alt=""></div>
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/14.jpg" alt=""></div>
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/15.jpg" alt=""></div>
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/16.jpg" alt=""></div>
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/17.jpg" alt=""></div>
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/11.jpg" alt=""></div>
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/12.jpg" alt=""></div>
            <div class="owl-item" data-aos="fade-up"><img src="images/partners/13.jpg" alt=""></div>
        </div>
    </div>
</div>
<!-- END SECTION PARTNERS -->



@endsection