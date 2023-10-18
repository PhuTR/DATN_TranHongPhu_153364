@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 py-0 pl-0 user-dash2">
    @include('user.layouts.dashboard_navigationbar')
     <!-- START SECTION PAYMENT-METHOD -->
         <section class="headings-2 pt-0 pb-0">
        <div class="pro-wrapper">
            <div class="detail-wrapper-body">
                <div class="listing-title-bar">
                    <div class="text-heading text-left">
                        <p>
                            <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <a href="{{route('get_user.room.home')}}">Quản lý tin đăng</a>
                            &nbsp;/&nbsp; <span>Gia hạn tin</span>  
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <section class="payment-method notfound">
         <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="tr-single-box">
                    <div class="tr-single-body">
                        <div class="tr-single-header">
                            <h4><i class="far fa-credit-card pr-2"></i>Gia hạn tin đăng</h4>
                        </div>
                        <style>
                        .alert-warning {
                            color: #856404;
                            background-color: #fff3cd;
                            border-color: #ffeeba;
                        }
                        </style>
                        <div class="alert alert-warning" role="alert">
                            <p>Nếu bạn đã từng đăng tin trên Phongtrodanang.com, hãy sử dụng chức năng ĐẨY TIN / GIA HẠN / NÂNG CẤP VIP trong
                                mục
                                QUẢN LÝ TIN ĐĂNG để làm mới, đẩy tin lên cao thay vì đăng tin mới. Tin đăng trùng nhau sẽ không được duyệt.</p>
                            <p>Xin cảm ơn!</p>
                        </div>
                        <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-room">
                                <div class="room-left">
                                    <h4>Dịch vụ</h4>
                                    <div class="row-lists">
                                        <div class="form-group row-lists-3">
                                            <label for="room_type">Chọn loại tin</label>
                                            <select style="max-width:50%" name="room_type" id="" class="js-change-type">
                                                <option value="1">Tin thường ( 2.000đ / ngày )</option>
                                                <option value="2">Vip 3 ( 10.000đ / ngày )</option>
                                                <option value="3">Vip 2 ( 20.000đ / ngày )</option>
                                                <option value="4">Vip 1 ( 40.000đ / ngày )</option>
                                                <option value="5">Nổi bật ( 80.000đ / ngày )</option>
                                            </select>
                                        </div>
                                        <div class="form-group row-lists-3">
                                            <label for="name">Số ngày</label>
                                            <select style="max-width:50%" name="day" id="day">
                                                @for($i = 5 ; $i <= 20 ; $i ++) <option value="{{ $i }}">{{ $i }} ngày</option>
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="form-group row-lists-3">
                                            <label for="name">Ngày bắt đầu</label>
                                            <input style="max-width:50%" type="datetime-local" class="form-control" min="{{ date('Y-m-d\TH:i'); }}" name="thoigian_batdau">
                                        </div>
                                        <div class="form-group row-lists-3">
                                            <label for="name">Thành tiền</label>
                                            <input style="max-width:50%" type="text" class="form-control" id="total">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success" style="margin-bottom: 20px;">Lưu dữ liệu</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            
         </div>
        
     </section>
     <!-- END SECTION PAYMENT-METHOD -->


     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script>
$(function() {
    $('.js-change-type').change(function() {
        let $this = $(this);
        let $day = $("#day option:selected").val();
        let gia = 0;
        if ($this.val() == 1) {
            gia = 2000;
        } else if ($this.val() == 2) {
            gia = 20000;
        } else if ($this.val() == 3) {
            gia = 30000;
        } else if ($this.val() == 4) {
            gia = 50000;
        } else if ($this.val() == 5) {
            gia = 80000;
        }
        $("#total").val($day * gia);
    })

    $('#day').change(function() {
        let $this = $(this);
        let $type = $(".js-change-type option:selected").val();
        let gia = 0;
        if ($type == 1) {
            gia = 2000;
        } else if ($type == 2) {
            gia = 20000;
        } else if ($type == 3) {
            gia = 30000;
        } else if ($type == 4) {
            gia = 50000;
        } else if ($type == 5) {
            gia = 80000;
        }
        $("#total").val($this.val() * gia);
    })
})
</script>
 </div>


        

@endsection