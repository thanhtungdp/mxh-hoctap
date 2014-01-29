@extends("main")

@section("content")
<script type="text/javascript">
	$(document).ready(function(){
		var refesh;
		var url="{{Asset("")}}";
		var index=1132;//990->1200
		var thulium=new Array();
		var getThulium=function(){
			$.ajax({
				type:"GET",
				url:url+"get/get-chat",
				dataType:'json',
				success:function(data){
					for(var i=0;i<data.length;i++){
						thulium[i]=data[i];
					}
				}
			});
		}
		var ajax=function(){
			if(index<1201){
				 $.ajax({
			            type:"POST",
			            url:url+'get/equations',
			            data:{
			            	'thulium':thulium[index]
			            },
			            dataType:'json',
			            beforeSend:function(){
			            	$("#loadding").append("loadding");
			            	clearInterval(refesh);
			            },
			            success:function(data){
			           		$("#loadding").empty();	
			           		$("#content").append("<br/><b>"+thulium[index]+" đã được cập nhật </b>-"+index);
			           		$("#content").append('<div class="equations equation-'+index+'"></div>')
			           		for(var i=0;i<data.length;i++){
			           			$(".equation-"+index).append("<br/>"+data[i]);
			           		}
			           		index++;
			           		if(data.check=true)	           		
			           			refesh=setInterval(ajax,1500);
			           		
			            }
			        });
			}
			else{
				clearInterval(refesh);
				alert("Đã cập nhật tất cả")
			}
		}
		getThulium();
		$( ".submit" ).click(function() {
			ajax();
			//refesh=setInterval(ajax,2000);
		});
	});
</script>
<div id="loadding">

</div>
<div id="content">

<button class="submit">Nhấn vào đi cu</button>
</div>
@endsection