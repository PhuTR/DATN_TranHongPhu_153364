@extends('admin.layouts.app_master')
@section('content_admin')
<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Thông tin thành viên </h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Thông tin</li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="col-12" style="margin:0 auto">
              <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                  <div class="box_header m-0">
                    <div class="main-title">
                      <h3 class="m-0">Thông tin thành viên</h3>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6" style="margin:0 auto">
                  <div class="card custom-card">
                    <div class="card-profile">
                        @if(empty($user->avatar) || is_null($user->avatar) || $user->avatar == 'no-avatar.jpg')
                            <img  style="width:150px"   class="rounded-circle" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                        @elseif( Str::startsWith($user->avatar, 'https'))
                            <img  style="width:150px"   class="rounded-circle" id="output" src="{{ ( $user->avatar) }}">
                        @else
                            <img  style="width:150px"   class="rounded-circle" id="output" src="{{ pare_url_file($user->avatar) }}">
                        @endif
                    </div>
                    <div class="text-center profile-details">
                      <h4>{{$user->name}}</h4>
                      <h5><i class="fa-solid fa-envelope icon"></i>{{$user->email}}</h5>
                      <h6><i class="fa-solid fa-phone icon"></i>{{$user->phone}}</h6>
                    </div>
                  </div>
                </div>
                <div class="white_card_header">
                  <div class="box_header m-0">
                    <div class="main-title">
                      <h3 class="m-0">Danh sách phòng đăng</h3>
                    </div>
                  </div>
                </div>
                <div class="white_card_body">
                    <div class="row"> 
                        <div class="noverly_inner ">
                            <div class="container-fluid p-0">
                                <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
                                        <div class="dashborad-box">
                                            <div class="section-body listing-table">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
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
                                                            @php
                                                                $firstImage = $item->images->first();
                                                            @endphp
                                                            <tr>
                                                                <td style="vertical-align: middle">{{$item->id}}</td>
                                                                <td>
                                                                  @if (empty($item->avatar) || is_null($item->avatar))
                                                                      @if ($firstImage && !is_null($firstImage->path))
                                                                          @if (Str::startsWith($firstImage->path, 'https'))
                                                                            <img src="{{($firstImage->path) }}" style="width:80px; height:80px; border-radius:0%" alt="">
                                                                           
                                                                          @else
                                                                          <img src="{{ pare_url_file($firstImage->path) }}" style="width:80px; height:80px; border-radius:0%" alt="">
                                                                          @endif
                                                                      @else
                                                                          <img src="{{ pare_url_file($item->avatar) }}" style="width:80px; height:80px; border-radius:0%" alt="">
                                                                        
                                                                      @endif
                                                                  @else
                                                                      <img src="{{ pare_url_file($item->avatar) }}" style="width:80px; height:80px; border-radius:0%" alt="">
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
                                                                        {{$item->full_address}}
                                                                    </p>   
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
                                            <div class="pagination-container">
                                                <nav>
                                                {{$rooms->links()}}
                                                </nav>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
              </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
