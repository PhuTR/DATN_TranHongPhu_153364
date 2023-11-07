@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
            
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Lịch sử nạp tiền</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý nạp tiền</li>
                    </ol>
                  </div>
                  <div class="page_title_right">
                        <div class="btn-admin">
                            <a href="{{route('get_admin.pay.create_transaction')}}" class="text-white" ><i class="fa-solid fa-circle-plus"></i>Thêm mới</a>
                        </div>
                  </div>
                </div>
            </div>
            
            <div class="dashborad-box">
                
                <div class="section-body listing-table">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Ngày nạp</th>
                                    <th>Mã giao dịch</th>
                                    <th>Phương thức</th>
                                    <th>Khách hàng</th>
                                    <th>Số tiền</th>
                                    <th>Khuyến mãi</th>
                                    <th>Thực nhận</th>
                                    <th>Trạng thái</th>
                                    <th>Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($depositHistory ?? [] as $item)
                                <tr>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>
                                        @if ($item->type == 1)
                                        <span>Chuyển khoản</span>
                                        @elseif($item->type == 2)
                                        <span>Tiền mặt</span>
                                        @elseif($item->type == 3)
                                        <span>Thẻ ATM Internet Banking</span>
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->user->name ?? "..." }} 
                                    </td>
                                    <td class="status"><span>{{ number_format($item->money,0,',','.') }}đ</span></td>
                                    <td class="edit">{{ number_format($item->discount,0,',','.') }}đ</td>
                                    <td class="edit">{{ number_format($item->total_money,0,',','.') }}đ</td>
                                    <td>
                                        <span class="{{ $item->getStatus($item->status)['class'] }}">{{ $item->getStatus($item->status)['name'] }}</span>          
                                    </td>
                                    <td>
                                        @if ($item->status == \App\Models\RechargeHistory::STATUS_CANCEL)
                                        <span class="text-danger" style="font-size: 13px;">{{ $item->note }}</span>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle">
                                        @if ($item->status != \App\Models\RechargeHistory::STATUS_SUCCESS)
                                        <a href="{{ route('get_admin.pay.update_transaction', $item->id) }}" class="text-blue"><i class="fa-regular fa-pen-to-square"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            <div class="pagination-container">
                <nav>
                {{$depositHistory->links()}}
                </nav>
            </div>
            
        </div>
    </div>
</div>


@endsection