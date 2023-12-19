<?php
   include("config.php");
   include("function.php");
     if(isset($_POST["submit"])){
   	  $contact   ='';
   	  $name      ='';
   	  $email     ='';
   	  $password  ='';
      $contact   = mysqli_real_escape_string($db,$_POST['mobile']);
   	  $name      = mysqli_real_escape_string($db,$_POST['fname']);
   	  $email     = mysqli_real_escape_string($db,$_POST['email']);
      $password  = mysqli_real_escape_string($db,$_POST['password']);
      $cpassword = mysqli_real_escape_string($db,$_POST['cpassword']);
      $namel     = mysqli_real_escape_string($db,$_POST['lname']);
      
      //pic
      $oldpath = $_FILES['pic']['tmp_name'];
//$img=$_FILES['pic']['name'];
$temp = explode(".", $_FILES["pic"]["name"]);
$img = round(microtime(true)) . '.' . end($temp);
$newpath ="assets/candidate/".$img;
move_uploaded_file($oldpath, $newpath);
//resume
$oldpathr = $_FILES['resume']['tmp_name'];
$tempr = explode(".", $_FILES["resume"]["name"]);
$imgr = round(microtime(true)) . '.' . end($tempr);
$newpathr ="assets/candidate/".$imgr;
move_uploaded_file($oldpathr, $newpathr);
$jobid=mysqli_real_escape_string($db,$_POST['postidx']);
$check=mysqli_query($db,"SELECT `id` FROM `aplied_job` WHERE `jobid`='$jobid' AND `mobileno`='$contact'");
if(empty(mysqli_num_rows($check))){
$sql = "INSERT INTO `candidate`(`name`,`last`, `contact`, `emailid`,`pic`, `resume`,`pass`, `ip`) VALUES ('$name','$namel','$contact','$email','$img','$imgr','$password','".$_SERVER['REMOTE_ADDR']."')";
      $result = mysqli_query($db,$sql)or die(mysqli_error($db));
      $aplicantid=mysqli_insert_id($db);
$apply=mysqli_query($db,"INSERT INTO `aplied_job`(`stfid`, `compid`, `jobid`, `applicantid`,`mobileno`,`ip`) VALUES ('".mysqli_real_escape_string($db,$_POST['stfidx'])."','".mysqli_real_escape_string($db,$_POST['compidx'])."','$jobid','$aplicantid','$contact','".$_SERVER['REMOTE_ADDR']."')")or die(mysqli_error($db));
}else{
echo "<script>window.open('apply-for-job?&".md5(uniqid())."&m=".md5(uniqid())."&already=".base64_encode($contact)."&id=".trim($_GET['id'])."&".md5(uniqid())."&".md5(uniqid())."','_self')</script>";
}
if($result>0 && $apply>0) {
echo "<script>window.open('apply-for-job?".md5(uniqid())."&success&id=".trim($_GET['id'])."&".md5(uniqid())."','_self')</script>";
}else {
    echo "<script>alert('SERVER BUSY . Try Later')</script><meta http-equiv='refresh',content='0'/>";
$error = "Fail To Register";
}
}
$joblist=mysqli_query($db,"SELECT * FROM `post_job` WHERE `id`='".base64_decode(trim($_GET['id']))."'");
$aa=mysqli_fetch_array($joblist);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Candidate Apply For Job | Log Up</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="hold-transition login-page">
<nav class="navbar navbar-expand-lg navbar-light bg-blue">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="../.\" style="color: #fff;"></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href=".\" style="color: #fff;">Home</a>
      </li>
    </ul>
    <button class="btn btn-outline-info my-2 my-sm-0" onclick="window.open('member','_self');" type="button">Log In</button>
  </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <a href="web/jobs"><< Back</a>
        	<?php if(isset($_GET['success'])){?>
<div class="col-md-12">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Applied Successfully</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('apply-for-job?<?php echo md5(uniqid());?>&id=<?php echo trim($_GET['id']);?>&<?php echo md5(uniqid()); ?>','_self');" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
          </div>
        </div>
  	<?php }?>
  		<?php if(isset($_GET['already'])){?>
<div class="col-md-12">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Hey ..<b style=color:purple;><?php echo ucwords(applicantNameByMob(base64_decode(trim($_GET['already']))));?></b><br/> Your Are Already Applied For This<br/></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('apply-for-job?<?php echo md5(uniqid());?>&id=<?php echo trim($_GET['id']);?>&<?php echo md5(uniqid()); ?>','_self');" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
          </div>
        </div>
  	<?php }?>
         <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <td>Post Name (nos)<br/>
        <b><?php echo ucwords($aa['postname']).'('.$aa['post_number'].')'; ?></b></td>
        <td>Highest Qualification<br/><b><?php echo ucwords($aa['highestqualification']); ?></b></td>
        <td>Gender<br/><b><?php echo ucwords($aa['gender']); ?></b></td>
        </tr><tr>
        <td>Joining Process<br/><b><?php echo ucwords($aa['joiningprocess']); ?></b></td>
        <td>Salary<br/><b><?php echo '₹'.($aa['ssalary']).'-'.($aa['esalary']); ?></b></td>
        <td>Location<br/><b><?php echo ucwords($aa['location']); ?></b></td></tr><tr>
        <td colspan="3">Details<br/><b><?php echo ucwords($aa['postdetails']); ?></b></td></tr>
    </thead>
  </table>
        <div class="col-sm-3 col-xs-12">
        </div>
        <div class="col-sm-6 col-xs-12">
<div class="login-box">
  <div class="login-box-body">
    <p class="login-box-msg"><b>Apply Now</b></p>
    <form method="post" enctype="multipart/form-data">

     <div class="form-group has-feedback">
        <input type="text" name="fname" class="form-control" placeholder="First Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
           <div class="form-group has-feedback">
        <input type="text" name="lname" class="form-control" placeholder="Last Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="mobile" maxlength="10" class="form-control" placeholder="Mobile" pattern="[0-9]+">
        <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="hidden" name="password" value="123456" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="hidden" name="cpassword" value="123456" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
           <label>Upload Photo</label>
        <input type="file" name="pic" class="form-control">
      </div>
       <div class="form-group has-feedback">
           <label>Upload Resume</label>
        <input type="file" name="resume" class="form-control">
      </div>
        <div class="row">
        <input type="hidden" value="<?php echo $aa['id']; ?>" name="postidx">
        <input type="hidden" value="<?php echo $aa['stfid']; ?>" name="stfidx">
        <input type="hidden" value="<?php echo $aa['clientid']; ?>" name="clientidx">
        <input type="hidden" value="<?php echo $aa['compid']; ?>" name="compidx">
        <div class="col-xs-4"><button type="submit" name="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-user"></i> Submit</button>
        </div>
      </div>
    </form>
<br/>
    <a href="member" class="text-center">Already Register? Login</a>
  </div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
<?php mysqli_close($db); ?>
