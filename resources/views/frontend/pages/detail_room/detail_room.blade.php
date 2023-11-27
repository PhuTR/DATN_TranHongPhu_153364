@extends('frontend.pages.category.layouts_category.master_category')
@section('title', $room->name)
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
                    <div class="col-lg-8 col-md-12 blog-pots" style="padding-right: 0px;padding-left:0px">
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
                                                    @if ($room->service_hot <= 1)
                                                    <span style="color:#055699" id="name{{$room->id}}">{{$room->name}}</span>
                                                    @elseif($room->service_hot == 2)
                                                    <span style="color:#055699" id="name{{$room->id}}">{{$room->name}}</span>
                                                    @elseif($room->service_hot == 3)
                                                    <span style="color:#f60" id="name{{$room->id}}">{{$room->name}}</span>
                                                    @elseif($room->service_hot == 4)
                                                    <span style="color:#ea2e9d" id="name{{$room->id}}">{{$room->name}}</span>
                                                    @else
                                                    <span style="color: #E13427" id="name{{$room->id}}">{{$room->name}}</span> 
                                                    @endif
                                                    <span id="service_hot{{$room->id}}" hidden>{{$room->service_hot}}</span>
                                                </h3>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <i class="fa-solid fa-location-dot icon"></i>
                                                        <span id="address{{$room->id}}">{{$room->full_address ?? 'N\A'}}</span></a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </section>
                                <!-- main slider carousel items -->
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($images as $key => $item)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner carus" role="listbox">
                                        @foreach ($images as $key => $item)
                                            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                                <img class="d-block img-fluid fixed-size" src="{{ pare_url_file($item->path) }}" alt="Slide {{ $key + 1 }}">
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
                                            <span id="area{{$room->id}}">{{$room->area}} m²</span>
                                        </li>
                                        
                                        <li>
                                            <i class="fa-solid fa-tag"  aria-hidden="true" style="color: #ffff"></i>
                                            <span id="price{{$room->id}}">{{number_format($room->price ?? 0,0,',','.') ?? 0}} vnđ</span>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-eye"  style="color: #ffff"></i>
                                            <span id="view{{$room->id}}">{{$room->count_view}} lượt xem</span>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-clock " style="color: #ffff"></i></i>
                                            <span id="time_start{{$room->id}}"><?php echo time_elapsed_string($room->time_start) ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Thông tin mô tả</h5>
                                    <p class="mb-3" id="description{{$room->id}}">{!!$room->description!!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="single homes-content details mb-30">
                            <!-- title -->
                            <h5 class="mb-4">Đặc điểm tin đăng</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Mã tin:</td>
                                            <td>#{{$room->id}}</td>              
                                        </tr>
                                        <tr>
                                            <td>Khu vực:</td>
                                            <td>{{$room->location->name}}</td>              
                                        </tr>
                                        <tr>
                                            <td>Loại tin rao:</td>
                                            <td>{{$room->category->name}}</td>              
                                        </tr>
                                        <tr>
                                            <td>Đối tượng thuê:</td>
                                            <td>{{$room->option->name ?? 'Tất cả'}}</td>              
                                        </tr>
                                        <tr>
                                            <td>Gói tin:</td>
                                            <td>
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
                                            </td>              
                                        </tr>
                                        <tr>
                                            <td>Ngày đăng:</td>
                                            <td>{{$room->time_start}}</td>              
                                        </tr>
                                        <tr>
                                            <td>Ngày hết hạn:</td>
                                            <td>{{$room->time_stop}}</td>              
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>    
                       
                            <!-- title -->
                            <h5 class="mt-5">Thông tin liên hệ</h5>
                            <!-- cars List -->
                            <div class="">
                                <div class="sidebar-widget author-widget2">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Liên hệ:</td>
                                                    <td id="username{{$room->id}}">{{$room->user->name ?? 'N\A'}}</td>              
                                                </tr>
                                                <tr>
                                                    <td>Điện thoại:</td>
                                                    <td id="phone{{$room->id}}">{{$room->user->phone ?? 'N\A'}}</td>              
                                                </tr>
                                                <tr>
                                                    <td>Zalo:</td>
                                                    <td>{{$room->user->phone ?? 'N\A'}}</td>              
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                     
                        
                        <div class="property-location map">
                            <h5>Bản đồ</h5>
                            <label for="">Địa chỉ: {{$room->full_address}}</label>
                            <div id='map' class="contact-map"></div>
                            <p >Bạn đang xem nội dung tin đăng: "{{$room->name}} - Mã tin: {{$room->id}}". 
                                Mọi thông tin liên quan đến tin đăng này chỉ mang tính chất tham khảo. Nếu bạn có phản hồi với tin đăng này (báo xấu, tin đã cho thuê, không liên lạc được,...), 
                                vui lòng thông báo để có thể xử lý.
                            </p>
                            <a href="{{route('get_user.contact')}}" class="btn-outline"><i class="fa-solid fa-flag icon"></i>Gửi phản hồi</a>
                        </div>

                        <div class="property-location ">
                            @include('frontend.pages.detail_room.rooms_suggests')
                        </div>
                       
                        
                    </div>
                    
                    @include('frontend.pages.detail_room.sidebar_detail')
                </div>
                <!-- START SIMILAR PROPERTIES -->
               
                <!-- END SIMILAR PROPERTIES -->
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->

        @include('frontend.pages.detail_room.mapjs')
   
@endsection