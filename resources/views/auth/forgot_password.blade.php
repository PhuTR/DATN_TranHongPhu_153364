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
            <p>Vui lòng nhập số điện thoại hoặc email liên kết với tài khoản của bạn để nhận mã đặt lại mật khẩu</p>
            <form autocomplete="off" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="Email" class="form-control-1" name="email" id="email">
                    @if ($errors->has('email'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn_1 rounded full-width">Tiếp tục <i class="fa-solid fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
    <!-- END SECTION LOGIN -->
</div>

@endsection
