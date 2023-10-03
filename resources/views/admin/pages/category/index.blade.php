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
                            &nbsp;/&nbsp; <span>Danh sách danh mục</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <div class="dashborad-box">
        
         <h4 class="title">Danh sách danh mục </h4>
         <div class="header-widget">
            <form action="" class="row">
                <div class="col-sm-3">
                    <input type="text" placeholder="Tên danh mục" value="{{ Request::get('n') }}" name="n" class="form-control">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>

        </div>
         <div class=" btn-admin">
             <a href="{{route('get_admin.category.create')}}" class="" ><i class="fa-solid fa-circle-plus icon"></i>Thêm mới</a>
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


@endsection