@extends('admin.layouts.app_master')
@section('content_admin')
<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Cập nhật địa điểm </h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý địa điểm</li>
                      <li class="breadcrumb-item active">Cập nhật</li>
                    </ol>
                  </div>
                </div>
            </div>

            <div class="dashborad-box mb-0 col-lg-6" style="margin:0 auto">
                <div class="section-inforamation">
                    <form method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tỉnh thành phố" value="{{old('name',$city->name ?? '')}}">
                                </div>
                            </div>
                        
                
                            </div>

                            <div class="col-sm-12">

                                <p  style="color: #333;display: inline-block;font-size: 15px;font-weight: 600;text-transform: capitalize;">
                                    Ảnh địa danh
                                </p>
                                <div class="">
                                    <img  class="image-bg" id="output1" src="{{ pare_url_file($city->avatar) }}" >
                                    <div>
                                        <input style="width:14%" class="input-file" name="avatar" id="avatar" type="file" accept="image/*" onchange="loadFile(event)" style="display: none">
                                                <script>
                                                var loadFile = function(event) {
                                                    var output = document.getElementById('output1');
                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                };
                                                </script>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="radio" name="hot" class="" placeholder="" value="1"  {{($city->hot ?? 0) == 1 ? "checked" : ""}}>
                                    <label>Nổi bật</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="hot" class="" placeholder="" value="0"   {{($city->hot ?? 0) == 0 ? "checked" : ""}}>
                                    <label>Không nổi bật</label>
                                </div>
                            </div>
                            
                        <button type="submit" class="btn btn-primary btn-lg mt-2 col-lg-12">Lưu dữ liệu</button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
</div>

@endsection