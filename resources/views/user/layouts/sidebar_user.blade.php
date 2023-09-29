<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
        <div class="sidebar-header">
            <a href="{{route('get.home')}}">
                <img src="{{asset('images/logo-blue.svg')}}" alt="header-logo2.png">
            </a>
         </div>
        <div class="header clearfix">
            @if(empty(Auth::user()->avatar) || is_null(Auth::user()->avatar) || Auth::user()->avatar == 'no-avatar.jpg')
                <img  class="img-fluid profile-img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
            @else
                <img  class="img-fluid profile-img" id="output" src="{{ asset('uploads/avatars/' . Auth::user()->avatar) }}">
            @endif
        </div>
      
        <div class="active-user">
            <h2>{{{Auth::user()->name}}}</h2>
        </div>
        <div class="detail clearfix">
            <ul class="mb-0">
                <li>
                    <a href="{{route('get_user.room.home')}}">
                        <i class="fa fa-list"></i> Quản lý tin đăng
                    </a>
                </li>
                <li>
                    <a href="{{route('get_user.room.create')}}">
                        <i class="fa-solid fa-circle-plus"></i>Đăng tin
                    </a>
                </li>
                <li>
                    <a href="{{route('get_user.profile.index')}}">
                        <i class="fa-regular fa-pen-to-square"></i>Sửa thông tin cá nhân
                    </a>
                </li>
                <li>
                    <a href="{{route('get_user.pay.index_pay')}}">
                        <i class="fa-solid fa-credit-card"></i>Nạp tiền vào tài khoản
                    </a>
                </li>
                <li>
                    <a href="{{route('get_user.pay.deposit_history')}}">
                        <i class="fa-solid fa-clock"></i>Lịch sử nạp tiền
                    </a>
                </li>
                <li>
                    <a href="{{route('get_user.pay.paymet_history')}}">
                        <i class="fa-solid fa-calendar-days"></i>Lịch sử thanh toán
                    </a>
                </li>
                <li>
                    <a href="payment-method.html">
                        <i class="fa-solid fa-table-list"></i></i>bảng giá dịch vụ
                    </a>
                </li>
                <li>
                    <a href="{{route('get_user.contact')}}">
                        <i class="fa-solid fa-address-book"></i></i>Liên hệ
                    </a>
                </li>
              
                <li>
                    <a href="{{route('get.logout')}}">
                        <i class="fas fa-sign-out-alt"></i>Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>