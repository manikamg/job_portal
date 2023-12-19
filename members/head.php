<?php
include_once 'member_session.php';
error_reporting(0);
$profile = mysqli_query($db, "SELECT `id` FROM `candidate` WHERE `id`='$id' AND (`contact` IS NULL || `emailid`  IS NULL || `pic`  IS NULL || `resume`  IS NULL)");
$cc = mysqli_num_rows($profile); ?>
<!doctype html>
<html lang="utf-8">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <title>Apply Job | Search Job | Job Portal</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet">
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet">
    <link href="../bower_components/morris.js/morris.css" rel="stylesheet">
    <link href="../bower_components/jvectormap/jquery-jvectormap.css" rel="stylesheet">
    <link href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="../bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav skin-purple">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header"><a class="navbar-brand" href="#"><b>Job</b>Portal</a></div>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown messages-menu"><a class="dropdown-toggle" href="#"
                                    data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span
                                        class="label label-success">
                                        <?php echo $cc; ?>
                                    </span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <?php if (!empty($cc)) { ?><a href="profile">
                                                        <div class="pull-left">
                                                            <?php if (empty($run['pic'])) { ?><img
                                                                    alt="<?php echo $run['name']; ?>" class="img-circle"
                                                                    src="../assets/general/jobs.png">
                                                            <?php } else { ?><img alt="<?php echo $run['name']; ?>"
                                                                    class="img-circle"
                                                                    src="../assets/candidate/<?php echo $run['pic']; ?>">
                                                            <?php } ?>
                                                        </div>
                                                        <h4>Profile In complete <small><i class="fa fa-clock-o"></i>
                                                                <?php echo date('d-M'); ?>
                                                            </small></h4>
                                                        <p>Complete Now !<br>Increase Job Possibility?</p>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            <li class="dropdown messages-menu"><a href="#" class="dropdown-toggle"
                                    data-toggle="dropdown"><i class="fa fa-envelope-o"></i> <span
                                        class="label label-success">0</span></a></li>
                            <li class="dropdown user user-menu"><a href="#" class="dropdown-toggle"
                                    data-toggle="dropdown">
                                    <?php if (empty($run['pic'])) { ?><img alt="<?php echo $run['name']; ?>"
                                            class="user-image" src="../assets/general/jobs.png">
                                    <?php } else { ?><img alt="<?php echo $run['name']; ?>" class="user-image"
                                            src="../assets/candidate/<?php echo $run['pic']; ?>">
                                    <?php } ?><span class="hidden-xs"></span>
                                </a>
                                <ul class="dropdown-menu"><br>
                                    <li class="user-footer" style="background-color:#fff">
                                        <div class="pull-left"><a href="profile"
                                                class="btn btn-flat btn-default">Profile</a></div>
                                        <div class="pull-right"><a href="../logout.php"
                                                class="btn btn-flat btn-danger">Logout</a></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>