@extends('frontend.pages.category.layouts_category.master_category')


@section('content_category')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Pricing Table</h1>
            <h2><a href="index-2.html">Home </a> &nbsp;/&nbsp; Pricing Table</h2>
        </div>
    </div>
</section>
<!-- END SECTION HEADINGS -->

<!-- START SECTION PRICING -->
<section class="pricing-table bg-white-2">
    <div class="container" style="max-width:1500px">
        <div class="section-title">
            <h3>Pricing</h3>
            <h2>Packages</h2>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-6 col-xs-12" style="padding-right: 0px;">
                <div class="plan text-center">
                
                    <p class="plan-price" style="background-color: #E13427">
                        Tin VIP nổi bật
                        <br>
                        @for($i = 1 ; $i <= 5 ; $i ++)
                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                        @endfor
                    </p>
                    <ul class="list-unstyled">
                        <li style="min-height: 270px">Ưu điểm</li>
                        <li style="min-height: 184px;">Phù hợp</li>
                        <li style="min-height: 77px">Giá ngày</li>
                        <li style="min-height: 53px">Giá tuần</li>
                        <li style="min-height:136px">Giá tháng(30 ngày)</li>
                        <li>Giá đẩy tin</li>
                        <li style="min-height: 93px">Màu sắc tiêu đề</li>
                        <li>Tự động duyệt</li>
                        <li>Hiển thị số điện thoại ở trang danh sách</li>
                        <li>Huy hiệu nổi bật</li>
                    </ul>
                    
                </div>
            </div>
            <!-- plan start -->
            <div class="col-lg-2 col-md-6 col-xs-12" style="padding-right: 0px;" >
                <div class="plan text-center">
                
                    <p class="plan-price" style="background-color: #E13427">
                        Tin VIP nổi bật
                        <br>
                        @for($i = 1 ; $i <= 5 ; $i ++)
                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                        @endfor
                    </p>
                    <ul class="list-unstyled" style="text-align: left">
                        <li>- Lượt xem nhiều gấp 30 lần so với tin thường
                            <br>
                            - Ưu việt, tiếp cận tối đa khách hàng.
                            <br>
                            - Xuất hiện vị trí đầu tiên ở trang chủ
                            <br>
                            - Đứng trên tất cả các loại tin VIP khác
                            <br>
                            - Xuất hiện đầu tiên ở mục tin nổi bật xuyên suốt khu vực chuyên mục đó</li>
                        <li>	
                            - Phù hợp khách hàng là công ty/cá nhân sở hữu hệ thống lớn có từ 15-20 căn phòng/nhà trở lên hoặc phòng trống quá lâu, thường xuyên đang cần cho thuê gấp.
                        </li>
                        <li>
                            <h3>80.000đ</h3>
                            (Tối thiểu 5 ngày)
                        </li>
                        <li><h3>80.000đ</h3></li>
                        <li>
                            <p>2.400.000đ</p>
                            <p>Giảm 25% chỉ còn</p>
                           <h4> 1.800.000 </h4>
                           
                        </li>
                        <li>40.000</li>
                        <li><p style="text-transform:uppercase ">Tiêu đề màu in đỏ,in hoa</p></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                    </ul>
                    <a class="btn btn-primary" href="#.">Xem đề mô</a>
                </div>
            </div>
            <!-- plan end -->
           
        
         
            <!-- plan start -->
            <div class="col-lg-2 col-md-6 col-xs-12" style="padding-right: 0px;" >
                <div class="plan text-center">
                
                     <p class="plan-price" style="background-color: #EA2E9D">
                        Tin VIP 1
                        <br>
                        @for($i = 1 ; $i <= 4 ; $i ++)
                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                        @endfor
                    </p>
                    <ul class="list-unstyled" style="text-align: left">
                        <li>- Lượt xem nhiều gấp 30 lần so với tin thường
                            <br>
                            - Ưu việt, tiếp cận tối đa khách hàng.
                            <br>
                            - Xuất hiện vị trí đầu tiên ở trang chủ
                            <br>
                            - Đứng trên tất cả các loại tin VIP khác
                            <br>
                            - Xuất hiện đầu tiên ở mục tin nổi bật xuyên suốt khu vực chuyên mục đó</li>
                        <li>	
                            - Phù hợp khách hàng là công ty/cá nhân sở hữu hệ thống lớn có từ 15-20 căn phòng/nhà trở lên hoặc phòng trống quá lâu, thường xuyên đang cần cho thuê gấp.
                        </li>
                        <li>
                            <h3>80.000đ</h3>
                            (Tối thiểu 5 ngày)
                        </li>
                        <li><h3>80.000đ</h3></li>
                        <li>
                            <p>2.400.000đ</p>
                            <p>Giảm 25% chỉ còn</p>
                           <h4> 1.800.000 </h4>
                           
                        </li>
                        <li><p style="text-transform:uppercase ">Tiêu đề màu in đỏ,in hoa</p></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                    </ul>
                    <a class="btn btn-primary" href="#.">Xem đề mô</a>
                </div>
            </div>
            <!-- plan end -->
            <!-- plan start -->
            <div class="col-lg-2 col-md-6 col-xs-12" style="padding-right: 0px;" >
                <div class="plan text-center">
                
                     <p class="plan-price" style="background-color: #FA6400">
                        Tin VIP 2
                        <br>
                        @for($i = 1 ; $i <= 3 ; $i ++)
                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                        @endfor
                    </p>
                    <ul class="list-unstyled" style="text-align: left">
                        <li>- Lượt xem nhiều gấp 30 lần so với tin thường
                            <br>
                            - Ưu việt, tiếp cận tối đa khách hàng.
                            <br>
                            - Xuất hiện vị trí đầu tiên ở trang chủ
                            <br>
                            - Đứng trên tất cả các loại tin VIP khác
                            <br>
                            - Xuất hiện đầu tiên ở mục tin nổi bật xuyên suốt khu vực chuyên mục đó</li>
                        <li>	
                            - Phù hợp khách hàng là công ty/cá nhân sở hữu hệ thống lớn có từ 15-20 căn phòng/nhà trở lên hoặc phòng trống quá lâu, thường xuyên đang cần cho thuê gấp.
                        </li>
                        <li>
                            <h3>80.000đ</h3>
                            (Tối thiểu 5 ngày)
                        </li>
                        <li><h3>80.000đ</h3></li>
                        <li>
                            <p>2.400.000đ</p>
                            <p>Giảm 25% chỉ còn</p>
                           <h4> 1.800.000 </h4>
                           
                        </li>
                        <li><p style="text-transform:uppercase ">Tiêu đề màu in đỏ,in hoa</p></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                    </ul>
                    <a class="btn btn-primary" href="#.">Xem đề mô</a>
                </div>
            </div>
            <!-- plan end -->
            <!-- plan start -->
            <div class="col-lg-2 col-md-6 col-xs-12" style="padding-right: 0px;" >
                <div class="plan text-center">
                
                     <p class="plan-price" style="background-color: #007BFF">
                        Tin VIP 3
                        <br>
                        @for($i = 1 ; $i <= 2 ; $i ++)
                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                        @endfor
                    </p>
                    <ul class="list-unstyled" style="text-align: left">
                        <li>- Lượt xem nhiều gấp 30 lần so với tin thường
                            <br>
                            - Ưu việt, tiếp cận tối đa khách hàng.
                            <br>
                            - Xuất hiện vị trí đầu tiên ở trang chủ
                            <br>
                            - Đứng trên tất cả các loại tin VIP khác
                            <br>
                            - Xuất hiện đầu tiên ở mục tin nổi bật xuyên suốt khu vực chuyên mục đó</li>
                        <li>	
                            - Phù hợp khách hàng là công ty/cá nhân sở hữu hệ thống lớn có từ 15-20 căn phòng/nhà trở lên hoặc phòng trống quá lâu, thường xuyên đang cần cho thuê gấp.
                        </li>
                        <li>
                            <h3>80.000đ</h3>
                            (Tối thiểu 5 ngày)
                        </li>
                        <li><h3>80.000đ</h3></li>
                        <li>
                            <p>2.400.000đ</p>
                            <p>Giảm 25% chỉ còn</p>
                           <h4> 1.800.000 </h4>
                           
                        </li>
                        <li><p style="text-transform:uppercase ">Tiêu đề màu in đỏ,in hoa</p></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                    </ul>
                    <a class="btn btn-primary" href="#.">Xem đề mô</a>
                </div>
            </div>
            <!-- plan end -->
            <!-- plan start -->
            <div class="col-lg-2 col-md-6 col-xs-12" style="padding-right: 0px;" >
                <div class="plan text-center">
                
                     <p class="plan-price" style="background-color: #055699">
                        Tin thường
                        <br>
                        @for($i = 1 ; $i <= 1 ; $i ++)
                        <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                        @endfor
                    </p>
                    <ul class="list-unstyled" style="text-align: left">
                        <li>- Lượt xem nhiều gấp 30 lần so với tin thường
                            <br>
                            - Ưu việt, tiếp cận tối đa khách hàng.
                            <br>
                            - Xuất hiện vị trí đầu tiên ở trang chủ
                            <br>
                            - Đứng trên tất cả các loại tin VIP khác
                            <br>
                            - Xuất hiện đầu tiên ở mục tin nổi bật xuyên suốt khu vực chuyên mục đó</li>
                        <li>	
                            - Phù hợp khách hàng là công ty/cá nhân sở hữu hệ thống lớn có từ 15-20 căn phòng/nhà trở lên hoặc phòng trống quá lâu, thường xuyên đang cần cho thuê gấp.
                        </li>
                        <li>
                            <h3>80.000đ</h3>
                            (Tối thiểu 5 ngày)
                        </li>
                        <li><h3>80.000đ</h3></li>
                        <li>
                            <p>2.400.000đ</p>
                            <p>Giảm 25% chỉ còn</p>
                           <h4> 1.800.000 </h4>
                           
                        </li>
                        <li><p style="text-transform:uppercase ">Tiêu đề màu in đỏ,in hoa</p></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                        <li class="text-center"><i class="fa-solid fa-check"></i></li>
                    </ul>
                    <a class="btn btn-primary" href="#.">Xem đề mô</a>
                </div>
            </div>
            <!-- plan end -->
        </div>
    </div>
</section>
<!-- END SECTION PRICING --
@endsection