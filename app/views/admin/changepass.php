<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đổi mật khẩu</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>

    /* * * * * General CSS * * * * */
*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 16px;
  font-weight: 400;
  color: #666666;
  background: #eaeff4;
}

.wrapper {
  margin: 0 auto;
  width: 100%;
  max-width: 1140px;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.container {
  position: relative;
  width: 100%;
  max-width: 600px;
  height: auto;
  display: flex;
  background: #ffffff;
  box-shadow: 0 0 5px #999999;
}

.credit {
  position: relative;
  margin: 25px auto 0 auto;
  width: 100%;
  text-align: center;
  color: #666666;
  font-size: 16px;
  font-weight: 400;
}

.credit a {
  color: #222222;
  font-size: 16px;
  font-weight: 600;
}

.col-left,
.col-right {
  padding: 30px;
  display: flex;
}

.col-left {
  width: 60%;
  -webkit-clip-path: polygon(0 0, 0% 100%, 100% 0);
  clip-path: polygon(0 0, 0% 100%, 100% 0);
  background: #44c7f5;
}

.col-right {
  padding: 60px 30px;
  width: 50%;
  margin-left: -10%;
}

@media(max-width: 575.98px) {
  .container {
    flex-direction: column;
    box-shadow: none;
  }

  .col-left,
  .col-right {
    width: 100%;
    margin: 0;
    -webkit-clip-path: none;
    clip-path: none;
  }

  .col-right {
    padding: 30px;
  }
}

.login-text {
  position: relative;
  width: 100%;
  color: #ffffff;
}

.login-text h2 {
  margin: 0 0 15px 0;
  font-size: 30px;
  font-weight: 700;
}

.login-text p {
  margin: 0 0 20px 0;
  font-size: 16px;
  font-weight: 500;
  line-height: 22px;
}

.login-text .btn {
  display: inline-block;
  padding: 7px 20px;
  font-size: 16px;
  letter-spacing: 1px;
  text-decoration: none;
  border-radius: 30px;
  color: #ffffff;
  outline: none;
  border: 1px solid #ffffff;
  box-shadow: inset 0 0 0 0 #ffffff;
  transition: .3s;
  -webkit-transition: .3s;
}

.login-text .btn:hover {
  color: #44c7f5;
  box-shadow: inset 150px 0 0 0 #ffffff;
}

.login-form {
  position: relative;
  width: 100%;
}

.login-form h2 {
  margin: 0 0 15px 0;
  font-size: 22px;
  font-weight: 700;
}

.login-form p {
  margin: 0 0 10px 0;
  text-align: left;
  color: #666666;
  font-size: 15px;
}

.login-form p:last-child {
  margin: 0;
  padding-top: 3px;
}

.login-form p a {
  color: #44c7f5;
  font-size: 14px;
  text-decoration: none;
}

.login-form label {
  display: block;
  width: 100%;
  margin-bottom: 2px;
  letter-spacing: .5px;
}

.login-form p:last-child label {
  width: 60%;
  float: left;
}

.login-form label span {
  color: #ff574e;
  padding-left: 2px;
}

.login-form input {
  display: block;
  width: 100%;
  height: 35px;
  padding: 0 10px;
  outline: none;
  border: 1px solid #cccccc;
  border-radius: 30px;
}

.login-form input:focus {
  border-color: #ff574e;
}

.login-form button,
.login-form input[type=submit] {
  display: inline-block;
  width: 100%;
  margin-top: 5px;
  color: #44c7f5;
  font-size: 16px;
  letter-spacing: 1px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #44c7f5;
  border-radius: 30px;
  box-shadow: inset 0 0 0 0 #44c7f5;
  transition: .3s;
  -webkit-transition: .3s;
}

.login-form button:hover,
.login-form input[type=submit]:hover {
  color: #ffffff;
  box-shadow: inset 250px 0 0 0 #44c7f5;
}
    </style>
</head>
<body>

<div class="wrapper">
  <?php
  $messenger = Session::flash('mess');
  if(!empty($messenger))
  {
    echo '<h2 class="text-danger">'.$messenger.'</h2>';
  }
  ?>
  <div class="container">
    <div class="col-left">
      <div class="login-text">
        <h2>Xin chào quản trị viên</h2>
        
        <!-- <a class="btn" href="">Sign Up</a> -->
      </div>
    </div>
    <div class="col-right">
      <div class="login-form">
        <h2>Đổi mật khẩu</h2>
        <form action="<?php echo _WEB_ROOT; ?>/admin/User/postChangePass" method="POST">
          <p>
            <label>Tài Khoản<span>*</span></label>
            <input name="username" type="text" placeholder="Tài khoản" required>
          </p>
          <p>
            <label>Mật Khẩu hiện tại<span>*</span></label>
            <input name="passwordold" type="password" placeholder="Mật khẩu hiện tại" required>
          </p>
          <p>
            <label>Mật Khẩu mới<span>*</span></label>
            <input id="passwordNew" name="passwordnew" type="password" placeholder="Mật khẩu mới" required>
            <p class="text-danger " id="mess_password" style="display:none">Mật khẩu mới phải từ 6 kí tự</p>
          </p>
          <p>
            <label>Xác nhận mật Khẩu mới<span>*</span></label>
            <input  id="config_password" name="configpassword" type="password" placeholder="nhập lại mật khẩu mới" required>
            <p class="text-danger " id="mess_config_password" style="display:none">Mật khẩu mới chưa chính xác</p>
          </p>
          <p>
            <input type="submit" value="Đổi mật khẩu" />
          </p>
          
        </form>
      </div>
    </div>
    
  </div>
  <!-- <div class="credit">
    Designed by <a href="https://htmlcodex.com">HTML Codex</a>
  </div> -->
</div>


  <script>
     var input_configPassword = document.getElementById('config_password'),
        input_passwordNew = document.getElementById('passwordNew')
        mess_config_password =document.getElementById('mess_config_password'),
        mess_password_new =document.getElementById('mess_password') ;

        input_passwordNew.addEventListener('blur',function(e) {
          if(input_passwordNew.value.length >=6)
          {
            mess_password_new.style.display = 'none';
          }
          else{
            mess_password_new.style.display = 'block';
          }
        });
        input_passwordNew.oninput = function (e)
        {
          if(e.target.value.length >=6)
          {
            mess_password_new.style.display = 'none';
          }
        }

        input_configPassword.addEventListener('input',function(e) {
          if(input_passwordNew.value === e.target.value )
          {
            mess_config_password.style.display = 'none';
          }
          else{
            mess_config_password.style.display = 'block';

          }
          console.log(e.target.value);

        })
       

  </script>
</body>
</html>