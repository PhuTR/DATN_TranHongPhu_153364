@extends('admin.layouts.app_master')
@section('content_admin')


<div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
  
    <section class="headings-2 pt-0 pb-0">
        <div class="pro-wrapper">
            <div class="detail-wrapper-body">
                <div class="listing-title-bar">
                    <div class="text-heading text-left">
                        <p>
                            <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <span>Quản lý</span>
                            &nbsp;/&nbsp; <span>Lịch sử nạp tiền</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <div class="dashborad-box">
         <h4 class="title">Lịch sử nạp tiền</h4>
         <div class="section-body listing-table">
             <div class="table-responsive">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>Ngày nạp</th>
                             <th>Mã giao dịch</th>
                             <th>Phương thức</th>
                             <th>Số tiền</th>
                             <th>Khuyến mãi</th>
                             <th>Thực nhận</th>
                             <th>Trạng thái</th>
                             <th>Ghi chú</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>22:59 27/8/2023</td>
                             <td>PT12327082023225905</td>
                             <td class="rating"><span>MOMO  </span></td>
                             <td class="status"><span>50.000</span></td>
                             <td class="edit">0</td>
                             <td class="edit">0</td>
                             <td class="edit">1</td>
                             <td class="edit">ghi chú</td>
                         </tr>
                         <tr>
                            <td>22:59 27/8/2023</td>
                            <td>PT12327082023225905</td>
                            <td class="rating"><span>MOMO  </span></td>
                            <td class="status"><span>50.000</span></td>
                            <td class="edit">0</td>
                            <td class="edit">0</td>
                            <td class="edit">1</td>
                            <td class="edit">ghi chú</td>
                        </tr>
                        <tr>
                            <td>22:59 27/8/2023</td>
                            <td>PT12327082023225905</td>
                            <td class="rating"><span>MOMO  </span></td>
                            <td class="status"><span>50.000</span></td>
                            <td class="edit">0</td>
                            <td class="edit">0</td>
                            <td class="edit">1</td>
                            <td class="edit">ghi chú</td>
                        </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
   
    
    
 </div>


@endsection