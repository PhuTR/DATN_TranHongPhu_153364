<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
      <a class="large_logo" href="{{route('get_admin.admin.dashbord')}}"><img src="{{asset('asset_admin/img/logo_white.png')}}" alt/></a>
      <a class="small_logo" href="{{route('get_admin.admin.dashbord')}}"><img src="{{asset('asset_admin/img/mini_logo.png')}}" alt/></a>
      <div class="sidebar_close_icon d-lg-none">
        <i class="ti-close"></i>
      </div>
    </div>
    <ul id="sidebar_menu">
        <li class>
            <a href="{{route('get_admin.admin.dashbord')}}" aria-expanded="false">
              <div class="nav_icon_small">
                <i class="fa-solid fa-house"></i>
              </div>
              <div class="nav_title">
                <span>Trang chính</span>
              </div>
            </a>
        </li>
        @role('superadmin|CTV','admins')
        <li class>
            <a href="{{route('get_admin.room.index')}}" aria-expanded="false">
              <div class="nav_icon_small">
                <i class="fa-solid fa-newspaper"></i>
              </div>
              <div class="nav_title">
                <span>Quản lý bài đăng</span>
              </div>
            </a>
        </li> 
        <li class>
            <a href="{{route('get_admin.user.index')}}" aria-expanded="false">
              <div class="nav_icon_small">
                <i class="fa-solid fa-users"></i>
              </div>
              <div class="nav_title">
                <span>Quản lý thành viên</span>
              </div>
            </a>
        </li>
        @endrole
        @role('superadmin','admins')
        <li class>
            <a href="{{route('get_admin.pay.paymet_history')}}" aria-expanded="false">
              <div class="nav_icon_small">
                <i class="fa-solid fa-money-bills"></i>
              </div>
              <div class="nav_title">
                <span>Quản lý thanh toán</span>
              </div>
            </a>
        </li>
        <li class>
            <a href="{{route('get_admin.pay.deposit_history')}}" aria-expanded="false">
              <div class="nav_icon_small">
                <i class="fa-regular fa-credit-card"></i>
              </div>
              <div class="nav_title">
                <span>Quản lý nạp tiền</span>
              </div>
            </a>
        </li>
        @endrole
        <li class>
            <a href="{{route('get_admin.category.index')}}" aria-expanded="false">
              <div class="nav_icon_small">
                <i class="fa fa-list" aria-hidden="true"></i>
              </div>
              <div class="nav_title">
                <span>Quản lý danh mục</span>
              </div>
            </a>
        </li>
        @role('superadmin|CTV','admins')
          <li class>
            <a href="{{route('get_admin.location.home')}}" aria-expanded="false">
              <div class="nav_icon_small">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="nav_title">
                <span>Quản lý địa điểm</span>
              </div>
            </a>
          </li>
        @endrole
        @role('superadmin|CTV|CTV bài viết','admins')
        <li class>
            <a href="{{route('get_admin.article.index')}}" aria-expanded="false">
              <div class="nav_icon_small">
                <i class="fa-solid fa-newspaper"></i>
              </div>
              <div class="nav_title">
                <span>Quản lý tin tức</span>
              </div>
            </a>
        </li>
        @endrole
        @role('superadmin|CTV','admins')
        <li class>
          <a href="{{route('get_admin.contact.index')}}" aria-expanded="false">
            <div class="nav_icon_small">
              <i class="fa-solid fa-message"></i>
            </div>
            <div class="nav_title">
              <span>Liên hệ khách hàng</span>
            </div>
          </a>
        </li>
        @endrole
        @role('superadmin|Thêm permission','admins')
        <li class>
          <a href="{{route('get_admin.permission.index')}}" aria-expanded="false">
            <div class="nav_icon_small">
              <i class="fa-solid fa-user-shield"></i>
            </div>
            <div class="nav_title">
              <span>Quản lý quyền</span>
            </div>
          </a>
        </li>
        <li class>
          <a href="{{route('get_admin.role.index')}}" aria-expanded="false">
            <div class="nav_icon_small">
              <i class="fa-solid fa-clipboard-list"></i>
            </div>
            <div class="nav_title">
              <span>Quản lý nhóm quyền</span>
            </div>
          </a>
        </li>
        @endrole
        @role('superadmin','admins')
        <li class>
          <a href="{{route('get_admin.account.index')}}" aria-expanded="false">
            <div class="nav_icon_small">
              <i class="fa-solid fa-users-gear"></i>
            </div>
            <div class="nav_title">
              <span>Quản lý tài khoản</span>
            </div>
          </a>
        </li>
        @endrole
        <li class>
            <a href="{{route('get_admin.profile.index')}}" aria-expanded="false">
              <div class="nav_icon_small">
                <i class="fa fa-user"></i>
              </div>
              <div class="nav_title">
                <span>Hồ sơ</span>
              </div>
            </a>
        </li>
    </ul>
  </nav>