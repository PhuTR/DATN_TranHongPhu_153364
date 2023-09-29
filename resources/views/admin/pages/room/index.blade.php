@extends('admin.layouts.app_master')
@section('content_admin')


<div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
  
    <section class="headings-2 pt-0 pb-0">
        <div class="pro-wrapper">
            <div class="detail-wrapper-body">
                <div class="listing-title-bar">
                    <div class="text-heading text-left">
                        <p>
                            <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <span>Quản lý</span>
                            &nbsp;/&nbsp; <span>Danh sách tin đăng</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <div class="dashborad-box">
         <h4 class="title">Danh sách tin đăng </h4>
         {{-- <div class="header-widget">
             <a href="{{route('get_admin.category.create')}}" class="btn-admin" ><i class="fa-solid fa-circle-plus"></i>Thêm mới</a>
         </div> --}}
         <div class="section-body listing-table">
             <div class="table-responsive">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Hình ảnh</th>
                             <th>Tiêu đề</th>
                             <th>Danh mục</th>
                             <th>Giá phòng</th>
                             <th>Trạng thái</th>
                             <th>Thao tác</th>
                           
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($rooms ?? [] as $item )
                        <tr>
                            <td style="vertical-align: middle">{{$item->id}}</td>
                            <td>
                                @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                                    <img   style="width:80px; height:80px; border-radius:50%" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                                @else
                                    <img src="{{ asset('uploads/avatars/' . $item->avatar) }}" style="width:80px; height:80px; border-radius:50%" alt="">
                                @endif
                            </td>
                            <td style="vertical-align: middle">{{$item->name}}</td>
                            <td style="vertical-align: middle">{{$item->category->name}}</td>                          
                            <td style="vertical-align: middle">{{number_format($item->price ?? 0,0,',','.') ?? 0}}</td>
                            <td style="vertical-align: middle">
                                @if($item->status == 1)
                                <span  style="color:#1CA345">Đã kiểm duyệt</span>
                            @else
                                <span  style="color: #FFC001">Chờ kiểm duyệt</span>
                            @endif   
                            
                            </td>
                            <td style="vertical-align: middle">
                                <div class="user-menu" style="margin-left: 0;padding-left:15%;padding-right:0; top:0">
                                    <div class="">
                                        <i class="fa-solid fa-list-ul"></i>
                                    </div>
                                    <ul style="top:25px">
                                        @if ($item->status==1)
                                             <li><a style="color: #FFC001" href="{{route('get_admin.room.unapprove',$item->id)}}"> Bỏ kiểm duyệt</a></li>
                                        @else
                                            <li><a style="color:#1CA345" href="{{route('get_admin.room.approve',$item->id)}}"> Kiểm duyệt</a></li>
                                        @endif
                                     
                                        <li><a style="color: #DE3F44" href="{{route('get_admin.room.delete',$item->id)}}'">  Xoá</a></li>
                                      
                                    </ul>
                                </div>
                            </td>
                            {{-- <td ><a href="{{route('get_admin.category.edit_category',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td> --}}
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


@endsection