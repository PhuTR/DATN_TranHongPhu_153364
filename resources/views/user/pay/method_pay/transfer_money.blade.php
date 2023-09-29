@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 py-0 pl-0 user-dash2">
    @include('user.layouts.dashboard_navigationbar')
    <section class="headings-2 pt-0 pb-0">
        <div class="pro-wrapper">
            <div class="detail-wrapper-body">
                <div class="listing-title-bar">
                    <div class="text-heading text-left">
                        <p>
                            <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <a href="{{route('get_user.room.home')}}">Quản lý</a>
                            &nbsp;/&nbsp; <a href="{{route('get_user.pay.index_pay')}}">Nạp tiền vào tài khoản</a>   &nbsp;/&nbsp; <span>Chuyển khoản</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <!-- START SECTION PAYMENT-METHOD -->
     <section class="payment-method notfound">
         <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="tr-single-box">
                    <div class="tr-single-body">
                        <div class="tr-single-header">
                            <h4><i class="far fa-credit-card pr-2"></i>Phương thức thanh toán: Chuyển khoản</h4>
                        </div>
                        <style>
                            .alert-warning {
                                color: #856404;
                                background-color: #fff3cd;
                                border-color: #ffeeba;
                            }
                            </style>
                            <div class="alert alert-warning" role="alert">
                                <p><strong>Lưu ý quan trọng:</strong></p>
                                <p>- Nội dung chuyển tiền bạn vui lòng ghi đúng thông tin sau:</p>
                                <p>
                                </p>
                                <p><strong style="color: red;">"PT123 - {{$user->id}} - {{$user->phone}}"</strong></p>
                                <p>Trong đó {{$user->id}} là mã thành viên, {{$user->phone}} là số điện thoại của bạn đăng ký trên website phu153364@gmail.com
                                </p>
                                <p>Xin cảm ơn!</p>
                            </div>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td><strong>Ngân hàng</strong></td>
                                        <td><strong>Chủ tài khoản</strong></td>
                                        <td><strong>Số tài khoản</strong></td>
                                        <td><strong>Chi nhánh</strong></td>
                                        <td><strong>Nội dung chuyển khoản</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong style="color: red;">MB-BANK: </strong> MB NGÂN HÀNG QUÂN ĐỘI
                                        </td>
                                        <td style="white-space: nowrap;">TRẦN HỒNG PHÚ</td>
                                        <td style="white-space: nowrap;" ><span id="text-to-copy">0327006685</span><br><button onclick="copyToClipboard('0327006685')" class="btn btn-secondary btn-copy js-btn-copy"
                                                title="Sao chép liên kết" data-clipboard-text="0327006685"><span class="icon-copy">Sao
                                                    chép</span></button></td>
                                        <td style="white-space: nowrap;">HẢI HẬU</td>
                                        <td rowspan="6" style="white-space: nowrap; color: red;">Nội dung chuyển khoản, bạn ghi rõ:<br>
                                            <strong>"PT123 - {{$user->id}} - {{$user->phone}}"</strong><br><button onclick="copyToClipboard('PT123 - {{$user->id}} - {{$user->phone}}')" class="btn btn-secondary btn-copy js-btn-copy"
                                                title="Sao chép liên kết" data-clipboard-text="PT123 - {{$user->id}} - {{$user->phone}}"><span
                                                    class="icon-copy">Sao chép</span></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong style="color: red;">MB-BANK: </strong> MB NGÂN HÀNG QUÂN ĐỘI</td>
                                        <td style="white-space: nowrap;">TRẦN HỒNG PHÚ</td>
                                        <td style="white-space: nowrap;">31010001745233<br><button onclick="copyToClipboard('31010001745233')" onclick="copyToClipboard()" class="btn btn-secondary btn-copy js-btn-copy"
                                                title="Sao chép liên kết" data-clipboard-text="31010001745233"><span class="icon-copy">Sao
                                                    chép</span></button></td>
                                        <td style="white-space: nowrap;">HẢI HẬU</td>
                                        <!-- <td style="white-space: nowrap; color: red;">PT123 - 104768 - 0942274558</td> -->
                                    </tr>
                            
                            
                                </tbody>
                            </table>
        
                    </div>
                    </div>
                </div>
            </div>
            
         </div>
        
     </section>
     <!-- END SECTION PAYMENT-METHOD -->
     <script>
        function copyToClipboard(text) {
            const tempInput = document.createElement("input");
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
        }
    </script>
    



 </div>


        

@endsection