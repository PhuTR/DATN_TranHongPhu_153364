<aside class="col-lg-4 col-md-12 car">
    <div class="widget">
        <!-- Search Fields -->
        {{-- price --}}
        <div class="widget-boxed mt-5" style="margin-bottom: 20px;">
            
            <section class="section section-sublink">
                <div class="widget-boxed-header ">
                    <h4>Xem theo giá</h4>
                </div>
                <ul class="list-links price clearfix">
                    @foreach(config('config_search.price') as $key => $item)
                    <li><i class="fa-solid fa-angle-right icon" style="font-size:12px"></i> <a href="{{ request()->fullUrlWithQuery(['price' => $key]) }}">{{ $item }}</a></li>
                    @endforeach
                </ul>
            </section>
        </div>

        {{-- area --}}
        <div class="widget-boxed mt-5" style="margin-bottom: 20px;">
            <section class="section section-sublink">
                <div class="widget-boxed-header ">
                    <h4>Xem theo diện tích</h4>
                </div>
                <ul class="list-links acreage clearfix">
                    @foreach(config('config_search.area') as $key => $item)
                    <li><i class="fa-solid fa-angle-right icon" style="font-size:12px"></i><a href="{{ request()->fullUrlWithQuery(['area' => $key]) }}">{{ $item }} </a></li>
                    @endforeach
                </ul>
            </section>
        </div>
        @include('frontend.pages.category.layouts_category.sidebar_news')
    </div>
</aside>