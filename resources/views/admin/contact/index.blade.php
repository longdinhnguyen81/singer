@extends('templates.admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="#" class="current">Quản lý liên hệ</a> </div>
    <h1>Quản lý liên hệ</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
@if(Session::has('msg'))
<div class="alert alert-success">{{ Session::get('msg')}}</div>
@endif
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title text-center"> 
            <h5>Quản lý liên hệ</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Họ và tên</th>
                  <th>Số điện thoại</th>
                  <th>Tin nhắn</th>
                  <th style="text-align:center;width:150px">Chức năng</th>
                </tr>
              </thead>
              <tbody>
                @foreach($contacts as $contact)
                <tr class="even gradeA">
                  <td>{{$contact->id}}</td>
                  <td>{{$contact->name}}</td>
                  <td>{{$contact->phone}}</td>
                  <td>{{$contact->description}}
                  </td>
                  <td class="text-center">
                  	<a onclick="return confirm('Do you want to delete this contactegory package?')" href="{{route('admin.contact.delete', $contact->id)}}" class="btn btn-danger">Xóa</a>
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