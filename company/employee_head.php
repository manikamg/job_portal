
<?php  
session_start();
 include_once '../config.php';
 include_once '../function.php';
  $id=trim($_SESSION['login_user']);

if(empty($id)){
  header('Location:.././');
}
$sql=mysqli_query($db,"SELECT * FROM `admins` WHERE `id`='$id'");
$run=mysqli_fetch_array($sql);
$newjob=mysqli_query($db,"SELECT * FROM `aplied_job` WHERE `read_status`=1");
$totaljob=mysqli_num_rows($newjob);
//new post
$newp=mysqli_query($db,"SELECT * FROM `post_job` WHERE `read_adm`=1");
$totalpost=mysqli_num_rows($newp);
?> 
<!doctype html>
<html lang="ENG">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> GHS CRM | Employee </title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href='../bower_components/bootstrap/dist/css/bootstrap.min.css'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='../bower_components/font-awesome/css/font-awesome.min.css'>
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">

  <header class="main-header">
 
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>HS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>G</b>HS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar--top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
        

          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php  echo $totaljob+$totalpost;  ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php  echo $totaljob;  ?> notifications</li>
              <li> 
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php while($jobrun=mysqli_fetch_array($newjob)){ ?>
                  <li>
                    <a href="new-job-application?jobid=<?php echo $jobrun['id']; ?>">
                      <i class="fa fa-user text-red"></i><b><?php echo ucwords(postName($jobrun['jobid'])); ?></b>
                     ~ <?php echo ucwords(applicantName($jobrun['applicantid'])); ?>
                    </a>
                  </li>
                <?php }?>
                </ul>
                 <ul class="menu">
                  <?php while($rpost=mysqli_fetch_array($newp)){
//SELECT `id`, `postid`, `adminid`, `stfid`, `clientid`, `compid`, `postname`, `post_number`, `priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`, `postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`, `status`, `read_sft`, `read_adm`, `timedate`, `ip`
                   ?>
                  <li> 
                    <a href="view-posted-employee-job?id=<?php echo base64_encode($rpost['id']); ?>">
                      <i class="fa fa-user text-red"></i><b><?php echo ucwords(($rpost['postname'])); ?></b>
                     ~ <?php echo ucwords(companyname($rpost['compid'])); ?>
                    </a>
                  </li>
                <?php }?>
                </ul>
              </li>
              <li class="footer"><a href="new-job-application">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <?php
           $naply=mysqli_query($db,"SELECT `id`, `admin`, `stfid`, `name`, `middle`, `last`, `contact`, `emailid`, `pic`, `resume`, `pass`, `status`, `regiprice`, `regi_status`, `sread`, `ip`, `datetime` FROM `candidate` WHERE `sread`=1"); 
           $runaply=mysqli_num_rows($naply);
           ?> 
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger"><?php echo $runaply; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $runaply; ?> Notification</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php while ($rply=mysqli_fetch_array($naply)) {?>
                    <li><!-- start message -->
                    <a href="full-profile?read&id=<?php echo base64_encode($rply['id']) ?>">
                      <div class="pull-left">
                        <?php if(!empty($rply['pic'])){?>
                        <img src="../assets/candidate/<?php echo $rply['pic']; ?>" class="img-circle"  style="height: 40px;width: 40px;">
                      <?php }?>
                      </div>
                      <h4><small>
                        <?php echo $rply['name'].'&nbsp;'.$rply['middle'].'&nbsp;'.$rply['last'].'&nbsp;'; ?></small>
                        <small><i class="fa fa-clock-o"></i> <?php echo date('M-Y',strtotime($rply['datetime'])); ?></small>
                      </h4>
                      <p>New Member?</p>
                    </a>
                  </li>
                <?php }?>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="candidate-manage">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/general/1.png" class="user-image" alt="<?php echo ucwords($run['name']); ?>">
              <span class="hidden-xs"><?php echo ucwords($run['name']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/general/1.png" class="img-circle" alt="<?php echo ucwords($run['name']); ?>">

                <p>
                 <?php echo ucwords($run['name']); ?>
                  <small>Member since <?php echo date('d-m-Y',strtotime($run['created_at'])); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
           <!--  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/clients/1.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>  
                        
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          <a href="./"> 
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="employee-dashboard">
            <i class="fa fa-th"></i> <span>Comapany Posted Job</span>
          </a> 
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Job Manage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="manage-job-employee"><i class="fa fa-circle-o"></i> Manage Job</a></li>
            <!-- <li><a href="employee-manage"><i class="fa fa-circle-o"></i> Employee</a></li> -->
          </ul>
        </li>
       <!--  <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Report</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         <li>
          <a href="user-preference">
            <i class="fa fa-files-o"></i>
            <span>Blacklisting</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li> -->
        <li class="header">Action</li>
        <li><a href="../logout.php"><i class="fa fa-circle-o text-yellow"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>