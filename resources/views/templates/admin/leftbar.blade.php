
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="{{ request()->is('admin') ? 'active' : '' }}"><a href="{{route('admin.index.index')}}"><i class="icon icon-home"></i> <span>Trang chủ</span></a> </li>
    <li class="{{ request()->is('admin/mp3*') ? 'active' : '' }}"> <a href="{{route('admin.mp3.index')}}"><i class="icon icon-inbox"></i> <span>Quản lý nhạc</span></a> </li>
    <li class="{{ request()->is('admin/contact*') ? 'active' : '' }}"> <a href="{{route('admin.contact.index')}}"><i class="icon icon-inbox"></i> <span>Quản lý liên hệ</span></a></li>
    <li class="{{ request()->is('admin/user*') ? 'active' : '' }}"><a href="{{route('admin.user.index')}}"><i class="icon icon-th"></i> <span>Quản lý tài khoản</span></a></li>
    <li class="{{ request()->is('admin/picture*') ? 'active' : '' }}"><a href="{{route('admin.picture.index')}}"><i class="icon icon-user"></i> <span>Quản lý hình ảnh</span></a></li>
  </ul>
</div>
<!--sidebar-menu-->