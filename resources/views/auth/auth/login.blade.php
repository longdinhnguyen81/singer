@extends('templates.admin.master')
@section('content')
<div id="content">
  <div id="content-header">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Đăng nhập</h5>
          </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" action="{{route('auth.auth.login')}}" name="number_validate" id="number_validate" novalidate="novalidate">
                    {{csrf_field()}}
                  <div class="control-group">
                    <label class="control-label">Tên đăng nhập:</label>
                    <div class="controls">
                      <input type="text" name="username" id="required" value="{{ old('username') }}" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Mật khẩu:</label>
                    <div class="controls">
                      <input type="password" name="password" id="required" value="{{ old('password') }}" />
                    </div>
                  </div>
                  <div class="form-actions">
                    <input type="submit" value="Đăng nhập" class="btn btn-success">
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