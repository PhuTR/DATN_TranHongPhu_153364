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
            <div class="row">
                <div class="col-12">
                  <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                      <div class="box_header m-0">
                        <div class="main-title">
                          <h3 class="m-0">Thêm mới</h3>
                        </div>
                      </div>
                    </div>
                    <form method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="white_card_body">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="common_input mb_15">
                                <input name="name" type="text" placeholder="Tên..." value="{{old('name',$permissions->name ?? '')}}"/>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <select name="type" class="nice_Select2 nice_Select_line wide" style="display: none" >
                                @foreach ($groups as $key => $item)
                                    <option value="{{$key}}" {{$key == ($permissions->type ?? 0) ? "selected" : ""}}>{{$item}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-12">
                            <div class="create_report_btn mt_30">
                                <button type="submit" class="col-6 btn_1 radius_btn d-block text-center" style="margin:0 auto">Lưu dữ liệu</button>
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
</div>

@endsection