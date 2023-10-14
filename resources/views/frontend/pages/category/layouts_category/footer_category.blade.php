 <!-- START FOOTER -->
 <footer class="first-footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="netabout">
                        <a href="{{route('get.home')}}" class="logo">
                            <img src="images/logo-footer.svg" alt="netcom">
                        </a>
                        <p>Phongtro123.com tự hào có lượng dữ liệu bài đăng lớn nhất trong lĩnh vực cho thuê phòng trọ.</p>
                    </div>
                 
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Về PHONGTRO123.COM</h3>
                        <div class="nav-footer">
                            <ul> 
                                <li> <a  href="{{route('get.home')}}" >Trang chủ</a> </li>
                                @foreach ($categoriesGlobal ?? [] as $item)
                                    @if ($item->status == 1)
                                        <li >
                                            <a href="{{route('get.category.item',['slug' => $item->slug,'id' => $item->id])}}" 
                                                title="{{$item->name}}" >{{$item->name}} 
                                            </a> 
                                        </li>
                                    @endif
                                   
                                @endforeach
                                <li ><a href="agents-listing-grid.html">Giới thiệu</a></li>
                                <li ><a href="{{route('get.articles.index')}}">Blog</a></li>
                                {{-- <li ><a href="agents-listing-grid.html">Quy chế hoạt động</a></li>
                                <li ><a href="agents-listing-grid.html">Quy định sử dụng</a></li>
                                <li ><a href="agents-listing-grid.html">Chính sách bảo mật</a></li> --}}
                                <li ><a href="{{route('get_user.contact')}}">Liên hệ</a></li>
                             
                            </ul>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Hỗ trợ khách hàng</h3>
                        <div class="nav-footer">
                            <ul> 
                                <li> <a  href="{{route('get.home')}}" >Câu hỏi thường gặp</a> </li>
                                <li ><a href="agents-listing-grid.html">Hướng dẫn đăng tin</a></li>
                                <li ><a href="{{route('get.pricelist.index')}}">Bảng giá dịch vụ</a></li>
                                <li ><a href="agents-listing-grid.html">Quy định đăng tin</a></li>
                                <li ><a href="agents-listing-grid.html">Giải quyết khiếu nại</a></li>
                            </ul>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="newsletters">
                        <h3>Liên hệ với chúng tôi</h3>
                        <div class="contact">
                            <a target="_blank" href="">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a style="color: #DC362E" target="_blank" href="">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                            <a style="color: #fff" target="_blank" href="">
                                <i class="fa-brands fa-square-x-twitter"></i>
                            </a>
                        </div>
                    </div>
                    <div class="newsletters" style="margin-top: 20px">
                        <h3>Phương thức thanh toán</h3>
                        <div class="contact">
                            <a target="_blank" href="">
                                <img src="{{asset('images/bank-transfer.png')}}" alt="">
                            </a>
                            <a target="_blank" href="">
                                <img src="{{asset('images/payment-method.png')}}" alt="">
                            </a>
                            <a target="_blank" href="">
                                <img src="{{asset('images/cash.png')}}" alt="">
                            </a>
                            <a target="_blank" href="">
                                <img style="border-radius:10px" src="{{asset('images/zalopay.png')}}" alt="">
                            </a>
                            <a target="_blank" href="">
                                <img style="border-radius:10px" src="{{asset('images/momo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
   
</footer>

<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!-- END FOOTER -->
<!-- START PRELOADER -->
{{-- <div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div> --}}
<!-- END PRELOADER -->