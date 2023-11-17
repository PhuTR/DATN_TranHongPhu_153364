<body style="margin: 0;  font-family: 'Poppins', sans-serif;  background: #ffffff;  font-size: 14px; " >
    <div style="
        max-width: 680px;
        margin: 0 auto;
        padding: 45px 30px 60px;
        background: #f4f7ff;
        background-image: url(https://archisketch-resources.s3.ap-northeast-2.amazonaws.com/vrstyler/1661497957196_595865/email-template-background-banner);
        background-repeat: no-repeat;
        background-size: 800px 452px;
        background-position: top center;
        font-size: 14px;
        color: #434343;
      ">
      <header>
        <table style="width: 100%">
          <tbody>
            <tr style="height: 0">
              <td></td>
              <td style="text-align: right">
                <span style="font-size: 16px; line-height: 30px; color: #ffffff">{{$currentTime}}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </header>

      <main>
        <div style="  margin: 0; margin-top: 70px; padding: 92px 30px 115px; background: #ffffff; border-radius: 30px;text-align: center; " >
          <div style="width: 100%; max-width: 489px; margin: 0 auto">
            <h1 style=" margin: 0; font-size: 24px; font-weight: 500; color: #1f1f1f; " >
              Mã xác nhận của bạn 
            </h1>
            <p style=" margin: 0; margin-top: 17px;font-size: 16px; font-weight: 500;">
              xin chào {{$user->name}},
            </p>
            <p style="margin: 0; margin-top: 17px; font-weight: 500; letter-spacing: 0.56px; ">
              Cảm ơn bạn đã lựa chọn dịch vụ của chúng tôi. Email này để giúp bạn lấy lại mật khẩu tài khoản
              đã bị quên. Vui lòng click vào link dưới đây để đặt lại mật khẩu.
            </p>
            <p style="margin: 0; margin-top: 17px; font-weight: 500; letter-spacing: 0.56px; ">
              Chú ý: Mã xác nhận trong link chỉ có hiệu lực trong vòng 72 giờ
            </p>
            <p style="margin: 0; margin-top: 60px; " >
                <a href="{{route('get.newpassword',['user'=>$user->id,'token'=>$user->remember_token])}}" style="display: inline-block;background-color: green; color: #fff; padding: 7px 25px; font-weight: 600;text-decoration: none;background-image: url(https://archisketch-resources.s3.ap-northeast-2.amazonaws.com/vrstyler/1661497957196_595865/email-template-background-banner);">Đặt mật khẩu</a>
            </p>
          </div>
        </div>

        <p style="  max-width: 400px;  margin: 0 auto;  margin-top: 90px;  text-align: center; font-weight: 500; color: #8c8c8c; " >
          Cần giúp đỡ? Hãy liên hệ tại
          <a href="mailto:datn153364@gmail.com" style="color: #499fb6; text-decoration: none" >datn153364@gmail.com</a>
          or Truy cập
          <a href="" target="_blank" style="color: #499fb6; text-decoration: none"  >Trung tâm trợ giúp</a > của chúng tôi
        </p>
      </main>
    </div>
</body>