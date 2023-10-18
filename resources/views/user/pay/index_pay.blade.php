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
                        @foreach ( $recharge ?? [] as $item )
                            <a href="{{ route('get_user.recharge.switch', ['slug' => \Illuminate\Support\Str::slug($item['name']), 'id' => $item['code']]) }}">
                                <div class="payment-card">
                                    <header class="payment-card-header cursor-pointer" data-toggle="collapse" data-target="#paypal" aria-expanded="true">
                                        <div class="payment-card-title flexbox">
                                            <h4>{{ $item['name'] }}</h4>
                                        </div>
                                        <div class="pull-right">
                                            <img src="{{ asset($item['avatar']) }}" class="img-responsive" alt="{{ $item['name'] }}">
                                        </div>
                                    </header>
                                
                                </div>
                            </a>
                        @endforeach

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
                            @foreach($recharge ?? [] as $item)
                                <div class="col-sm-12 " >
                                    <a href="{{ route('get_user.recharge.switch', ['slug' => \Illuminate\Support\Str::slug($item['name']), 'id' => $item['code']]) }}" class="btn-width btn-pay ">{{$item['name']}}</a>
                                </div>
                            @endforeach
                           
                         </div>
                     </div>
                 </div>
             </div>
            
         </div>
        
     </section>
     <!-- END SECTION PAYMENT-METHOD -->
 </div>


        

@endsection