@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
    <section class="headings-2 pt-0 pb-0">
        <div class="pro-wrapper">
            <div class="detail-wrapper-body">
                <div class="listing-title-bar">
                    <div class="text-heading text-left">
                        <p>
                            <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <span>Quản lý</span>
                            &nbsp;/&nbsp; <span>Lịch sử thanhh toán tin</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
    
    <div class="dashborad-box">
        <h4 class="title">Lịch sử thanh toán tin</h4>
        <div class="section-body listing-table">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Thời gian</th>
                            <th>Loại hoạt động</th>
                            <th>Mã tin đăng</th>
                            <th>Số tiền</th>
                            <th>Loại tin</th>
                            <th>Số dư</th>
                            <th>Phí</th>
                            <th>Còn lại</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>22:59 27/8/2023</td>
                            <td>PT12327082023225905</td>
                            <td class="rating"><span>MOMO  </span></td>
                            <td class="status"><span>50.000</span></td>
                            <td class="edit">0</i></td>
                            <td class="edit">0</i></td>
                            <td class="edit">1</td>
                            <td class="edit">ghi chú</td>
                            <td class="edit"><i class="fa-solid fa-circle-check"></i></td>
                        </tr>
                        <tr>
                            <td>22:59 27/8/2023</td>
                            <td>PT12327082023225905</td>
                            <td class="rating"><span>MOMO  </span></td>
                            <td class="status"><span>50.000</span></td>
                            <td class="edit">0</i></td>
                            <td class="edit">0</i></td>
                            <td class="edit">1</td>
                            <td class="edit">ghi chú</td>
                            <td class="edit"><i class="fa-solid fa-circle-check"></i></td>
                        </tr>
                        <tr>
                            <td>22:59 27/8/2023</td>
                            <td>PT12327082023225905</td>
                            <td class="rating"><span>MOMO  </span></td>
                            <td class="status"><span>50.000</span></td>
                            <td class="edit">0</i></td>
                            <td class="edit">0</i></td>
                            <td class="edit">1</td>
                            <td class="edit">ghi chú</td>
                            <td class="edit"><i class="fa-solid fa-circle-check"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
   
   
</div>


@endsection