@extends('frontend.pages.category.layouts_category.master_category')
@section('content_category')
<div class="inner-pages">    
    <!-- END SECTION HEADINGS -->
    
    <!-- START SECTION LOGIN -->
    <div id="login">
        <div class="login login-pr">
            <h3 style="font-size:2rem">Đăng nhập</h3>
            <form autocomplete="off" method="POST">
                @csrf
                <div class="access_social">
                    <a href="#0" class="social_bt facebook">Đăng nhập với Facebook</a>
                    <a href="#0" class="social_bt google">Đăng nhập với Google</a> 
                </div>
                <p>Hoặc</p>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control-1" required name="phone" id="phone">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control-1" required name="password" id="password" value="">
                    <i class="icon_lock_alt"></i>
                </div>
                <div class="fl-wrap filter-tags clearfix add_bottom_30">
                    <div class="float-right mt-1"><a id="forgot" href="{{route('get.forgotpassword')}}">Bạn quên mật khẩu?</a></div>
                </div>
                <button type="submit" class="btn_1 rounded full-width">Đăng nhập</button>
                <div class="text-center add_top_10"> <strong><a href="{{route('get.register')}}">Tạo tài khoản mới</a></strong></div>
            </form>
        </div>
    </div>
    <!-- END SECTION LOGIN -->
</div>

@endsection
