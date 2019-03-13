@extends('templates.admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.index.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{route('admin.user.index')}}">Quản lý người dùng</a> <a href="" class="current">Thêm người dùng</a> </div>
    <h1>Quản lý người dùng</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span18">
      	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Thêm người dùng</h5>
          </div>
	          <div class="widget-content nopadding">
	            <form class="form-horizontal" method="post" action="{{route('admin.user.add')}}" name="number_validate" id="number_validate" novalidate="novalidate">
	            	{{csrf_field()}}
	              <div class="control-group">
	                <label class="control-label">Họ và tên:</label>
	                <div class="controls">
	                  <input type="text" name="fullname" id="required" />
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">Tên đăng nhập:</label>
	                <div class="controls">
	                  <input type="text" name="username" id="required" />
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">Mật khẩu:</label>
	                <div class="controls">
	                  <input type="password" name="password" id="required" />
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">Nhập lại mật khẩu:</label>
	                <div class="controls">
	                  <input type="password" name="password_confirmation" id="required" />
	                </div>
	              </div>
	              <div class="form-actions">
	                <input type="submit" value="Thêm" class="btn btn-success">
	              </div>
	            </form>
	          </div>
	        </div>
	      </div>
        </div>
      </div>
    </div>
</div>
</div>
@stop