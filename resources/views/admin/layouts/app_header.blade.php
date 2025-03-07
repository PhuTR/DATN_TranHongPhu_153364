        <div class="container-fluid g-0">
            <div class="row">
              <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center">
                  <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                  </div>
                  <div class="line_icon open_miniSide d-none d-lg-block">
                    <img src="{{asset('asset_admin/img/line_img.png')}}" alt />
                  </div>
                
                  <div class="header_right d-flex justify-content-between align-items-center" >
                    <div class="header_notification_warp d-flex align-items-center">
                      <li>
                        <a class="bell_notification_clicker" href="#">
                          <img src="{{asset('asset_admin/img/icon/bell.svg')}}" alt />
                          <span>2</span>
                        </a>
    
                        <div class="Menu_NOtification_Wrap">
                          <div class="notification_Header">
                            <h4>Thông báo</h4>
                          </div>
                          <div class="Notification_body">
                            <div class="single_notify d-flex align-items-center">
                              <div class="notify_thumb">
                                <a href="#"><img src="" alt /></a>
                              </div>
                              <div class="notify_content">
                                <a href="#"><h5>Cool Marketing</h5></a>
                                <p>Lorem ipsum dolor sit amet</p>
                              </div>
                            </div>
                          </div>
                          <div class="nofity_footer">
                            <div class="submit_button text-center pt_20">
                              <a href="#" class="btn_1">Xem thêm</a>
                            </div>
                          </div>
                        </div>
                      </li>
                    </div>
                    <div class="profile_info">
                      <img src="{{ pare_url_file(Auth::guard('admins')->user()->avatar) }}" alt="#" />
                      <div class="profile_info_iner">
                        <div class="profile_author_name">
                          <p>Quản trị viên</p>
                          <h5>{{Auth::guard('admins')->user()->name}}</h5>
                        </div>
                        <div class="profile_info_details">
                          <a href="{{route('get_admin.profile.index')}}">Hồ sơ</a>
                          <a href="{{route('get_admin.profile.update_password')}}">Đổi mật khẩu</a>
                          <a href="{{route('get_admin.logout')}}">Đăng xuất </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>