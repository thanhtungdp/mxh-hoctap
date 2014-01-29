@extends('user.main');

@section('content')
<script type="text/javascript">
  $(document).ready(function(){
    
    var username,password,re_password,email,captcha;
    var errors=new Array();
    var dem=0;
    function resetErrors(){
      errors=[];
      dem=0;   
      $("#errors").empty();  
    }
    function addErrors(){   
      $("#errors").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button></div>');
    }
    function addSuccess(){
      $("#errors").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button></div>');
    }
    function getForm(){
      username=$("input[name='username']").val();
      password=$("input[name='password']").val();
      re_password=$("input[name='re-password']").val();
      email=$("input[name='email']").val();
      captcha=$("input[name='captcha']").val();
    }
    function checkError(){
      if(username=="" || password=="" || re_password=="" || email=="" || captcha==""){
        errors[dem]="Vui lòng nhập đầy đủ thông tin đăng ký";
        dem++;
      }
      else{
        validateUser();
        if(password!=re_password)
          errors[dem]="Password không giống nhau";
          dem++;
      }
      if(errors.length>0){
        addErrors();
        showErrors(); 
      }
    }
    function showErrors(){
      for(var i=0;i<errors.length;i++){
        $("#errors .alert").append("<p>"+errors[i]+"</p>");
      }
    }
    function validateUser(){
      var letters = /^[a-zA-Z0-9_]+([a-zA-Z0-9_]+)*$/;
      if(username.length<5)
      {
        errors[dem]="Tài khoản phải từ 5 ký tự trở lên";
        dem++;
      }  
      if(!username.match(letters))  
      {  
        errors[dem]="Tài khoản chỉ có thể chứa các chữ cái thường, các chữ cái hoa, và dấu gạch dưới";
        dem++;
      }
    }
    function checkCaptcha(){
      $.ajax({
        type:'POST',
        url:getURL()+"tai-khoan/kiem-tra-dang-ky",
        data:{'username':username,'password':password,'email':email,'captcha':captcha},
        dataType:'json',
        success:function(data){
          for(var i=0;i<data.length;i++){
            errors[dem]=data[i];
            dem++;
          }
          checkError();
          if(errors.length==0){
            addSuccess();
            $("#errors .alert").html("<strong>"+username+"</strong> đăng ký thành công")
          }
        }
      });
    }
    
    $("#form-signup").submit(function(){      
      resetErrors();
      getForm();
      checkError();      
      if(errors.length==0){
        resetErrors();
        checkCaptcha(); 
      }
      return false;
    });
  });
</script>


<div class="container">
  <div id="errors">
  </div>   
</div>  



<div class="container">
  <div id="signup">
    <form action="" method="post" class="form-signup" id="form-signup">
      <h2 class="form-signup-heading">Đăng ký</h2>
        <input type="text" name="username" class="input-block-level" placeholder="Tài khoản"/>
        <input type="password" name="password" class="input-block-level" placeholder="Mật khẩu"/>
        <input type="password" name="re-password" class="input-block-level" placeholder="Nhập lại mật khẩu"/>
        <input name="email" class="input-block-level" placeholder="Email" type="email"/>
        <div class="input-block-level">
          <input class="input-block-level" name="captcha" placeholder="Mã xác nhận" type="text"/> <img src="{{Asset('tai-khoan/captcha')}}"/>
        </div>
      <button type="submit" class="btn">Đăng ký</button>
     <p>Bạn có tài khoản. Hãy <a href="{{Asset('tai-khoan/dang-nhap')}}">đăng nhập</a></p>
    </form>
  </div>

</div>
@endsection