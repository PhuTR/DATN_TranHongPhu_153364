@extends('admin.layouts.app_master')
@section('content_admin')
 <div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12">
          <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
            <div class="page_title_left d-flex align-items-center">
              <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
            </div>
            <div class="page_title_right">
              <div class="page_date_button d-flex align-items-center">
                <img src="{{asset('asset_admin/img/icon/calender_icon.svg')}}" alt />
                August 1, 2020 - August 31, 2020
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-8">
          <div class="white_card mb_30 card_height_100">
            <div class="white_card_header">
              <div class="row align-items-center justify-content-between flex-wrap">
                <div class="col-lg-4">
                  <div class="main-title">
                    <h3 class="m-0">Thống kê doanh thu</h3>
                  </div>
                </div>
                <div class="col-lg-4 text-end d-flex justify-content-end">
                  <select class="nice_Select2 max-width-220">
                    <option value="1">Show by month</option>
                    <option value="1">Show by year</option>
                    <option value="1">Show by day</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="white_card_body">
              <div id="management_bar"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="white_card card_height_100 mb_30 user_crm_wrapper">
            <div class="row">
              <div class="col-lg-6">
                <div class="single_crm">
                  <div class="crm_head d-flex align-items-center justify-content-between">
                    <div class="thumb">
                      <img src="{{asset('asset_admin/img/crm/businessman.svg')}}" alt />
                    </div>
                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                  </div>
                  <div class="crm_body">
                    <h4>{{ $totalUser ?? 0 }}</h4>
                    <p>Người đăng ký</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="single_crm">
                  <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                    <div class="thumb">
                      <img src="{{asset('asset_admin/img/crm/customer.svg')}}" alt />
                    </div>
                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                  </div>
                  <div class="crm_body">
                    <h4>{{ $totalRoom ?? 0 }}</h4>
                    <p>Tổng số tin đăng</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="single_crm">
                  <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                    <div class="thumb">
                      <img src="{{asset('asset_admin/img/crm/infographic.svg')}}" alt />
                    </div>
                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                  </div>
                  <div class="crm_body">
                    <h4>{{ $totalPay }}</h4>
                    <p>Giao dịch thanh toán</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="single_crm">
                  <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                    <div class="thumb">
                      <img src="{{asset('asset_admin/img/crm/sqr.svg')}}" alt />
                    </div>
                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                  </div>
                  <div class="crm_body">
                    @php
                    $total = 0;
                    @endphp

                    @foreach ($rechargeHistory ?? [] as $item)
                    @php
                    $total += $item->money;
                    @endphp
                    @endforeach
                    <h4>{{ number_format($total, 0, ',', '.') }}đ</h4>
                    <p>Tổng tiền khách nạp</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="crm_reports_bnner">
              <div class="row justify-content-end">
                <div class="col-lg-6">
                  <h4>Create CRM Reports</h4>
                  <p>Outlines keep you and honest indulging honest.</p>
                  <a href="#"
                    >Read More <i class="fas fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
              <div class="row align-items-center">
                <div class="col-lg-4">
                  <div class="main-title">
                    <h3 class="m-0">Người dùng mới</h3>
                  </div>
                </div>

              </div>
            
            </div>
            <div class="white_card_body">
                @foreach($users ?? [] as $item)
                    <div class="single_user_pil d-flex align-items-center justify-content-between">
                        <div class="user_pils_thumb d-flex align-items-center">
                            <div class="thumb_34 mr_15 mt-0">
                                <img class="img-fluid radius_50" src="{{pare_url_file($item->avatar)}}" alt/>
                            </div>
                            <span class="f_s_14 f_w_400 text_color_11" >{{$item->name}}</span >
                        </div>
                        <div class="user_info">{{$item->email}}</div>
                        <div class="user_info">{{$item->phone}}</div>
                        <div class="action_btns d-flex">
                            <a href="#" class="action_btn mr_10"><i class="far fa-edit"></i> </a>
                            <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                        </div>
                    </div>
                @endforeach
              
            </div>
          </div>
        </div>
     

        <div class="col-lg-6">
          <div class="white_card card_height_100 mb_20">
            <div class="white_card_header">
              <div class="box_header m-0">
                <div class="main-title">
                  <h3 class="m-0">Giao dịch mới</h3>
                </div>
                <div class="header_more_tool">
                  <div class="dropdown">
                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" >
                      <i class="ti-more-alt"></i>
                    </span>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" >
                      <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a >
                      <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="white_card_body QA_section">
              <div class="QA_table">
                <table class="table lms_table_active2 p-0">
                  <thead>
                    <tr>
                      <th scope="col">Mã giao dịch</th>
                      <th scope="col">Loại</th>
                      <th scope="col">Tổng tiền</th>
                      <th scope="col">Tin</th>
                      <th scope="col">Ngày tạo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($paymentHistory ?? [] as $item)
                        <tr>
                        <td class="f_s_12 f_w_400 color_text_6">#{{$item->id}}</td>
                        <td class="f_s_12 f_w_400 color_text_7">
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
                        <td class="f_s_12 f_w_400">{{ number_format($item->money,0,',','.') }}đ</td>
                        <td class="f_s_12 f_w_400 "> {{ $item->room_id }} </td>
                        <td class="f_s_12 f_w_400 "> {{ $item->created_at }} </td>
                        </tr>
                    @endforeach
           
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
        
      </div>
    </div>
</div>


@endsection