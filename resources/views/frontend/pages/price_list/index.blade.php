@extends('frontend.pages.category.layouts_category.master_category')


@section('content_category')
<style>

    .col-lg-2{
        padding-left: 0px !important;
    }
    td{
        vertical-align: top;
        padding: 10px 15px !important;
        border-bottom: 1px solid #eee;
        border-right: 1px solid #eee;
        background-color: #fff
    }
    table{
        width: 100%;
        border-collapse: collapse;
        font-size: .95rem;
        font-family: Arial,Helvetica,sans-serif;

    }
    label{
        font-size: .95rem;
    }
    h4{
        font-weight: 500;
        font-size: 1.1rem;
    }
    h5{
        font-weight: 700;
        font-size: 1.1rem;
    }
</style>

<!-- END SECTION HEADINGS -->

<!-- START SECTION PRICING -->
<section class="pricing-table bg-white-2">
    <div class="container" style="max-width:1500px">
        <div class="section-title">
            <h3>Bảng giá dịch vụ</h3>
            <p>Áp dụng từ ngày 19/01/2023</p>
        </div>
        <div class="row">
            <table >
                <tr>
                    <th></th>
                    <th class="col-lg-2 col-md-6 col-xs-12">
                        <div class=" text-center">
                            <p class="plan-price" style="background-color: #E13427;margin-bottom: 0rem;">
                                Tin VIP nổi bật
                                <br>
                                @for($i = 1 ; $i <= 5 ; $i ++)
                                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                                @endfor
                            </p>
                        </div>
                    </th>
                    <th class="col-lg-2 col-md-6 col-xs-12">
                        <div class=" text-center">
                            <p class="plan-price" style="background-color: #EA2E9D;margin-bottom: 0rem;">
                                Tin VIP 1
                                <br>
                                @for($i = 1 ; $i <= 4 ; $i ++)
                                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                                @endfor
                            </p>
                        </div>
                    </th>
                    <th class="col-lg-2 col-md-6 col-xs-12">
                        <div class=" text-center">
                            <p class="plan-price" style="background-color: #FF6600;margin-bottom: 0rem;">
                                Tin VIP 2
                                <br>
                                @for($i = 1 ; $i <= 3 ; $i ++)
                                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                                @endfor
                            </p>
                        </div>
                    </th>
                    <th class="col-lg-2 col-md-6 col-xs-12">
                        <div class=" text-center">
                            <p class="plan-price" style="background-color: #007BFF;margin-bottom: 0rem;">
                                Tin VIP 1
                                <br>
                                @for($i = 1 ; $i <= 2 ; $i ++)
                                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                                @endfor
                            </p>
                        </div>
                    </th>
                    <th class="col-lg-2 col-md-6 col-xs-12">
                        <div class=" text-center">
                            <p class="plan-price" style="background-color: #055699;margin-bottom: 0rem;">
                                Tin thường
                                <br>
                                @for($i = 1 ; $i <= 1 ; $i ++)
                                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                                @endfor
                            </p>
                        </div>
                    </th>
                </tr>
                <tr>
                    <td><label for="">Ưu điểm</label></td>
                    <td>
                        <div>
                            - Lượt xem nhiều gấp 30 lần so với tin thường
                            <br>
                            - Ưu việt, tiếp cận tối đa khách hàng.
                            <br>
                            - Xuất hiện vị trí đầu tiên ở trang chủ
                            <br>
                            - Đứng trên tất cả các loại tin VIP khác
                            <br>
                            - Xuất hiện đầu tiên ở mục tin nổi bật xuyên suốt khu vực chuyên mục đó.
                        </div>
                    
                    </td>
                    <td>
                        - Lượt xem nhiều gấp 15 lần so với tin thường
                        <br>
                        - Tiếp cận rất nhiều khách hàng.
                        <br>
                        - Xuất hiện sau VIP NỔI BẬT và trước Vip 2, Vip 3, tin thường.
                        <br>
                        - Xuất hiện thêm ở mục tin nổi bật xuyên suốt khu vực chuyên mục đó.
                    </td>
                    <td>
                        - Lượt xem nhiều gấp 10 lần so với tin thường
                        <br>
                        - Tiếp cận khách hàng rất tốt.
                        <br>
                        - Xuất hiện sau VIP 1 và trước VIP 3, tin thường.
                        <br>
                        - Xuất hiện thêm ở mục tin nổi bật xuyên suốt khu vực chuyên mục đó
                    </td>
                    <td>
                        - Lượt xem nhiều gấp 5 lần so với tin thường
                        <br>
                        - Tiếp cận khách hàng tốt.
                        <br>
                        - Xuất hiện sau VIP 2 và trước tin thường.
                    </td>
                    <td>
                        - Tiếp cận khách hàng khá tốt.
                        <br>
                        - Xuất hiện sau các loại tin VIP
                    </td>
                </tr>
                
                <tr>
                    <td><label for="">Phù hợp</label></td>
                    <td>
                        - Phù hợp khách hàng là công ty/cá nhân sở hữu hệ thống lớn có từ 15-20 căn phòng/nhà trở lên hoặc phòng trống quá lâu, thường xuyên đang cần cho thuê gấp.
                    </td>
                    <td>
                        - Phù hợp khách hàng cá nhân/môi giới có 10-15 căn phòng/nhà đang trống thường xuyên, cần cho thuê nhanh nhất.
                    </td>
                    <td>
                        - Phù hợp khách hàng cá nhân/môi giới có lượng căn trống thường xuyên, cần cho thuê nhanh hơn.
                    </td>
                    <td>
                        - Phù hợp loại hình phòng trọ chung chủ, KTX ở ghép hay khách hàng có 1-5 căn phòng/nhà cần cho thuê nhanh, tiếp cận khách hàng tốt hơn.
                    </td>
                    <td>
                        - Phù hợp tất cả các loại hình tuy nhiên lượng tiếp cận khách hàng thấp hơn và cho thuê chậm hơn so với tin VIP.
                    </td>
                </tr>
                
                <tr>
                    <td><label for="">Giá ngày</label></td>
                    <td>
                        <h3>80.000đ</h3>
                        <span style="font-size: 0.8rem;">(Tối thiểu 5 ngày)</span>
                    </td>
                    <td>
                        <h3>40.000đ</h3>
                        <span style="font-size: 0.8rem;">(Tối thiểu 5 ngày)</span>
                    </td>
                    <td>
                        <h3>20.000đ</h3>
                        <span style="font-size: 0.8rem;">(Tối thiểu 5 ngày)</span>
                    </td>
                    <td>
                        <h3>10.000đ</h3>
                        <span style="font-size: 0.8rem;">(Tối thiểu 5 ngày)</span>
                    </td>
                    <td>
                        <h3>2.000đ</h3>
                        <span style="font-size: 0.8rem;">(Tối thiểu 5 ngày)</span>
                    </td>
                </tr>

                <tr>
                    <td><label for="">Giá tuần (7 ngày)</label></td>
                    <td>
                        <h4>560.000đ</h4>
                    </td>
                    <td>
                        <h4>280.000đ</h4>
                    </td>
                    <td>
                        <h4>140.000đ</h4>
                    </td>
                    <td>
                        <h4>70.000đ</h4>
                    </td>
                    <td>
                        <h4>14.000đ</h4>
                    </td>
                </tr>
                 
                <tr>
                    <td>
                        <label for="">Giá tháng (30 ngày)</label>
                        <br>
                        <span style="color: #4caf50;font-size: 0.8rem;">Rẻ hơn 10% so với giá ngày</span>
                    </td>
                    <td>
                        <span style="text-decoration: line-through;color: red;">2.400.000đ</span><br>
                        <span style="color: #4caf50;">Giảm 25% chỉ còn</span>
                        <h5>1.800.000đ</h5>
                    </td>
                    <td>
                        <span style="text-decoration: line-through;color: red;">1.200.000đ</span><br>
                        <span style="color: #4caf50;">Giảm 25% chỉ còn</span>
                        <h5>900.000đ</h5>
                    </td>
                    <td>
                        <span style="text-decoration: line-through;color: red;">600.000đ</span><br>
                        <span style="color: #4caf50;">Giảm 25% chỉ còn</span>
                        <h5>450.000đ</h5>
                    </td>
                    <td>
                        <span style="text-decoration: line-through;color: red;">300.000đ</span><br>
                        <span style="color: #4caf50;">Giảm 25% chỉ còn</span>
                        <h5>225.000đ</h5>
                    </td>
                    <td>
                        <span style="text-decoration: line-through;color: red;">60.000đ</span><br>
                        <span style="color: #4caf50;">Giảm 25% chỉ còn</span>
                        <h5>45.000đ</h5>
                    </td>
                </tr>
                 
                <tr>
                    <td><label for="">Giá đẩy tin</label></td>
                    <td>40.000đ</td>
                    <td>25.000đ</td>
                    <td>15.000đ</td>
                    <td>10.000đ</td>
                    <td>2.000đ</td>
                </tr>
                 
                <tr>
                    <td><label for="">Màu sắc tiêu đề</label></td>
                    <td><p style="color: #E13427;font-weight: bold;">TIÊU ĐỀ MÀU ĐỎ, IN HOA</p></td>
                    <td><p style="color: #ea2e9d;font-weight: bold;">TIÊU ĐỀ MÀU HỒNG, IN HOA</p></td>
                    <td><p style="color: #FF6600;font-weight: bold;">TIÊU ĐỀ MÀU CAM, IN HOA</p></td>
                    <td><p style="color: #007BFF;font-weight: bold;">TIÊU ĐỀ MÀU XANH, IN HOA</p></td>
                    <td><p style="color: #055699;font-weight: bold;">Tiêu đề màu mặc định, viết thường</p></td>
                </tr>
                 
                <tr>
                    <td><label for="">Tự động duyệt</label></td>
                    <td style="color: #4caf50; font-size:1.3em;text-align:center"><i class="fa-solid fa-check"></i></td>
                    <td style="color: #4caf50; font-size:1.3em;text-align:center"><i class="fa-solid fa-check"></i></td>
                    <td style="color: #4caf50; font-size:1.3em;text-align:center"><i class="fa-solid fa-check"></i></td>
                    <td style="color: #4caf50; font-size:1.3em;text-align:center"><i class="fa-solid fa-check"></i></td>
                    <td style="color: red; font-size:1.3em;text-align:center"><i class="fa-solid fa-xmark"></i></td>
                </tr>
                <tr>
                    <td><label for="">Hiển thị số điện thoại ở trang danh sách</label></td>
                    <td style="color: #4caf50; font-size:1.3em;text-align:center"><i class="fa-solid fa-check"></i></td>
                    <td style="color: red; font-size:1.3em;text-align:center"><i class="fa-solid fa-xmark"></i></td>
                    <td style="color: red; font-size:1.3em;text-align:center"><i class="fa-solid fa-xmark"></i></td>
                    <td style="color: red; font-size:1.3em;text-align:center"><i class="fa-solid fa-xmark"></i></td>
                    <td style="color: red; font-size:1.3em;text-align:center"><i class="fa-solid fa-xmark"></i></td>
                </tr>
                <tr>
                    <td><label for="">Huy hiệu nổi bật</label></td>
                    <td style="color: #4caf50; font-size:1.3em;text-align:center"><i class="fa-solid fa-check"></i></td>
                    <td style="color: red; font-size:1.3em;text-align:center"><i class="fa-solid fa-xmark"></i></td>
                    <td style="color: red; font-size:1.3em;text-align:center"><i class="fa-solid fa-xmark"></i></td>
                    <td style="color: red; font-size:1.3em;text-align:center"><i class="fa-solid fa-xmark"></i></td>
                    <td style="color: red; font-size:1.3em;text-align:center"><i class="fa-solid fa-xmark"></i></td>
                </tr>
                <tr>
                    <th></th>
                    <th ><a data-scroll style="margin-left: 52px; margin-top: 10px; padding: 4px 30px; color:#fff" class="btn " href="#vip-0">Xem denmo</a></th>
                    <th ><a data-scroll style="margin-left: 52px; margin-top: 10px; padding: 4px 30px; color:#fff" class="btn " href="#vip-1">Xem denmo</a></th>
                    <th ><a data-scroll style="margin-left: 52px; margin-top: 10px; padding: 4px 30px; color:#fff" class="btn " href="#vip-2">Xem denmo</a></th>
                    <th ><a data-scroll style="margin-left: 52px; margin-top: 10px; padding: 4px 30px; color:#fff" class="btn " href="#vip-3">Xem denmo</a></th>
                    <th ><a data-scroll style="margin-left: 52px; margin-top: 10px; padding: 4px 30px; color:#fff" class="btn " href="#vip-4">Xem denmo</a></th>

                </tr>
            </table>
        </div>
        <div class="demo">
            <h2 style="font-size:26px;text-align:center; margin:100px">Minh họa tin đăng</h2>
            <div class="vip">
                <h5 style="margin-bottom: 0px"  id="vip-0">Tin VIP nổi bật</h5>
                @for($i = 1 ; $i <= 5 ; $i ++)
                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                @endfor
                <p><span style="color:#E13427;font-weight:bold">TIÊU ĐỀ IN HOA MÀU ĐỎ</span>, gắn biểu tượng 5 ngôi sao màu vàng và hiển thị to và nhiều hình hơn các tin khác. Nằm trên tất cả các tin khác, được hưởng nhiều ưu tiên và hiệu quả giao dịch cao nhất.</p>
                <p>Đồng thời xuất hiện đầu tiên ở mục tin nổi bật xuyên suốt khu vực chuyên mục đó</p>
                <div class="img">
                    <img src="{{asset('uploads/img_demo/demo-vipnoibat.jpg')}}" alt="">
                    <img src="{{asset('uploads/img_demo/demo-vipnoibat2.jpg')}}" alt="">
                </div>
            </div>
    
            <div class="vip"  >
                <h5 style="margin-bottom: 0px" id="vip-1">Tin VIP 1</h5>
                @for($i = 1 ; $i <= 5 ; $i ++)
                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                @endfor
                <p><span style="color:#ea2e9d;font-weight:bold">TIÊU ĐỀ IN HOA MÀU HỒNG</span>, gắn biểu tượng 4 ngôi sao màu vàng ở tiêu đề tin đăng. Hiển thị sau tin VIP nổi bật, Tin VIP 1 và trên các tin khác.</p>
                <div class="img">
                    <img src="{{asset('uploads/img_demo/demo-vip1.jpg')}}" alt="">
                  
                </div>
            </div>
    
            <div class="vip">
                <h5 style="margin-bottom: 0px"  id="vip-2">Tin VIP 2</h5>
                @for($i = 1 ; $i <= 4 ; $i ++)
                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                @endfor
                <p><span style="color:#E13427;font-weight:bold">TIÊU ĐỀ IN HOA MÀU CAM</span>, gắn biểu tượng 3 ngôi sao màu vàng ở tiêu đề tin đăng. Hiển thị sau tin VIP nổi bật, Tin VIP 1, Tin VIP 2 và trên các tin khác.</p>
                <div class="img">
                    <img src="{{asset('uploads/img_demo/demo-vip2.jpg')}}" alt="">
                  
                </div>
            </div>
    
            <div class="vip">
                <h5 style="margin-bottom: 0px"  id="vip-3">Tin VIP 3</h5>
                @for($i = 1 ; $i <= 3 ; $i ++)
                <span style="color: #fed553;font-size:15px" class="fa fa-star"></span>
                @endfor
                <p><span style="color:#007BFF;font-weight:bold">TIÊU ĐỀ IN HOA MÀU XANH</span>, gắn biểu tượng 2 ngôi sao màu vàng ở tiêu đề tin đăng. Hiển thị sau tin VIP nổi bật, Tin VIP 1, Tin VIP 2, Tin VIP 3 và trên các tin khác.</p>
                <div class="img">
                    <img src="{{asset('uploads/img_demo/demo-vip3.jpg')}}" alt="">
                  
                </div>
            </div>
    
            <div class="vip" >
                <h5 style="margin-bottom: 0px" id="vip-4">Tin thường</h5>
                <p><span style="color:#055699;font-weight:bold"> Tiêu đề màu mặc định, viết thường.</span> Hiển thị sau các tin VIP.</p>
                <div class="img">
                    <img src="{{asset('uploads/img_demo/demo-tinthuong.jpg')}}" alt="">
                  
                </div>
            </div>
        </div>
        <div class="pay text-center">
            <h2 style="font-size:26px;padding-top: 50px;text-transform: none;">Liên hệ với chúng tôi</h2>
            <p>Địa chỉ: LD - 02.06 Lexington Residence, số 67 Mai Chí Thọ, Phường An Phú, Tp.Thủ Đức.</p>
            <p>Hotline: 0917686101</p>
            <p style="padding-bottom: 50px">Email: cskh.phongtro123@gmail.com</p>
        </div>
    </div>


  
</section>

<!-- END SECTION PRICING --
@endsection