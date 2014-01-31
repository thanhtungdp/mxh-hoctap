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
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap3/bootstrap.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/hoahoc.css')}}"/>
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
	<script type="text/javascript" src="{{Asset('assets/js/bootstrap3/bootstrap.js')}}"></script>
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


<nav class="navbar navbar-default navbar-static-top box-shadow" role="navigation" id="navbar">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="container">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-list">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">Từ điển hóa học</a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="menu-list">
	    <div class="nav navbar-nav navbar-right" id="button-menu-dropdown">
		    <div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    Trang khác <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			    <li><a href="#">Action</a></li>
			    <li><a href="#">Another action</a></li>
			    <li><a href="#">Something else here</a></li>
			    <li class="divider"></li>
			    <li><a href="#">Separated link</a></li>
			  </ul>
			</div>
		</div>
	  </div><!-- /.navbar-collapse -->
	</div>
</nav>
<section id="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="list-group box-shadow">
					<a href="#" class="list-group-item item-find-equation actived"><span class="icon-sprite"></span>Tìm kiếm phương trình</a>
					<a href="#" class="list-group-item item-balanced-equation"><span class="icon-sprite icon-balanced"></span>Cân bằng phương trình</a>
					<a href="#" class="list-group-item item-chainreaction"><span class="icon-sprite icon-chainreaction"></span>Giải chuỗi phương trình</a>
					<a href="#" class="list-group-item item-periodic"><span class="icon-sprite icon-periodic"></span>Bảng tuần hoàn</a>
				</div>		
			</div>
			<div class="col-md-8">
				@yield("search-form")				
				<div id="followingBallsG"  style="display:none">
				<div id="followingBallsG_1" class="followingBallsG">
				</div>
				<div id="followingBallsG_2" class="followingBallsG">
				</div>
				<div id="followingBallsG_3" class="followingBallsG">
				</div>
				<div id="followingBallsG_4" class="followingBallsG">
				</div>
				</div>
				@yield('find-equations')
				
			</div><!--End col-md-8-->
		</div><!--End row-->
	</div><!--End container-->
</section>
<div id="footer">

	<div class="container">
		<footer class="box-shadow">
		<p class="pull-left">Copyright &copy SmartNet</p>
		<p class="pull-right">Designed by DavidEvans</p>
		</footer>
	</div>

</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>