<?php 
$sml=mysqli_query($db,"SELECT * FROM `aplied_job` WHERE `compid`='$id' AND  `stf_status`='selected' AND `final_status`='open' AND `read_status`=1");
$taply=mysqli_num_rows($sml); ?>
<!doctype html>
<html lang="utf-8">
<head> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="">
<title> Manage your job posting | Company Area</title>
<link rel="icon" href="https://www.rmjob.in//images/rmjoblogo.png"  type="image/png" sizes="16x16">
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
<link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b><?php echo ucwords($run['farmname']); ?></b></a>
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-success"><?php echo $taply; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $taply; ?> messages</li>
              <li>
                <ul class="menu">
                  <?php while ($ab=mysqli_fetch_array($sml)) { ?>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="../assets/candidate/<?php echo applicantPic($ab['applicantid']); ?>" class="img-circle" alt="<?php echo $ab['applicantid']; ?>">  
                      </div>
                      <h4>
                        <?php echo applicantName($ab['applicantid']); ?>
                        <small><i class="fa fa-clock-o"></i>  <?php echo date('d/M/Y',strtotime($ab['timedate'])); ?></small>
                      </h4>
                      <p><?php echo ucwords($ab['msg']); ?></p>
                    </a>
                  </li>
                <?php }?>
                </ul>
              </li>
            </ul>
          </li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if(isset($run['logo'])){ ?>
            <img class="user-image"  src="../assets/clients/<?php echo $run['logo']; ?>" alt="<?php echo $run['name']; ?>"> 
               <?php }else{?>
              <img class="user-image"  src="../assets/general/jobs.png" alt="<?php echo $run['name']; ?>">
               <?php }?>
                <span class="hidden-xs"></span>
              </a>
              <ul class="dropdown-menu"><br/>
                <li class="user-footer" style="background-color:;">
                    <a href="client-profile-update" style="width: 50%;" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profile</a></li>
                <li class="user-footer" style="background-color:;">
                    <a href="client-profile-update" style="width: 50%;" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Password</a></li>
                  <li class="user-footer" > 
                    <a href="../logout" style="width: 50%;color: #fff;" class="btn btn-danger btn-flat"><i class="fa fa-exit"></i> Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>