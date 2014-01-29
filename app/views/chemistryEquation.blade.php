@extends("main")
@section("content")
<form action="{{Asset('pthh')}}" method="post"/>
	<input type="text" name="chatThamGia"/>
	<input type="text" name="chatTaoThanh"/>
	<input type="submit">
</form>

@endsection