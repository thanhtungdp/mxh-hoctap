@extends('hoahoc.hoahoc-main');
@section("title")
	Tìm kiếm phản ứng hóa học | {{getTitle()}}
@endsection
@section("search-form")
<?php
	$input_chatThamGia=(isset($input_chatThamGia))?$input_chatThamGia:"";
	$input_chatTaoThanh=(isset($input_chatTaoThanh))?$input_chatTaoThanh:"";
	$equations=(isset($equations))?$equations:array();
?>

<form action="" id="frm">
	<input type="text" class="form-control input-form col-md-5 " placeholder="Chất tham gia" name="chat-tham-gia"
	value="{{$input_chatThamGia}}"/>
	<input type="text" class="form-control input-form col-md-5" placeholder="Chất sản phẩm" name="chat-tao-thanh"
	value="{{$input_chatTaoThanh}}"/>
	<button class="btn">Tìm kiếm</button>
</form>
@endsection

@section("find-equations")
<script type="text/javascript">
$(document).ready(function(){
	var url="{{Asset('')}}"+"hoa-hoc/";
	var url_thulium="";
	function resetHTMLsearch(){
		$("#search-results h4").fadeOut("slow").empty();
		$("#search-results #results").fadeOut("slow").empty();
		$("#pagination").fadeOut("slow").empty();
	}
	function get_equations(url_send,change_url){
		resetHTMLsearch();
		$.ajax({
			type:"GET",
			url:url_send+'?getJSON',
			dataType:"json",
			beforeSend:function(){
				startLoad();
			},
			success:function(data){
				$("#frm input[name=chat-tham-gia]").val(data.input_thamgia);
				$("#frm input[name=chat-tao-thanh]").val(data.input_taothanh);
				$("#search-results h4").html(data.count_equations+" kết quả được tìm thấy").fadeIn("slow");
				for(var i=0;i<data.equation.length;i++)
				{
					var html='<div class="result">'+					
						'<div class="equation">'+
						data.equation[i].phuong_trinh;
						'</div>';
					if(data.equation[i].dieu_kien!="")
						html+='<div class="conditions">'+
							'<span class="icon-conditions"></span>'+data.equation[i].dieu_kien+
						'</div>';
					html+='</div>';
					$("#search-results #results").append(html).fadeIn('slow');
				}
				$("#pagination").html(data.show_pagination).fadeIn("slow");
				if(change_url==true)
					history.pushState(null, null, url_send);
				clearLoad();
			}
		});
	}
	window.addEventListener("popstate", function(e) {
		//resetHTMLsearch();
	    get_equations(location.pathname,false);
	    clearLoad();
	});
	$("#frm").submit(function(){	
		var chatThamGia=$("input[name=chat-tham-gia]").val();
		var chatTaoThanh=$("input[name=chat-tao-thanh]").val();
		resetHTMLsearch();
		//Xóa các thông tin trước
		
		if(chatThamGia=="" && chatTaoThanh=="")
			alert("Vui lòng nhập các chất để tìm kiếm");	
		else{
			if(chatThamGia!="" && chatTaoThanh!="")
				url_thulium=chatThamGia+'/'+chatTaoThanh;
			if(chatThamGia!="" && chatTaoThanh=="")
				url_thulium=chatThamGia;
			if(chatThamGia=="" && chatTaoThanh!="")
				url_thulium=chatTaoThanh;
			var url_send=url+"tim-kiem-pt/"+url_thulium;
			get_equations(url_send,true);
		}
		return false;
	});
});
</script>
<div id="search-results" class="box-shadow">
	<h4>
		@if(isset($equations->count_equations))
			{{$equations->count_equations}} kết quả được tìm thấy
		@endif
	</h4>
	<div id="results">
	@if(count($equations)>0)
	@foreach($equations as $equation)
	<div class="result">						
		<div class="equation">
			{{EquationController::ConvertEquation($equation->phuong_trinh)}}
		</div>
		@if(!empty($equation->dieu_kien))
		<div class="conditions">
			<span class="icon-conditions"></span>
			Điều kiện: Nhiệt độ cao  -  Xúc tác: Benzen  -  Hiện tượng: Kết tủa
		</div>
		@endif
	</div>
	@endforeach
	@endif
	</div>
	<div id="pagination" class="pagination-centered">
	@if(isset($equations->show_pagination))
	{{$equations->show_pagination}}
	@endif
	</div>
</div>
		<!--div class="alert alert-info">
			<a href="#" class="click_up">
			<h4 class="text-center">Hướng dẫn </h4>
			</a>
			<div id="huong-dan">
				<p>Để tìm kiếm phương trình phản ứng, bạn chỉ cần nhập chất tham gia, hoặc sản phẩm</p>
				<p>Mỗi chất cách nhau bởi khoảng trắng</p>
				<p>VD: Fe + Cl<sub>2</sub> -> FeCl<sub>3</sub> </p>
				<ul>
					<li>Tìm theo chất tham gia: <strong> Fe Cl2 </strong>
					<li>Tìm theo chất tham gia và phản ứng: <u>chất tham gia </u><strong>Fe </strong> - <u>chất tạo thành </u><strong>FeCl3</strong>
				</ul>
			</div>
		</div>
		
	</div>
</div-->
@endsection