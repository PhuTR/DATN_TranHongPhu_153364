@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-33 mt-0 offset-lg-2 offset-md-3">
   @include('user.layouts.dashboard_navigationbar')
     <div class="widget-boxed-header">
         <h4>Thông tin cá nhân</h4>
     </div>
     <div class="sidebar-widget author-widget2">
         <div class="author-box clearfix">
            @if(empty(Auth::user()->avatar) || is_null(Auth::user()->avatar) || Auth::user()->avatar == 'no-avatar.jpg')
                <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
            @elseif( Str::startsWith(Auth::user()->avatar, 'avatar'))
                <img  class="author__img" id="output" src="{{ asset('uploads/avatars/' . Auth::user()->avatar) }}">
            @else
                <img  class="author__img" id="output" src="{{ Auth::user()->avatar }}">
            @endif
             <h4 class="author__title" >{{$user->name}}</h4>
             <p class="author__meta">#{{$user->id}}</p>
         </div>
         <ul class="author__contact">
            <li><span class="la la-map-marker"><i class="fa-brands fa-facebook"></i></span><a href="{{$user->facabook}}" target="_blank">{{$user->facabook}}</a></li>
            <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:{{$user->phone}}" target="_blank">{{$user->phone}}</a></li>
             <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:{{$user->email}}" target="_blank">{{$user->email}}</a></li>
         </ul>
         <div class="agent-contact-form-sidebar">
             <h4>Cập nhật thông tin cá nhân</h4>
             <form name="contact_form" action="{{route('get_user.profile.edit')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <label for="area">Mã thành viên</label>
                <input type="text" id="fname" name="id"  disabled value="#{{$user->id}}" />
                <label for="area">Tên hiển thị</label>
                 <input type="text" id="fname" name="name"  required value="{{$user->name}}" />
                 <label for="area">Số Zalo</label>
                 <input type="text" id="pnumber" name="phone" disabled value="{{$user->phone}}" />
                 <a href="{{route('get_user.profile.update_phone')}}">Đổi số điện thoại</a>
                 <br />
                 <br/>
                 <label for="area">Email</label>
                 <input type="email" id="emailid" name="email"  required value="{{$user->email}}" />
                 <label for="area">Facebook </label>
                 <input type="text" id="fname" name="facebook"  value="{{$user->facabook}}" />
                <div style="margin-top: 2%;margin-bottom: 2%;">
                    <label for="area">Mật khẩu</label>
                    <a href="{{route('get_user.profile.update_password')}}" style="margin-left:10%">Đổi mật khẩu</a>
                </div>
                <label for="area">Ảnh đại diện</label>
                <div class="" style="margin-left: 17%;margin-top:-3%">
                    @if(empty(Auth::user()->avatar) || is_null(Auth::user()->avatar) || Auth::user()->avatar == 'no-avatar.jpg')
                        <img  class="author__img" id="output" src="{{ asset('images/no-avatar.jpg') }}">
                    @elseif( Str::startsWith(Auth::user()->avatar, 'avatar'))
                        <img  class="author__img" id="output" src="{{ asset('uploads/avatars/' . Auth::user()->avatar) }}">
                    @else
                        <img  class="author__img" id="output" src="{{ Auth::user()->avatar }}">
                    @endif  
                    <div>
                        <input style="width:14%" class="input-file" name="avatar" id="avatar" type="file" accept="image/*" onchange="loadFile(event)" style="display: none">
								<script>
								  var loadFile = function(event) {
								    var output = document.getElementById('output');
								    output.src = URL.createObjectURL(event.target.files[0]);
								  };
								</script>
                        {{-- <input style="width:14%" class="input-file" name="avatar" type="file" value="Chọn ảnh" multiple> --}}
                    </div>
                </div>
                 <input type="submit"  class="multiple-send-message" value="Lưu và cập nhật" />
             </form>
         </div>
     </div>
 </div>
</div>

@endsection
