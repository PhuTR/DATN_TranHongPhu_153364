
   <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container" class="header head-tr">
            <!-- Header -->
            <div id="header" class="head-tr bottom">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="index-2.html"><img src="images/logo-white-1.svg" data-sticky-logo="images/logo-red.svg" alt=""></a>
                        </div>
                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1 head-tr">
                            <ul id="responsive">
                                <li class="{{\Request::route()->getName() == 'get.home' ? 'active-header' : ''}}"><a href="{{route('get.home')}}">Trang chủ</a> </li>
                                @foreach ($categoriesGlobal ?? [] as $item)
                                    @if ($item->status == 1)
                                        <li >
                                            <a href="{{route('get.category.item',['slug' => $item->slug,'id' => $item->id])}}" 
                                                title="{{$item->name}}">{{$item->name}}  
                                            </a> 
                                        </li>
                                    @endif
                                   
                                @endforeach
                                <li><a href="{{route('get.articles.index')}}">Tin Tức</a> </li>
                                <li><a href="{{route('get.pricelist.index')}}">Bảng giá dịch vụ</a> </li>
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
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->

                   
                    @if (isset(Auth::user()->name))
                        <div class="right-side d-none d-none d-lg-none d-xl-flex">
                            <!-- Header Widget -->
                            <div class="header-widget">
                                <a href="{{route('get_user.room.create')}}" class="button border">Đăng tin mới<i class="fas fa-laptop-house ml-2"></i></a>
                            </div>
                            <!-- Header Widget / End -->
                        </div>
                        <div class="header-user-menu user-menu add">
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
                            <ul>
                                <li><a href="{{route('get_user.profile.index')}}"> Thông tin cá nhân</a></li>
                                <li><a href="{{route('get_user.room.home')}}"> Quản lý tin đăng</a></li>
                                <li><a href="{{route('get_user.pay.index_pay')}}">  Nạp tiền</a></li>
                                <li><a href="{{route('get_user.profile.update_password')}}"> Đổi mật khẩu</a></li>
                                <li><a href="{{route('get.logout')}}">Đăng xuất</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="right-side d-none d-none d-lg-none d-xl-flex">
                            <!-- Header Widget -->
                            <div class="header-widget">
                                <a href="{{route('get.register')}}" class="button border">Đăng ký<i class="fas fa-laptop-house ml-2"></i></a>
                            </div>
                            
                            <!-- Header Widget / End -->
                        </div>

                        <div class="right-side d-none d-none d-lg-none d-xl-flex">
                            <!-- Header Widget -->
                            <div class="header-widget">
                                <a href="{{route('get.login')}}" class="button border">Đăng nhập<i class="fas fa-laptop-house ml-2"></i></a>
                            </div>
                            
                            <!-- Header Widget / End -->
                        </div>   
                    @endif
                   
                   
                    <!-- Right Side Content / End -->

                   
                  

                  

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->