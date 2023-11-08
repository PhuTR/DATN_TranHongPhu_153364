@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Thông tin quản trị viên </h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Hồ sơ</li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="col-8" style="margin:0 auto">
              <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                  <div class="box_header m-0">
                    <div class="main-title">
                      <h3 class="m-0">Thông tin quản trị viên</h3>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6" style="margin:0 auto">
                  <div class="card custom-card">
                    <div class="card-profile">
                      @if(empty($admin->avatar) || is_null($admin->avatar) || $admin->avatar == 'no-avatar.jpg')
                          <img   class="rounded-circle" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                      @else
                          <img   class="rounded-circle" id="output" src="{{ asset('uploads/avatars/' . $admin->avatar) }}">
                      @endif
                    </div>
                    <div class="text-center profile-details">
                      <h4>{{$admin->name}}</h4>
                      <h5><i class="fa-solid fa-envelope icon"></i>{{$admin->email}}</h5>
                      <h6><i class="fa-solid fa-phone icon"></i>{{$admin->phone}}</h6>
                    </div>
                  </div>
                </div>
                <div class="white_card_header">
                  <div class="box_header m-0">
                    <div class="main-title">
                      <h3 class="m-0">Đổi mật khẩu</h3>
                    </div>
                  </div>
                </div>
                <form name="contact_form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">  
                  @csrf
                  <div class="white_card_body">
                    <div class="row"> 
                        <div class="col-lg-6">
                          <div class="common_input mb_15">
                            <label for="area">Nhập mật khẩu cũ</label>
                            <input type="text" placeholder="" name="password"  value=""/>
                            @if ($errors->has('password'))
                                <span class="text-error" style="color: #FF385C">{{$errors->first('password')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="common_input mb_15">
                            <label for="area">Nhập mật khẩu mới</label>
                            <input type="text" placeholder="" name="password_new" value="" />
                            @if ($errors->has('password_new'))
                                <span class="text-error" style="color: #FF385C">{{$errors->first('password_new')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="common_input mb_15">
                              <label for="area">Nhập lại mật </label>
                              <input type="text" placeholder="" name="password_confirm" value="" />
                              @if ($errors->has('password_confirm'))
                                <span class="text-error" style="color: #FF385C">{{$errors->first('password_confirm')}}</span>
                              @endif
                            </div>
                          </div>
                        <div class="col-lg-6"></div>
                        <div class="col-6" style="margin: 0 auto">
                          <div class="create_report_btn mt_30">
                            <button type="submit" class="btn btn-primary rounded-pill mb-3 col-12">Cập nhật thông tin</button >
                          </div>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
        
    </div>
</div>
@endsection