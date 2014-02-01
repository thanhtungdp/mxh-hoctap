@extends('hoahoc.hoahoc-main');
@section("title")
	Tìm kiếm phản ứng hóa học | {{getTitle()}}
@endsection
@section("find-equations")
<script type="text/javascript">
$(document).ready(function(){
	var url="{{Asset('')}}"+"hoa-hoc/";
	function resetHTMLsearch(){
		$("#search_result").empty();
		$("#equation_results").empty();
	}
	$("#frmSearch").submit(function(){
		
		var chatThamGia=$("input[name=chatThamGia]").val();
		var chatTaoThanh=$("input[name=chatTaoThanh]").val();
		resetHTMLsearch();
		//Xóa các thông tin trước
		
		if(chatThamGia=="" && chatTaoThanh=="")
			alert("Vui lòng nhập các chất để tìm kiếm");	
		else{
			$.ajax({
				type:"POST",
				url:url+"tim-kiem-pt",
				data:{
					'chatThamGia':chatThamGia,
					'chatTaoThanh':chatTaoThanh
				},
				dataType:"json",
				beforeSend:function(){
					startLoad();
				},
				success:function(data){
					if(data.length==0)
					{
						$("#search_result").html("Không tìm thấy phản ứng");
					}
					else{
						$("#search_result").html(data.length+" phản ứng được tìm thấy");
						for(var i=0;i<data.length;i++){
							$("#equation_results").append("<p class='text-center'>"+data[i]+"</p>")
						}
					}
					history.pushState(null, null, url+"tim-kiem-pt/"+chatThamGia+"/"+chatTaoThanh);
					clearLoad();
				}
			});
		}
		return false;
		
	});
});
</script>
<?php
	$input_chatThamGia=(isset($input_chatThamGia))?$input_chatThamGia:"";
	$input_chatTaoThanh=(isset($input_chatTaoThanh))?$input_chatTaoThanh:"";
	$equations=(isset($equations))?$equations:array();
?>
<div class="search">
	<div class="container">
		<div class="row">
			<form action="" method="post" id="frmSearch">
				<div class="span5">
					<input type="text" name="chatThamGia" class="span5 thuliumSearchAjax" value="{{$input_chatThamGia}}"
					placeholder="Thí dụ: Fe Cl2"/>
				</div>
				<div class="span5">
					<input type="text" name="chatTaoThanh" class="span5 thuliumSearchAjax" value="{{$input_chatTaoThanh}}"
					placeholder="Thí dụ: FeCl3"/>
				</div>
				<div class="span2">
					<button class="btn span2">Tìm</button>
				</div>
			</form>
		</div>
		<div class="alert alert-info">
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
		
		<p class="text-center" id="searchLoad">
		</p>

		<h3 class="text-center" id="search_result">
		@if(count($equations)>0)
		{{count($equations)}} phản ứng được tìm thấy
		@endif
		</h3>
		
		<div id="equation_results" class="container">
			@if(count($equations)>0)
			@foreach($equations as $equation)
				<p class="text-center equation">{{$equation}}</p>
			@endforeach
			@endif
		</div>
		<!--table class="table table-striped" id="table_result">
			<tr><td>PT</td><td>Equations</td></tr>
			@if(count($equations)>0)
			@foreach($equations as $equation)
				<tr><td>1</td><td class="text-center">{{$equation}}<td></tr>
			@endforeach
			@endif
		</table>-->
	</div>
</div>
@endsection