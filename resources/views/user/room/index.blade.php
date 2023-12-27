@extends('user.layouts.master_user')
@section('content_user')

<div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
     <div class="my-properties">
        <h3>Quản lý tin đăng</h3>
         <table id="example" class="table-responsive">
             <thead>
                 <tr>
                     <th>STT</th>
                     <th>Ảnh đại diện</th>
                     <th>Tiêu đề</th>
                     <th>Gói tin</th>
                     <th>Giá</th>
                     <th>Ngày bắt đầu</th>
                     <th>Ngày hết hạn</th>
                     <th>Trạng thái</th>
                 </tr>
             </thead>
             <tbody>
                @foreach ($rooms as $item )
                <tr>
                    <td>
                        {{$loop->index+1}}
                    </td>
                    @php
                        $firstImage = $item->images->first();
                    @endphp
                     <td class="image myelist">
                        <a href="">
                            @if (empty($item->avatar) || is_null($item->avatar))
                                @if ($firstImage && !is_null($firstImage->path))
                                    @if (Str::startsWith($firstImage->path, 'https'))
                                    <img  class="img-fluid" src="{{ ($firstImage->path) }}">
                                    @else
                                        <img  class="img-fluid" src="{{ pare_url_file($firstImage->path) }}">
                                    @endif
                                @else
                                    <img  class="img-fluid" src="{{ pare_url_file($item->avatar) }}">
                                @endif
                            @else
                                <img  class="img-fluid" src="{{ pare_url_file($item->avatar) }}">
                            @endif

                            {{-- <img class="img-fluid" id="output" src="{{ pare_url_file($item->avatar) }}"> --}}
                        </a>
                     </td>
                     <td style="width:40% ">
                         <div class="inner">
                             <a href="{{route('get.category.detail',['slug' => $item->slug,'id' => $item->id])}}">
                                <h2>
                                   <span class="label label-danger-warning">
                                    {{$item->category->name ?? "[N\A]"}}
                                    </span>                                 
                                    {{$item->name}}
                                </h2>
                             </a>
                             <p style="font-size: 14px;font-weight: 400;color: #212121;text-decoration: none;margin-bottom: 5px">
                                <i class="fa-solid fa-location-dot"></i>
                                
                                @if (isset($item->wards))
                                <span>{{ $item->wards->name ?? "" }} - </span>
                                @endif
                                @if (isset($item->district))
                                <span>{{ $item->district->name }} - </span>
                                @endif
                                @if (isset($item->city))
                                <span>{{ $item->city->name ?? "" }}  </span>
                                @endif
                            </p>
                             <p class="actions">

                                    @if ($item->status == \App\Models\Room::STATUS_ACTIVE)
                                    <a href="{{ route('get_user.room.hide', $item->id) }}" class="edit btn-properties"><i class="fa fa-eye-slash icon"></i>Ẩn tin</a>
                                    @endif
                                    @if ($item->status == \App\Models\Room::STATUS_EXPIRED || $item->status ==
                                    \App\Models\Room::STATUS_DEFAULT)
                                    <a href="{{ route('get_user.room.pay', $item->id) }}" class="edit btn-properties"><i class="fa fa-refresh icon"></i> Thanh
                                        toán
                                        hoặc gia hạn</a>
                                        <a href="{{route('get_user.room.update',$item->id)}}" class="edit btn-properties"><i class="fa-solid fa-pen icon"></i></i>Sửa tin</a>
                                    @endif
                                    @if ($item->status == \App\Models\Room::STATUS_DEFAULT && 
                                    ($item->paymentHistory->count() ?? 0) > 0)
                                     <a href="{{ route('get_user.room.active', $item->id) }}" class="edit btn-properties"><i class="fa-solid fa-eye icon"></i> Hiển thị</a>
                                    @endif
                            </p>
                            
                         </div>
                     </td>
                    <td>
                        @if ($item->service_hot == 1)
                        <span style="color:#055699"> Thường</span>
                        @elseif($item->service_hot == 2)
                        <span style="color:#055699"> Vip 3</span>
                        @elseif($item->service_hot == 3)
                        <span style="color:#f60"> Vip 2</span>
                        @elseif($item->service_hot == 4)
                        <span style="color:#ea2e9d"> Vip 1</span>
                        @elseif($item->service_hot == 5)
                        <span style="color:#E13427"> Đặc biệt</span>
                        @endif
                    </td>
                     <td>{{number_format($item->price /1000000,1)}} triệu/tháng</td>
                     <td>{{$item->time_start}}</td>
                     <td>{{$item->time_stop}}</td>
                     <td >
                        <span class="{{ $item->getStatus($item->trangthai)['class'] ?? '...' }}">{{ $item->getStatus($item->trangthai)['name'] ?? "..." }}</span>
                     </td>
                 </tr>
                @endforeach
                 
               
             </tbody>
         </table>
         {{-- <div class="pagination-container">
             <nav>
               {{$rooms->links()}}
             </nav>
         </div> --}}
     </div>
 </div>

@endsection