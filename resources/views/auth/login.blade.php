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
                    <a href="{{route('get.login.facebook')}}" class="social_bt facebook">Đăng nhập với Facebook</a>
                    <a href="{{ route('get.login.google') }}" class="social_bt google">Đăng nhập với Google</a> 
                </div>
                <p>Hoặc</p>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control-1"  name="email" id="email">
                    @if ($errors->has('email'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group position-relative">
                    <label>Mật khẩu</label>
                    <input id="password" type="password" class="form-control-1"  name="password"  value="">
                    <i id="togglePassword" class="fa-solid  fa-eye-slash position-absolute " style="top:45px; right:12px;cursor: pointer;"></i>
                    @if ($errors->has('password'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('password')}}</span>
                    @endif
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
