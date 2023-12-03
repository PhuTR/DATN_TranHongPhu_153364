    {{-- tin vip --}}
    @if ($item->service_hot == 5)
    <div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin">
        <div class="project-single mb-0 bb-0" data-aos="fade-up">
            <div class="project-inner project-head">
                <div class="homes">
                    <!-- homes img -->
                    <a  href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" class="homes-img">
                        <img  class="img-responsive" id="output1{{$item->id}}" src="{{ pare_url_file($item->avatar) }}">
                    </a>
                </div>
                <div class="button-effect">
                    <button class="img-poppu btn" id="{{$item->id}}" onclick="add_wistlist(this.id)"><i id="icon-heart" class="fa-solid fa-heart"></i></button>
                </div>
               
            </div>
            @php
                $timeStart = \Carbon\Carbon::parse($item->time_start);
                $timeStop = \Carbon\Carbon::parse($item->time_stop);
                $daysDifference = $timeStop->diffInDays($timeStart);
            @endphp
            @if ($daysDifference<=5)
                <span class="chothuenhanh"></span>
            @endif
        </div>
        
    </div>
        <!-- homes address -->
    <div class="col-lg-7 col-md-12 homes-content pb-0 mb-44 item-margin" data-aos="fade-up" style="background-color: #FFF9F3">

        <h3>
            <a id="link-room{{$item->id}}" style="color: #FF385C" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
                @if ($item->service_hot > 0)
                @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                    <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                @endfor
                @endif
            <span id="service_hot{{$item->id}}" hidden>{{$item->service_hot}}</span>
            <span id="name{{$item->id}}" class="title-long"> {{$item->name}}</span>
            </a>
        </h3>
        <p class="homes-address mb-3">
            <a >
                <i class="fa fa-map-marker"></i><span id="address{{$item->id}}">{{$item->district->name}} - {{$item->city->name}}</span>
            </a>
            <a style="float: right">
                <span id="time_start{{$item->id}}"><?php echo time_elapsed_string($item->time_start); ?></span>
            </a>
        </p>
        <!-- homes List -->
        <ul class="homes-list clearfix pb-2" >
            <li class="the-icons" style="margin-top: -5%">
                <span id="price{{$item->id}}" style="font-size: 1rem;font-weight: 700;color: #16c784;">{{number_format($item->price/1000000,1)}} triệu/tháng</span>
            </li>
            <li class="the-icons" style="margin-top: -5%">
                <i class="fa fa-object-group mr-1" aria-hidden="true"></i>
                <span id="area{{$item->id}}">{{$item->area}}m²</span>
            </li>
            <li class="the-icons" style="margin-top: -5%">
                <i class="fa-solid fa-eye"></i>
                <span id="view{{$item->id}}">{{$item->count_view}} lượt xem</span>
            </li>
        

            <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">
                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                <span id="description{{$item->id}}" class="ellipsis">{!!$item->description!!}</span>
            </li>
        
        </ul>
        <div class="footer">
            <a href="agent-details.html">
                <img id="avatar{{$item->id}}" src="{{ pare_url_file($item->user->avatar) }}" alt="" class="mr-2">
               <span  style="margin-top:0;float:none" id="username{{$item->id}}">{{$item->user->name ?? 'N\A'}}</span> 
            </a>
           
            <a href="https://zalo.me/{{$item->user->phone ?? 'N\A'}}" target="_blank" class="btn-contact-zalo">Nhắn Zalo</a>
            <br />
            <a href="tel:{{$item->user->phone ?? 'N\A'}}" target="_blank" class="btn-contact-phone">Gọi  <span id="phone{{$item->id}}" style="margin-top:0;margin-left:1px"> {{$item->user->phone ?? 'N\A'}}</span></a>
           
        </div>
    </div>      
@endif

     {{-- tin vip 4 --}}
@if ($item->service_hot <= 4)
    <div class="item col-lg-5-3 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin" style="max-height:200px">
        <div class="project-single mb-0 bb-0" data-aos="fade-up">
            <div class="project-inner project-head" style="max-height:200px">
                <div class="homes">
                    <!-- homes img -->
                    <a href="single-property-1.html" class="homes-img" style="max-height:200px">
                        <img style="max-height:200px"  class="img-responsive" id="output1{{$item->id}}" src="{{ pare_url_file($item->avatar) }}">
                    </a>
                </div>
                <div class="button-effect">
                    <button class="img-poppu btn" id="{{$item->id}}" onclick="add_wistlist(this.id)"><i id="icon-heart" class="fa-solid fa-heart"></i></button>
                </div>
            </div>
            @php
                $timeStart = \Carbon\Carbon::parse($item->time_start);
                $timeStop = \Carbon\Carbon::parse($item->time_stop);
                $daysDifference = $timeStop->diffInDays($timeStart);
            @endphp
            @if ($daysDifference<=5)
                <span class="chothuenhanh"></span>
            @endif
        </div>
    </div>
    <!-- homes content -->
    <div class="col-lg-7-7 col-md-12 homes-content pb-0 mb-44 vip0 item-margin" data-aos="fade-up" >
        <!-- homes address -->
        <h3>
            @if ($item->service_hot == 4)
                <a id="link-room{{$item->id}}" style="font-size:0.9em;color:#ea2e9d" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
            @elseif ($item->service_hot == 3)
                <a id="link-room{{$item->id}}" style="font-size:0.9em;color:#f60" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
            @elseif ($item->service_hot == 2)
                <a id="link-room{{$item->id}}" style="font-size:0.9em;color:#3763e0" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
            @else
                <a id="link-room{{$item->id}}" style="font-size:0.9em;color:#055699" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
            @endif
                @if ($item->service_hot > 0)
                @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                    <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                @endfor
                @endif
            <span id="service_hot{{$item->id}}" hidden>{{$item->service_hot}}</span>
            <span id="name{{$item->id}}"  class="title-long"> {{$item->name}}</span>
            </a>
        </h3>
        <p class="homes-address mb-3">
            
            <ul class="homes-list clearfix pb-2" >
                <li class="the-icons" style="margin-top: -5%;width:30%">
                    <span id="price{{$item->id}}" style="font-size: 1rem;font-weight: 700;color: #16c784;">{{number_format($item->price/1000000,1)}} triệu/tháng</span>
                </li>
                <li class="the-icons" style="margin-top: -5%;width:15%">
                    <i class="fa fa-object-group mr-1" aria-hidden="true"></i>
                    <span id="area{{$item->id}}">{{$item->area}}m²</span>
                </li>
                <li class="the-icons" style="margin-top: -5%;width:55%">
                    <i class="fa fa-map-marker"></i><span id="address{{$item->id}}">{{$item->district->name}} - {{$item->city->name}}</span>
                </li>
                <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">
                    <i class="flaticon-square mr-2" aria-hidden="true"></i>
                    <span id="description{{$item->id}}" class="ellipsis">{!!$item->description!!}</span>
                </li>
            
            </ul>
            
        </p>
    
        <div style="padding-top: 0px" class="footer">
            <a >
                <img id="avatar{{$item->id}}" src="{{ pare_url_file($item->user->avatar) }}" alt="" class="mr-2">
                <span  style="margin-top:0;float:none" id="username{{$item->id}}">{{$item->user->name ?? 'N\A'}}</span> 
            </a>
            <span id="time_start{{$item->id}}"><?php echo time_elapsed_string($item->time_start); ?></span>
        </div>
    </div>
@endif