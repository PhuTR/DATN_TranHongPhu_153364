<section class="headings-2 pt-0 pb-0">
    <div class="pro-wrapper">
        <div class="detail-wrapper-body">
            <div class="listing-title-bar">
                @if(isset($category->name))
                <div class="text-heading text-left">
                    <p>    
                        <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp;
                         <span>{{$category->name}}</span> 
                    </p>
                </div>
                @endif
                @if (isset($category->title))
                     <h3>{{$category->title}}</h3>
                     <p style="font-size: 1rem; font-weight: 400; line-height: 1.5; margin: 0; color: #65676b;">{{$category->description}}</p>
                @else
                    <h3>Kênh thông tin Phòng Trọ số 1 Việt Nam</h3>
                    <p style="font-size: 1rem; font-weight: 400; line-height: 1.5; margin: 0; color: #65676b;">Kênh thông tin Phòng Trọ số 1 Việt Nam - Website đăng tin cho thuê phòng trọ, nhà nguyên căn, căn hộ, ở ghép nhanh, hiệu quả với 100.000+ tin đăng và 2.500.000 lượt xem mỗi tháng.</p>
                @endif

            
            </div>
        </div>
    </div>
</section>