@extends('frontend.pages.category.layouts_category.master_category')
@section('content_category')

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="single-proper blog details">
           
            <div class="container">
                <section class="headings-2 pt-0 pb-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                  
                                    <p><a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <span>{{$room->category->name}}</span>
                                        &nbsp;/&nbsp; <span>{{$room->location->name}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="headings-2 pt-0">
                                    <div class="pro-wrapper">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h3 style="font-size: 25px">
                                                    @if ($room->service_hot > 0)
                                                    @for($i = 1 ; $i <= $room->service_hot ; $i ++)
                                                        <span style="color: #fed553;font-size:20px" class="fa fa-star"></span>
                                                    @endfor
                                                    @endif
                                                    @if ($room->service_hot == 1)
                                                    <span style="color:#055699">{{$room->name}}</span>
                                                    @elseif($room->service_hot == 2)
                                                    <span style="color:#055699">{{$room->name}}</span>
                                                    @elseif($room->service_hot == 3)
                                                    <span style="color:#f60">{{$room->name}}</span>
                                                    @elseif($room->service_hot == 4)
                                                    <span style="color:#ea2e9d">{{$room->name}}</span>
                                                    @else
                                                    <span style="color: #E13427">{{$room->name}}</span> 
                                                    @endif
                                                   
                                                </h3>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <i class="fa-solid fa-location-dot icon"></i>{{$room->full_address ?? 'N\A'}}</a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </section>
                                <!-- main slider carousel items -->
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @php
                                            $room_img = json_decode($room->images, true);
                                        @endphp
                                
                                        @foreach ($room_img as $index => $item)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner carus" role="listbox">
                                        @foreach ($room_img as $index => $item)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img class="d-block img-fluid fixed-size" src="uploads/images/{{ $item }}" alt="Slide {{ $index + 1 }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                





                                <!-- cars content -->
                                <div class="homes-content details-2 mb-4">
                                    <!-- cars List -->
                                    <ul class="homes-list clearfix">
                                        <li>
                                            <i class="fa-solid fa-hashtag" style="color: #ffff"  aria-hidden="true"></i>
                                            <span>{{$room->id}}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-object-group" aria-hidden="true"></i>
                                            <span>{{$room->area}} m²</span>
                                        </li>
                                        
                                        <li>
                                            <i class="fa-solid fa-tag"  aria-hidden="true" style="color: #ffff"></i>
                                            <span>{{number_format($room->price ?? 0,0,',','.') ?? 0}} vnđ</span>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-eye"  style="color: #ffff"></i>
                                            <span>{{$room->count_view}} lượt xem</span>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-clock " style="color: #ffff"></i></i>
                                            <span><?php echo time_elapsed_string($room->time_start) ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Thông tin mô tả</h5>
                                    <p class="mb-3">{!!$room->description!!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="single homes-content details mb-30">
                            <!-- title -->
                            <h5 class="mb-4">Đặc điểm tin đăng</h5>
                            <ul class="homes-list clearfix">
                                <li>
                                    <span class="font-weight-bold mr-1">Mã tin:</span>
                                    <span class="det">#{{$room->id}}</span>
                                </li>
                               
                                <li>
                                    <span class="font-weight-bold mr-1">Loại tin rao:</span>
                                    <span class="det">{{$room->category->name}}</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Khu vực cho thuê:</span>
                                    <span class="det">{{$room->location->name}}</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Đối tượng cho thuê:</span>
                                    <span class="det">{{$room->option->name ?? 'Tất cả'}}</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Ngày đăng:</span>
                                    <span class="det">{{$room->time_start}}</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Ngày hết hạn:</span>
                                    <span class="det">{{$room->time_stop}}</span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Gói tin:</span>
                                    <span class="det">
                                        @if ($room->service_hot == 1)
                                        <span style="color:#055699">Tin thường</span>
                                        @elseif($room->service_hot == 2)
                                        <span style="color:#055699">Tin Vip 3</span>
                                        @elseif($room->service_hot == 3)
                                        <span style="color:#f60">Tin Vip 2</span>
                                        @elseif($room->service_hot == 4)
                                        <span style="color:#ea2e9d">Tin Vip 1</span>
                                        @else
                                        <span style="color:#E13427">Tin Đặc biệt</span>
                                        @endif    
                                    </span>
                                </li>
                                
                               
                                
                            </ul>
                            <!-- title -->
                            <h5 class="mt-5">Thông tin liên hệ</h5>
                            <!-- cars List -->
                            <div class="">
                                <div class="sidebar-widget author-widget2">
                                    <ul class="author__contact">
                                        <li><span class="la la-map-marker" style="margin-right: 12%"> <span class="font-weight-bold mr-1" >Liên hệ: </span></span>{{$room->user->name}}</li>
                                        <li><span class="la la-phone" style="margin-right: 9%"><span class="font-weight-bold mr-1" >Điện thoại: </span></span>{{$room->user->phone}}</li>
                                        <li><span class="la la-envelope-o" style="margin-right: 14.7%"><span class="font-weight-bold mr-1" >Zalo: </span></span>{{$room->user->phone}}</li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                     
                        
                        <div class="property-location map">
                            <h5>Bản đồ</h5>
                            <div id='map' class="contact-map"></div>
                            {{-- <div id="map-detail" class="contact-map"></div> --}}
                        </div>
                       
                        
                    </div>
               @include('frontend.pages.detail_room.sidebar_detail')
                </div>
                <!-- START SIMILAR PROPERTIES -->
                <section class="similar-property featured portfolio p-0 bg-white-inner">
                    <div class="container">
                        <h5>Cho thuê ....</h5>
                        <div class="row portfolio-items">
                            <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <div class="homes-price">$9,000/mo</div>
                                                <img src="{{asset('images/blog/b-11.jpg')}}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span>6 Bedrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span>3 Bathrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                                <span>2 Garages</span>
                                            </li>
                                        </ul>
                                        <div class="footer">
                                            <a href="agent-details.html">
                                                <img src="{{asset('images/testimonials/ts-1.jpg')}}" alt="" class="mr-2"> Lisa Jhonson
                                            </a>
                                            <span>2 months ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item col-lg-4 col-md-6 col-xs-12 people">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button sale rent">For Rent</div>
                                                <div class="homes-price">$3,000/mo</div>
                                                <img src="{{asset('images/blog/b-12.jpg')}}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span>6 Bedrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span>3 Bathrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                                <span>2 Garages</span>
                                            </li>
                                        </ul>
                                        <div class="footer">
                                            <a href="agent-details.html">
                                                <img src="{{asset('images/testimonials/ts-2.jpg')}}" alt="" class="mr-2"> Karl Smith
                                            </a>
                                            <span>2 months ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item col-lg-4 col-md-6 col-xs-12 people landscapes no-pb pbp-3">
                                <div class="project-single no-mb mbp-3">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <div class="homes-price">$9,000/mo</div>
                                                <img src="{{asset('images/blog/b-1.jpg')}}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html">Real House Luxury Villa</a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span>6 Bedrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span>3 Bathrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                                <span>2 Garages</span>
                                            </li>
                                        </ul>
                                        <div class="footer">
                                            <a href="agent-details.html">
                                                <img src="{{asset('images/testimonials/ts-3.jpg')}}" alt="" class="mr-2"> katy Teddy
                                            </a>
                                            <span>2 months ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
                <!-- END SIMILAR PROPERTIES -->
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->

        @include('frontend.pages.detail_room.mapjs')
   
@endsection