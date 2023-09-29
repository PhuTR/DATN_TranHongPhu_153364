@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 py-0 pl-0 user-dash2">
    @include('user.layouts.dashboard_navigationbar')
     <!-- START SECTION PAYMENT-METHOD -->
     <section class="headings-2 pt-0 pb-0">
        <div class="pro-wrapper">
            <div class="detail-wrapper-body">
                <div class="listing-title-bar">
                    <div class="text-heading text-left">
                        <p>
                            <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <a href="{{route('get_user.room.home')}}">Quản lý</a>
                            &nbsp;/&nbsp; <a href="{{route('get_user.pay.index_pay')}}">Nạp tiền vào tài khoản</a>   &nbsp;/&nbsp; <span>Tiền mặt</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <section class="payment-method notfound">
         <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="tr-single-box">
                    <div class="tr-single-body">
                        <div class="tr-single-header">
                            <h4><i class="far fa-credit-card pr-2"></i>Chọn phương thức thanh toán: Tiền mặt</h4>
                        </div>
                        <style>
                            .alert-warning {
                                color: #856404;
                                background-color: #fff3cd;
                                border-color: #ffeeba;
                            }
                            </style>
                            <div class="alert alert-warning" role="alert">
                                <h3 class="mt-4">Thanh toán tại văn phòng công ty</h3>
                                <p>Bạn vui lòng đến địa chỉ văn phòng công ty LBKCorp theo địa chỉ sau:</p>
                                <p>48 Cao Thắng, Hải Châu, Đà Nẵng</p>
                                <p>Số điện thoại: 0942274558</p>
                                <h3 class="mt-5">Thu tiền tận nơi</h3>
                                <p>Áp dụng cho khu vực Tp.Đà Nẵng và số tiền thanh toán lớn hơn 500.000đ</p>
                                <p>Liên hệ: 0942274558 để chúng tôi hỗ trợ bạn</p>
                                <p>Xin cảm ơn!</p>
                            </div>
                    </div>
                </div>
            </div>
            
            
         </div>
        
     </section>
     <!-- END SECTION PAYMENT-METHOD -->
 </div>


        

@endsection