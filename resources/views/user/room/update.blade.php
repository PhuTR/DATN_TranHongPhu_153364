@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
    <div class="col-lg-12 mobile-dashbord dashbord">
        <div class="dashboard_navigationbar dashxl">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i> Quản lý thông tin</button>
                <ul id="myDropdown" class="dropdown-content">
                    <li>
                        <a href="dashboard.html">
                            <i class="fa fa-map-marker mr-3"></i> Quản lý tin đăng
                        </a>
                    </li>
                    <li>
                        <a href="user-profile.html">
                            <i class="fa fa-user mr-3"></i>Đăng tin
                        </a>
                    </li>
                    <li>
                        <a href="my-listings.html">
                            <i class="fa fa-list mr-3" aria-hidden="true"></i>Sửa thông tin cá nhân
                        </a>
                    </li>
                    <li>
                        <a href="favorited-listings.html">
                            <i class="fa fa-heart mr-3" aria-hidden="true"></i>Nạp tiền vào tài khoản
                        </a>
                    </li>
                    <li>
                        <a class="active" href="add-property.html">
                            <i class="fa fa-list mr-3" aria-hidden="true"></i>Lịch sử nạp tiền
                        </a>
                    </li>
                    <li>
                        <a href="payment-method.html">
                            <i class="fas fa-credit-card mr-3"></i>Lịch sử thanh toán
                        </a>
                    </li>
                    <li>
                        <a href="invoice.html">
                            <i class="fas fa-paste mr-3"></i>Bảng giá dịch vụ
                        </a>
                    </li>
                    <li>
                        <a href="change-password.html">
                            <i class="fa fa-lock mr-3"></i>Liên hệ
                        </a>
                    </li>
                    <li>
                        <a href="index-2.html">
                            <i class="fas fa-sign-out-alt mr-3"></i>Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    @include('user.room.form_update')
</div>





@endsection