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
                            &nbsp;/&nbsp; <span>Danh sách địa điểm</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
     <div class="dashborad-box">
         <h4 class="title">Danh sách địa điểm </h4>
         <div class="header-widget">
            <form action="" class="row">
                <div class="col-sm-3">
                    <input type="text" placeholder="Tên địa điểm" value="{{ Request::get('n') }}" name="n" class="form-control">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>

        </div>
         <div class="btn-admin">
             <a href="{{route('get_admin.location.create')}}"  ><i class="fa-solid fa-circle-plus icon"></i>Thêm mới</a>
         </div>
         <div class="section-body listing-table">
             <div class="table-responsive">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Tên</th>
                             <th>Phân loại</th>
                             <th>Trạng thái</th>
                             <th>Nổi bật</th>
                             <th>Ngày tạo</th>
                           
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($locations ?? [] as $item )
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td class="rating"><span>{{$item->getType($item->type)}}</span></td>
                            <td class="status"><span style="color:#1CA345">Active</span></td>
                            <td class="edit">
                                @if($item->hot == 1)
                                    <span style="color: #FF385C">Nổi bật</span>
                                @else
                                    <span>Mặc định</span>
                                @endif
                            </td>
                            <td class="edit">{{$item->created_at}}</td>
                            <td ><a href="{{route('get_admin.location.update',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            {{-- <td><a href="{{route('get_admin.location.delete',$item->id)}}"><i class="fa-solid fa-trash-can"></i></a></td> --}}
                        </tr>
                        @endforeach
                        
                       
                     </tbody>
                 </table>
             </div>
         </div>
         <div class="pagination-container">
            <nav>
              {{$locations->links()}}
            </nav>
        </div>
     </div>
   
     
    
 </div>


@endsection