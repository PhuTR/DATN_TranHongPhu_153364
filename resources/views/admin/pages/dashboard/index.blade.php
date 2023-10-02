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
         <h4 class="title">Trang quản lý</h4>
         <div class="section-body">
             <div class="row">
                 <div class="col-lg-3 col-md-6 col-xs-12 dar pro mr-3">
                     <div class="item">
                         <div class="icon">
                            <i style="color: #ffff" class="fa-solid fa-users"></i>
                         </div>
                         <div class="info">
                             <h6 class="number">{{ $totalUser ?? 0 }}</h6>
                             <a href="{{route('get_admin.user.index')}}" class="type ml-1">Tổng số thành viên</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 col-xs-12 dar rev mr-3">
                     <div class="item">
                         <div class="icon">
                            <i class="fa-solid fa-newspaper" style="color: #ffff"></i>
                         </div>
                         <div class="info">
                             <h6 class="number">{{ $totalRoom ?? 0 }}</h6>
                             <a href="{{route('get_admin.room.index')}}" class="type ml-1">Tổng tin đăng</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 dar com mr-3">
                     <div class="item mb-0">
                         <div class="icon">
                            <i class="fa-solid fa-money-bills" style="color: #ffff"></i>
                         </div>
                         <div class="info">
                             <h6 class="number">{{ $totalPay }}</h6>
                             <p class="type ml-1">Giao dịch thanh toán</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 dar booked">
                     <div class="item mb-0">
                         <div class="icon">
                            <i class="fa-regular fa-credit-card" style="color: #ffff"></i>
                         </div>
                         <div class="info">
                             <h6 class="number">432</h6>
                             <p class="type ml-1">Lịch sử nạp tiền</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>
    
    <div class="row">
        <div class="col-xl-6">
            <h5 class="mt-3" style="display: flex;justify-content: space-between"><span>Thành viên mới</span></h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ảnh đại diện</th>
                        <th>Thông tin</th>
                        <th>Số điện thoại</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users ?? [] as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td scope="row">
                            @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                                <img   style="width: 60px;height: 60px;border-radius: 50%" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                            @else
                                <img   style="width: 60px;height: 60px;border-radius: 50%" id="output" src="../uploads/avatars/{{ $admin->avatar }}">
                            @endif
                           
                        </td>
                        <td scope="row">{{ $item->name }} <br>{{ $item->email }}</td>
                        <td scope="row">{{ $item->phone }}</td>
                        <td scope="row">{{ $item->created_at }}</td>
    
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-12">
                    <div class="total-money">
                        @php
                        $total = 0;
                        @endphp
    
                        @foreach ($rechargeHistory ?? [] as $item)
                        @php
                        $total += $item->tien;
                        @endphp
                        @endforeach
    
                        <p>
                            Tổng số tiền khách nạp:
                            <span class="text-danger text-bold">{{ number_format($total, 0, ',', '.') }}đ</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <h5 class="mt-3" style="display: flex;justify-content: space-between"><span>Giao dịch mới</span></h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="text-align: left">Mã giao dịch</th>
                        <th class="text-center">Loại</th>
                        <th class="text-center">Tổng tiền</th>
                        <th class="text-center">Tin</th>
                        <th class="text-center">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentHistory ?? [] as $item)
                    <tr style="text-align: center">
                        <td style="text-align: left" scope="row">{{ $item->id }}</td>
                        <td>
                            @if ($item->type == 1)
                            <span>Tin tường</span>
                            @elseif($item->type == 2)
                            <span>Vip 3</span>
                            @elseif($item->type == 3)
                            <span>Vip 2</span>
                            @elseif($item->type == 4)
                            <span>Vip 1</span>
                            @else
                            <span>Đặc biệt</span>
                            @endif
                        </td>
                        <td scope="row"><span
                                class="text-danger text-bold">{{ number_format($item->money,0,',','.') }}đ</span></td>
                        <td scope="row">
                            <a href="">{{ $item->room_id }}</a>
                        </td>
                        <td scope="">
                            {{ $item->created_at }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
    </div>


 </div>


@endsection