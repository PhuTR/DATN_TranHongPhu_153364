@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Tạo mới giao dịch </h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý nạp tiền</li>
                      <li class="breadcrumb-item active">Thêm mới giao dịch</li>
                    </ol>
                  </div>
                </div>
            </div>
            
            <div class="dashborad-box  col-lg-6" style="margin: 0 auto">
                <h4 class="title">Lịch sử nạp tiền</h4>
                <form class="form" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Mã khách hàng</label>
                        <input type="number" class="form-control" name="user_id"
                            value="{{ old('user_id', $rechargeHistory->user_id ?? '') }}" aria-describedby="emailHelp"
                            placeholder="Mã khách hàng">
                    </div>
                    <div class="mb-3" >
                        <label class="form-label">Loại hình thanh toán</label>
                        <div class="form-group categories">
                            <select class="nice_Select2 wide" name="type" id="">
                                <option value="0" class="option">--Chọn loại hình thanh toán--</option>
                                @foreach ($rechargeConfig ?? [] as $item)
                                <option value="{{ $item['code'] }}" {{ $item['code'] == ($rechargeHistory->type ?? 0) ? "selected" : ""}}>{{ $item['name'] }}</option> 
                        
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số tiền</label>
                        <input type="number" class="form-control" name="money" value="{{ old('money', $rechargeHistory->money ?? 0) }}"
                            aria-describedby="emailHelp" placeholder="Số tiền">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Khuyến mãi</label>
                        <input type="number" class="form-control" name="discount"
                            value="{{ old('discount', $rechargeHistory->discount ?? 0) }}" aria-describedby="emailHelp"
                            placeholder="Khuyến mãi">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status"
                                {{ ($rechargeHistory->status ?? 1) == 1 ? "checked" : "" }} id="flexRadioDefault1" value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Khởi tạo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status"
                                {{ ($rechargeHistory->status ?? 1) == 2 ? "checked" : "" }} id="flexRadioDefault2" value="2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Duyệt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status"
                                {{ ($rechargeHistory->status ?? 1) == -1 ? "checked" : "" }} id="flexRadioDefault2" value="-1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Huỷ bỏ
                            </label>
                        </div>
                    </div>
                    <button type="submit" class=" col-lg-12 btn btn-primary">Lưu dữ liệu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection