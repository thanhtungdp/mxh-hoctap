<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield("title") | Trắc nghiệm Online</title>
  <meta name="description" content="Trắc nghiệm online là hệ thống mở cho phép bạn tạo bài tập trắc nghiệm, làm bài tập và chia sẻ cho những người dùng khác" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap.css')}}"/>
  <link rel="stylesheet" href="{{Asset('assets/css/bootstrap-responsive.css')}}"/>
  <link rel="stylesheet" href="{{Asset('assets/css/tracnghiem/trac-nghiem.css')}}"/>
  <link rel="stylesheet" href="{{Asset('assets/css/jquery.jscrollpane.css')}}"/>
  <link rel="stylesheet" href="{{Asset('assets/css/jquery.jscrollpane.lozenge.css')}}"/>
  <link rel="stylesheet" href="{{Asset('assets/css/ytLoad.jquery.css')}}"/>
  <link rel="stylesheet" href="{{Asset('assets/css/reset-jquery-mobile.css')}}"/>
	<script language="javascript" type="text/javascript" src="{{Asset('assets/js/jquery-1.8.0.min.js')}}"></script>
  <script type="text/javascript" src="{{Asset('assets/js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{Asset('assets/js/scrollbar/jquery.jscrollpane.js')}}"></script>
  <script type="text/javascript" src="{{Asset('assets/js/scrollbar/jquery.jscrollpane.min.js')}}"></script>
  <script type="text/javascript" src="{{Asset('assets/js/scrollbar/jquery.mousewheel.js')}}"></script>
  <script type="text/javascript" src="{{Asset('assets/js/scrollbar/mwheelIntent.js')}}"></script>
  <script type="text/javascript" src="{{Asset('assets/js/pjax-standalone.js')}}"></script>
  <script type="text/javascript" src="{{Asset('assets/js/jquery.transit.js')}}"></script>
  <script type="text/javascript" src="{{Asset('assets/js/ytLoad.jquery.js')}}"></script>
  <script type="text/javascript">
    function getURL(){
      return "{{Asset('')}}";
    }
    function scroll_to(element){
  $('html,body').animate({
            scrollTop: $(element).offset().top},'slow');
}
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("a[data-pjax=body]").live("click",function(){
        $(".ui-loader").show();
      });
    });
  </script>
  <script type="text/javascript">
    function hideLoading(){
      $(document).ready(function(){
        $(".ui-loader").css("display","none");
      });
    }
    hideLoading();
  </script>
</head>
<body id="body" onload="">
<div class="hero-unit">
    <div class="container">
      <div class="navbar navbar-inverse" id="navbarTop">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
              </button>
            <a class="brand" href="{{Asset('trac-nghiem')}}"><h4><i class="icon-book icon-white"></i>Hệ thống trắc nghiệm online</h4></a>
            <div class="nav-collapse collapse" id="nav-collapse">
              <ul class="nav pull-right">
                <li><a href="{{Asset('trac-nghiem')}}">Trang chủ</a></li>
                <li><a href="#about">Về tôi</a></li>
                <li><a href="https://www.facebook.com/phanthanh.tung.1238">Liên hệ tôi</a></li>
              </ul>
            </div><!--/.nav-collapse -->
        </div>
      </div>
      <div class="including">
        <div class="navbar navbar-inverse pull-left" id="navbarTool">
          <div class="navbar-inner">
              <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".navTool">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
              </button>
              <a class="brand" href="#" data-toggle="collapse" data-target=".navTool"><h4>Chức năng</h4></a>
              <div class="nav-collapse collapse navTool" id="tung-cu">
                <ul class="nav">
                  <li><a href="{{Asset('trac-nghiem/danh-sach-trac-nghiem')}}"  data-pjax='body'><span class="iconSprite-navTool penBookIcon"></span>Thi trắc nghiệm</a></li>
                  <li><a href="{{Asset('trac-nghiem/tao-he-thong-trac-nghiem')}}"  data-pjax='body'><span class="iconSprite-navTool createBookIcon"></span>Tạo hệ thống trắc nghiệm</a></li>
                </ul>
              </div><!--/.nav-collapse -->
          </div>
        </div>
        <div class="pull-right" id="userTool">
          @if(Session::has("user"))
          <a href="{{Asset('tai-khoan/dang-xuat')}}">Đăng xuất</a> hoặc
          <a href="{{Asset('tai-khoan/danh-sach-trac-nghiem')}}" class="btn btn-primary btn-large"><i class="icon-user"></i>Chào  {{UserController::getSessionUsername()}}</a>
          @else
          <a href="{{Asset('tai-khoan/dang-ky')}}" data-pjax='body'>Đăng ký</a> hoặc
          <a href="{{Asset('tai-khoan/dang-nhap')}}" data-pjax='body' class="btn btn-primary btn-large">Đăng nhập</a>
          @endif
        </div>
      </div>
      @yield("hero-unit")
      
    </div>
</div><!--End hero-unit-->
@yield("content")

<footer id="footer">
	<div class="container">
    <a class="brand pull-left" href="{{Asset('hoa-hoc')}}"><h4>Copyright &copy; NguoiLeoNui</h4></a>
		<p class="pull-right">Developed by David Evans</p>
	</div>
</footer>
<div class="container">
<div class="ui-loader ui-corner-all ui-body-a ui-loader-default including" style="display:block">
  <span class="ui-img-loading"></span>
</div>
</div>
</body>
</html>