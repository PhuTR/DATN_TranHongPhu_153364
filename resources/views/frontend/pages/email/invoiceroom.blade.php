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
                                            <img src="images/logo.svg" width="80" alt="Logo">
                                        </div>
                                        <div style="width: 50%;text-align: right;" >
                                            <p style="margin-bottom: 0.25rem;" >Hoá đơn #550</p>
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
                                            <p style="margin-bottom: 0.25rem"><span style="color: #6c757d">LOẠI TIN: </span></p>
                                            <p style="margin-bottom: 0.25rem"><span style="color: #6c757d">GÓI TIN: </span> 10253642</p>
                                            <p style="margin-bottom: 0.25rem"><span style="color: #6c757d">Payment Type: </span> Root</p>
                                            <p style="margin-bottom: 0.25rem"><span style="color: #6c757d">Name: </span> John Doe</p>
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
                                                        <td style="padding: 0.5rem 0.5rem">{{$room->price}}</td>
                                                        <td style="padding: 0.5rem 0.5rem">$7.55</td>
                                                        <td style="padding: 0.5rem 0.5rem">$47.55</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div style="background-color: #212529;color: #fff;flex-direction: row-reverse;display: flex;padding: 1.5rem">
                                        <div style="padding: 1rem 3rem;text-align: right;">
                                            <div style="margin-bottom: 0.5rem">Grand Total</div>
                                            <div style="font-size: calc(1.325rem + .9vw);line-height: 1.2;">$42.79</div>
                                        </div>

                                        <div style="padding: 1rem 3rem;text-align: right;">
                                            <div style="margin-bottom: 0.5rem">Discount</div>
                                            <div style="font-size: calc(1.325rem + .9vw);line-height: 1.2;">10%</div>
                                        </div>

                                        <div style="padding: 1rem 3rem;text-align: right;">
                                            <div style="margin-bottom: 0.5rem">Sub - Total</div>
                                            <div style="font-size: calc(1.325rem + .9vw);line-height: 1.2;">$47.55</div>
                                        </div>
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