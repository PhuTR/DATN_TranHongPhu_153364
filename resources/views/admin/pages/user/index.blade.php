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
                            &nbsp;/&nbsp; <span>Danh sách thành viên</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <div class="dashborad-box">
         <h4 class="title">Danh sách thành viên</h4>
         {{-- <div class="header-widget">
             <a href="{{route('get_admin.category.create')}}" class="btn-admin" ><i class="fa-solid fa-circle-plus"></i>Thêm mới</a>
         </div> --}}
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
                           
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($user ?? [] as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                                    <img   style="width:60px; height:60px; border-radius:50%" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                                @else
                                    <img src="{{ asset('uploads/avatars/' . $item->avatar) }}" style="width:60px; height:60px; border-radius:50%" alt="">
                                @endif
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td class="edit">{{$item->created_at}}</td>
                            <td ><a href="#"><i class="fa-solid fa-eye-slash"></i></a></td>
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


@endsection