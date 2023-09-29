@extends('user.layouts.master_user')
@section('content_user')
<div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-33 mt-0 offset-lg-2 offset-md-3">
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
                            <i class="fa fa-user mr-3"></i>Sửa thông tin cá nhân
                        </a>
                    </li>
                    <li>
                        <a  href="my-listings.html">
                            <i class="fa fa-list mr-3" aria-hidden="true"></i>Nạp tiền vào tài khoản
                        </a>
                    </li>
                    <li>
                        <a href="favorited-listings.html">
                            <i class="fa fa-heart mr-3" aria-hidden="true"></i>Lịch sử nạp tiền
                        </a>
                    </li>
                    <li>
                        <a href="add-property.html">
                            <i class="fa fa-list mr-3" aria-hidden="true"></i>Lịch sử thanh toán
                        </a>
                    </li>
                    <li>
                        <a href="payment-method.html">
                            <i class="fas fa-credit-card mr-3"></i>Bảng giá dịch vụ
                        </a>
                    </li>
                    <li>
                        <a href="invoice.html">
                            <i class="fas fa-paste mr-3"></i>Liên hệ
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
     <div class="widget-boxed-header">
         <h4>Thông tin cá nhân</h4>
     </div>
     <div class="sidebar-widget author-widget2">
         <div class="author-box clearfix">
            @if(empty(Auth::user()->avatar) || is_null(Auth::user()->avatar) || Auth::user()->avatar == 'no-avatar.jpg')
                <img   class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
            @else
                <img   class="author__img" id="output" src="{{ asset('uploads/avatars/' . Auth::user()->avatar) }}">
            @endif
             <h4 class="author__title" >{{$user->name}}</h4>
             <p class="author__meta">#{{$user->id}}</p>
         </div>
         <ul class="author__contact">
            <li><span class="la la-map-marker"><i class="fa-brands fa-facebook"></i></span><a href="{{$user->facabook}}" target="_blank">{{$user->facabook}}</a></li>
             <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:{{$user->phone}}" target="_blank">{{$user->phone}}</a></li>
             <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:{{$user->email}}" target="_blank">{{$user->email}}</a></li>
         </ul>
         <div class="agent-contact-form-sidebar">
             <h4>Đổi mật khẩu</h4>
             <form name="contact_form" action="" method="POST" autocomplete="off">
                @csrf
                <label for="area">Mật khẩu cũ </label>
                <input type="password" id="fname" name="password" style="margin-bottom: 0;"  />
                @if ($errors->has('password'))
                    <span class="text-error" style="color: #FF385C">{{$errors->first('password')}}</span>
                @endif
                <br />
                <label for="area">Mật khẩu mới</label>
                 <input type="password" id="password_new" name="password_new" style="margin-bottom: 0;" />
                 @if ($errors->has('password_new'))
                    <span class="text-error" style="color: #FF385C">{{$errors->first('password_new')}}</span>
                 @endif
                 <br />
                 <label for="area">Nhập lại mật khẩu</label>
                 <input type="password" id="password_confirm" name="password_confirm" style="margin-bottom: 0;" />
                 @if ($errors->has('password_confirm'))
                    <span class="text-error" style="color: #FF385C">{{$errors->first('password_confirm')}}</span>
                 @endif
                 <input type="submit"  class="multiple-send-message" value="Lưu và cập nhật" />
             </form>
         </div>
     </div>
 </div>
</div>

@endsection