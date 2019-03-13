@extends('templates.admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.index.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{route('admin.video.index')}}">Quản lý video youtube</a> <a href="" class="current">Sửa video youtube</a> </div>
    <h1>Quản lý video</h1>
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
            <h5>Sửa danh mục dịch vụ</h5>
          </div>
	          <div class="widget-content nopadding">
	            <form class="form-horizontal" method="post" action="{{route('admin.video.edit', $youtube->id)}}" name="number_validate" id="number_validate" novalidate="novalidate">
	            	{{csrf_field()}}
	              <div class="control-group">
	                <label class="control-label">Tên danh mục dịch vụ</label>
	                <div class="controls">
	                	<textarea rows="4" cols="4" name="link" style="width: 70%">{{ $youtube->link }}</textarea>
	                </div>
	              </div>
	              <div class="control-group">
	              	{!! $youtube->link !!}
	              </div>
	              <div class="form-actions">
	                <input type="submit" value="Sửa" class="btn btn-success">
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