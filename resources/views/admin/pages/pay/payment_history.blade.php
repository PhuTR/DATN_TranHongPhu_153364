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
                            <td>{{$item->id}}</td>
                            <td class="rating"><span>{{$item->room_id}}  </span></td>
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


@endsection