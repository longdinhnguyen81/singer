@extends('templates.admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Quản lý nhạc</a> </div>
    <h1>Quản lý nhạc</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
@if(Session::has('msg'))
<div class="alert alert-success">{{ Session::get('msg')}}</div>
@endif
      <div class="span12">
        	<a href="{{route('admin.mp3.add')}}" class="btn btn-success">Thêm</a>
        <div class="widget-box">
          <div class="widget-title text-center"> 
            <h5>Quản lý nhạc mp3</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên bài hát</th>
                  <th>Tên ca sĩ</th>
                  <th>Nhạc</th>
                  <th style="text-align:center;width:150px">Chức năng</th>
                </tr>
              </thead>
              <tbody>
                @foreach($musics as $music)
                <tr class="even gradeA">
                  <td>{{$music->id}}</td>
                  <td>{{$music->title}}</td>
                  <td>{{$music->artist}}</td>
                  <td>
                    <audio controls>
                      <source src="/mp3/{{ $music->src }}" type="audio/mpeg">
                    </audio>
                  </td>
                  <td class="text-center">
                  	<a href="{{route('admin.mp3.edit', $music->id)}}" class="btn btn-primary">Sửa</a>
                  	<a onclick="return confirm('Do you want to delete this musicegory package?')" href="{{route('admin.mp3.delete', $music->id)}}" class="btn btn-danger">Xóa</a>
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