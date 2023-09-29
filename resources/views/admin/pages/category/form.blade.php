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
                             <label>Tên danh mục</label>
                             <input type="text" name="name" class="form-control" placeholder="Tên danh mục" value="{{old('name',$categries->name ?? '')}}">
                         </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề" value="{{old('name',$categries->title ?? '')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" name="description" class="form-control" placeholder="Mô tả" value="{{old('name',$categries->description ?? '')}}">
                        </div>
                    </div>
{{--                  
                     <div class="col-sm-6">
                  
                             <div class="form-group categories select-container ">
                                <label>Phân loại</label>
                                <select name="type" id="type" class="nice-select form-control wide" >
                                    <option value="1" class="option"  {{($location->type ?? 1) == 1 ? "selected" : ""}}>--Tỉnh thành--</option>
                                    <option value="2" class="option"  {{($location->type ?? 1) == 2 ? "selected" : ""}}>--Quận huyện--</option>
                                    <option value="3" class="option"  {{($location->type ?? 1) == 3 ? "selected" : ""}}>--Phường xã--</option>
                                </select>
                            </div>
                
                     </div> --}}

                     {{-- <div class="col-sm-6">
                        @if(isset($location) && $location->type == 2)
                        <div class="form-group categories select-container ">
                           <label>Tỉnh thành</label>
                           <select name="parent_id"  class="nice-select form-control wide" >
                                @foreach ($cities as $item )
                                <option value="{{$item->id}}" class="option" {{$item->id == ($location->parent_id ?? 0)  ? "selected" : ""}} >{{$item->name}}</option>
                                @endforeach
                              
                           </select>
                       </div>
                       @endif
           
                    </div> --}}

                     <div class="col-sm-12">

                      

                     </div>
                     
                     <div class="col-sm-12">
                        <div class="form-group">
                            <input type="radio" name="status" class="" placeholder="" value="1"  {{($categries->status ?? 0) == 1 ? "checked" : ""}}>
                            <label>Hiển thị</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="status" class="" placeholder="" value="0"   {{($categries->status ?? 0) == 0 ? "checked" : ""}}>
                            <label>Không hiển thị</label>
                        </div>
                    </div>
                     
                 <button type="submit" class="btn btn-primary btn-lg mt-2">Lưu dữ liệu</button>
             </form>
         </div>
     </div>
  
 </div>

@endsection