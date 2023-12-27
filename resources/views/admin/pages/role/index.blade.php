@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
        
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Danh sách </h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý quyền</li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="dashborad-box">
                <div class=" btn-admin">
                    <a href="{{route('get_admin.role.create')}}" class="text-white" ><i class="fa-solid fa-circle-plus icon"></i>Thêm mới</a>
                </div>
                <div class="section-body listing-table">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Tên</th>
                                    <th>Quyền</th>
                                    <th>Ngày tạo</th>
                                    <td>Tuỳ chọn</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles ?? [] as $item )
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td style="width:50%; line-height: 2" >
                                        @foreach ($item->permissions as $permission )
                                            <span style="background: green; color: #fff;  padding: 3px 10px;border-radius: 8px;">{{$permission->name}}</span>
                                        @endforeach
                                    </td>
                                    <td class="edit">{{$item->created_at}}</td>
                                    <td >
                                        <a href="{{route('get_admin.role.update',$item->id)}}" style="margin-right: 20px"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{route('get_admin.role.delete',$item->id)}}"><i class="fa-solid fa-trash"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            
            
        </div>
    </div>
</div>


@endsection