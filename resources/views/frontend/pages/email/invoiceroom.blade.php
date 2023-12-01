<body>
    <div >
        <section>
            <div>
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div style="display: flex;flex-wrap:wrap; padding: 3rem;">
                                        <div style="width: 50%;">
                                            <img src="https://phongtro123.com/images/logo-phongtro.svg" width="80" alt="Logo">
                                        </div>
                                        <div style="width: 50%;text-align: right;" >
                                            <p style="margin-bottom: 0.25rem;" >Hoá đơn #{{$otp}}</p>
                                            <p style="color: #6c757d;">Gửi ngày: {{$currentTime}}</p>
                                        </div>
                                    </div>

                                    <hr style="margin-top: 0rem;margin-bottom: 3rem;">

                                    <div style="padding: 3rem; display: flex;flex-wrap:wrap;">
                                        <div style="width: 50%;">
                                            <h3 style="margin-bottom: 1.5rem;font-size: calc(1.3rem + .6vw);">Hoá Đơn Đến</h3>
                                            <p style="margin-bottom: 0;">#{{$user->id}}</p>
                                            <p style="margin-bottom: 0;">{{$user->name}}</p>
                                            <p style="margin-bottom: 0;">{{$user->phone}}</p>
                                            <p style="margin-bottom: 0;">{{$user->email}}</p>
                                        </div>

                                        <div style="width: 50%; text-align: right;">
                                            <h3 style="margin-bottom: 1.5rem;font-size: calc(1.3rem + .6vw);">Chi Tiết Thanh Toán</h3>
                                            <p style="margin-bottom: 0.25rem"><span style="color: #6c757d">LOẠI TIN: </span>{{$room->category->name ?? "[N\A]"}}</p>
                                            <p style="margin-bottom: 0.25rem"><span style="color: #6c757d">GÓI TIN: </span> 
                                                @if ($room->service_hot == 1)
                                                <span style="color:#055699">Tin thường</span>
                                                @elseif($room->service_hot == 2)
                                                <span style="color:#055699">Tin Vip 3</span>
                                                @elseif($room->service_hot == 3)
                                                <span style="color:#f60">Tin Vip 2</span>
                                                @elseif($room->service_hot == 4)
                                                <span style="color:#ea2e9d">Tin Vip 1</span>
                                                @else
                                                <span style="color:#E13427">Tin Đặc biệt</span>
                                                @endif
                                            </p>
                                            <p style="margin-bottom: 0.25rem"><span style="color: #6c757d">Payment Type: </span> Root</p>
                                            <p style="margin-bottom: 0.25rem"><span style="color: #6c757d">Họ và tên: </span> {{$user->name}}</p>
                                        </div>
                                    </div>

                                    <div style="padding: 3rem; display: flex;flex-wrap:wrap; ">
                                        <div style="width: 100%;">
                                            <table style="width: 100%; margin-bottom: 1rem; color:#212529; border-color: #dee2e6; vertical-align: top;border-bottom: 1px solid #dee2e6;">
                                                <thead>
                                                    <tr >
                                                        <th style="padding: 0.5rem 0.5rem;text-align: left;">Mã tin</th>
                                                        <th style="padding: 0.5rem 0.5rem;text-align: left;">Ảnh đại diện</th>
                                                        <th style="padding: 0.5rem 0.5rem;text-align: left;">Tiêu đề</th>
                                                        <th style="padding: 0.5rem 0.5rem;text-align: left;">Giá</th>
                                                        <th style="padding: 0.5rem 0.5rem;text-align: left;">Ngày bắt đầu</th>
                                                        <th style="padding: 0.5rem 0.5rem;text-align: left;">Ngày hết hạn</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="padding: 0.5rem 0.5rem">#{{$room->id}}</td>
                                                        <td style="padding: 0.5rem 0.5rem">
                                                            {{-- <img  class="img-responsive" src="{{ pare_url_file($room->avatar) }}"> --}}
                                                            <img  class="img-responsive" src="{{asset('images/logo-datn.png')}}">    
    
                                                        </td>
                                                        <td style="padding: 0.5rem 0.5rem">{{$room->name}}</td>
                                                        <td style="padding: 0.5rem 0.5rem">{{number_format($room->price/1000000,1)}} triệu/tháng</td>
                                                        <td style="padding: 0.5rem 0.5rem">{{$room->time_start}}</td>
                                                        <td style="padding: 0.5rem 0.5rem">{{$room->time_stop}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div style="background-color: #212529;color: #fff;flex-direction: row-reverse;display: flex;padding: 1.5rem">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>