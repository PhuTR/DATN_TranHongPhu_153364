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
                          <img style="width:150px"   class="rounded-circle" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                      @else
                          <img  style="width:150px"    class="rounded-circle" id="output" src="{{ asset('uploads/avatars/' . $admin->avatar) }}">
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
                      <h3 class="m-0">Cập nhật thông tin quản trị viên</h3>
                    </div>
                  </div>
                </div>
                <form name="contact_form" action="{{route('get_admin.profile.edit')}}" method="POST" autocomplete="off" enctype="multipart/form-data">  
                  @csrf
                  <div class="white_card_body">
                    <div class="row"> 
                        <div class="col-lg-6">
                          <div class="common_input mb_15">
                            <label for="area">Mã quản trị viên</label>
                            <input type="text" placeholder="id" name="id" value="#{{$admin->id}}"/>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="common_input mb_15">
                            <label for="area">Tên hiển thị</label>
                            <input type="text" placeholder="Tên hiển thị" name="name" value="{{$admin->name}}" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="common_input mb_15">
                            <label for="area">Số điện thoại</label>
                            <input type="text" placeholder="Số điện thoại" value="{{$admin->phone}}" name="phone" disabled/>
                            <a href="{{route('get_admin.profile.update_phone')}}">Đổi số điện thoại</a>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="common_input mb_15">
                            <label for="area">Email</label>
                            <input type="text" placeholder="Email" value="{{$admin->email}}" name="email" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="common_input mb_15">
                            <label for="area">Mật khẩu:</label>
                            <a href="{{route('get_admin.profile.update_password')}}" style="margin-left:10%">Đổi mật khẩu</a>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="common_input mb_15">
                            <label for="area">Ảnh đại diện</label>
                            @if (isset($admin->avatar))
                            <div class="row" style="margin-bottom: 15px;display: flex">
                              
                                <div class="col-sm-2" style="margin-right: 10px;">
                                    <a href="" style="display: block;">
                                        <img src="{{ asset('uploads/avatars/' . $admin->avatar) }}" style="width: 300px;height: auto">
                                    </a>
                                </div>
                
                            </div>
                            @endif
                            <div class="file-loading">
                              <input id="file-5" type="file" class="file" name="avatar"  multiple data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                            </div>
                          </div>
                        </div>
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
<script type="text/javascript">
  $('#file-5').fileinput({
    theme: 'fa',
    language: 'vi',
    showUpload: false,
    allowedFileExtensions: ['jpg', 'png', 'gif']
  });
</script>
@endsection
