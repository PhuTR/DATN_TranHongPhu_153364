<section class="similar-property featured portfolio p-0 bg-white">
    <div class="">
        <h5>Có thể bạn quan tâm </h5>
        <div class="row featured portfolio-items">
            @foreach ($roomsSuggests ?? [] as $item )
                <div class="item col-lg-5-3 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 item-margin" style="max-height:200px">
                    <div class="project-single mb-0 bb-0" data-aos="fade-up">
                        <div class="project-inner project-head" style="max-height:200px">
                            <div class="homes">
                                <!-- homes img -->
                                <a href="single-property-1.html" class="homes-img" style="max-height:200px">
                                    <img style="max-height:200px;height:200px"  class="img-responsive" id="output1{{$item->id}}" src="{{ pare_url_file($item->avatar) }}">
                                </a>
                            </div>
                            <div class="button-effect">
                                <button class="img-poppu btn" id="{{$item->id}}" onclick="add_wistlist(this.id)"><i id="icon-heart" class="fa-solid fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- homes content -->
                <div class="col-lg-7-7 col-md-12 homes-content pb-0 mb-44 vip0 item-margin" data-aos="fade-up" >
                    <!-- homes address -->
                    <h3>
                        @if ($item->service_hot == 5)
                            <a id="link-room{{$item->id}}" style="font-size:0.9em;color:#E13427" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
                        @elseif ($item->service_hot == 4)
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
                            <li class="the-icons" style="margin-top: -5%;width:25%">
                                <span id="price{{$item->id}}" style="font-size: 1rem;font-weight: 700;color: #16c784;">{{number_format($item->price/1000000,1)}} triệu/tháng</span>
                            </li>
                            <li class="the-icons" style="margin-top: -5%; width:20%">
                                <span id="area{{$item->id}}">{{$item->area}}m²</span>
                            </li>
                            <li class="the-icons" style="margin-top: -5%; width:50%">
                              <span id="address{{$item->id}}">{{$item->district->name}} - {{$item->city->name}}</span>
                            </li>
                            <li class="the-icons" style="width:100% !important; margin-top:-3%;margin-bottom:-4%">
                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                <span id="description{{$item->id}}" class="ellipsis">{!!$item->description!!}</span>
                            </li>
                        
                        </ul>
                        
                    </p>
                
                    <div style="padding-top: 0px" class="footer">
                        <a >
                            @if(empty( $item->user->avatar) || is_null( $item->user->avatar) ||  $item->user->avatar == 'no-avatar.jpg') --}}
                            <img id="avatar{{$item->id}}" class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                            @else
                            <img id="avatar{{$item->id}}" src="{{ asset('uploads/avatars/' . $item->user->avatar) }}" alt="" class="mr-2">
                            @endif
                            <span  style="margin-top:0;float:none" id="username{{$item->id}}">{{$item->user->name ?? 'N\A'}}</span> 
                        </a>
                        <span id="time_start{{$item->id}}"><?php echo time_elapsed_string($item->time_start); ?></span>
                    </div>
                </div>
            @endforeach
          
        </div>
    </div>
</section>