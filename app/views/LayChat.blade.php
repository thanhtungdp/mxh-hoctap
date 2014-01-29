<html>

{{$data}}
<div id="tungcu">

	</div>

<script type="text/javascript">
$(document).ready(function(){
	alert(1);
	var multiple=(".substance-formula").val() || [];

	$("#tungcu").html(multiple.join(","));

});
</script>
</html>