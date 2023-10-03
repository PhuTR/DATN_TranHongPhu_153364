@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 py-0 pl-0 user-dash2">
    @include('user.layouts.dashboard_navigationbar')
     <!-- START SECTION PAYMENT-METHOD -->
     <section class="payment-method notfound">
         <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="tr-single-box">
                    <div class="tr-single-body">
                        <div class="tr-single-header">
                            <h4><i class="far fa-credit-card pr-2"></i>Chọn phương thức thanh toán</h4>
                        </div>
                        <!-- Paypal Option -->
                        <a href="{{route('get_user.pay.transfer_money')}}">
                            <div class="payment-card">
                                <header class="payment-card-header cursor-pointer" data-toggle="collapse" data-target="#paypal" aria-expanded="true">
                                    <div class="payment-card-title flexbox">
                                        <h4>Chuyển khoản</h4>
                                    </div>
                                    <div class="pull-right">
                                        <img src="{{asset('images/bank-transfer.png')}}" class="img-responsive" alt="">
                                    </div>
                                </header>
                              
                            </div>
                        </a>
                    
                        <!-- Debit card option -->
                        <a href="{{route('get_user.pay.atm')}}">
                            <div class="payment-card">
                                <header class="payment-card-header cursor-pointer" data-toggle="collapse" data-target="#paypal" aria-expanded="true">
                                    <div class="payment-card-title flexbox">
                                        <h4>Thẻ ATM Internet Banking</h4>
                                    </div>
                                    <div class="pull-right">
                                        <img src="{{asset('images/payment-method.png')}}" class="img-responsive" alt="">
                                    </div>
                                </header>
                              
                            </div>
                        </a>
                       
                        <a href="{{route('get_user.pay.cash')}}">
                            <div class="payment-card">
                                <header class="payment-card-header cursor-pointer" data-toggle="collapse" data-target="#paypal" aria-expanded="true">
                                    <div class="payment-card-title flexbox">
                                        <h4>Tiền mặt</h4>
                                    </div>
                                    <div class="pull-right">
                                        <img src="{{asset('images/cash.png')}}" class="img-responsive" alt="">
                                    </div>
                                </header>
                              
                            </div>
                        </a>
                      
                        <a href="{{route('get_user.pay.zalo_pay')}}" >
                            <div class="payment-card">
                                <header class="payment-card-header cursor-pointer" data-toggle="collapse" data-target="#paypal" aria-expanded="true">
                                    <div class="payment-card-title flexbox">
                                        <h4>ZaloPay</h4>
                                    </div>
                                    <div class="pull-right">
                                        <img src="{{asset('images/zalopay.png')}}" class="img-responsive" alt="">
                                    </div>
                                </header>
                              
                            </div>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-md-12 col-lg-6">
                 <div class="tr-single-box">
                     <div class="tr-single-body">
                         <div class="tr-single-header">
                             <h4><i class="far fa-address-card pr-2"></i>Thông tin tài khoản</h4>
                         </div>
                         <div class="row">
                             <div class="col-sm-6" style="margin-bottom: 25px;">
                                 <h5>Mã tài khoản</h5>
                                 <h5># {{$user->id}}</h5>
                             </div>
                             <div class="col-sm-6" style="margin-bottom: 25px;">
                                 <h5>Tên tài khoản</h5>
                                 <h5 style="  text-transform: capitalize">{{$user->name}}</h5>
                             </div>
                             <div class="col-sm-6" style="margin-bottom: 25px;">
                                <h5>Số dư tài khoản</h5>
                                <h5>{{ number_format($user->account_balance,0,',','.') }} đ</h5>
                            </div>
                            <div class="col-sm-12 " >
                                <a href="{{route('get_user.pay.transfer_money')}}" class="btn-width btn-pay ">Chuyển khoản</a>
                            </div>
                            <div class="col-sm-12 " >
                                <a href="{{route('get_user.pay.atm')}}" class="btn-width btn-pay">Thẻ ATM Internet Banking</a>
                            </div>
                            <div class="col-sm-12 " >
                                <a href="{{route('get_user.pay.cash')}}" class="btn-width btn-pay">Tiền mặt</a>
                            </div>
                            <div class="col-sm-12 " >
                                <a href="{{route('get_user.pay.zalo_pay')}}" class="btn-width btn-pay">Zalo Pay</a>
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