<aside class="col-lg-4 col-md-12 car">
    <div class="single widget">
     
        <!-- end author-verified-badge -->
        <div class="sidebar">
            <div class="widget-boxed mt-33 mt-5" style="margin-bottom:20px">
                <div class="widget-boxed-header">
                    <h4>Thông tin liên hệ</h4>
                </div>
                <div class="widget-boxed-body">
                    <div class="sidebar-widget author-widget2">
                        <div class="author-box clearfix">
                            {{-- <img src="{{asset('images/testimonials/ts-1.jpg')}}" alt="author-image" class="author__img"> --}}
                           
                                @if(empty($room->user->avatar) || is_null($room->user->avatar) || $room->user->avatar == 'no-avatar.jpg')
                                    <img   class="author__img" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                                @else
                                    <img  class="author__img" id="output1" src="{{ asset('uploads/avatars/' . $room->user->avatar) }}">
                                @endif

                           
                            <h4 class="author__title">{{$room->user->name ?? 'N\A'}}</h4>
                            <p class="author__meta"><i class="fa-solid fa-hashtag"></i>{{$room->user->id}}</p>
                        </div>
                        <ul class="author__contact">
                            <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>{{$room->location->name}}</li>
                            <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:{{$room->user->phone}}" >{{$room->user->phone}}</a></li>
                            <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:{{$room->user->phone}}">Nhắn Zalo</a></li>
                            <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:{{$room->user->email}}">{{$room->user->email}}</a></li>
                        </ul>
                        
                    </div>
                </div>
            </div>
           @include('frontend.pages.detail_room.sidebar_roomhot')
           @include('frontend.pages.category.layouts_category.sidebar_news')
        </div>
    </div>
</aside>
      
