@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Danh sách tin đăng</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý bài đăng</li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="dashborad-box">
                <div class="section-body listing-table">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Hình ảnh</th>
                                    <th>Thông tin</th>
                                    <th>Danh mục</th>
                                    <th>Giá phòng</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Trạng thái</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms ?? [] as $item )
                                <tr>
                                    @php
                                        $firstImage = $item->images->first();
                                    @endphp
                                    {{-- <td style="vertical-align: middle">{{$item->id}}</td> --}}
                                    <td>{{$loop->index+1}}</td>
                                    <td>
                                        @if (empty($item->avatar) || is_null($item->avatar))
                                            @if ($firstImage && !is_null($firstImage->path))
                                                @if (Str::startsWith($firstImage->path, 'https'))
                                                <img  style="width:80px; height:80px; border-radius:50%" alt="" src="{{ ($firstImage->path) }}">
                                                @else
                                                    <img  style="width:80px; height:80px; border-radius:50%" alt="" src="{{ pare_url_file($firstImage->path) }}">
                                                @endif
                                            @else
                                                <img  style="width:80px; height:80px; border-radius:50%" alt="" src="{{ pare_url_file($item->avatar) }}">
                                            @endif
                                        @else
                                            <img  style="width:80px; height:80px; border-radius:50%" alt="" src="{{ pare_url_file($item->avatar) }}">
                                        @endif
                        
                                    </td>
                                    <td style="vertical-align: middle; width:40%">
                                        <a href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}" target="_blank"
                                            style="color: #007aff;text-decoration: none">
                                            @if ($item->service_hot > 0)
                                            @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                                                <span style="color: #fed553" class="fa fa-star"></span>
                                            @endfor
                                            @endif
                                                {{ $item->name }}
                                        </a>
                                        <p style="font-size: 14px;font-weight: 400;color: #212121;text-decoration: none;margin-bottom: 5px">
                                            <i class="fa-solid fa-location-dot"></i>
                                            
                                            @if (isset($item->wards))
                                            <span>{{ $item->wards->name ?? "" }} - </span>
                                            @endif
                                            @if (isset($item->district))
                                            <span>{{ $item->district->name }} - </span>
                                            @endif
                                            @if (isset($item->city))
                                            <span>{{ $item->city->name ?? "" }}  </span>
                                            @endif
                                        </p>
                                        <p style="margin-bottom: 2px">
                                            @if ($item->status != \App\Models\Room::STATUS_ACTIVE)
                                            <a href="{{ route('get_admin.room.success', $item->id) }}" class="text-success"
                                                style="margin-right:8px; font-size: 13px;text-decoration: none;font-weight: 500"><i class="fa fa-refresh"></i>
                                                Duyệt</a>
                                            <a href="{{ route('get_admin.room.expires', $item->id) }}" class="text-warning"
                                                style="margin-right:8px; font-size: 13px;text-decoration: none;font-weight: 500"><i
                                                    class="fa fa-credit-card"></i> Hết hạn</a>
                                            @endif
                                            @if ($item->status == \App\Models\Room::STATUS_ACTIVE)
                                            <a href="{{ route('get_admin.room.hide', $item->id) }}" class="text-secondary"
                                                style="margin-right:8px; font-size: 13px;text-decoration: none"> <i class="fa fa-eye-slash"></i> Ẩn tin</a>
                                            @endif
                                            <a href="{{ route('get_admin.room.delete', $item->id) }}" class="text-danger"
                                                style="margin-right:8px; font-size: 13px;text-decoration: none;font-weight: 500"> <i
                                                    class="fa fa-trash"></i> Delete</a>
                                        </p>
                                        @if ($item->status == \App\Models\Room::STATUS_CANCEL)
                                        <p style="margin-bottom: 2px;font-size: 12px"><i class="text-danger">{{ $item->lydo }}</i></p>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle">{{$item->category->name}}</td>                          
                                    <td style="vertical-align: middle">{{number_format($item->price ?? 0,0,',','.') ?? 0}} đ</td>
                                    <td style="vertical-align: middle">
                                        {{$item->time_start}}
                                    </td>
                                    <td style="vertical-align: middle">
                                        {{$item->time_stop}}
                                    </td>
                                    <td style="vertical-align: middle">
                                        <span class="{{ $item->getStatus($item->trangthai)['class'] ?? '...' }}">{{ $item->getStatus($item->trangthai)['name'] ?? "..." }}</span> 
                                    
                                    </td>
                                    
                                </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="pagination-container">
                    <nav>
                    {{$rooms->links()}}
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>
</div>


@endsection