@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Lịch sử thanh toán tin</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý thanh toán tin</li>
                    </ol>
                  </div>
                </div>
            </div>
            
            <div class="dashborad-box">
                <div class="section-body listing-table">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Mã giao dịch</th>
                                    <th>Mã tin đăng</th>
                                    <th>Tổng tiền </th>
                                    <th>Loại tin</th>
                                
                                    <th>Thời gian</th>

                                    {{-- <th>Trạng thái</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paymentHistory as $item )
                                <tr>
                                    <td> {{$item->id}} </td>
                                    <td class="rating"><span>ID: {{$item->room_id}} - {{$item->user->name}} </span></td>
                                    <td class="status" style="color: #FF0000;font-weight:600"><span>{{ number_format($item->money,0,',','.') }}đ</span></td>
                                    <td class="edit">
                                
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
                                    <td>{{$item->created_at}}</td>

                                </tr>
                                @endforeach
                            
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="pagination-container">
                <nav>
                {{$paymentHistory->links()}}
                </nav>
            </div>
        
        
        </div>
    </div>
</div>


@endsection