@extends('frontend.pages.category.layouts_category.master_category')
@section('content_category')
<div class="inner-pages">
    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Đăng nhập</h1>
                <h2><a href="index-2.html">Trang chủ </a> &nbsp;/&nbsp; Đăng nhập</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->
    
    <!-- START SECTION LOGIN -->
    <div id="login">
        <div class="login">
            <form autocomplete="off" method="POST">
                @csrf
                <div class="access_social">
                    <a href="#0" class="social_bt facebook">Đăng nhập với Facebook</a>
                    <a href="#0" class="social_bt google">Đăng nhập với Google</a> 
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" required name="phone" id="phone">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" required name="password" id="password" value="">
                    <i class="icon_lock_alt"></i>
                </div>
                <div class="fl-wrap filter-tags clearfix add_bottom_30">
                    {{-- <div class="checkboxes float-left">
                        <div class="filter-tags-wrap">
                            <input id="check-b" type="checkbox" name="check">
                            <label for="check-b">Remember me</label>
                        </div>
                    </div> --}}
                    <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Bạn quên mật khẩu?</a></div>
                </div>
                <button type="submit" class="btn_1 rounded full-width">Đăng nhập</button>
                <div class="text-center add_top_10"> <strong><a href="{{route('get.register')}}">Tạo tài khoản mới</a></strong></div>
            </form>
        </div>
    </div>
    <!-- END SECTION LOGIN -->
</div>

@endsection
