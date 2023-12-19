<?php
session_start();
include_once '../config.php';
include_once '../function.php';
$id = trim($_SESSION['login_user']);
if (empty($id)) {
    header('Location:../manage/login');
}
$sql = mysqli_query($db, "SELECT `id`, `name`, `email`, `password`, `pic`, `is_super`, `created_at`, `updated_at` FROM `admins` WHERE `id`='$id'");
$run = mysqli_fetch_array($sql);
$newjob = mysqli_query($db, "SELECT * FROM `aplied_job` WHERE `read_status`=1");
$totaljob = mysqli_num_rows($newjob);
//new post
$newp = mysqli_query($db, "SELECT * FROM `post_job` WHERE `read_adm`=1");
$totalpost = mysqli_num_rows($newp);
?>
<!doctype html>
<html lang="ENG">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../assets/images/rmjoblogo.png" type="image/png" sizes="16x16">
    <title> Admin Area </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href='../bower_components/bootstrap/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href='../bower_components/font-awesome/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../css/style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">
        <header class="main-header"><a href="#" class="logo"><span class="logo-mini">JOB PORTAL</span><span
                    class="logo-lg">JP</span></a>
            <nav class="navbar navbar--top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">
                                    <?php echo $totaljob + $totalpost; ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have
                                    <?php echo $totaljob; ?> notifications
                                </li>
                                <li>
                                    <ul class="menu">
                                        <?php while ($jobrun = mysqli_fetch_array($newjob)) { ?>
                                            <li>
                                                <a href="new-job-application?jobid=<?php echo $jobrun['id']; ?>">
                                                    <i class="fa fa-user text-red"></i><b>
                                                        <?php echo ucwords(postName($jobrun['jobid'])); ?>
                                                    </b>
                                                    ~
                                                    <?php echo ucwords(applicantName($jobrun['applicantid'])); ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <ul class="menu">
                                        <?php while ($rpost = mysqli_fetch_array($newp)) { ?>
                                            <li>
                                                <a href="view-posted-job?id=<?php echo base64_encode($rpost['id']); ?>">
                                                    <i class="fa fa-user text-red"></i><b>
                                                        <?php echo ucwords(($rpost['postname'])); ?>
                                                    </b>
                                                    ~
                                                    <?php echo ucwords(companyname($rpost['compid'])); ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="new-job-application">View all</a></li>
                            </ul>
                        </li>
                        <?php
                        $naply = mysqli_query($db, "SELECT `id`, `admin`, `stfid`, `name`, `middle`, `last`, `contact`, `emailid`, `pic`, `resume`, `pass`, `status`, `regiprice`, `regi_status`, `sread`, `ip`, `datetime` FROM `candidate` WHERE `sread`=1");
                        $runaply = mysqli_num_rows($naply);
                        ?>
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">
                                    <?php echo $runaply; ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have
                                    <?php echo $runaply; ?> Notification
                                </li>
                                <li>
                                    <ul class="menu">
                                        <?php while ($rply = mysqli_fetch_array($naply)) { ?>
                                            <li><!-- start message -->
                                                <a href="full-profile?read&id=<?php echo base64_encode($rply['id']) ?>">
                                                    <div class="pull-left">
                                                        <?php if (!empty($rply['pic'])) { ?>
                                                            <img src="../assets/candidate/<?php echo $rply['pic']; ?>"
                                                                class="img-circle" style="height: 40px;width: 40px;">
                                                        <?php } ?>
                                                    </div>
                                                    <h4><small>
                                                            <?php echo $rply['name'] . '&nbsp;' . $rply['middle'] . '&nbsp;' . $rply['last'] . '&nbsp;'; ?>
                                                        </small>
                                                        <small><i class="fa fa-clock-o"></i>
                                                            <?php echo date('M-Y', strtotime($rply['datetime'])); ?>
                                                        </small>
                                                    </h4>
                                                    <p>New Member?</p>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="candidate-manage">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../assets/general/1.png" class="user-image"
                                    alt="<?php echo ucwords($run['name']); ?>">
                                <span class="hidden-xs">
                                    <?php echo ucwords($run['name']); ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="../assets/general/1.png" class="img-circle"
                                        alt="<?php echo ucwords($run['name']); ?>">

                                    <p>
                                        <?php echo ucwords($run['name']); ?>
                                        <small>Member since
                                            <?php echo date('d-m-Y', strtotime($run['created_at'])); ?>
                                        </small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>