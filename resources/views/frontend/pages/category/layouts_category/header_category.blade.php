<!-- Header Container
        ================================================== --> 
        <header id="header-container">
            <!-- Header -->
            <div style="width:100%;position: absolute;">
                <div class="container container-header">
                    <div id="logo">
                        <a href="index-2.html"><img src="{{asset('images/logo-phongtro.svg')}}" alt=""></a>
                    </div>
                    @if (isset(Auth::user()->name))
                        <div class=" d-xl-flex" style="float:right">
                            <!-- Header Widget -->
                            <div class="header-widget">
                                <a href="{{route('get.home.favourite')}}" class="btn-header "><i class="fa-regular fa-heart icon"></i>Yêu thích</a>
                                <span class="number-count js-save-post-total">3</span>
                            </div>
                            <div class="header-widget">
                                <a href="{{route('get_user.room.create')}}" class="button border" style=" width:145px!important;">Đăng tin mới <i class="fa-solid fa-circle-plus" style="margin-left: 2px;"></i></a>
                            </div>
                            <!-- Header Widget / End -->
                        </div>
                        <div class="header-user-menu user-menu ">
                            <div class="header-user-name">
                                <span>
                                    @if(empty(Auth::user()->avatar) || is_null(Auth::user()->avatar) || Auth::user()->avatar == 'no-avatar.jpg')
                                    <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                                    @else
                                    <img  class="author__img" id="output" src="{{ asset('uploads/avatars/' . Auth::user()->avatar) }}">
                                    @endif
                                </span>
                                Xin chào, {{Auth::user()->name ?? "..."}}!
                            </div>
                            <ul style="z-index: 999999">
                                <li><a href="{{route('get_user.profile.index')}}"> Thông tin cá nhân</a></li>
                                <li><a href="{{route('get_user.room.home')}}"> Quản lý tin đăng</a></li>
                                <li><a href="{{route('get_user.pay.index_pay')}}">  Nạp tiền</a></li>
                                <li><a href="{{route('get_user.profile.update_password')}}"> Đổi mật khẩu</a></li>
                                <li><a href="{{route('get.logout')}}">Đăng xuất</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="d-xl-flex" style="float:right">
                            <!-- Header Widget -->
                            <div class="header-widget">
                                <a href="{{route('get.home.favourite')}}" class="btn-header "><i class="fa-regular fa-heart icon"></i>Yêu thích</a>
                                <span class="number-count js-save-post-total">3</span>
                            </div>

                            <div class="header-widget">
                                <a href="{{route('get.login')}}" class="btn-header "><i class="fa-solid fa-user-plus icon"></i>Đăng nhập</a>
                            </div>

                            <div class="header-widget">
                                <a href="{{route('get.register')}}" class="btn-header "><i class="fa-solid fa-right-to-bracket icon"></i>Đăng ký</a>
                            </div>
                            <div class="header-widget">
                                <a href="{{route('get_user.room.create')}}" class="button border" style=" width:145px!important;">Đăng tin mới <i class="fa-solid fa-circle-plus" style="margin-left: 2px;"></i></a>
                            </div>
                        </div>  
                    @endif

                </div>
            </div>
            <div id="header">
                <div id="header-nav" class="header-nav" >
                    <!-- Left Side Content -->
                    <div style="width:1300px;margin:0 auto;">
                        <div class="left-side">
                            <!-- Logo -->
                           
                            <!-- Mobile Navigation -->
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
                                    <li class="{{\Request::route()->getName() == 'get.home' ? 'active-header' : ''}}"><a  href="{{route('get.home')}}" >Trang chủ</a> </li>
                                    @foreach ($categoriesGlobal ?? [] as $item)
                                        @if ($item->status == 1)
                                            <li class="{{\Request::path() == $item->slug.'-'.$item->id ? 'active-header' :''}}">
                                                <a href="{{route('get.category.item',['slug' => $item->slug,'id' => $item->id])}}" 
                                                    title="{{$item->name}}" >{{$item->name}} 
                                                </a> 
                                            </li>
                                        @endif
                                       
                                    @endforeach
                                    <li class="{{\Request::route()->getName() == 'get.articles.index' ? 'active-header' : ''}}"><a href="{{route('get.articles.index')}}">Tin Tức</a> </li>
                                    <li class="{{\Request::route()->getName() == 'get.pricelist.index' ? 'active-header' : ''}}"><a href="{{route('get.pricelist.index')}}">Bảng giá dịch vụ</a> </li>
                                    @if (isset(Auth::user()->name))
                                         <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 ml-5 border-bottom-0"><a href="add-property.html" class="button border btn-lg btn-block text-center">Đăng tin mới<i class="fas fa-laptop-house ml-2"></i></a></li>
                                    @else
                                        <li class="d-none d-xl-none d-block d-lg-block"><a href="{{route('get.login')}}">Đăng nhập</a></li>
                                        <li class="d-none d-xl-none d-block d-lg-block"><a href="{{route('get.register')}}">Đăng ký</a></li>
                                    @endif
                                        
                                       
                                </ul>
                            </nav>
                            <!-- Main Navigation / End -->
                        </div>
                    </div>
                    
                    <!-- Left Side Content / End -->
                </div>
            </div>
            <!-- Header / End -->

        </header>
     
        <!-- Header Container / End -->
      