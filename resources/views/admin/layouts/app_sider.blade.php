<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
        <div class="sidebar-header"><img src="{{asset('images/logo-blue.svg')}}" alt="header-logo2.png"> </div>
        {{-- <div class="header clearfix">
            <img src="{{asset('images/testimonials/ts-1.jpg')}}" alt="avatar" class="img-fluid profile-img">
        </div>
        <div class="active-user">
            <h2>Mary Smith</h2>
        </div> --}}
        <div class="detail clearfix">
            <ul class="mb-0">
                <li>
                    <a  href="{{route('get_admin.admin.dashbord')}}">
                        <i class="fa-solid fa-house"></i>Trang chính
                    </a>
                </li>
                <li>
                    <a href="{{route('get_admin.profile.index')}}">
                        <i class="fa fa-user"></i>Hồ sơ
                    </a>
                </li>
                <li>
                    <a href="{{route('get_admin.category.index')}}">
                        <i class="fa fa-list" aria-hidden="true"></i>Quản lý danh mục
                    </a>
                </li>
                <li>
                    <a href="{{route('get_admin.location.home')}}">
                        <i class="fa-solid fa-location-dot"></i>Quản lý địa điểm
                    </a>
                </li>
                <li>
                    <a href="{{route('get_admin.user.index')}}">
                        <i class="fa-solid fa-users"></i>Quản lý thành viên
                    </a>
                </li>
                <li>
                    <a href="{{route('get_admin.room.index')}}">
                        <i class="fas fa-credit-card"></i>Quản lý bài đăng
                    </a>
                </li>
                <li>
                    <a href="invoice.html">
                        <i class="fas fa-paste"></i>Invoices
                    </a>
                </li>
                <li>
                    <a href="{{route('get_admin.profile.update_password')}}">
                        <i class="fa fa-lock"></i>Đổi mật khẩu
                    </a>
                </li>
                <li>
                    <a href="{{route('get_admin.logout')}}">
                        <i class="fas fa-sign-out-alt"></i>Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>