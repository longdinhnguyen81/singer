@extends('templates.admin.master')
@section('content')
<script src="/templates/admin/js/jquery.min.js"></script> 
<!--main-container-part-->
	<div id="content">
	<!--breadcrumbs-->
	  <div id="content-header">
	    <div id="breadcrumb"> <a href="{{route('admin.index.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Trang chủ</a></div>
	  </div>
	<!--End-breadcrumbs-->

	<!--Action boxes-->
	  <div class="container-fluid">
	    <div class="quick-actions_homepage">
	        <ul class="quick-actions">
		        <li class="bg_lr"> <a href="{{route('admin.video.index')}}"> <i class="icon-dashboard"></i>Video</a> </li>
		        <li class="bg_ly"> <a href="{{route('admin.mp3.index')}}"> <i class="icon-inbox"></i>Nhạc</a> </li>
		        <li class="bg_ls"> <a href="{{route('admin.picture.index')}}"> <i class="icon-fullscreen"></i>Hình ảnh</a> </li>
		        <li class="bg_lb"> <a href="{{route('admin.contact.index')}}"> <i class="icon-th-list"></i>Liên hệ</a> </li>
		        <li class="bg_dg"> <a href="{{route('admin.user.index')}}"> <i class="icon-tint"></i>Tài khoản</a> </li>
	        </ul>
	    </div>

	<!--End-Action boxes-->
	<div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Thống kê số người truy cập và số trang truy cập 7 ngày qua</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
				<canvas id="myChart" width="100" height="41"></canvas>
            </div>
            <div class="span3">
              <ul class="site-stats">
              	@php
              		$tonguser = 0;
              		$tbuser = 0;
              		$tongpage = 0;
              		$tbpage = 0;
              	@endphp
            @foreach($counts as $count)
	            @php
	            	$tonguser += $count->author;
	            	$tongpage += $count->page;
            	@endphp
            @endforeach
            	@php
	            	$tbuser += round($tonguser/ count($counts));
	            	$tbpage += round($tongpage/ count($counts));
            	@endphp

                <li class="bg_lh"><i class="icon-user"></i> <strong>{{ $tonguser }}</strong> <small>Tổng số người dùng truy cập</small></li>
                <li class="bg_lh"><i class="icon-plus"></i> <strong>{{ $tbuser }}</strong> <small>Số người dùng trung bình truy cập</small></li>
                <li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>{{ $tongpage }}</strong> <small>Tổng số trang được truy cập</small></li>
                <li class="bg_lh"><i class="icon-tag"></i> <strong>{{ $tbpage }}</strong> <small>Trung bình số trang được truy cập</small></li>
                <li class="bg_lh"><i class="icon-repeat"></i> <strong>{{ count($music) }}</strong> <small>Số lượng bài hát</small></li>
                <li class="bg_lh"><i class="icon-globe"></i> <strong>{{ count($contact) }}</strong> <small>Số lượng liên hệ</small></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
	<!--End-Chart-box--> 
	  </div>
	</div>
	<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	$.getJSON('/api/data', function(data) {
		var label = [];
		var pdata = [];
		var udata = [];
		for(var i = 0; i < data.data.length; i++){
			label.push(data.data[i].day+'-'+data.data[i].month)
			pdata.push(data.data[i].page)
			udata.push(data.data[i].author)
		}
    	var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: label,
		        datasets: [{
		            label: 'người/ngày',
		            data: udata,
		            backgroundColor:'#08c',
		            borderColor:'#2255a4',
		            borderWidth: 1
		        },{
		            label: 'trang/ngày',
		            data: pdata,
		            backgroundColor:'#10C21E',
		            borderColor:'#0A7812',
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
	});
	function draw_char_bar(tab_label, tab_data){
	  var ctx = document.getElementById("myChart");
	  var myChart = new Chart(ctx, {
	      type: 'bar',
	      data: {
	          labels: tab_label,
	          datasets: [{
	              label: 'Number In',
	              data: tab_data,
	              backgroundColor: '#6fff00',
	              borderColor: '#6fff00',
	              borderWidth: 1,
	              pointBackgroundColor: '#6fff00'
	          },
	          {
	              label: 'Number Out',
	              data: tab_data,
	              backgroundColor: '#fc8e00',
	              borderColor: '#fc8e00',
	              borderWidth: 1,
	              pointBackgroundColor: '#fc8e00'
	          }]
	      },
	      options: {
	          scales: {
	              yAxes: [{
	                  ticks: {
	                      beginAtZero:true
	                  }
	              }]
	          }
	      }
	  });
	}
</script>
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> 
@stop