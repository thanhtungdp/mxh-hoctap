@extends("tracnghiem.quiz")

@section("title")
	Hệ thống Trắc Nghiệm Online | {{getTitle()}}
@endsection

@section('hero-unit')
<div class="hero-unit-inner text-center">
	<div class="text-in-hero">
	  <h2>Dễ dàng kiểm tra kiến thức</h2>
	  <h4>Chỉ với vài click đơn giản bạn đã có thể kiểm tra kiến thức</h4>
	</div>
	<p><a href="{{Asset('trac-nghiem/danh-sach-trac-nghiem')}}" data-pjax="body" class="btn btn-primary btn-large">Bắt đầu ngay</a></p>
</div>
@endsection

@section("content")
<div id="plan">
  <div class="container">
    <div class="row">
      <div class="span4 text-center">
        <span class="iconSprite-plan checkIcon"></span>
        <h4>Kiểm tra kiến thức</h4>
        <p>Hệ thống trắc nghiệm cung cấp cho bạn đầy đủ các chức năng, các bài trắc nghiệm về các lĩnh vực, do người dùng đăng tải</p>
      </div>
      <div class="span4 text-center">
        <span class="iconSprite-plan createIcon"></span>
        <h4>Tạo bài tập trắc nghiệm</h4>
        <p>Đây là 1 trong những chức năng đăc biệt của hệ thống sử dụng công nghệ AJAX, chỉ với vài cú nhấp chuột, bạn đã có một hệ thống bài tập trắc nghiệm theo ý muốn</p>
      </div>
      <div class="span4 text-center">
        <span class="iconSprite-plan phoneIcon"></span>
        <h4>Hỗ trợ các thiết bị di động</h4>
        <p>Không còn gì tuyệt vời hơn, khi ở bất cứ nơi đâu bạn chỉ cần với chiếc điện thoại có kết nối internet là bạn đã có thể truy cập vào hệ thống </p>
      </div>
    </div>
  </div>
</div>
<div id="info">
  <div class="container">
    <div class="content-info">
      <img class="pull-left text-center" src="{{Asset('assets/img/tracnghiem/avatar-info.png')}}"/>
      <p class="content pull-right">
        <b>Tôi là ai ?</b><br/>
Tôi là 1 học sinh cấp 3, cũng như các bạn, tôi rất thích được tìm hiểu những kiến thức mới, chia sẻ những kiến thức mà mình có cho mọi người.
“Trắc nghiệm Online”  là hệ thống trắc nghiệm mô hình mở, cho phép người dùng tương tác, tạo và chia sẻ bài tập
      <p>
    </div>
  </div>
</div>
@endsection