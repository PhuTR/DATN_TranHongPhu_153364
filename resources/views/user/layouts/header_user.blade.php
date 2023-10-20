<div class="dash-content-wrap">
    <header id="header-container" class="db-top-header">
        <!-- Header -->
        <div id="header">
            <div class="container-fluid">
                <!-- Left Side Content -->
                <div class="left-side" style="width:100%;margin-left:130px;margin-top:27px">
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                            <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">
                            <li><a class="txt-link" href="{{route('get.home')}}" target="_blank">Trang chủ</a> </li>
                            @foreach ($categoriesGlobal ?? [] as $item)
                                @if ($item->status == 1)
                                    <li>
                                        <a class="txt-link" href="{{route('get.category.item',['slug' => $item->slug,'id' => $item->id])}}" 
                                            title="{{$item->name}}" target="_blank">{{$item->name}}
                                        </a> 
                                    </li>
                                @endif
                               
                            @endforeach
                            <li><a class="txt-link" target="_blank" href="{{route('get.articles.index')}}">Tin Tức</a> </li>
                            <li><a class="txt-link" target="_blank" href="{{route('get.pricelist.index')}}">Bảng giá dịch vụ</a> </li>
                            @if (isset(Auth::user()->name))
                                 <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 ml-5 border-bottom-0"><a href="add-property.html" class="button border btn-lg btn-block text-center">Đăng tin mới<i class="fas fa-laptop-house ml-2"></i></a></li>
                            @else
                                <li class="d-none d-xl-none d-block d-lg-block"><a href="{{route('get.login')}}">Đăng nhập</a></li>
                                <li class="d-none d-xl-none d-block d-lg-block"><a href="{{route('get.register')}}">Đăng ký</a></li>
                            @endif
                    </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->
                </div>
                <!-- Left Side Content / End -->
             


            </div>
        </div>
        <!-- Header / End -->
    </header>
</div>
<div class="clearfix"></div>
<!-- Header Container / End -->