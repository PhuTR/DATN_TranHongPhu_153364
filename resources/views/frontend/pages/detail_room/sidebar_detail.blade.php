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
                            <img  class="author__img" id="output1" src="{{ pare_url_file($room->user->avatar) }}"> 
                            <h4 class="author__title">{{$room->user->name ?? 'N\A'}}</h4>
                            <p class="author__meta"><i class="fa-solid fa-hashtag"></i>{{$room->user->id ?? 'N\A'}}</p>
                        </div>
                        <ul class="author__contact">
                            <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:{{$room->user->phone ?? 'N\A'}}" >{{$room->user->phone ?? 'N\A'}}</a></li>
                            <li style="display:flex"><span class="la la-zalo"><i></i></span><a href="https://zalo.me/{{$room->user->phone ?? 'N\A'}}" target="_blank" >Nhắn Zalo</a></li>
                            <li><span class="la la-envelope-o"><i class="fa-regular fa-heart"></i></span><a style="cursor: pointer" id="{{$room->id ?? 'N\A'}}" onclick="add_wistlist(this.id)">Yêu thích</a></li>
                        </ul>
                        
                    </div>
                </div>
            </div>
           @include('frontend.pages.detail_room.sidebar_roomhot')
           @include('frontend.pages.category.layouts_category.sidebar_news')
           @include('frontend.pages.articles.sidebar_articles.sidebar_articles_new')
           @include('frontend.pages.articles.sidebar_articles.sidebar_articles_care')
        </div>
    </div>
</aside>
      
