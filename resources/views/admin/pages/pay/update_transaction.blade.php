@extends('admin.layouts.app_master')
@section('content_admin')


<div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
    <div class="header-widget">
        <a href="{{route('get_admin.location.create')}}" class="btn-admin" ><i class="fa-solid fa-circle-plus"></i>Thêm mới</a>
    </div>
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
                    <select name="type" id="" class="nice-select form-control wide">
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
            <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
        </form>
    </div>
</div>
@endsection