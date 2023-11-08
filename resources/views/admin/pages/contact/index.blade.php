@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
        
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Danh sách phản hồi</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý phản hồi</li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="dashborad-box">
                <div class="header-widget">
                    <form action="" class="row">
                        <div class="col-sm-3">
                            <input type="text" placeholder="Tên khách hàng" value="{{ Request::get('n') }}" name="n" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </form>

                </div>
                <div class="section-body listing-table">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>IP</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Nội dung</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact ?? [] as $item )
                                <tr>
                                    <td>{{$item->id}}</td> 
                                    <td>{{$item->ip_address}}</td>
                                    <td>{{$item->name}}</td> 
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->content}}</td>
                                    <td class="edit">{{$item->created_at}}</td>
                                    <td >
                                        <a href="#"><i class="fa-regular fa-pen-to-square " style="margin-right: 20px"></i></a>
                                        <a href="{{route('get_admin.contact.delete',$item->id)}}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pagination-container">
                    <nav>
                    {{$contact->links()}}
                    </nav>
                </div>
            </div>
        
            
            
        </div>
    </div>
</div>


@endsection