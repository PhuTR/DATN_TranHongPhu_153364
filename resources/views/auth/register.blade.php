@extends('frontend.pages.category.layouts_category.master_category')
@section('content_category')
<div class="inner-pages">
  
    <!-- END SECTION HEADINGS -->
    
    <!-- START SECTION 404 -->
    <div id="login">
        <div class="login">
            <h3 style="font-size:2rem">Tạo tài khoản mới</h3>
            <form autocomplete="off" method="POST">
                @csrf
                <div class="form-group">
                    <label>Họ tên</label>
                    <input class="form-control-1" required type="text" name="name">
                    <i class="ti-user"></i>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control-1" required type="email" name="email">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control-1" required type="text" name="phone">
                    <i class="ti-user"></i>
                </div>
                <div class="form-group position-relative">
                    <label>Tạo mật khẩu</label>
                    <input class="form-control-1" required type="password" id="password" name="password">
                    <i id="togglePassword" class="fa-solid  fa-eye-slash position-absolute " style="top:45px; right:12px;cursor: pointer;"></i>
                </div>
             
                <div id="pass-info" class="clearfix"></div>
                <button type="submit"  class="btn_1 rounded full-width add_top_30">Tạo tài khoản</button>
                <div class="text-center add_top_10">Bạn đã có tài khoản? <strong><a href="{{route('get.login')}}">Đăng nhập</a></strong></div>
            </form>
        </div>
    </div>
    <!-- END SECTION 404 -->
</div>
@endsection