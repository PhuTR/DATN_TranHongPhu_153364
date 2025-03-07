<body style="  margin: 0;  font-family: 'Poppins', sans-serif;  background: #ffffff;  font-size: 14px; " >
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
                <span style="font-size: 16px; line-height: 30px; color: #ffffff"
                  >{{$currentTime}}</span
                >
              </td>
            </tr>
          </tbody>
        </table>
      </header>

      <main>
        <div style="  margin: 0; margin-top: 70px; padding: 92px 30px 115px; background: #ffffff; border-radius: 30px;text-align: center; " >
          <div style="width: 100%; max-width: 489px; margin: 0 auto">
            <h1 style=" margin: 0; font-size: 24px; font-weight: 500; color: #1f1f1f; " >
              Mã OTP của bạn
            </h1>
            <p style=" margin: 0; margin-top: 17px;font-size: 16px; font-weight: 500;">
              xin chào {{$user->name}},
            </p>
            <p style="margin: 0; margin-top: 17px; font-weight: 500; letter-spacing: 0.56px; ">
              Cảm ơn bạn đã lựa chọn dịch vụ của chúng tôi. Sử dụng OTP sau để
              hoàn tất quy trình thay đổi số điện thoại mới. OTP có giá trị trong
              <span style="font-weight: 600; color: #1f1f1f">5 phút</span>.
              Không chia sẻ mã này với người khác, kể cả nhân viên của chúng tôi
            </p>
            <p style="margin: 0; margin-top: 60px; font-size: 40px;font-weight: 600; letter-spacing: 25px;color: #ba3d4f; " >
              {{$otp}}
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