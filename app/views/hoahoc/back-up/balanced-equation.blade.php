@extends('hoahoc.hoahoc-main');
@section("title")
	Cân bằng phương trình | {{getTitle()}}
@endsection
@section("balanced-equation")
<script type="text/javascript">
$(document).ready(function(){
	var url="{{Asset('')}}"+"hoa-hoc/";
	
	function resetHTMLsearch(){
		$("#search_result").empty();
		$("#equation_results").empty();
		$("table_result").html("<tr><td>PT</td><td>Equation</td>");
	}
	$("#frmSearch").submit(function(){
		
		var equation=$("input[name=equation]").val();
		resetHTMLsearch();
		//Xóa các thông tin trước
		
		if(equation=="")
			alert("Vui lòng nhập các chất để tìm kiếm");
		
		else{
			$.ajax({
				type:"POST",
				url:url+"can-bang-pt",
				data:{
					'equation':equation
				},
				dataType:"json",
				beforeSend:function(){
					startLoad();
				},
				success:function(data){
					if(data=="")
					{
						$("#search_result").html("Không cân bằng được phương trình");
					}
					else{
						$("#search_result").html("Phương trình cần cân bằng");
						$("#equation_results").append("<p class='text-center'>"+data+"</p>");
					}
					history.pushState(null, null, url+"can-bang-pt/"+equation);
					clearLoad();
				}
			});

		}
		return false;
		
	});
});
</script>
<?php
	$input_balanced=(isset($input_balanced))?$input_balanced:"";
	$balanced_equation=(isset($balanced_equation))?$balanced_equation:"";
?>
<div class="search">
	<div class="container">
		<div class="row">
			<form action="" method="post" id="frmSearch">
				<div class="span10">
					<input type="text" name="equation" class="span2" value="{{$input_balanced}}" 
					placeholder="Thí dụ: Fe + 2HCl = FeCl2 + H2"/>
				</div>
				<div class="span2">
					<button class="btn span2">Tìm</button>
				</div>
			</form>
		</div>
		<h3 class="text-center" id="search_result">
				Cân bằng phương trình
		</h3>
		<p class="text-center" id="searchLoad">
		</p>
		<div id="equation_results" class="container">
			@if(!empty($balanced_equation))
			<p class="text-center equation">{{$balanced_equation}}</p>
			@endif
		</div>
	</div>
</div>
@endsection