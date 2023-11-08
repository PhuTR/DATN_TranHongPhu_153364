@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Tạo mới tin tức </h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">
                        <a href="{{route('get_admin.article.index')}}">Quản lý tin tức</a>
                      </li>
                      <li class="breadcrumb-item active">Tạo mới tin tức</li>
                    </ol>
                  </div>
                </div>
            </div>
   
            @include('admin.pages.article.form')
               
        </div>
    </div>
</div>


@endsection