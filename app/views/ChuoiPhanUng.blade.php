@extends("main");
@section("content")
<form action="{{Asset('chuoi-phan-ung')}}" method="post">
	<input type="text" name="chuoiPhanUng"/>
	<input type="submit">
</form>

@endsection