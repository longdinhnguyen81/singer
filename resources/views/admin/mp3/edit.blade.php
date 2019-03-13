@extends('templates.admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('admin.index.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{route('admin.mp3.index')}}">Quản lý nhạc</a> <a href="" class="current">Sửa nhạc</a> </div>
    <h1>Quản lý nhạc</h1>
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
            <h5>Sửa nhạc</h5>
          </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{route('admin.mp3.edit', $music->id)}}" name="number_validate" id="number_validate" novalidate="novalidate" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">Tên bài hát</label>
                  <div class="controls">
                    <input type="text" name="title" id="required" value="{{ $music->title }}" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Ca sĩ</label>
                  <div class="controls">
                    <input type="text" name="artist" id="required" value="{{ $music->artist }}" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Độ dài bài hát(Ex: 05:12):</label>
                  <div class="controls">
                    <input type="text" name="length" id="required" value="{{ $music->length }}" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">File Mp3:</label>
                  <div class="controls">
                    <input type="file" name="src" id="required" />
                  </div>
                </div>
                <div class="control-group">
                	<audio controls>
                      <source src="/mp3/{{ $music->src }}" type="audio/mpeg">
                    </audio>
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