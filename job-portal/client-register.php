<?php include("config.php");
   include("function.php");
if(isset($_POST['register'])){
      $user = mysqli_real_escape_string($db,$_POST['username']);
      $mobile = mysqli_real_escape_string($db,$_POST['mob']); 
      $mail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = 'RM123456'; 
      $fname = mysqli_real_escape_string($db,$_POST['farm']);

      $oldpath = $_FILES['pic']['tmp_name'];
      $img      = $_FILES['pic']['name'];
      $newpath ="assets/clients/".$_FILES['pic']['name'];
      move_uploaded_file($oldpath, $newpath);
      $lid='123456';
      $check=mysqli_query($db,"SELECT `id` FROM `client` WHERE `contact`='$mobile'");
if(empty(mysqli_num_rows($check))){
$sql=mysqli_query($db,"INSERT INTO `client`(`pic`, `name`,`contact`,`emailid`, `farmname`,`loginid`,`pass`, `ip`) VALUES ('$img','$user','$mobile','$mail','$fname','$lid','$mypassword','".$_SERVER['REMOTE_ADDR']."')")or die(mysqli_error($db));
}else{ echo "<script>window.open('client-register?m=".md5(uniqid())."&already=".base64_encode($mobile)."','_self')</script>";}
if($sql>0) { echo "<script>window.open('client-register?success','_self')</script>";
}else { $error = "Fail To Register";}
}?><!DOCTYPE html><html><head><meta charset="utf-8"><meta content="IE=edge"http-equiv="X-UA-Compatible"><title>client Registration Area | RmJob</title><meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"name="viewport"><link href="https://www.rmjob.in//images/rmjoblogo.png"rel="icon"sizes="16x16"type="image/png"><script src="//code.jquery.com/jquery-1.11.1.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><link href="bower_components/bootstrap/dist/css/bootstrap.min.css"rel="stylesheet"><link href="bower_components/font-awesome/css/font-awesome.min.css"rel="stylesheet"><link href="bower_components/Ionicons/css/ionicons.min.css"rel="stylesheet"><link href="dist/css/AdminLTE.min.css"rel="stylesheet"><link href="plugins/iCheck/square/blue.css"rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"rel="stylesheet"><body class="hold-transition login-page"><section class="content"><div class="container-fluid"><div class="row"><?php if(isset($_GET['success'])){?><div class="col-md-12"><div class="box box-solid box-success"><div class="box-header with-border"><h3 class="box-title"><i class="fa fa-1x fa-warning"style="color:red"></i> Client Registered Successfully</h3><div class="box-tools pull-right"><button class="btn btn-box-tool"type="button"data-widget="remove"onclick='window.open("register","_self")'><i class="fa fa-times"></i></button></div></div></div></div><?php }?><?php if(isset($_GET['already'])){?><div class="col-md-12"><div class="box box-solid box-warning"><div class="box-header with-border"><h3 class="box-title">Hey ..<b style="color:purple"><?php echo ucwords(applicantNameByMob(base64_decode(trim($_GET['already']))));?></b><br>Your Are Already Registered<br><button class="btn btn-primary"onclick='window.open("member","_self")'>Login</button></h3><div class="box-tools pull-right"><button class="btn btn-box-tool"type="button"data-widget="remove"onclick='window.open("register","_self")'><i class="fa fa-times"></i></button></div></div></div></div><?php }?><div class="col-xs-12 col-sm-3"></div><div class="col-sm-6 col-xs-12"><div class="login-box-body"><p class="login-box-msg"><b>Client Registration Area</p><form enctype="multipart/form-data"id="register-form"method="post"role="form"><div class="form-group"><label>Farm Type</label><br><input name="farmtype"id="farm"type="radio"value="yes"checked> Registered Company<br><input name="farmtype"id="farm"type="radio"value="no"> Non-Registered Company</div><div class="form-group"><label>Farm Name <b style="color:red">*</b></label> <input name="username"id="farm"class="form-control"tabindex="1"placeholder="Farm Name *"required></div><div class="form-group"><label>Contact Person Name <b style="color:red">*</b></label> <input name="name"id="farm"class="form-control"tabindex="1"placeholder="Contact Person *"required></div><div class="form-group"><label>Contact Number <b style="color:red">*</b></label> <input name="mob"id="mob"class="form-control"tabindex="1"placeholder="Mobile Number *"required maxlength="10"pattern="[0-9]+"></div><div class="form-group"><label>Email Id</label> <input name="email"id="email"class="form-control"tabindex="1"placeholder="Email Address"type="email"></div><div class="form-group"><label>Company Logo <small>(if any?)</small></label> <input name="pic"id="pic"class="form-control"tabindex="2"type="file"></div><div class="form-group"><input name="checkbox"type="checkbox"required> I am Agree with all <a data-target="#exampleModal"data-toggle="modal"style="color:red">Terms & Condition</a></div><div class="form-group"><div class="row"><div class="col-sm-6 col-sm-offset-3"><input name="register"id="register-submit"class="btn btn-info"tabindex="4"type="submit"value="Register Now"></div></div></div></form><br><a class="text-center"href="client">Already Register? Login</a></div></div><div class="fade modal"role="dialog"aria-hidden="true"aria-labelledby="exampleModalLabel"id="exampleModal"tabindex="-1"><div class="modal-dialog"role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"id="exampleModalLabel">Terms & Condition</h5><button class="close"type="button"data-dismiss="modal"aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="modal-body">RmJob.in is fully entitled to Charge 15 days Salary from the Candidates which is Communicated to the Candidates through the Declaration form. If the Organisation want us not to deduct this 15 days charge from the candidate then the Organisation will have to pay 8.33 % on annual CTC as standard pricing.<br><br>Company will post 10 job post per month with free of charge after per post will charge 60rupees<br><br>Company can view any number of resume/cv of his post job category<br><br>Company right to change on run job post content<br><br>If candidate resigned in your company with valid reason like he/she is not getting salary within time or any other valid reason then we are not Liable to anything.<br><br>If your Organisation Rejects a Candidate sent form RmJob.in and then selects him/her without our interference within 6 month time period, then in that case RmJob.in will be liable to take Service charge(20% Candidate CTC) for that Candidate.<br><br>After joining, we need a copy of salary structure and appointment letter of related candidate for Generating the Bill.<br><br>For selected Candidate, a Copy of Appointment Letter should be given to us for our Record<br><br>We need interview feedback or any update after interview on urgent basis.<br><br>RmJob.in will not liable for any discussion between organisation and candidate, in case of Any disputes, conflicts and issue like wrong behaviour between organisation and candidate in working time then.<br><br>All communication exchanged between the RmJob.in & the Company shall be treated as confidential.<br><div align="right"><br><b>I Am Agree With All Terms & Condition</b></div></div><div class="modal-footer"><button class="btn btn-secondary"type="button"data-dismiss="modal">Close</button></div></div></div></div><script src="bower_components/jquery/dist/jquery.min.js"></script><script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script><script src="plugins/iCheck/icheck.min.js"></script><script>$(function(){$("input").iCheck({checkboxClass:"icheckbox_square-blue",radioClass:"iradio_square-blue",increaseArea:"20%"})})</script></body></html>