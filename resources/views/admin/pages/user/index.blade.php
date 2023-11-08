@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
        
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Danh sách thành viên</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý thành viên</li>
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
                                    <th>avatar</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày tạo</th>
                                    <th>Tuỳ chọn</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user ?? [] as $item )
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        <img src="{{  pare_url_file($item->avatar) }}" style="width:60px; height:60px; border-radius:50%" alt="">

                                    </td>
                                    <td>
                                        {{$item->name}}
                                        <p style="margin-bottom: 2px">
                                            @if ($item->status != \App\Models\User::STATUS_ACTIVE)
                                            <a href="{{ route('get_admin.room.expires', $item->id) }}" class="text-warning"
                                                style="margin-right:8px; font-size: 13px;text-decoration: none;font-weight: 500"><i
                                                    class="fa fa-credit-card"></i> Khoá tài khoản</a>
                                            @endif
                                            @if ($item->status == \App\Models\User::STATUS_ACTIVE)
                                            <a href="{{ route('get_admin.room.hide', $item->id) }}" class="text-secondary"
                                                style="margin-right:8px; font-size: 13px;text-decoration: none"> <i class="fa-solid fa-unlock-keyhole"></i> Mở khoá</a>
                                            @endif
                                            <a href="{{ route('get_admin.user.delete', $item->id) }}" class="text-danger"
                                                style="margin-right:8px; font-size: 13px;text-decoration: none;font-weight: 500"> <i
                                                    class="fa fa-trash"></i> Xoá</a>
                                        </p>
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td class="edit">{{$item->created_at}}</td>
                                    <td >
                                        <span class="{{ $item->getStatus($item->trangthai)['class'] ?? '...' }}">{{ $item->getStatus($item->trangthai)['name'] ?? "..." }}</span> 
                                    </td>
                                </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pagination-container">
                    <nav>
                    {{$user->links()}}
                    </nav>
                </div>
            </div>
        
            
            
        </div>
    </div>
</div>


@endsection