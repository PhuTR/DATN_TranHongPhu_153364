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
                            &nbsp;/&nbsp; <a href="{{route('get_user.pay.index_pay')}}">Nạp tiền vào tài khoản</a>   &nbsp;/&nbsp; <span>Momo</span>
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
                            <h4><i class="far fa-credit-card pr-2"></i>Chọn phương thức thanh toán: Momo</h4>
                        </div>
                        <h4 class="page-title-h1">Nạp tiền</h4>
                        <div class="b-auth">
                            <div class="auth-content">
                                <form action="" method="POST" autocomplete="off" style="padding-bottom: 11rem;">
                                    @csrf
                                    <div class="form-group">
                                        <label for="phone">Số tiền nạp</label>
                                        <input style="height:50px" type="number" class="form-control" placeholder="" name="gia" value="">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-atm" style="width:20%" name="payUrl"> Tiếp tục </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
         </div>
        
     </section>
     <!-- END SECTION PAYMENT-METHOD -->
 </div>


        

@endsection