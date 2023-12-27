@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
        
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Danh sách</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý tài khoản</li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="dashborad-box">
                <div class=" btn-admin">
                    <a href="{{route('get_admin.account.create')}}" class="text-white" ><i class="fa-solid fa-circle-plus icon"></i>Thêm mới</a>
                </div>
                <div class="section-body listing-table">
                    <div class="table-responsive">
                        <table id="example"  class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Hình ảnh</th>
                                    <th>Họ Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Role</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Tuỳ chọn</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins ?? [] as $item )
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>
                                        <img  style="width:60px; height:60px; border-radius:50%" id="output" src="{{ pare_url_file($item->avatar) }}">
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>
                                        @foreach ($item->roles as $role )
                                            <span style="background: green; color: #fff;  padding: 3px 10px;border-radius: 8px;">{{$role->name}}</span>
                                        @endforeach
                                    </td>
                                    <td class="edit">
                                        @if($item->status == 1)
                                            <span style="background: green; color: #fff;  padding: 3px 10px;border-radius: 8px;">Hoạt động</span>
                                        @else
                                        <span style="background: #FF385C; color: #fff;  padding: 3px 10px;border-radius: 8px;">Tạm dừng</span>
                                        @endif
                                    </td>
                                    <td class="edit">{{$item->created_at}}</td>
                                    <td >
                                        <a href="{{route('get_admin.account.update',$item->id)}}" style="margin-right: 20px"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{route('get_admin.account.delete',$item->id)}}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="pagination-container">
                    <nav>
                    {{$admins->links()}}
                    </nav>
                </div> --}}
            </div>
        
            
            
        </div>
    </div>
</div>


@endsection