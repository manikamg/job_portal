<?php
include_once 'member_session.php';
error_reporting(0); ?>
<!doctype html>
<html lang="utf-8">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    <?php echo ucwords($run['company']); ?> | Franchise Panel
  </title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
</head>

<body class="hold-transition skin-red layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="dashboard">Dashboard <span class="sr-only">(current)</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pin Manage <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="pin-purchase">Purchase Pin</a></li>
                  <li><a href="pin-manage">Pin Manage</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">

                  <li><a href="#" class="disabled">Income Report</a></li>

                  <li><a href="#">Level Report </a></li>
                  <li><a href="#">Overall Report</a></li>
                </ul>
              </li>


            </ul>
          </div>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 messages</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <?php if (empty($run['pic'])) { ?>
                              <img class="img-circle" src="../assets/general/jobs.png" alt="<?php echo $run['name']; ?>"
                                style="height:20px;">
                            <?php } else { ?>
                              <img class="img-circle" src="../assets/clients/<?php echo $run['pic']; ?>"
                                alt="<?php echo $run['name']; ?>" style="height:20px;">
                            <?php } ?>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 notifications</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php if (empty($run['pic'])) { ?>
                    <img class="img-circle" src="../assets/general/jobs.png" alt="<?php echo $run['name']; ?>"
                      style="height:20px;">
                  <?php } else { ?>
                    <img class="img-circle" src="../assets/clients/<?php echo $run['pic']; ?>"
                      alt="<?php echo $run['name']; ?>" style="height:20px;">
                  <?php } ?>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <?php if (empty($run['pic'])) { ?>
                      <img class="img-circle" src="../assets/general/jobs.png" alt="<?php echo $run['name']; ?>">
                    <?php } else { ?>
                      <img class="img-circle" src="../assets/clients/<?php echo $run['pic']; ?>"
                        alt="<?php echo $run['name']; ?>">
                    <?php } ?>

                    <p style=color:#000;><?php echo ucwords($run['company']); ?>
                      <small>Member since
                        <?php echo date('d-M-Y', $run['created_at']); ?>
                      </small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="account" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>