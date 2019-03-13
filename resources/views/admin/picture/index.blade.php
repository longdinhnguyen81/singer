@extends('templates.admin.master')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Quản lý hình ảnh</a> </div>
    <h1>Quản lý hình ảnh</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
@if(Session::has('msg'))
<div class="alert alert-success">{{ Session::get('msg')}}</div>
@endif
      <div class="span12">
        	<a href="{{route('admin.picture.add')}}" class="btn btn-success">Thêm</a>
        <div class="widget-box">
          <div class="widget-title text-center"> 
            <h5>Quản lý hình ảnh</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Hình ảnh</th>
                  <th>Mô tả</th>
                  <th style="text-align:center;width:150px">Chức năng</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pictures as $picture)
                <tr class="even gradeA">
                  <td>{{$picture->id}}</td>
                  <td><img src="/upload/{{$picture->picture}}"  style="width: 30%" /></td>
                  <td>{{$picture->description}}</td>
                  <td class="text-center">
                  	<a href="{{route('admin.picture.edit', $picture->id)}}" class="btn btn-primary">Sửa</a>
                  	<a onclick="return confirm('Do you want to delete this pictureegory package?')" href="{{route('admin.picture.delete', $picture->id)}}" class="btn btn-danger">Xóa</a>
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