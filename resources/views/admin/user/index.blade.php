@extends('templates.admin.master')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Quản lý người dùng</a> </div>
    <h1>Quản lý người dùng</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
@if(Session::has('msg'))
<div class="alert alert-success">{{ Session::get('msg')}}</div>
@endif
      <div class="span12">
        	<a href="{{route('admin.user.add')}}" class="btn btn-success">Thêm</a>
        <div class="widget-box">
          <div class="widget-title text-center"> 
            <h5>Quản lý người dùng</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên đầy đủ:</th>
                  <th>Tên đăng nhập:</th>
                  <th style="text-align:center;width:150px">Chức năng</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr class="even gradeA">
                  <td>{{$user->id}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{$user->fullname}}</td>
                  <td class="text-center">
                  	<a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary">Sửa</a>
                  	<a onclick="return confirm('Do you want to delete this user?')" href="{{route('admin.user.delete', $user->id)}}" class="btn btn-danger">Xóa</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
</div>
</div>
@stop