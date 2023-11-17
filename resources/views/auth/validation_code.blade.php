@extends('frontend.pages.category.layouts_category.master_category')
@section('content_category')
<div class="inner-pages">    
    <!-- END SECTION HEADINGS -->
    <section class="headings-2 pt-0 pb-0">
        <div class="container" style="max-width:1300px; padding-top:10px">
            <div class="pro-wrapper">
                <div class="detail-wrapper-body">
                    <div class="listing-title-bar">
                        <div class="text-heading text-left">
                            <p>    
                                <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp;
                                 <span>Quên mật khẩu</span> 
                            </p>
                        </div>
                        <h3>Quên mật khẩu</h3>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- START SECTION LOGIN -->
    <div id="login">
        <div class="login login-pr">
            <p>Mã xác nhận đã được gửi đến email: <span style="font-weight:bolder">datn@gmail.com</span> . Vui lòng nhập mã vào bên dưới để tiếp tục</p>
            <form autocomplete="off" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nhập mã xác thực</label>
                    <input type="text" class="form-control-1" required name="code" id="code">
                    <i class="icon_mail_alt"></i>
                </div>
                <button type="submit" class="btn_1 rounded full-width">Tiếp tục <i class="fa-solid fa-arrow-right"></i></button>
            </form>
            <div class=" add_top_10"> <strong><a href="{{route('get.forgotpassword')}}">Quay lại</a></strong></div>
        </div>
    </div>
    <!-- END SECTION LOGIN -->
</div>

@endsection
