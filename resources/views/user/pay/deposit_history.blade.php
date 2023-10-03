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
                        </tr>
                    @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
   
    
    
 </div>


@endsection