
function startLoad(){
	$("#searchLoad").html("<img src='"+getURL()+"img/ajax-loader.gif' class='text-center'/>");
}
function clearLoad(){
	$("#searchLoad").html("");
}
function getThulium(){
	var array=new Array();
	$.ajax({
				type:"GET",
				url:getURL()+"hoa-hoc/getThulium",
				dataType:"json",
				success:function(data){
					for(var i=0;i<data.length;i++){
						array.push(data[i]);
					}
				}
			});
	return array;
}

