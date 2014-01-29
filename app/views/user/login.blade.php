@extends('user.main');

@section('content')

<div class="container">
  @if(isset($error))
    <div class="alert alert-error">
      Tài khoản hoặc mật khẩu không đúng
    </div>
  @endif
  <div id="signup">
    <form action="" method="post" class="form-signup" id="form-signup">
      <h2 class="form-signup-heading">Đăng nhập</h2>
        <input type="text" name="username" class="input-block-level" placeholder="Tài khoản"/>
        <input type="password" name="password" class="input-block-level" placeholder="Mật khẩu"/>
        
        <button type="submit" class="btn">Đăng nhập</button>
        <p>Bạn chưa có tài khoản. Hãy <a href="{{Asset('tai-khoan/dang-ky')}}">đăng ký</a></p>
    </form>
  </div>

</div>
@endsection