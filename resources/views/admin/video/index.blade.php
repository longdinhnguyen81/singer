@extends('templates.admin.master')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Quản lý video youtube</a> </div>
    <h1>Quản lý video</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
@if(Session::has('msg'))
<div class="alert alert-success">{{ Session::get('msg')}}</div>
@endif
      <div class="span12">
        	<a href="{{route('admin.video.add')}}" class="btn btn-success">Thêm</a>
        <div class="widget-box">
          <div class="widget-title text-center"> 
            <h5>Quản lý danh mục dịch vụ</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên danh mục dịch vụ</th>
                  <th style="text-align:center;width:150px">Chức năng</th>
                </tr>
              </thead>
              <tbody>
                @foreach($youtubes as $youtube)
                <tr class="even gradeA">
                  <td>{{$youtube->id}}</td>
                  <td>{!!$youtube->link!!}</td>
                  <td class="text-center">
                  	<a href="{{route('admin.video.edit', $youtube->id)}}" class="btn btn-primary">Sửa</a>
                  	<a onclick="return confirm('Do you want to delete this youtubeegory package?')" href="{{route('admin.video.delete', $youtube->id)}}" class="btn btn-danger">Xóa</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        
      </div>
    </div>
    <div class="span12 text-center" style="margin-top: 100px;">
        <h3>Cách lấy link embed trên youtube</h5>
      <div>
        <p class="text-left">B1: Chọn bài hát trên youtube mà bạn muốn lấy</p>
        <p><img src="/templates/admin/img/youtube1.png" /></p>
      </div>
      <div>
        <p class="text-left">B2: Chọn nút chia sẻ bên dưới bài hát, màn hình này sẽ hiện ra</p>
        <p><img src="/templates/admin/img/youtube2.png" /></p>
      </div>
      <div>
        <p class="text-left">B3: Chọn nhúng hoặc Embed(nếu tiếng anh), link bôi đen chính là link embed</p>
        <p><img src="/templates/admin/img/youtube3.png" /></p>
      </div>
    </div>
</div>
</div>
</div>
@stop