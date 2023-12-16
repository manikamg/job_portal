<?php
include("config.php");
session_start();

if (isset($_POST["submit"])) {
  // username and password sent from form 

  $myusername = mysqli_real_escape_string($db, $_POST['username']);
  $mypassword = mysqli_real_escape_string($db, $_POST['password']);

  $sql = "SELECT `id` FROM admins WHERE email = '$myusername' and password = '$mypassword'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $active = $row['id'];

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if ($count == 1) {
    $_SESSION['login_user'] = $active;

    header("location: admin/");

  } else {
    $error = "Your Login Name or Password is invalid";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Login | Job Portal</title>

  <link href="" rel="icon">
  <link href="" rel="apple-touch-icon">
  <link href="" rel="icon" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="manage/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- <base href=""> -->
  <!--
  <link rel="stylesheet" href="manage/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="manage/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="manage/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="manage/plugins/iCheck/square/blue.css">
 -->

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
      padding: 0;
      margin: 0;
      background-image: url("assets/images/login_bg_6.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      background-size: 100%;
      height: 100vh;
    }

    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
    }

    .container {
      margin: 0;
      top: 30px;
      left: 50%;
      position: absolute;
      text-align: center;
      transform: translateX(-50%);
      /* background-color: rgb(33, 41, 66, 0.5); */
      background-color: #fff;
      border-radius: 9px;
      border-top: 10px solid #79a6fe;
      border-bottom: 10px solid #79a6fe;
      width: 400px;
      height: 500px;
      box-shadow: 1px 1px 108.8px 19.2px rgb(25, 31, 53);
    }

    .box h4 {
      font-family: 'Source Sans Pro', sans-serif;
      color: #5c6bc0;
      font-size: 22px;
      margin-top: 54px;
    }

    .box h4 span {
      color: lightgray;
      font-weight: lighter;
    }

    .box h5 {
      font-family: 'Source Sans Pro', sans-serif;
      font-size: 13px;
      color: #a1a4ad;
      letter-spacing: 1.5px;
      margin-top: -15px;
      margin-bottom: 60px;
    }

    .box input[type="text"],
    .box input[type="password"] {
      display: block;
      margin: 20px auto;
      /* background: #262e49; */
      border: 1px solid #79A6FE;
      border-radius: 5px;
      padding: 14px 10px;
      width: 320px;
      outline: none;
      /* color: #d6d6d6; */
      -webkit-transition: all .2s ease-out;
      -moz-transition: all .2s ease-out;
      -ms-transition: all .2s ease-out;
      -o-transition: all .2s ease-out;
      transition: all .2s ease-out;
    }

    ::-webkit-input-placeholder {
      /* color: #565f79; */
    }

    /* .box input[type="text"],
    .box input[type="password"] {
      border: 1px solid #79A6FE;
    } */

    a {
      color: #5c7fda;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    label input[type="checkbox"] {
      position: relative;
      left: 0
      /* display: none; */
      /* hide the default checkbox */
    }

    /* style the artificial checkbox */
    label span {
      height: 13px;
      width: 13px;
      border: 2px solid #464d64;
      border-radius: 2px;
      display: inline-block;
      position: relative;
      cursor: pointer;
      float: left;
      left: 7.5%;
    }

    /* .btn_1:hover{
      background-color: #5D46BD;
    } */

    .btn1 {
      border: 0;
      background: #5D46BD;
      color: #dfdeee;
      border-radius: 7px;
      width: 340px;
      height: 49px;
      font-size: 16px;
      position: absolute;
      top: 79%;
      left: 8%;
      transition: 0.3s;
      cursor: pointer;
    }

    .btn1:hover {
      background: #5d33e6;
    }

    .rmb {
      position: absolute;
      /* margin-left: -24%; */
      margin-top: 0px;
      color: #000;
      font-size: 13px;
    }

    .forgetpass {
      position: relative;
      float: right;
      right: 28px;
    }

    .dnthave {
      position: absolute;
      top: 87%;
      left: 50%;
      transform: translate(-50%);
      text-align: center;
      color: gray;
    }

    /* .box label input[type="checkbox"]::checked+span:before {
      font-family: FontAwesome;
      font-size: 16px;
      content: "\f00c";
      position: absolute;
      top: -4px;
      color: #5d33e6;
      left: -1px;
      width: 15px;
      z-index: 99999;
    } */

    .typcn {
      position: absolute;
      left: 339px;
      top: 282px;
      color: #3b476b;
      font-size: 22px;
      cursor: pointer;
    }

    .typcn.active {
      color: #7f60eb;
    }

    .error {
      background: #ff3333;
      text-align: center;
      width: 337px;
      height: 20px;
      padding: 2px;
      border: 0;
      border-radius: 5px;
      margin: 10px auto 10px;
      position: absolute;
      top: 31%;
      left: 7.2%;
      color: white;
      display: none;
    }

    .footer {
      position: relative;
      left: 0;
      bottom: 0;
      top: 605px;
      width: 100%;
      color: #78797d;
      font-size: 14px;
      text-align: center;
    }

    .footer .fa {
      color: #5D46BD;
      ;
    }
  </style>
</head>

<body>

  <div class="animated bounceInDown">
    <div class="container">
      <div class="login-logo"><i class="fa fa-lock"></i></div>
      <span class="error animated tada" id="msg"></span>
      <?php if (isset($error))
        ; ?>
      <form method="post" name="form1" class="box" onsubmit="return checkStuff()">
        <h4>Admin<span>Dashboard</span></h4>
        <h5>Sign in to your account.</h5>
        <input type="text" name="username" placeholder="Email" autocomplete="off" required>
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off" required>
        <label style="float: left; margin-left: 25px;">
          <input type="checkbox">
          <!-- <span></span> -->
          <small class="rmb">Remember me</small>
        </label>
        <a href="#" class="forgetpass">Forget Password?</a>
        <input type="submit" name="submit" value="Sign in" class="btn1">
      </form>
    </div>
    <a href="/job-portal" class="dnthave">Back to main page</a>
  </div>




  <!-- <div class="login-box">
    <div class="login-logo"><i class="fa fa-lock"></i></div>
    <div class="login-box-body">
      <h1 align="center">Admin Panel</h1>
      <p class="login-box-msg">Sign in to start your session</p>
      <?php if (isset($error))
        ; ?>
      <form method="post">
        <div class="form-group has-feedback">
          <label>User Name</label>
          <input type="email" class="form-control" name="username" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <div class="col-xs-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
      <hr />
      <a href="#">I forgot my password</a>
    </div>
  </div> -->

</body>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  // $(function () {
  //   $('input').iCheck({
  //     checkboxClass: 'icheckbox_square-blue',
  //     radioClass: 'iradio_square-blue',
  //     increaseArea: '20%' /* optional */
  //   });
  // });

  var pwd = document.getElementById('pwd');
  var eye = document.getElementById('eye');

  eye.addEventListener('click', togglePass);

  function togglePass() {

    eye.classList.toggle('active');

    (pwd.type == 'password') ? pwd.type = 'text' : pwd.type = 'password';
  }

  // Form Validation

  function checkStuff() {
    var email = document.form1.email;
    var password = document.form1.password;
    var msg = document.getElementById('msg');

    if (email.value == "") {
      msg.style.display = 'block';
      msg.innerHTML = "Please enter your email";
      email.focus();
      return false;
    } else {
      msg.innerHTML = "";
    }

    if (password.value == "") {
      msg.innerHTML = "Please enter your password";
      password.focus();
      return false;
    } else {
      msg.innerHTML = "";
    }
    // var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    // if (!re.test(email.value)) {
    //   msg.innerHTML = "Please enter a valid email";
    //   email.focus();
    //   return false;
    // } else {
    //   msg.innerHTML = "";
    // }
  }

</script>

</html>