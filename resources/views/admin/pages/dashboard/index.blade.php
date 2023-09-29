@extends('admin.layouts.app_master')
@section('content_admin')

<div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
    <div class="col-lg-12 mobile-dashbord dashbord">
         <div class="dashboard_navigationbar dashxl">
             <div class="dropdown">
                 <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i> Dashboard Navigation</button>
                 <ul id="myDropdown" class="dropdown-content">
                     <li>
                         <a class="active" href="dashboard.html">
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
                         <a href="payment-method.html">
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
     <div class="dashborad-box stat bg-white">
         <h4 class="title">Manage Dashboard</h4>
         <div class="section-body">
             <div class="row">
                 <div class="col-lg-3 col-md-6 col-xs-12 dar pro mr-3">
                     <div class="item">
                         <div class="icon">
                             <i class="fa fa-list" aria-hidden="true"></i>
                         </div>
                         <div class="info">
                             <h6 class="number">345</h6>
                             <p class="type ml-1">Published Property</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 col-xs-12 dar rev mr-3">
                     <div class="item">
                         <div class="icon">
                             <i class="fas fa-star"></i>
                         </div>
                         <div class="info">
                             <h6 class="number">116</h6>
                             <p class="type ml-1">Total Reviews</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 dar com mr-3">
                     <div class="item mb-0">
                         <div class="icon">
                             <i class="fas fa-comments"></i>
                         </div>
                         <div class="info">
                             <h6 class="number">223</h6>
                             <p class="type ml-1">Messages</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 dar booked">
                     <div class="item mb-0">
                         <div class="icon">
                             <i class="fas fa-heart"></i>
                         </div>
                         <div class="info">
                             <h6 class="number">432</h6>
                             <p class="type ml-1">Times Bookmarked</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
   
 </div>


@endsection