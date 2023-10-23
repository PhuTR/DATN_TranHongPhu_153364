@extends('frontend.pages.category.layouts_category.master_category')

@section('content_category')
       <!-- START SECTION PROPERTIES LISTING -->
    <section class="properties-right list featured portfolio blog pt-5">
        <div class="container">
          @include('frontend.pages.category.layouts_category.form_search')
          <section class="headings-2 pt-0 pb-0">
            <div class="pro-wrapper">
                <div class="detail-wrapper-body">
                    <div class="listing-title-bar">
                        <div class="text-heading text-left">
                            <p><a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <span>Tìm kiếm</span></p>
                        </div>
                        <h3>Kết quả tìm kiếm</h3>
                    </div>
                </div>
            </div>
        </section>  
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <section class="headings-2 pt-0">
                            <div class="pro-wrapper">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <div class="text-heading text-left">
                                            <p class="font-weight-bold mb-0 mt-3" style="font-size:18px;">Tổng: {{$rooms->total()}} kết quả</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center grid">
                                    <div class="input-group border rounded input-group-lg w-auto mr-4">
                                        <label class="input-group-text bg-transparent border-0 text-uppercase {
                                            letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sắp xếp:</label>
                                        <select class=" form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                                            <option value="1" >Mặc định</option>
                                            <option value="2">Mới nhất</option>
                                            <option value="3">Xem nhiều nhất</option>
                                           
                                        </select>
                                     
                                        
                                    </div>
                            
                                   
                                </div>
                            </div>
                        </section>


                        <div class="row featured portfolio-items">
                            @foreach ($rooms ?? [] as $item )
                                {{-- tin vip --}}
                                @if ($item->service_hot == 5)
                                    <div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin">
                                        <div class="project-single mb-0 bb-0" data-aos="fade-up">
                                            <div class="project-inner project-head">
                                            
                                                <div class="homes">
                                                    <!-- homes img -->
                                                
                                                    <a href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" class="homes-img">
                                                        <div id="price{{$item->id}}" class="homes-price">{{number_format($item->price/1000000,1)}} triệu/tháng</div>
                                                        @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                                                            <img class="img-responsive" id="output1{{$item->id}}" src="{{ asset('images/no-avatar.jpg') }}">
                                                        @else
                                                            <img  class="img-responsive" id="output1{{$item->id}}" src="{{ asset('uploads/avatars/' . $item->avatar) }}">
                                                        @endif

                                        
                                                    </a>
                                                </div>
                                                <div class="button-effect">
                                                    <button class="img-poppu btn" id="{{$item->id}}" onclick="add_wistlist(this.id)"><i id="icon-heart{{$item->id}}" class="fa-solid fa-heart"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 homes-content pb-0 mb-44 item-margin" data-aos="fade-up" style="background-color: #FFF9F3">

                                        <h3>
                                            <a id="link-room{{$item->id}}" style="color: #FF385C" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
                                                @if ($item->service_hot > 0)
                                                @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                                                    <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                                                @endfor
                                                @endif
                                            <span id="name{{$item->id}}" class="title-long"> {{$item->name}}</span>
                                            </a>
                                        </h3>
                                        <p class="homes-address mb-3">
                                            <a >
                                                <i class="fa fa-map-marker"></i><span >{{$item->district->name}} - {{$item->city->name}}</span>
                                            </a>
                                            <a style="float: right">
                                                <span><?php echo time_elapsed_string($item->time_start); ?></span>
                                            </a>
                                        </p>
                                        <ul class="homes-list clearfix pb-2" >
                                            <li class="the-icons" style="margin-top: -5%">
                                                <span style="font-size: 1rem;font-weight: 700;color: #16c784;">{{number_format($item->price/1000000,1)}} triệu/tháng</span>
                                            </li>
                                            <li class="the-icons" style="margin-top: -5%">
                                                <i class="fa fa-object-group mr-1" aria-hidden="true"></i>
                                                <span>{{$item->area}}m²</span>
                                            </li>
                                            <li class="the-icons" style="margin-top: -5%">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>{{$item->count_view}} lượt xem</span>
                                            </li>
                                        
                
                                            <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span class="ellipsis">{!!$item->description!!}</span>
                                            </li>
                                        
                                        </ul>
                                        <div class="footer">
                                            <a href="agent-details.html">
                                                @if(empty( $item->user->avatar) || is_null( $item->user->avatar) ||  $item->user->avatar == 'no-avatar.jpg')
                                                <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                                                @else
                                                <img src="{{ asset('uploads/avatars/' . $item->user->avatar) }}" alt="" class="mr-2">
                                                @endif
                                                {{$item->user->name ?? 'N\A'}}</a>
                                            </a>

                                            <a href="https://zalo.me/{{$item->user->phone ?? 'N\A'}}" target="_blank" class="btn-contact-zalo">Nhắn Zalo</a>
                                            <br />
                                            <a href="tel:{{$item->user->phone ?? 'N\A'}}" target="_blank" class="btn-contact-phone">Gọi  {{$item->user->phone ?? 'N\A'}}</a>
                                           
                                        </div>
                                    </div>      
                                @endif

                                     {{-- tin vip 4 --}}
                                @if ($item->service_hot <= 4)
                                    <div class="item col-lg-5-3 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin" style="max-height:200px">
                                        <div class="project-single mb-0 bb-0" data-aos="fade-up">
                                            <div class="project-inner project-head" style="max-height:200px">
                                                <div class="homes">
                                                    <a href="single-property-1.html" class="homes-img" style="max-height:200px">
                                                        
                                                        @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                                                            <img  style="max-height:200px"  class="img-responsive" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                                                        @else
                                                            <img  style="max-height:200px"  class="img-responsive" id="output1" src="{{ asset('uploads/avatars/' . $item->avatar) }}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="button-effect">
                                                    
                                                   <button class="img-poppu btn" id="{{$item->id}}" onclick="add_wistlist(this.id)"><i id="icon-heart{{$item->id}}" class="fa-solid fa-heart"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7-7 col-md-12 homes-content pb-0 mb-44 vip0 item-margin" data-aos="fade-up" >
                                        <h3>
                                            @if ($item->service_hot == 4)
                                                <a style="font-size:0.9em;color:#ea2e9d" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
                                            @elseif ($item->service_hot == 3)
                                                <a style="font-size:0.9em;color:#f60" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
                                            @elseif ($item->service_hot == 2)
                                                <a style="font-size:0.9em;color:#3763e0" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
                                            @else
                                                <a style="font-size:0.9em;color:#055699" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
                                            @endif
                                                @if ($item->service_hot > 0)
                                                @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                                                    <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                                                @endfor
                                                @endif
                                            <span  class="title-long"> {{$item->name}}</span>
                                            </a>
                                        </h3>
                                        <p class="homes-address mb-3">
                                            
                                            <ul class="homes-list clearfix pb-2" >
                                                <li class="the-icons" style="margin-top: -5%">
                                                    <span style="font-size: 1rem;font-weight: 700;color: #16c784;">{{number_format($item->price/1000000,1)}} triệu/tháng</span>
                                                </li>
                                                <li class="the-icons" style="margin-top: -5%">
                                                    <i class="fa fa-object-group mr-1" aria-hidden="true"></i>
                                                    <span>{{$item->area}}m²</span>
                                                </li>
                                                <li class="the-icons" style="margin-top: -5%">
                                                    <i class="fa fa-map-marker"></i><span>{{$item->district->name}} - {{$item->city->name}}</span>
                                                </li>
                                            
                                                <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">
                                                    <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                    <span class="ellipsis">{!!$item->description!!}</span>
                                                </li>
                                            
                                            </ul>
                                            
                                        </p>
                                    
                                        <div style="padding-top: 0px" class="footer">
                                            <a >
                                                @if(empty( $item->user->avatar) || is_null( $item->user->avatar) ||  $item->user->avatar == 'no-avatar.jpg')
                                                <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                                                @else
                                                <img src="{{ asset('uploads/avatars/' . $item->user->avatar) }}" alt="" class="mr-2">
                                                @endif
                                                {{$item->user->name ?? 'N\A'}}
                                            </a>
                                            <span><?php echo time_elapsed_string($item->time_start); ?></span>
                                        </div>
                                    </div>
                                @endif
                             
                            @endforeach
                        </div>
                    </div>
                   @include('frontend.pages.category.layouts_category.sidebar')
                </div>
         
            <nav aria-label="..." class="pt-3">
               {{$rooms->links()}}
            </nav>
        </div>
    </section>
  
    <<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var savedOption = localStorage.getItem('selectedOption'); // Lấy tùy chọn đã lưu
            var selectElement = $('#inputGroupSelect01'); // Lấy trường select
    
            // Thiết lập tùy chọn đã lưu nếu có
            if (savedOption) {
                selectElement.val(savedOption);
            }
    
            // Lắng nghe sự kiện khi người dùng thay đổi giá trị chọn
            selectElement.on('change', function() {
                var selectedValue = $(this).val(); // Lấy giá trị của option đã chọn
    
                // Chuyển hướng URL dựa trên giá trị đã chọn
                if (selectedValue == 1) {
                    window.location.href = '?sort=asc'; // Chuyển hướng đến URL với tham số sắp xếp 'asc'
                    localStorage.setItem('selectedOption', selectedValue);
                } else if (selectedValue == 2) {
                    window.location.href = '?sort=desc'; // Chuyển hướng đến URL với tham số sắp xếp 'desc'
                    localStorage.setItem('selectedOption', selectedValue);
                }
            });
        });
    </script>
    

  
    
    
    
    


@endsection