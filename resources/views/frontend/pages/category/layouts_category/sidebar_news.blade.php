 {{-- hot --}}
      
 <div class="widget-boxed mt-5" style="margin-bottom: 20px;">
    <div class="widget-boxed-header">
        <h4>Tin mới đăng</h4>
    </div>
    <div >
        <div class="recent-post" style="line-height:1.3;">
            @foreach ($rooms_new as $item )
            @php
                $firstImage = $item->images->first();
            @endphp
            <div class="recent-main" style="border-bottom: 1px solid #eaeff5;margin-bottom:10px">
                @if($item->service_hot >=5)
                    <div class="recent-img" style="background: #fff9f3">
                        <a href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" >
                            @if (empty($item->avatar) || is_null($item->avatar))
                                @if ($firstImage && !is_null($firstImage->path))
                                    @if (Str::startsWith($firstImage->path, 'https'))
                                    <img style="min-width: 90px; min-height:70px;border-radius:3px "  class="img-responsive" id="output1{{$item->id}}" src="{{ ($firstImage->path) }}">
                                    @else
                                        <img style="min-width: 90px; min-height:70px;border-radius:3px "  class="img-responsive" id="output1{{$item->id}}" src="{{ pare_url_file($firstImage->path) }}">
                                    @endif
                                @else
                                    <img style="min-width: 90px; min-height:70px;border-radius:3px "  class="img-responsive" id="output1" src="{{ pare_url_file($item->avatar) }}">
                                @endif
                            @else
                                <img style="min-width: 90px; min-height:70px;border-radius:3px "  class="img-responsive" id="output1" src="{{ pare_url_file($item->avatar) }}">
                            @endif
                        </a>
                    </div>
                    <div class="info-img" style="background: #fff9f3;width:100%">
                        @if ($item->service_hot > 0)
                            @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                                <span style="color: #fed553;font-size:10px" class="fa fa-star"></span>
                            @endfor
                        @endif
                        <a style="color: #E13427;font-weight:400;font-size:1rem" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" class="title_room_new" >{{$item->name}}</a>
                        <div>
                            <span style="color: #16c784; font-weight:600; font-size:1rem"> {{number_format($item->price/1000000,1)}} triệu/tháng</span>
                            <span style="font-size: 12px;float: right;"><?php echo time_elapsed_string($item->time_start); ?></span>
                        </div>
                    </div>
                @else
                    <div class="recent-img">
                        <a href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" >
                            @if (empty($item->avatar) || is_null($item->avatar))
                                @if ($firstImage && !is_null($firstImage->path))
                                    @if (Str::startsWith($firstImage->path, 'https'))
                                    <img style="min-width: 90px; min-height:70px;border-radius:3px "  class="img-responsive" id="output1{{$item->id}}" src="{{ ($firstImage->path) }}">
                                    @else
                                        <img style="min-width: 90px; min-height:70px;border-radius:3px "  class="img-responsive" id="output1{{$item->id}}" src="{{ pare_url_file($firstImage->path) }}">
                                    @endif
                                @else
                                    <img style="min-width: 90px; min-height:70px;border-radius:3px "  class="img-responsive" id="output1" src="{{ pare_url_file($item->avatar) }}">
                                @endif
                            @else
                                <img style="min-width: 90px; min-height:70px;border-radius:3px "  class="img-responsive" id="output1" src="{{ pare_url_file($item->avatar) }}">
                            @endif
                        </a>
                    </div>
                    <div class="info-img" style="width:100%">
                        @if ($item->service_hot > 0)
                            @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                                <span style="color: #fed553;font-size:10px" class="fa fa-star"></span>
                            @endfor
                        @endif
                        @if ($item->service_hot == 4)
                            <a style="color: #ea2e9d;font-weight:400;font-size:1rem" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" class="title_room_new" >{{$item->name}}</a>
                        @elseif($item->service_hot == 3)
                            <a style="color: #f60;font-weight:400;font-size:1rem" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" class="title_room_new" >{{$item->name}}</a>
                        @elseif($item->service_hot == 2)
                            <a style="color: #3763e0;font-weight:400;font-size:1rem" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" class="title_room_new" >{{$item->name}}</a>
                        @elseif($item->service_hot == 1)
                            <a style="color: #055699;font-weight:400;font-size:1rem" href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" class="title_room_new" >{{$item->name}}</a>
                        @endif
                        <div>
                            <span style="color: #16c784; font-weight:600; font-size:1rem"> {{number_format($item->price/1000000,1)}} triệu/tháng</span>
                            <span style="font-size: 12px;float: right;"><?php echo time_elapsed_string($item->time_start); ?></span>
                        </div>
                    </div>
                @endif
            </div>
                
            @endforeach
        </div>
    </div>
</div>
