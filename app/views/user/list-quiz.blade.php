@extends('user.main');

@section('content')

<div class="container">
  @if(count($data_list)==0)
    <h4>Bạn chưa tạo hệ thống trắc nghiệm nào</h4>
  @else
  <h4>Danh sách các bài tập trắc nghiệm của bạn</h4>
  <ul class="nav">
    @foreach($data_list as $quiz)
      <li><a href="{{TracNghiemController::getUrlChude($quiz->chu_de,$quiz->id)}}">{{$quiz->chu_de}}</a>
    @endforeach
  </ul>
  @endif

</div>
@endsection