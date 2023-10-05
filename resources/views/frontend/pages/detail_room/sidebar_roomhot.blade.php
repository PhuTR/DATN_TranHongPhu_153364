<div class="widget-boxed mt-5" style="margin-bottom: 20px;">
    <div class="widget-boxed-header">
        <h4>Tin nổi bật</h4>
    </div>
    <div >
        <div class="recent-post">
            @foreach ($rooms_hot as $item )
            <div class="recent-main my-4" >
                <div class="recent-img">
                    {{-- <a href="blog-details.html"><img src="{{asset('images/feature-properties/fp-1.jpg')}}" alt=""></a> --}}

                    <a href="{{route('get.category.detail)',['slug' => $item->slug,'id' => $item->id])}}" >
                        @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                            <img style="min-width: 90px; min-height:70px"   class="img-responsive" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                        @else
                            <img style="min-width: 90px; min-height:70px "  class="img-responsive" id="output1" src="{{ asset('uploads/avatars/' . $item->avatar) }}">
                        @endif

                    </a>
                </div>
                <div class="info-img">
                 
                    <a style="color: #055699;font-weight:400;font-size:1em" href="{{route('get.category.detail)',['slug' => $item->slug,'id' => $item->id])}}" class="title_room_new" ><h6>{{$item->name}}</h6></a>
                    <p><span style="color: #16c784; font-weight:600; font-size:1em"> {{number_format($item->price/1000000,1)}} triệu/tháng</span> <span style="font-size: 12px;float: right;"><?php echo time_elapsed_string($item->time_start); ?></span></p>
              
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
</div>