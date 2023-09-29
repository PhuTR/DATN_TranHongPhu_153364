@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 py-0 pl-0 user-dash2">
    @include('user.layouts.dashboard_navigationbar')
    <section class="headings-2 pt-0 pb-0">
        <div class="pro-wrapper">
            <div class="detail-wrapper-body">
                <div class="listing-title-bar">
                    <div class="text-heading text-left">
                        <p>
                            <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <a href="{{route('get_user.room.home')}}">Quản lý</a>
                            &nbsp;/&nbsp; <a href="{{route('get_user.pay.index_pay')}}">Nạp tiền vào tài khoản</a>   &nbsp;/&nbsp; <span>Zalo pay</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <!-- START SECTION PAYMENT-METHOD -->
     <section class="payment-method notfound">
         <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="tr-single-box">
                    <div class="tr-single-body">
                        <div class="tr-single-header">
                            <h4><i class="far fa-credit-card pr-2"></i>Chọn phương thức thanh toán</h4>
                        </div>
                   
                    </div>
                </div>
            </div>
            
            
         </div>
        
     </section>
     <!-- END SECTION PAYMENT-METHOD -->
 </div>


        

@endsection