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
  
            {{-- <div class="sidebar-widget author-widget2">
                <div class="author-box clearfix">
                    @if(empty(Auth::guard('admins')->user()->avatar) || is_null(Auth::guard('admins')->user()->avatar) || Auth::guard('admins')->user()->avatar == 'no-avatar.jpg')
                        <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                    @else
                        <img  class="author__img" id="output" src="../uploads/avatars/{{ $admin->avatar }}">
                    @endif
                    <h4 class="author__title" >{{$admin->name}}</h4>
                    <p class="author__meta">#{{$admin->id}}</p>
                </div>
                <ul class="author__contact">
                    <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:{{$admin->phone}}" target="_blank">{{$admin->phone}}</a></li>
                    <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:{{$admin->email}}" target="_blank">{{$admin->email}}</a></li>
                </ul>
                <div class="agent-contact-form-sidebar">
                    <h4>Cập nhật thông tin </h4>
                    <form name="contact_form" action="{{route('get_admin.profile.edit')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <label for="area">Mã quản trị viên</label>
                        <input type="text" id="fname" name="id"  disabled value="#{{$admin->id}}" />
                        <label for="area">Tên hiển thị</label>
                        <input type="text" id="fname" name="name"  required value="{{$admin->name}}" />
                        <label for="area">Số Zalo</label>
                        <input type="text" id="pnumber" name="phone" disabled value="{{$admin->phone}}" />
                        <a href="{{route('get_user.profile.update_phone')}}">Đổi số điện thoại</a>
                        <br />
                        <br/>
                        <label for="area">Email</label>
                        <input type="email" id="emailid" name="email"  required value="{{$admin->email}}" />
                        
                        <div style="margin-top: 2%;margin-bottom: 2%;">
                            <label for="area">Mật khẩu</label>
                            <a href="{{route('get_user.profile.update_password')}}" style="margin-left:10%">Đổi mật khẩu</a>
                        </div>
                        <label for="area">Ảnh đại diện</label>
                        <div class="" style="margin-left: 17%;margin-top:-3%">
                            @if(empty(Auth::guard('admins')->user()->avatar) || is_null(Auth::guard('admins')->user()->avatar) || Auth::guard('admins')->user()->avatar == 'no-avatar.jpg')
                                <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                            @else
                                <img  class="author__img" id="output" src="../uploads/avatars/{{ $admin->avatar }}">
                            @endif

                            <div>
                                <input style="width:14%" class="input-file" name="avatar" id="avatar" type="file" accept="image/*" onchange="loadFile(event)" style="display: none">
                                        <script>
                                        var loadFile = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                        </script> 
                                <input style="width:14%" class="input-file" name="avatar" type="file" value="Chọn ảnh" multiple>
                            </div>
                        </div>
                        <input type="submit"  class="multiple-send-message" value="Lưu và cập nhật" />
                    </form>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                  <div class="card custom-card">
                    <div class="card-header">
                      <img class="img-fluid" src="{{asset('asset_admin/img/profilebox/1.jpg')}}" alt data-original-title  title/>
                    </div>
                    <div class="card-profile">
                      <img class="rounded-circle" src="img/profilebox/7.jpg" alt  data-original-title title  />
                    </div>
                    {{-- <ul class="card-social">
                      <li>
                        <a href="#" data-original-title title
                          ><i class="fab fa-facebook-f"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" data-original-title title
                          ><i class="fab fa-google-plus-g"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" data-original-title title
                          ><i class="fab fa-twitter"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" data-original-title title
                          ><i class="fab fa-instagram"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" data-original-title title
                          ><i class="fas fa-rss"></i
                        ></a>
                      </li>
                    </ul> --}}
                    <div class="text-center profile-details">
                      <h4>{{$admin->name}}</h4>
                      <h6>Manager</h6>
                    </div>
                    <div class="card-footer row">
                      <div class="col-4 col-sm-4">
                        <h6>Follower</h6>
                        <h3 >9564</h3>
                      </div>
                      <div class="col-4 col-sm-4">
                        <h6>Following</h6>
                        <h3><span >49</span>K</h3>
                      </div>
                      <div class="col-4 col-sm-4">
                        <h6>Total Post</h6>
                        <h3><span >96</span>M</h3>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
