@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
    <div class="col-lg-12 mobile-dashbord dashbord">
         <div class="dashboard_navigationbar dashxl">
             <div class="dropdown">
                 <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i> Quản lý thông tin</button>
                 <ul id="myDropdown" class="dropdown-content">
                     <li>
                         <a href="dashboard.html">
                             <i class="fa fa-map-marker mr-3"></i> Quản lý tin đăng
                         </a>
                     </li>
                     <li>
                         <a href="user-profile.html">
                             <i class="fa fa-user mr-3"></i>Sửa thông tin cá nhân
                         </a>
                     </li>
                     <li>
                         <a  href="my-listings.html">
                             <i class="fa fa-list mr-3" aria-hidden="true"></i>Nạp tiền vào tài khoản
                         </a>
                     </li>
                     <li>
                         <a href="favorited-listings.html">
                             <i class="fa fa-heart mr-3" aria-hidden="true"></i>Lịch sử nạp tiền
                         </a>
                     </li>
                     <li>
                         <a href="add-property.html">
                             <i class="fa fa-list mr-3" aria-hidden="true"></i>Lịch sử thanh toán
                         </a>
                     </li>
                     <li>
                         <a href="payment-method.html">
                             <i class="fas fa-credit-card mr-3"></i>Bảng giá dịch vụ
                         </a>
                     </li>
                     <li>
                         <a href="invoice.html">
                             <i class="fas fa-paste mr-3"></i>Liên hệ
                         </a>
                     </li>
                 
                     <li>
                         <a href="index-2.html">
                             <i class="fas fa-sign-out-alt mr-3"></i>Đăng xuất
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="my-properties">
         <table class="table-responsive">
             <thead>
                <tr>
                    <th style="background-color: #ffff"><h3>Quản lý tin đăng</h3></th>
                </tr>
                 <tr>
                     <th>Mã tin</th>
                     <th>Ảnh đại diện</th>
                     <th>Tiêu đề</th>
                     <th>Giá</th>
                     <th>Ngày bắt đầu</th>
                     <th>Ngày hết hạn</th>
                     <th>Trạng thái</th>
                 </tr>
             </thead>
             <tbody>
                @foreach ($rooms as $item )
                <tr>
                    <td>
                        #{{$item->id}}
                    </td>
                     <td class="image myelist">
                        <a href="">
                            <img class="img-fluid" id="output" src="{{ pare_url_file($item->avatar) }}">
                        </a>
                     </td>
                     <td style="width:40% ">
                         <div class="inner">
                             <a href="single-property-1.html">
                                <h2>
                                   <span class="label label-danger-warning">
                                    {{$item->category->name ?? "[N\A]"}}
                                    </span>                                 
                                    {{$item->name}}
                                
                                </h2>
                             </a>
                             <p style="font-size: 14px;font-weight: 400;color: #212121;text-decoration: none;margin-bottom: 5px">
                                <i class="fa-solid fa-location-dot"></i>
                                
                                @if (isset($item->wards))
                                <span>{{ $item->wards->name ?? "" }} - </span>
                                @endif
                                @if (isset($item->district))
                                <span>{{ $item->district->name }} - </span>
                                @endif
                                @if (isset($item->city))
                                <span>{{ $item->city->name ?? "" }}  </span>
                                @endif
                            </p>
                             <p class="actions">

                                    @if ($item->status == \App\Models\Room::STATUS_ACTIVE)
                                    <a href="{{ route('get_user.room.hide', $item->id) }}" class="edit btn-properties"><i class="fa fa-eye-slash icon"></i>Ẩn tin</a>
                                    @endif
                                    @if ($item->status == \App\Models\Room::STATUS_EXPIRED || $item->status ==
                                    \App\Models\Room::STATUS_DEFAULT)
                                    <a href="{{ route('get_user.room.pay', $item->id) }}" class="edit btn-properties"><i class="fa fa-refresh icon"></i> Thanh
                                        toán
                                        hoặc gia hạn</a>
                                        <a href="{{route('get_user.room.update',$item->id)}}" class="edit btn-properties"><i class="fa-solid fa-pen icon"></i></i>Sửa tin</a>
                                    @endif
                                    @if ($item->status == \App\Models\Room::STATUS_DEFAULT && 
                                    ($item->paymentHistory->count() ?? 0) > 0)
                                     <a href="{{ route('get_user.room.active', $item->id) }}" class="edit btn-properties"><i class="fa-solid fa-eye icon"></i> Hiển thị</a>
                                    @endif
                            </p>
                            
                         </div>
                     </td>
                    
                     <td>{{number_format($item->price /1000000,1)}} triệu/tháng</td>
                     <td>{{$item->time_start}}</td>
                     <td>{{$item->time_stop}}</td>
                     <td >
                        <span class="{{ $item->getStatus($item->trangthai)['class'] ?? '...' }}">{{ $item->getStatus($item->trangthai)['name'] ?? "..." }}</span>

                     </td>
                 </tr>
                @endforeach
                 
               
             </tbody>
         </table>
         <div class="pagination-container">
             <nav>
               {{$rooms->links()}}
             </nav>
         </div>
     </div>
 </div>

@endsection