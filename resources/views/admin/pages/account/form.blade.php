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
                      @if(isset($all_column_roles))
                      <h3 class="m-0">Thông tin {{$all_column_roles->name}}</h3>
                      @else
                      <h3 class="m-0">Thông tin quản trị viên</h3>
                      @endif
                    </div>
                  </div>
                </div>
                <form name="contact_form"  method="POST" autocomplete="off" enctype="multipart/form-data">  
                  @csrf
                  <div class="white_card_body">
                    <div class="row"> 
                        <div class="col-lg-6">
                          <div class="common_input mb_15">
                            <label for="area">Tên hiển thị</label>
                            <input type="text" placeholder="Tên hiển thị" name="name" value="{{$admin->name ??''}}" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="common_input mb_15">
                            <label for="area">Số điện thoại</label>
                            <input type="text" placeholder="Số điện thoại" value="{{$admin->phone ??''}}" name="phone" />
                            
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="common_input mb_15 ">
                            <label for="area">Email</label>
                            <input type="text" placeholder="Email" value="{{$admin->email ??''}}" name="email" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="common_input mb_15 position-relative">
                            <label for="area">Mật khẩu:</label>
                            <input id="password" type="password" placeholder="password" value="" name="password" />
                            <i id="togglePassword" class="fa-solid fa-eye-slash position-absolute" style="top:39px; right:12px;cursor: pointer;"></i>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-row">
                            <div class="form-group col-md-6 col-sm-6">
                                <label for="password">Cấp quyền</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple>
                                  @foreach ($roles as $role)
                                      @if (isset($admin))
                                        <option value="{{ $role->name }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                      @else
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                      @endif
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label for="username">Admin Username</label>
                                @if (isset($admin))
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required value="{{ $admin->username }}">

                                @else
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required value="">

                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="common_input mb_15">
                            <label for="area">Ảnh đại diện</label>
                            @if (isset($admin->avatar))
                            <div class="row" style="margin-bottom: 15px;display: flex">
          
                                <div class="col-sm-2" style="margin-right: 10px;">
                                    <a href="" style="display: block;">
                                        <img src="{{ pare_url_file($admin->avatar) }}" style="width: 300px;height: auto">
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
                            <button type="submit" class="btn btn-primary rounded-pill mb-3 col-12">Lưu thông tin thông tin</button >
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
<script>
    $(document).ready(function() {
        const $togglePassword = $('#togglePassword');
        const $password = $('#password');

        $togglePassword.on('click', function() {
          // Toggle the type attribute using prop() method
          const type = $password.prop('type') === 'password' ? 'text' : 'password';
          $password.prop('type', type);
          $(this).toggleClass('fa-eye');
        });
    });
</script>
@endsection
