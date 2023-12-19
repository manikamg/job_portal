<?php
include("config.php");
session_start();
if (isset($_SESSION['franchise'])) {
  header('location:franchise/dashboard');
}
$error = '';
if (isset($_POST["submit"])) {
  $myusername = mysqli_real_escape_string($db, $_POST['username']);
  $mypassword = mysqli_real_escape_string($db, $_POST['password']);
  $sql = "SELECT `id`, `name`, `email` FROM `admins` WHERE `email`='$myusername' AND `password`='$mypassword' AND `is_super`=1";
  $result = mysqli_query($db, $sql);
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION['franchise'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['emailid'];

    header("location: franchise/dashboard");

  } else {
    $error = "Wrong Combination of Email and Password";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Staff Login Area</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .border_ {
      border: none;
      border-radius: 5px;
      height: 40px;
      line-height: 28px;
      font-size: 16px;
      font-weight: 600;
    }

    .btn_1:hover {
      background-color: #5D46BD;
    }

    .custom_login {
      margin: 0;
      top: 50px;
      left: 50%;
      position: absolute;
      transform: translateX(-50%);
      /* background-color: rgb(33, 41, 66, 0.5); */
      background-color: #ffffff;
      border-radius: 9px;
      border-top: 10px solid #79a6fe;
      border-bottom: 10px solid #79a6fe;
      width: 350px;
      height: 500px;
      box-shadow: 1px 1px 108.8px 19.2px rgb(25, 31, 53);
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      display: block;
      border: 1px solid #79A6FE;
      background: transparent;
      height: 40px;
      border-radius: 5px;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
      border: 1px solid #79A6FE;
    }

    button {
      border-radius: 5px;
    }

    .checkbox {
      position: relative;
      left: 20px;
    }

    input [type="checkbox"] {
      position: relative;
      left: 20px;
    }
  </style>
</head>

<body class="hold-transition login-page" style="
  background-image: url(assets/images/staf_bg.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  background-size: 100%;
  height: 100vh;
">
  <div class="login-box">
    <div class="login-logo">
      <!--<img src="https://lh3.googleusercontent.com/YZQKl9B1L2r8LidIlkrLQggE5rcGcXVu9w-d1h47KgoP7t6SayhOIVdPBwQaiYd7bmx0lo74=w1080-h608-p-no-v0" width="60px;" height="60px;"/> -->
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body custom_login">
      <br />
      <br />
      <p class="login-box-msg" style="font-size: 20px;">Sign in to start your session</p>
      <b style="color: red;">
        <?php echo $error; ?>
      </b>
      <br />
      <br />
      <form method="post" action="#">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="username" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
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
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" name="submit" class="btn btn-primary border_ btn_1 btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
      <!-- /.social-auth-links -->
      <center style="margin-top:30px;">
        <a href="#">I forgot my password</a><br>
        <a href="register" class="text-center">Register a new membership</a>
      </center>
    </div>
    <!-- /.login-box-body -->
  </div>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>

</html>