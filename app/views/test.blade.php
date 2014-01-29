<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>@yield("title")</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{Asset('img/favicon.ico')}}" type="image/x-icon">
	<link rel="shortcut icon" href="{{Asset('img/favicon.ico')}}" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap-responsive.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/style.css')}}"/>
	<link rel="stylesheet" href="{{Asset('assets/css/ytLoad.jquery.css')}}"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{Asset('assets/ckeditor/adapters/jquery.js')}}"></script>
</head>
<body>

<script type="text/javascript">
	$(document).ready(function(){
		$("#editor").ckeditor();
		alert(1);
</script>

	
<textarea class="ckeditor" id="editor"></textarea>


</body>
</html>