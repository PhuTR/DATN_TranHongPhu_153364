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
                    <input class="form-control-1"  type="text" name="name">
                    @if ($errors->has('name'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('name')}}</span>
                    @endif

                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control-1"  type="email" name="email">
                    @if ($errors->has('email'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control-1"  type="text" name="phone">
                    @if ($errors->has('phone'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('phone')}}</span>
                    @endif
                </div>
                <div class="form-group position-relative">
                    <label>Tạo mật khẩu</label>
                    <input class="form-control-1" type="password" id="password" name="password">
                    <i id="togglePassword" class="fa-solid  fa-eye-slash position-absolute " style="top:45px; right:12px;cursor: pointer;"></i>
                    @if ($errors->has('password'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <div class="form-group position-relative">
                    <label>Nhập lại mật khẩu</label>
                    <input class="form-control-1" type="password" id="cfpassword" name="cfpassword">
                    <i id="togglePassword" class="fa-solid  fa-eye-slash position-absolute " style="top:45px; right:12px;cursor: pointer;"></i>
                    @if ($errors->has('cfpassword'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('cfpassword')}}</span>
                    @endif
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