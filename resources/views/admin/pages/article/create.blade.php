@extends('admin.layouts.app_master')
@section('content_admin')

<div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
  
    <section class="headings-2 pt-0 pb-0">
        <div class="pro-wrapper">
            <div class="detail-wrapper-body">
                <div class="listing-title-bar">
                    <div class="text-heading text-left">
                        <p>
                            <a href="{{route('get.home')}}">Trang chủ  </a> &nbsp;/&nbsp; <span>Quản lý</span>
                            &nbsp;/&nbsp; <span>Tạo mới tin tức</span>
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
    
     <div class="dashborad-box">
         
         @include('admin.pages.article.form')
     
         
     </div>
   
     
    
 </div>


@endsection