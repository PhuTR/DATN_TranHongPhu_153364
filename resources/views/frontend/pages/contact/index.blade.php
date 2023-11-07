@extends('frontend.pages.category.layouts_category.master_category')
@section('content_category')
<!-- START SECTION CONTACT US -->
<section class="contact-us" style="background: #f5f7fb;">
    <div class="container">
        <p>
            <a href="{{route('get.home')}}" style="font-size: 17px">Trang chủ</a> &nbsp;/&nbsp;
            <span>Liên hệ</span>
            <h3>Liên hệ với chúng tôi</h3>
        </p>
        <div class="row">
            <div class="col-lg-5 col-md-12 bg-contact">
                <div class="call-info">
                    <h3>Thông tin liên hệ</h3>
                    <p class="mb-5">Vui lòng tìm thông tin liên hệ bên dưới và liên hệ với chúng tôi ngay hôm nay!</p>
                    <ul>
                        <li>
                            <div class="info">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <p class="in-p">Số 131 Ngõ 230 Phố Định Công Thượng, Định Công, Hoàng Mai, Hà Nội</p>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p class="in-p">0327006685</p>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <p class="in-p ti">support@findhouses.com</p>
                            </div>
                        </li>
                        <li>
                            <div class="info cll">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <p class="in-p ti">8:00 a.m - 9:00 p.m</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12" style="padding: 30px 30px 0;border: 1px solid #dedede; background-color:#fff">
                <h3 class="mb-4">Liên hệ trực tiếp</h3>
                <form id="contactform" class="contact-form" name="contactform" method="post" novalidate>
                    @csrf
                    <div class="form-group">
                        <label class="text-uppercase">Họ tên của bạn</label>
                        <input type="text" required class="form-control input-custom input-full form-input" name="name" >
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase">Số điện thoại</label>
                        <input type="text" required class="form-control input-custom input-full form-input" name="phone" >
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase">Nội dung</label>
                        <textarea class="form-control textarea-custom input-full form-input" id="ccomment" name="content" required></textarea>
                    </div>
                    <button type="submit" id="submit-contact" class="btn btn-primary btn-lg" style="width:100%">Gửi liên hệ</button>
                </form>
            </div>
            
        </div>
    </div>
</section>
<!-- END SECTION CONTACT US -->



@endsection