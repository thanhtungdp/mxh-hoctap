@extends('hoahoc.hoahoc-main');
@section("title")
	Chuỗi phản ứng | {{getTitle()}}
@endsection
@section("chain-reaction")
<script type="text/javascript">
$(document).ready(function(){
	var url="{{Asset('')}}"+"hoa-hoc/";
	function resetHTMLsearch(){
		$("#search_result").empty();
		$("#table_result").empty();
		$("table_result").html("<tr><td>PT</td><td>Equation</td>");
	}
	$("#frmSearch").submit(function(){
		
		var chuoiPhanUng=$("input[name=chuoiPhanUng]").val();
		resetHTMLsearch();
		//Xóa các thông tin trước
		
		if(chuoiPhanUng=="")
			alert("Vui lòng nhập các chất để tìm kiếm");
		
		else{
			$.ajax({
				type:"POST",
				url:url+"chuoi-phan-ung",
				data:{
					'chuoiPhanUng':chuoiPhanUng
				},
				dataType:"json",
				beforeSend:function(){
					startLoad();
				},
				success:function(data){
					if(data.length==0)
					{
						$("#search_result").html("No Find Equation");
					}
					else{
						$("#search_result").html("Chuỗi "+data.length+" phản ứng");
						for(var i=0;i<data.length;i++){
							$("#table_result").append("<tr><td>"+(i+1)+"</td><td><p class='text-center'>"+data[i]+"</p></td></tr>")
						}
					}
					history.pushState(null, null, url+"chuoi-phan-ung/"+chuoiPhanUng);
					clearLoad();
				}
			});
		}
		return false;
		
	});
});
</script>
<?php
	$input_chainReaction=(isset($input_chainReaction))?$input_chainReaction:"";
	$chainReactions=(isset($chainReactions))?$chainReactions:array();
	$i=1;
?>
<div class="search">
	<div class="container">
		<div class="row">
			<form action="" method="post" id="frmSearch">
				<div class="span10">
					<input type="text" name="chuoiPhanUng" class="span10 thuliumSearchAjax" value="{{$input_chainReaction}}"
					placeholder="Nhập các chất cách nhau bởi khoảng trắng. VD: S SO2 SO3 H2SO4 BaSO4"/>
				</div>
				<div class="span2">
					<button class="btn span2">Tìm</button>
				</div>
			</form>
		</div>
		<h3 class="text-center" id="search_result">Chuỗi phản ứng</h3>
		<p class="text-center" id="searchLoad">
		</p>
		<table class="table table-striped" id="table_result">
			@if(count($chainReactions)>0)
				@foreach($chainReactions as $chainReaction)
				<tr><td>{{$i}}</td><td>{{$chainReaction}}</td></tr>
				<?php $i++ ?>
				@endforeach
			@endif
		</table>
		
	</div>
</div>
@endsection