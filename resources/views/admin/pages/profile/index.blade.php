@extends('admin.layouts.app_master')
@section('content_admin')

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
         <h4>Thông tin</h4>
     </div>
     <div class="sidebar-widget author-widget2">
         <div class="author-box clearfix">
            @if(empty(Auth::guard('admins')->user()->avatar) || is_null(Auth::guard('admins')->user()->avatar) || Auth::guard('admins')->user()->avatar == 'no-avatar.jpg')
                <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
            @else
                <img  class="author__img" id="output" src="../uploads/avatars/{{ $admin->avatar }}">
             @endif
             <h4 class="author__title" >{{$admin->name}}</h4>
             <p class="author__meta">#{{$admin->id}}</p>
         </div>
         <ul class="author__contact">
            {{-- <li><span class="la la-map-marker"><i class="fa-brands fa-facebook"></i></span><a href="{{$admin->facabook}}" target="_blank">{{$admin->facabook}}</a></li> --}}
            <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:{{$admin->phone}}" target="_blank">{{$admin->phone}}</a></li>
             <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:{{$admin->email}}" target="_blank">{{$admin->email}}</a></li>
         </ul>
         <div class="agent-contact-form-sidebar">
             <h4>Cập nhật thông tin </h4>
             <form name="contact_form" action="{{route('get_admin.profile.edit')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <label for="area">Mã quản trị viên</label>
                <input type="text" id="fname" name="id"  disabled value="#{{$admin->id}}" />
                <label for="area">Tên hiển thị</label>
                 <input type="text" id="fname" name="name"  required value="{{$admin->name}}" />
                 <label for="area">Số Zalo</label>
                 <input type="text" id="pnumber" name="phone" disabled value="{{$admin->phone}}" />
                 <a href="{{route('get_user.profile.update_phone')}}">Đổi số điện thoại</a>
                 <br />
                 <br/>
                 <label for="area">Email</label>
                 <input type="email" id="emailid" name="email"  required value="{{$admin->email}}" />
                 {{-- <label for="area">Facebook </label> --}}
                 {{-- <input type="text" id="fname" name="facebook"  value="{{$ad->facabook}}" /> --}}
                <div style="margin-top: 2%;margin-bottom: 2%;">
                    <label for="area">Mật khẩu</label>
                    <a href="{{route('get_user.profile.update_password')}}" style="margin-left:10%">Đổi mật khẩu</a>
                </div>
                <label for="area">Ảnh đại diện</label>
                <div class="" style="margin-left: 17%;margin-top:-3%">
                    @if(empty(Auth::guard('admins')->user()->avatar) || is_null(Auth::guard('admins')->user()->avatar) || Auth::guard('admins')->user()->avatar == 'no-avatar.jpg')
                        <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                     @else
                        <img  class="author__img" id="output" src="../uploads/avatars/{{ $admin->avatar }}">
                    @endif

                    <div>
                        <input style="width:14%" class="input-file" name="avatar" id="avatar" type="file" accept="image/*" onchange="loadFile(event)" style="display: none">
								<script>
								  var loadFile = function(event) {
								    var output = document.getElementById('output');
								    output.src = URL.createObjectURL(event.target.files[0]);
								  };
								</script> 
                        {{-- <input style="width:14%" class="input-file" name="avatar" type="file" value="Chọn ảnh" multiple> --}}
                    </div>
                </div>
                 <input type="submit"  class="multiple-send-message" value="Lưu và cập nhật" />
             </form>
         </div>
     </div>
 </div>
</div>

@endsection
