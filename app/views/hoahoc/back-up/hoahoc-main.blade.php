<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>@yield("title")</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta name="description" content="Từ điển hóa học là bộ công cụ cho phép bạn tra từ điển về các phản ứng, giải các chuỗi hóa học" />
	<link rel="icon" href="{{Asset('img/favicon.ico')}}" type="image/x-icon">
	<link rel="shortcut icon" href="{{Asset('img/favicon.ico')}}" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap-responsive.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/hoahoc.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/token-input.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/token-input-facebook.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/ytLoad.jquery.css')}}"/>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script language="javascript" type="text/javascript" src="{{Asset('assets/js/jquery-1.8.0.min.js')}}"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript" src="{{Asset('assets/js/jquery.transit.js')}}"></script>
	<script type="text/javascript" src="{{Asset('assets/js/ytLoad.jquery.js')}}"></script>

	<script type="text/javascript">
		function getURL(){
			return '{{Asset('')}}';
		}
		var load={
			customDurations: function() {
                        $.ytLoad({
                            startPercentage: 50,
                            startDuration: 2000,
                            completeDuration: 500,
                            fadeDelay: 2000,
                            fadeDuration: 2000
                        });
                    }
		}
		load.customDurations();
	</script>
	<script type="text/javascript" src="{{Asset('assets/js/default-load.js')}}"></script>
	<script type="text/javascript" src="{{Asset('assets/js/bootstrap.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var count_click=0;
			$(".alert .click_up").click(function(){
				if(count_click%2==0)
					$("#huong-dan").show("slow");
				else $("#huong-dan").hide("slow");
				count_click++;
				return false;
			});
			
		});
	</script>
</head>
<body>
<div class="navbar navbar-inverse" id="navbarTop">
  <div class="navbar-inner">
    <div class="container">
    	<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
      <a class="brand" href="{{Asset('hoa-hoc')}}"><h4><i class="icon-book icon-white"></i>Từ điển hóa học</h4></a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li class="active"><a href="{{Asset('hoa-hoc')}}">Trang chủ</a></li>
          <li><a href="#about">Về tôi</a></li>
          <li><a href="https://www.facebook.com/phanthanh.tung.1238">Liên hệ tôi</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
<div class="bs-header" id="content">
	<div class="container">
		<div class="pull-left about">
			<h2>Bạn nên trải nghiệm</h2>
			<p>Từ điển hóa hoc là bộ công cụ giúp bạn tìm kiếm các phương trình hóa học,
				cách cân bằng phương trình, giải các chuỗi phản ứng, cung cấp bảng tuần hoàn</p>
			<p>Từ điển hóa học là một bộ công cụ tuyệt vời giúp các bạn học tốt môn hóa hơn </p>
		</div>
		<div class="bs-headerInfo pull-right">
			<blockquote><p>Danh ngôn:</p>Đừng xấu hổ khi không biết, chỉ xấu hổ khi không học</blockquote>
		</div>
	</div>
</div>
<div id="menu-chemistry">
	<div class="container">
		<div class="row">
			<a href="{{Asset('hoa-hoc/tim-kiem-pt')}}">
				<div class="span3 text-center chemistryMenu cmEquation">
					<span class="chemistrySprite iEquation"></span>
					<h3>Tìm kiếm phản ứng</h3>
				</div>
			</a>
			<a href="{{Asset('hoa-hoc/can-bang-pt')}}">
				<div class="span3 text-center chemistryMenu cmBalanced">
					<span class="chemistrySprite iBalanced"></span>
					<h3>Cân bằng phương trình</h3>
				</div>
			</a>
			<a href="{{Asset('hoa-hoc/chuoi-phan-ung')}}">
				<div class="span3 text-center chemistryMenu cmChain">
					<span class="chemistrySprite iChain "></span>
					<h3>Chuỗi phản ứng</h3>
				</div>
			</a>
			<a href="{{Asset('hoa-hoc/bang-tuan-hoan')}}">
				<div class="span3 text-center chemistryMenu cmPeriodic ">
					<span class="chemistrySprite iPeriodic"></span>
					<h3>Bảng tuần hoàn</h3>
				</div>
			</a>
		</div>
	</div>
</div>

@yield("find-equations")
@yield("chain-reaction")
@yield("balanced-equation")
@yield("periodic-table")
</script>
<footer id="footer">
	<div class="container">
		<p class="pull-left">Chemistry Beta</p>
		<p class="pull-right">Được phát triển bởi Phan Thanh Tùng - Email: tungptkh@gmail.com</p>
	</div>
</footer>
</body>
</html>