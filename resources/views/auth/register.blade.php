@extends('frontend.layouts.master')
@section('content')
<div class="inner-pages">
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Register</h1>
                <h2><a href="index-2.html">Home </a> &nbsp;/&nbsp; Register</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->
    
    <!-- START SECTION 404 -->
    <div id="login">
        <div class="login">
            <form autocomplete="off" method="POST">
                @csrf
                <div class="form-group">
                    <label>Họ tên</label>
                    <input class="form-control" required type="text" name="name">
                    <i class="ti-user"></i>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" required type="email" name="email">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" required type="text" name="phone">
                    <i class="ti-user"></i>
                </div>
                <div class="form-group">
                    <label>Tạo mật khẩu</label>
                    <input class="form-control" required type="password" id="password1" name="password">
                    <i class="icon_lock_alt"></i>
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