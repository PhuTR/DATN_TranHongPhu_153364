<section class="headings-2 pt-0 pb-0">
    <div class="pro-wrapper">
        <div class="detail-wrapper-body">
            <div class="listing-title-bar">
                <div class="text-heading text-left">
                    <p><a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp;
                        @if(isset($category->name))
                         <span>{{$category->name}}</span>
                         @else
                         <span>Xem tất cả</span>
                         @endif
                         
                    </p>
                </div>
                @if (isset($category->title))
                     <h3>{{$category->title}}</h3>
                @else
                    <h3>Xem tất cả</h3>
                @endif

            
            </div>
        </div>
    </div>
</section>