@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 py-0 pl-0 user-dash2">
    <div class="col-lg-12 mobile-dashbord dashbord">
         <div class="dashboard_navigationbar dashxl">
             <div class="dropdown">
                 <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i> Dashboard Navigation</button>
                 <ul id="myDropdown" class="dropdown-content">
                     <li>
                         <a href="dashboard.html">
                             <i class="fa fa-map-marker mr-3"></i> Dashboard
                         </a>
                     </li>
                     <li>
                         <a href="user-profile.html">
                             <i class="fa fa-user mr-3"></i>Profile
                         </a>
                     </li>
                     <li>
                         <a href="my-listings.html">
                             <i class="fa fa-list mr-3" aria-hidden="true"></i>My Properties
                         </a>
                     </li>
                     <li>
                         <a href="favorited-listings.html">
                             <i class="fa fa-heart mr-3" aria-hidden="true"></i>Favorited Properties
                         </a>
                     </li>
                     <li>
                         <a href="add-property.html">
                             <i class="fa fa-list mr-3" aria-hidden="true"></i>Add Property
                         </a>
                     </li>
                     <li>
                         <a class="active" href="payment-method.html">
                             <i class="fas fa-credit-card mr-3"></i>Payments
                         </a>
                     </li>
                     <li>
                         <a href="invoice.html">
                             <i class="fas fa-paste mr-3"></i>Invoices
                         </a>
                     </li>
                     <li>
                         <a href="change-password.html">
                             <i class="fa fa-lock mr-3"></i>Change Password
                         </a>
                     </li>
                     <li>
                         <a href="index-2.html">
                             <i class="fas fa-sign-out-alt mr-3"></i>Log Out
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
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
                        <!-- Debit card option -->
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
                    </div>
                </div>
            </div>
             <div class="col-md-12 col-lg-6">
                 <div class="tr-single-box">
                     <div class="tr-single-body">
                         <div class="tr-single-header">
                             <h4><i class="far fa-address-card pr-2"></i>Billing Information</h4>
                         </div>
                         <div class="row">
                             <div class="col-sm-6">
                                 <label>Name</label>
                                 <input type="text" class="form-control">
                             </div>
                             <div class="col-sm-6">
                                 <label>Email</label>
                                 <input type="email" class="form-control">
                             </div>
                             <div class="col-sm-6">
                                 <label>Phone</label>
                                 <input type="text" class="form-control">
                             </div>
                             <div class="col-sm-6">
                                 <label>City</label>
                                 <input type="text" class="form-control">
                             </div>
                             <div class="col-sm-6">
                                 <label>State</label>
                                 <input type="text" class="form-control">
                             </div>
                             <div class="col-sm-6">
                                 <label>Country</label>
                                 <input type="text" class="form-control">
                             </div>
                             <div class="col-sm-6">
                                 <label>Address</label>
                                 <input type="text" class="form-control address mb-0">
                             </div>
                             <div class="col-sm-6">
                                 <label>Zip</label>
                                 <input type="text" class="form-control mb-0">
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