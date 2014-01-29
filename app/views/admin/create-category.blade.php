@extends("admin.admin")

@section('content')
	<form action="{{Asset('admin/tao-chuyen-muc')}}" method="post">
		<input type="text" name="chuyenmuc"/>
		<button type="submit">Tạo</button>
	</form>
@endsection