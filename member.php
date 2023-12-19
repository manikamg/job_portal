<?php
include("function.php");
session_start();
if (isset($_SESSION['member'])) {
    header('location:members/');
}
$error = '';
if (isset($_POST["submit"])) {
    $myusername = input_validate($_POST['username']);
    $mypassword = input_validate($_POST['password']);
    $sql = "SELECT `id`,`name`,`emailid` FROM candidate WHERE `contact`= '$myusername' AND `pass`= '$mypassword'";
    $result = query($sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['member'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['emailid'];
        header("location: members/?main");

    } else {
        $error = "Mobile Number & Password Not Matched";
    }
}
if (isset($_POST["update"])) {
    $oldpass = input_validate($_POST['oldpass']);
    $mail = input_validate($_POST['email']);
    $newpass = input_validate($_POST['npass']);
    $chk = query("SELECT `id` FROM `candidate` WHERE `emailid`='$mail' AND `pass`='$oldpass'");
    if (empty(mysqli_num_rows($chk))) {
        header("location: member?password&failed");
    } else {
        $rin = mysqli_fetch_array($chk);
        $chk = query("UPDATE `candidate` SET `pass`='$newpass' WHERE `id`='" . $rin['id'] . "'");
        header("location: member?password&success");
    }

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title>Welcome To Root Placement | Member Login Area</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet">
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"
        rel="stylesheet">

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

        .checkbox{
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
    background-image: url(assets/images/member_bg.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: 100%;
    height: 100vh;
">
    <div class="login-box">
        <?php if (isset($_GET['failed'])) { ?>
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-2x fa-warning" style="color:red"></i></h3>
                    <div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="remove"
                            onclick='window.open("member?password","_self")' type="button"><i
                                class="fa fa-times"></i></button></div>
                </div>
                <div class="box-body"><b style="color:red">Your Old Password Not Matched</b></div>
            </div><br>
        <?php } elseif (isset($_GET['success'])) { ?>
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-2x fa-warning" style="color:red"></i></h3>
                    <div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="remove"
                            onclick='window.open("member","_self")' type="button"><i class="fa fa-times"></i></button></div>
                </div>
                <div class="box-body"><b style="color:red">Success..!<br /> Your Password Updated</b></div>
            </div><br>
        <?php } ?>
        <a href="../.\" style="
            position:relative;
            z-index:1;
            cursor:pointer;
            color:black;
            top:25px;
            margin-left:25px;
        ">
            << Back </a>
                <br />
                <div class="login-logo"> </div>
                <div class="login-box-body custom_login">
                    <?php if (isset($_GET['password'])) { ?>
                        <p class="login-box-msg">Change Your Password</p>
                    <?php } else { ?>
                        <p class="login-box-msg"><b>Member</b> Sign in to start your session</p>
                    <?php } ?><b style="color:red">
                        <?php echo $error; ?>
                    </b>
                    <?php if (isset($_GET['password'])) { ?>
                        <br/>
                        <br/>
                        <form method="post">
                            <div class="form-group has-feedback"><label>Email Id</label>
                                <input class="form-control" name="email" placeholder="enter email" type="email"
                                    style="border: 1px solid #79A6FE;"> <span
                                    class="form-control-feedback glyphicon glyphicon-envelope"></span>
                            </div>
                            <div class="form-group has-feedback"><label>Old Passwprd</label> <input class="form-control"
                                    name="oldpass" placeholder="User Name" type="password"> <span
                                    class="form-control-feedback glyphicon glyphicon-envelope"></span></div>
                            <div class="form-group has-feedback"><label>New Password</label> <input class="form-control"
                                    name="npass" placeholder="Password" type="password"> <span
                                    class="form-control-feedback glyphicon glyphicon-lock"></span></div>
                            <div class="row">
                                <div class="col-xs-12">

                                    <button class="btn btn-block border_ btn_1 btn-primary" name="update"
                                        type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <br />
                        <br />
                        <form method="post">
                            <div class="form-group has-feedback"><label>User Name</label>
                                <input class="form-control" type="text" name="username" placeholder="User Name"> <span
                                    class="form-control-feedback glyphicon glyphicon-envelope"></span>
                            </div>
                            <div class="form-group has-feedback"><label>Password</label> <input class="form-control"
                                    name="password" placeholder="Password" type="password"> <span
                                    class="form-control-feedback glyphicon glyphicon-lock"></span></div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="checkbox icheck"><label><input type="checkbox"> Remember Me</label></div>
                                </div>
                                <div class="col-xs-12">
                                    <button class="btn btn-block border_ btn_1 btn-primary" name="submit" type="submit">Sign
                                        In</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    <hr>
                    <center>
                    <?php
                    if (isset($_GET['password'])) { ?>
                        <a href="member" style="color:red">Cancel</a><br>
                    <?php } else { ?>
                        <a href="member?password">I forgot my password</a><br>
                    <?php } ?>
                    <a href="register" class="text-center">Register a new membership</a>
                    </center>
                </div>

</body>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $("input").iCheck({
            checkboxClass: "icheckbox_square-blue",
            radioClass: "iradio_square-blue",
            increaseArea: "20%"
        });
    })
</script>

</html>