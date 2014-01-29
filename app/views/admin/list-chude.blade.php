@extends("admin.admin")

@section('content')
<style type="text/css">
	#list{
		width:60%;
		margin:auto;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
			$("a.kiem_duyet").live("click",function(){
		        var id=$(this).attr('data');
		        $.ajax({
		        	type:'POST',
		        	url:getURL()+'/kiem-duyet-chu-de',
		        	data:{'chude_id':id},
		        	dataType:'json',
		        	success:function(){
		        		$("#chu-de-"+id).remove();
		        	}

		        });
		        alert(id);
		        return false;
		      });	
	});
</script>
<div class="container">
	<div id="list" class="including">
		<table class="table">
			@foreach(TracNghiemChude::where('kiem_duyet','=',0)->get() as $chude)
			<tr id="chu-de-{{$chude->id}}"><td><a  class="pull-left" href="{{TracNghiemController::getUrlChude($chude->chu_de,$chude->id)}}">
				{{$chude->chu_de}}</a></td>
				<td><a href="#" data="{{$chude->id}}" class="kiem_duyet pull-right">Duyệt</a></td>
			@endforeach
		</table>
	</div>
</div>
@endsection