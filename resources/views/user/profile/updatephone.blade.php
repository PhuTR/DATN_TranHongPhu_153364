@extends('user.layouts.master_user')
@section('content_user')
<div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-33 mt-0 offset-lg-2 offset-md-3">
    @include('user.layouts.dashboard_navigationbar')
     <div class="widget-boxed-header">
         <h4>Thông tin cá nhân</h4>
     </div>
     <div class="sidebar-widget author-widget2">
         <div class="author-box clearfix">
            @if( Str::startsWith(Auth::user()->avatar, 'https'))
                <img   class="author__img" id="output" src="{{ Auth::user()->avatar }}">
            @else
                <img   class="author__img" id="output" src="{{ pare_url_file(Auth::user()->avatar) }}">
            @endif
             {{-- <img src="{{asset('images/testimonials/ts-1.jpg')}}" alt="author-image" class="author__img"> --}}
             <h4 class="author__title" >{{$user->name}}</h4>
             <p class="author__meta">#{{$user->id}}</p>
         </div>
         <ul class="author__contact">
             <li><span class="la la-map-marker"><i class="fa-brands fa-facebook"></i></span><a href="{{$user->facabook}}" target="_blank">{{$user->facabook}}</a></li>
             <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:{{$user->phone}}" target="_blank">{{$user->phone}}</a></li>
             <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:{{$user->email}}" target="_blank">{{$user->email}}</a></li>
         </ul>
         <div class="agent-contact-form-sidebar">
             <h4>Đổi số điện thoại</h4>
             <form name="contact_form" action="" method="POST" autocomplete="off">
                @csrf
                <label for="area">Số điện thoại cũ</label>
                <input type="text" id="fname" name="phone"  disabled value="{{$user->phone}}" />
                <label for="area">Số điện thoại mới</label>
                 <input type="text" id="phone_new" name="phone_new"/>
                 @if ($errors->first('phone_new'))
                    <span class="text-error" style="color: #FF385C">{{$errors->first('phone_new')}}</span>
                 @endif
                 <br/>
                 {{-- <a href="{{route('resendOtp')}}" >Lấy mã xác thực</a> --}}
                 <a href="javascript:;void(0)" class="js-get-code-phone" id="thelink" >Lấy mã xác thực</a>

                 <br />
                 <label for="area" style="font-style:italic; font-family:Arial, Helvetica, sans-serif">Mã xác thực sẽ gửi về số điện thoại / email mới của bạn</label>
                 <br/>
                 <label for="area">Mã xác thực</label>
                 <input type="text" id="pnumber" name="code"  value="{{$user->code}}" />  
                 @if ($errors->first('code'))
                    <span class="text-error" style="color: #FF385C">{{$errors->first('code')}}</span>
                 @endif               
                 <input type="submit"  class="multiple-send-message" value="Lưu và cập nhật" />
             </form>
         </div>
     </div>
 </div>
</div>

<script>
    $('#thelink').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
 
        let $phoneNew = $('#phone_new').val();
 
        if ($phoneNew.length !== 10) {
            toastr.error('Số điện thoại không hợp lệ!', 'Thất bại', { positionClass: 'toast-bottom-right' });
        } else {
         $.ajax({
                 url: '{{ route('post_user.send_code') }}', 
                 type: 'POST',
                 dataType: 'json',
                 data: {
                     _token: $('meta[name="csrf-token"]').attr('content'), 
                 },
                 success: function(data) {
 
                 },
                 error: function(xhr, textStatus, errorThrown) {
        
                 }
             });
            toastr.success('Mã xác thực đã gửi về số điện thoại hoặc email của bạn!', 'Thành công', { positionClass: 'toast-bottom-right' });
        }
    });
    
 </script>

@endsection