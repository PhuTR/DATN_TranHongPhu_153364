@extends('admin.layouts.app_master')
@section('content_admin')

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-xs-12 pl-0 user-dash2">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                  <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Cập nhật </h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                      <li class="breadcrumb-item">
                        <a href="{{route('get_admin.admin.dashbord')}}">Trang chính</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý danh mục</li>
                      <li class="breadcrumb-item active">Cập nhật</li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                      <div class="box_header m-0">
                        <div class="main-title">
                          <h3 class="m-0">Thêm mới</h3>
                        </div>
                      </div>
                    </div>
                    {{-- <form method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="white_card_body">
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="common_input mb_15">
                                @if(isset($roles))
                                  <input name="name" type="text" placeholder="Tên..." value="{{old('name',$roles->name ?? '')}}"/>
                                @else
                                  <input name="name" type="text" placeholder="Tên..." value=""/>
                                @endif
                                  
                              </div>
                            </div>
                            <div class="col-lg-12 d-flex" style="flex-wrap:wrap;" >
                              @foreach ( $permissions as $item)
                                <div class="mb-3 form-check" style="margin-right:70px">
                                  @if (isset($role))
                                    <input type="checkbox" name="permission[]" class="form-check-input" {{ $roles->hasPermissionTo($item->name) ? 'checked' : '' }} id="{{$item->id}}" value="{{$item->name}}">
                                  @else
                                    <input type="checkbox" name="permission[]" class="form-check-input"  id="{{$item->id}}" value="{{$item->name}}">
                                  @endif
                                    <label class="form-label form-check-label" for="{{$item->id}}">{{$item->name}}</label>
                                </div>
                              @endforeach   
                            </div>
                            <div class="col-12">
                              <div class="create_report_btn mt_30">
                                  <button type="submit" class="col-6 btn_1 radius_btn d-block text-center" style="margin:0 auto">Lưu dữ liệu</button>
                              </div>
                            </div>
                        </div>
                        </div>
                    </form> --}}

                    {{-- Test group --}}
                      <form method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="white_card_body">
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="common_input mb_15">
                                @if(isset($role))
                                  <input name="name" type="text" placeholder="Tên..." value="{{old('name',$role->name ?? '')}}"/>
                                @else
                                  <input name="name" type="text" placeholder="Tên..." value=""/>
                                @endif
                                  
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-check">
                                @if (isset($role))
                                  <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\Models\Admin::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                                @else
                                  <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">

                                @endif
                                <label class="form-check-label" for="checkPermissionAll">All</label>
                            </div>
                              <hr>
                            </div>
                           
                            <div class="col-lg-12">
                              @php $i = 1; @endphp
                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    @php
                                        $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                                        $j = 1;
                                    @endphp
                                    
                                    <div class="col-3">
                                        <div class="form-check">
                                          @if(isset($role))
                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\Admin::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                          @else
                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" >
                                          @endif
                                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                        </div>
                                    </div>

                                    <div class="col-9 role-{{ $i }}-management-checkbox">
                                       
                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                              @if(isset($role))
                                                <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                              @else
                                                <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]"  id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                              @endif
                                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            @php  $j++; @endphp
                                        @endforeach
                                        <br>
                                    </div>

                                </div>
                                @php  $i++; @endphp
                            @endforeach  
                            </div>
                            <div class="col-12">
                              <div class="create_report_btn mt_30">
                                  <button type="submit" class="col-6 btn_1 radius_btn d-block text-center" style="margin:0 auto">Lưu dữ liệu</button>
                              </div>
                            </div>
                        </div>
                        </div>
                    </form>


                  </div>
                </div>
              </div>
           
        </div>
    </div>
</div>
@include('admin.pages.role.partials.scripts')
@endsection

