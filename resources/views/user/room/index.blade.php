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
                        @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                            <a href=""><img   class="img-fluid" id="output" src="{{ asset('images/no-avatar.jpg') }}"></a>
                        @else
                        <a href="">
                            <img   class="img-fluid" id="output" src="{{ asset('uploads/avatars/' . $item->avatar) }}">
                        </a>
                        @endif
                         {{-- <a href="single-property-1.html"><img alt="my-properties-3" src="{{asset('images/feature-properties/fp-1.jpg')}}" class="img-fluid"></a> --}}
                     </td>
                     <td>
                         <div class="inner">
                             <a href="single-property-1.html">
                                <h2>
                                   <span class="label label-danger-warning">
                                    {{$item->category->name ?? "[N\A]"}}
                                    </span> 
                                    {{$item->name}}
                                
                                </h2>
                             </a>
                             <p class="actions">
                                {{-- <a href="#" class="edit btn-properties"><i class="fa-regular fa-credit-card icon"></i></i>Thanh toán tin</a> --}}
                                <a href="#" class="edit btn-properties"><i class="fa-solid fa-repeat icon"></i></i>Đăng lại</a>
                                <a href="#" class="edit btn-properties"><i class="fa fa-eye-slash icon"></i>Ẩn tin</a>
                                <a href="{{route('get_user.room.update',$item->id)}}" class="edit btn-properties"><i class="fa-solid fa-pen icon"></i></i>Sửa tin</a>
                            </p>
                            
                         </div>
                     </td>
                     <td>{{number_format($item->price /1000000,1)}} triệu/tháng</td>
                     <td>{{$item->created_at}}</td>
                     <td>08.14.2020</td>
                     <td >
                        @if ($item->status == 1)
                            <span style="color: #1CA345">Đã kiểm duyệt</span>
                        @elseif ($item->status == 0)
                            <span style="color: #FFC001">Chờ kiểm duyệt</span>
                        @else
                            <span style="color:#DE3F44">Tin hết hạn</span>
                        @endif
                       
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