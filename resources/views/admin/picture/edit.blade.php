@extends('templates.admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.index.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{route('admin.picture.index')}}">Quản lý ảnh</a> <a href="" class="current">Sửa ảnh</a> </div>
    <h1>Quản lý ảnh</h1>
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
            <h5>Sửa ảnh</h5>
          </div>
	          <div class="widget-content nopadding">
	            <form class="form-horizontal" method="post" action="{{route('admin.picture.edit', $picture->id)}}" name="number_validate" id="number_validate" novalidate="novalidate" enctype="multipart/form-data">
	            	{{csrf_field()}}
	              <div class="control-group">
	                <label class="control-label">Tải ảnh lên:</label>
	                <div class="controls">
	                  <input type="file" name="picture" id="required" />
	                </div>
	              </div>
	              <div class="control-group">
	              	<img src="/upload/{{ $picture->picture }}"  style="width: 70%" />
	              </div>
	              <div class="control-group">
	                <label class="control-label">Mô tả ảnh:</label>
	                <div class="controls">
	                  <textarea name="description">{{ $picture->description }}</textarea>
	                </div>
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