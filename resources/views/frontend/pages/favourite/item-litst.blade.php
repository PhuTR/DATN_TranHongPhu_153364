@foreach (Session::get('Favourite')->rooms as $item) 
{{-- tin vip --}}
    @if ($item['roomInfo']->service_hot == 5)
        <div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin">
            <div class="project-single mb-0 bb-0" data-aos="fade-up">
                <div class="project-inner project-head">
                    <div class="homes">
                        <a href="{{route('get.category.detail',['slug' => $item['roomInfo']->slug,'id' => $item['roomInfo']->id])}}" class="homes-img">
                            <div id="price{{$item['roomInfo']->id}}" class="homes-price">{{number_format($item['roomInfo']->price/1000000,1)}} triệu/tháng</div>
                            @if(empty($item['roomInfo']->avatar) || is_null($item['roomInfo']->avatar) || $item['roomInfo']->avatar == 'no-avatar.jpg')
                                <img class="img-responsive" id="output1{{$item['roomInfo']->id}}" src="{{ asset('images/no-avatar.jpg') }}">
                            @else
                                <img  class="img-responsive" id="output1{{$item['roomInfo']->id}}" src="{{ asset('uploads/avatars/' . $item['roomInfo']->avatar) }}">
                            @endif
                        </a>
                    </div>
                    <div class="button-effect">
                        <a class="img-poppu btn btn-close " id="{{$item['roomInfo']->id}}"><i id="icon-heart{{$item['roomInfo']->id}}" data-id="{{$item['roomInfo']->id}}" class="fa-solid fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 homes-content pb-0 mb-44 item-margin" data-aos="fade-up" style="background-color: #FFF9F3">

            <h3>
                <a id="link-room{{$item['roomInfo']->id}}" style="color: #FF385C" href="{{route('get.category.detail',['slug' => $item['roomInfo']->slug,'id' => $item['roomInfo']->id])}}">
                    @if ($item['roomInfo']->service_hot > 0)
                    @for($i = 1 ; $i <= $item['roomInfo']->service_hot ; $i ++)
                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                    @endfor
                    @endif
                <span id="name{{$item['roomInfo']->id}}" class="title-long"> {{$item['roomInfo']->name}}</span>
                </a>
            </h3>
            <p class="homes-address mb-3">
                <a >
                    {{-- <i class="fa fa-map-marker"></i><span >{{$item['roomInfo']->district->name}} - {{$item['roomInfo']->city->name}}</span> --}}
                </a>
                <a style="float: right">
                    <span><?php echo time_elapsed_string($item['roomInfo']->time_start); ?></span>
                </a>
            </p>
            <ul class="homes-list clearfix pb-2" >
                <li class="the-icons" style="margin-top: -5%">
                    <span style="font-size: 1rem;font-weight: 700;color: #16c784;">{{number_format($item['roomInfo']->price/1000000,1)}} triệu/tháng</span>
                </li>
                <li class="the-icons" style="margin-top: -5%">
                    <i class="fa fa-object-group mr-1" aria-hidden="true"></i>
                    <span>{{$item['roomInfo']->area}}m²</span>
                </li>
                <li class="the-icons" style="margin-top: -5%">
                    <i class="fa-solid fa-eye"></i>
                    <span>{{$item['roomInfo']->count_view}} lượt xem</span>
                </li>
            

                <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">
                    <i class="flaticon-square mr-2" aria-hidden="true"></i>
                    <span class="ellipsis">{!!$item['roomInfo']->description!!}</span>
                </li>
            
            </ul>
            <div class="footer">
                <a href="agent-details.html">
                    @if(empty( $item['roomInfo']->user->avatar) || is_null( $item['roomInfo']->user->avatar) ||  $item['roomInfo']->user->avatar == 'no-avatar.jpg')
                    <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                    @else
                    <img src="{{ asset('uploads/avatars/' . $item['roomInfo']->user->avatar) }}" alt="" class="mr-2">
                    @endif
                    {{$item['roomInfo']->user->name ?? 'N\A'}}</a>
                </a>

                <a href="https://zalo.me/{{$item['roomInfo']->user->phone ?? 'N\A'}}" target="_blank" class="btn-contact-zalo">Nhắn Zalo</a>
                <br />
                <a href="tel:{{$item['roomInfo']->user->phone ?? 'N\A'}}" target="_blank" class="btn-contact-phone">Gọi  {{$item->user->phone ?? 'N\A'}}</a>
            
            </div>
        </div>      
    @endif

        {{-- tin vip 4 --}}
    @if ($item['roomInfo']->service_hot <= 4)
        <div class="item col-lg-5-3 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin" style="max-height:200px">
            <div class="project-single mb-0 bb-0" data-aos="fade-up">
                <div class="project-inner project-head" style="max-height:200px">
                    <div class="homes">
                        <a href="single-property-1.html" class="homes-img" style="max-height:200px">
                            
                            @if(empty($item['roomInfo']->avatar) || is_null($item['roomInfo']->avatar) || $item['roomInfo']->avatar == 'no-avatar.jpg')
                                <img  style="max-height:200px"  class="img-responsive" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                            @else
                                <img  style="max-height:200px"  class="img-responsive" id="output1" src="{{ asset('uploads/avatars/' . $item['roomInfo']->avatar) }}">
                            @endif
                        </a>
                    </div>
                    <div class="button-effect">
                        <a class="img-poppu btn btn-close " id="{{$item['roomInfo']->id}}"><i id="icon-heart{{$item['roomInfo']->id}}" data-id="{{$item['roomInfo']->id}}" class="fa-solid fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>   
        <div class="col-lg-7-7 col-md-12 homes-content pb-0 mb-44 vip0 item-margin" data-aos="fade-up" >
            <h3>
                @if ($item['roomInfo']->service_hot == 4)
                    <a style="font-size:0.9em;color:#ea2e9d" href="{{route('get.category.detail',['slug' => $item['roomInfo']->slug,'id' => $item['roomInfo']->id])}}">
                @elseif ($item['roomInfo']->service_hot == 3)
                    <a style="font-size:0.9em;color:#f60" href="{{route('get.category.detail',['slug' => $item['roomInfo']->slug,'id' => $item['roomInfo']->id])}}">
                @elseif ($item['roomInfo']->service_hot == 2)
                    <a style="font-size:0.9em;color:#3763e0" href="{{route('get.category.detail',['slug' => $item['roomInfo']->slug,'id' => $item['roomInfo']->id])}}">
                @else
                    <a style="font-size:0.9em;color:#055699" href="{{route('get.category.detail',['slug' => $item['roomInfo']->slug,'id' => $item['roomInfo']->id])}}">
                @endif
                    @if ($item['roomInfo']->service_hot > 0)
                    @for($i = 1 ; $i <= $item['roomInfo']->service_hot ; $i ++)
                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                    @endfor
                    @endif
                <span  class="title-long"> {{$item['roomInfo']->name}}</span>
                </a>
            </h3>
            <p class="homes-address mb-3">
                
                <ul class="homes-list clearfix pb-2" >
                    <li class="the-icons" style="margin-top: -5%">
                        <span style="font-size: 1rem;font-weight: 700;color: #16c784;">{{number_format($item['roomInfo']->price/1000000,1)}} triệu/tháng</span>
                    </li>
                    <li class="the-icons" style="margin-top: -5%">
                        <i class="fa fa-object-group mr-1" aria-hidden="true"></i>
                        <span>{{$item['roomInfo']->area}}m²</span>
                    </li>
                    <li class="the-icons" style="margin-top: -5%">
                        {{-- <i class="fa fa-map-marker"></i><span>{{$item['roomInfo']->district->name}} - {{$item['roomInfo']->city->name}}</span> --}}
                    </li>
                    <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">
                        <i class="flaticon-square mr-2" aria-hidden="true"></i>
                        <span class="ellipsis">{!!$item['roomInfo']->description!!}</span>
                    </li>
                
                </ul>
                
            </p>
        
            <div style="padding-top: 0px" class="footer">
                <a >
                    @if(empty( $item['roomInfo']->user->avatar) || is_null( $item['roomInfo']->user->avatar) ||  $item['roomInfo']->user->avatar == 'no-avatar.jpg')
                    <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                    @else
                    <img src="{{ asset('uploads/avatars/' . $item['roomInfo']->user->avatar) }}" alt="" class="mr-2">
                    @endif
                    {{$item['roomInfo']->user->name ?? 'N\A'}}
                </a>
                <span><?php echo time_elapsed_string($item['roomInfo']->time_start); ?></span>
            </div>
        </div>
    @endif

@endforeach