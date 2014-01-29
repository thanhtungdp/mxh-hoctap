<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield("title") | Trắc nghiệm Online</title>
  
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap.css')}}"/>
  <link rel="stylesheet" href="{{Asset('assets/css/bootstrap-responsive.css')}}"/>
  <link rel="stylesheet" href="{{Asset('assets/css/mxh/style.css')}}"/>
	<script language="javascript" type="text/javascript" src="{{Asset('assets/js/jquery-1.8.0.min.js')}}"></script>
  <script type="text/javascript" src="{{Asset('assets/js/bootstrap.js')}}"></script>
  <script type="text/javascript">
    function getURL(){
      return "{{Asset('')}}";
    }
    hideLoading();
  </script>
</head>
<body id="body" onload="">

  <div class="navbar navbar-inverse" id="navbarTop">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
          </button>
        <a class="brand" href="{{Asset('trac-nghiem')}}">Hệ Thống Trắc Nghiệm</a>
        <div class="nav-collapse collapse" id="nav-collapse">
          <ul class="nav pull-right">
            @if(!Session::has('user'))
            <li><a href="{{Asset('tai-khoan/dang-ky')}}">Đăng ký</a></li>
            <li><a href="{{Asset('tai-khoan/dang-nhap')}}">Đăng nhập</a></li>
            @else
            <li><a href="{{Asset('tai-khoan/danh-sach-trac-nghiem')}}">Danh sách trắc nghiệm</a></li>
             <li><a href="{{Asset('tai-khoan/dang-xuat')}}">Đăng xuất</a></li>
            @endif
            <li><a href="https://www.facebook.com/phanthanh.tung.1238">Liên hệ tôi</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
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