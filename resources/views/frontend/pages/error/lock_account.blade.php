@extends('frontend.pages.category.layouts_category.master_category')
@section('title', 'Không thể truy cập trang này')
@section('content_category')
<section class="properties-right list featured portfolio blog pt-4">
    <div class="container">
        <h1 style="font-size: 1.5rem; font-weight: bold;text-transform:none">Tài khoản của bạn không có quyền thực hiện thao tác này</h1>
        <p>Nếu bạn thấy rằng đây là lỗi, vui lòng liên hệ chúng tôi để được hỗ trợ, hotline: 0917686101</p>
        <a href="{{route('get.home')}}" class="button border" style=" width:130px!important;"> <i class="fa-solid fa-arrow-left" style="margin-right:5px"></i></i>Trang chủ</a>
    </div>
</section>

@endsection