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
                            &nbsp;/&nbsp; <span>Danh sách tin tức</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <div class="dashborad-box">
         <h4 class="title">Danh sách tin tức</h4>
         <div class="header-widget">
            <form action="" class="row">
                <div class="col-sm-3">
                    <input type="text" placeholder="name" value="{{ Request::get('n') }}" name="n" class="form-control">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>

        </div>
        <div class="btn-admin">
            <a href="{{route('get_admin.article.create')}}"  ><i class="fa-solid fa-circle-plus icon"></i>Thêm mới</a>
        </div>
         <div class="section-body listing-table">
             <div class="table-responsive">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Hình ảnh</th>
                             <th>Tiêu đề</th>
                             <th>Mô tả</th> 
                             <th>Ngày tạo</th>
                             <th>Tuỳ chọn</th>
                           
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($articles ?? [] as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                @if(empty($item->avatar) || is_null($item->avatar) || $item->avatar == 'no-avatar.jpg')
                                    <img   style="width:100px; height:100px; border-radius:4px" id="output1" src="{{ asset('images/no-avatar.jpg') }}">
                                @else
                                    <img src="{{ asset('uploads/avatars/' . $item->avatar) }}" style="width:100px; height:100px; border-radius:4px" alt="">
                                @endif
                            </td>
                        
                            <td>{{$item->name}}</td>
                            <td style="max-width:400px">{{$item->description}}</td>
                            <td class="edit">{{$item->created_at}}</td>
                            <td >
                                <a href="{{route('get_admin.article.edit',$item->id)}}"><i class="fa-regular fa-pen-to-square " style="margin-right: 20px"></i></a>
                                <a href="{{route('get_admin.article.delete',$item->id)}}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        
                       
                     </tbody>
                 </table>
             </div>
         </div>
         <div class="pagination-container">
            <nav>
              {{$articles->links()}}
            </nav>
        </div>
     </div>
   
     
    
 </div>


@endsection