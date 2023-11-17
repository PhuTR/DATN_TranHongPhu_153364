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
            <p>Nhập mật khẩu mới vào ô bên dưới để hoàn tất</p>
            <form autocomplete="off" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nhập mật khẩu mới</label>
                    <input type="password" class="form-control-1"  name="password_new" id="password_new">
                    @if ($errors->has('password_new'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('password_new')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" class="form-control-1"  name="password_confirm" id="password_confirm">
                    @if ($errors->has('password_confirm'))
                        <span class="text-error" style="color: #FF385C">{{$errors->first('password_confirm')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn_1 rounded full-width">Tiếp tục <i class="fa-solid fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
    <!-- END SECTION LOGIN -->
</div>

@endsection
