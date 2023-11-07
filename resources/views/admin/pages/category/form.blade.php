@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Cập nhật </h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý danh mục</li>
                      <li class="breadcrumb-item active">Cập nhật</li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="dashborad-box mb-0 " style="margin: 0 auto">
                <div class="section-inforamation">
                    <form method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên danh mục" value="{{old('name',$categries->name ?? '')}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" name="title" class="form-control" placeholder="Tiêu đề" value="{{old('name',$categries->title ?? '')}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <input type="text" name="description" class="form-control" placeholder="Mô tả" value="{{old('name',$categries->description ?? '')}}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="radio" name="status" class="" placeholder="" value="1"  {{($categries->status ?? 0) == 1 ? "checked" : ""}}>
                                    <label>Hiển thị</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="status" class="" placeholder="" value="0"   {{($categries->status ?? 0) == 0 ? "checked" : ""}}>
                                    <label>Không hiển thị</label>
                                </div>
                            </div>
                            
                        <button type="submit" class="btn btn-primary btn-lg mt-2 col-lg-4" style="margin:0 auto">Lưu dữ liệu</button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
</div>

@endsection