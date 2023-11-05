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
    

     <div class="dashborad-box mb-0">
         <h4 class="heading pt-0">Cập nhật</h4>
         <div class="section-inforamation">
             <form method="POST" enctype="multipart/form-data" >
                @csrf
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label>Tên</label>
                             <input type="text" name="name" class="form-control" placeholder="Tỉnh thành phố" value="{{old('name',$city->name ?? '')}}">
                         </div>
                     </div>
                
           
                    </div>

                     <div class="col-sm-12">

                        <p  style="color: #333;display: inline-block;font-size: 15px;font-weight: 600;text-transform: capitalize;">
                            Ảnh địa danh
                         </p>
                         <div class="">
                             @if(empty($location->avatar) || is_null($location->avatar) || $location->avatar == 'no-avatar.jpg')
                                 <img   class="image-bg" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                              @else
                              <img  class="image-bg" id="output1" src="{{ asset('uploads/avatars/' . $location->avatar) }}">
                              @endif
                 
                             <div>
                                 <input style="width:14%" class="input-file" name="avatar" id="avatar" type="file" accept="image/*" onchange="loadFile(event)" style="display: none">
                                         <script>
                                           var loadFile = function(event) {
                                             var output = document.getElementById('output1');
                                             output.src = URL.createObjectURL(event.target.files[0]);
                                           };
                                         </script>
                             </div>
                         </div>

                     </div>
                     
                     <div class="col-sm-12">
                        <div class="form-group">
                            <input type="radio" name="hot" class="" placeholder="" value="1"  {{($location->hot ?? 0) == 1 ? "checked" : ""}}>
                            <label>Nổi bật</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="hot" class="" placeholder="" value="0"   {{($location->hot ?? 0) == 0 ? "checked" : ""}}>
                            <label>Không nổi bật</label>
                        </div>
                    </div>
                     
                 <button type="submit" class="btn btn-primary btn-lg mt-2">Lưu dữ liệu</button>
             </form>
         </div>
     </div>
  
 </div>

@endsection