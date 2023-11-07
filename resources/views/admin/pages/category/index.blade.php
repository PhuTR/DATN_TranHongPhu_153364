@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
        
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Danh sách danh mục</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý danh mục</li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="dashborad-box">
                <div class=" btn-admin">
                    <a href="{{route('get_admin.category.create')}}" class="text-white" ><i class="fa-solid fa-circle-plus icon"></i>Thêm mới</a>
                </div>
                <div class="section-body listing-table">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th>Tiêu đề</th>
                                    <th>Ngày tạo</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories ?? [] as $item )
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td class="edit">
                                        @if($item->status == 1)
                                            <span style="color: #FF385C">hiển thị</span>
                                        @else
                                            <span>Không hiển thị</span>
                                        @endif
                                    </td>
                                    <td>{{$item->title}}</td>
                                    <td class="edit">{{$item->created_at}}</td>
                                    <td ><a href="{{route('get_admin.category.edit_category',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pagination-container">
                    <nav>
                    {{$categories->links()}}
                    </nav>
                </div>
            </div>
        
            
            
        </div>
    </div>
</div>


@endsection