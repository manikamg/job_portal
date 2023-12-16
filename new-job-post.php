<?php include("config.php");
include("function.php");
$npost=query("SELECT * FROM `client` WHERE `status`='active'");
if(isset($_POST['submit'])){
$jobtag= mysqli_real_escape_string($db,$_POST['jtag']);
$jobtyp=mysqli_real_escape_string($db,$_POST['jtyp']);
$company=mysqli_real_escape_string($db,$_POST['company']);
$postname=mysqli_real_escape_string($db,$_POST['postname']);
$postdetails=mysqli_real_escape_string($db,$_POST['postdetails']);
$startsalary=mysqli_real_escape_string($db,$_POST['startsalary']);
$endsalary=mysqli_real_escape_string($db,$_POST['endsalary']);
$openingdate=mysqli_real_escape_string($db,$_POST['openingdate']);
$enddate=mysqli_real_escape_string($db,$_POST['enddate']);
$priority=mysqli_real_escape_string($db,$_POST['priority']);
$exp=mysqli_real_escape_string($db,$_POST['exp']);
$location=mysqli_real_escape_string($db,$_POST['location']);
$gender=mysqli_real_escape_string($db,$_POST['gender']);
$highestqualification=mysqli_real_escape_string($db,$_POST['highestqualification']);
$joiningprocess=mysqli_real_escape_string($db,$_POST['joiningprocess']);
$ta=mysqli_real_escape_string($db,$_POST['ta']);
$alternative_number=mysqli_real_escape_string($db,$_POST['alternative_number']);
$pcode=mysqli_real_escape_string($db,$_POST['pcode']);
$number_post=mysqli_real_escape_string($db,$_POST['number_post']);
$caddress=mysqli_real_escape_string($db,$_POST['caddress']);
$cnum= mysqli_real_escape_string($db,$_POST['cnum']);
$loc=(explode(",",$location));
foreach ($loc as $key => $value) {$loc=query("INSERT INTO `job_locations`(`name`) VALUES ('$value')");}
$clintsql=query("INSERT INTO `client`(`admin`, `name`, `contact`, `mobile_two`, `address`, `loginid`, `pass`) VALUES (0,'$company','$cnum','$alternative_number','$caddress','".uniqid()."','".rand(111111,999999)."')");
$xlpost=mysqli_insert_id($db);
$sql=query("INSERT INTO `post_job`(`postid`,`jobtyp`,`tag`,`adminid`,`compid`, `postname`,`post_number`,`priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`,`postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`,`adm_approve`, `stf_approve`,`ip`) VALUES ('$pcode','$jobtyp','$jobtag','$id','$xlpost','".strtolower($postname)."','$number_post','".strtolower($priority)."','".strtolower($exp)."','".strtolower($location)."','".strtolower($gender)."','".strtolower($highestqualification)."','".strtolower($joiningprocess)."','".strtolower($ta)."','".strtolower($postdetails)."','".($startsalary)."','".($endsalary)."','".($openingdate)."','".($enddate)."','".($alternative_number)."','approved','approved','".$_SERVER['REMOTE_ADDR']."')")or die(mysqli_error($db));
$lpost=mysqli_insert_id($db);
if($clintsql>0 && $sql>0){
echo "<script>window.open('new-job-post?success&".md5(uniqid())."&post=".$lpost."&name=".$postname."','_self')</script>";}else{echo "<script>alert('Server Is Busy')</script><meta http-equiv='refresh' content='0'/>";}
}?><!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title>Post New Job | Root Placement</title><link rel="icon" type="image/gif/png" href="https://rootplacement.com/images/rootplacement-new.png"><?php include_once 'css.php'; ?><script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script><link rel="stylesheet" href="https://rmjob.in/manage/bower_components/select2/dist/css/select2.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></head><div class="container"><h1><small>Post Job </small></h1><ol class="breadcrumb"><li> <div style="text-align:left"><a href="new-job-step?<?php echo (md5(uniqid())); ?>&type=<?php echo trim($_GET['type']); ?>&name=<?php echo trim($_GET['typen']); ?>&tag=<?php echo trim($_GET['tag']); ?>&tagn=<?php echo trim($_GET['tagn']); ?>"><< Back</a></div></li>
</ol> 
<div class="row">
<div class="col-md-1 col-xs-12"></div>
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="col-md-10 col-xs-12">
<?php if(isset($_GET['success'])){ ?>
<div class="box box-warning box-solid">
<div class="box-header with-border">
<div align="center"><h3 class="box-title">Job Posted  <br/><br/> Successfully</h3></div>
<hr/>
<div align="center"><button type="button" onclick="window.open('https://rootplacement.com/post-details/<?php echo str_replace(' ', '-', ($_GET['name']));  ?>/<?php echo trim($_GET['post']); ?>','_blank')" class="btn btn-default btn-lg">View Your Post</button></div>
<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" onclick="window.open('new-job','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
</div>
</div></div> 
<?php }else{ ?>
<div class="box box-danger">
<div class="box-header">
<h3 class="box-title">Post New Job</h3>
</div>
<div class="box-body">
<div class="form-group">
<div align="right"><span>Job Code</span> : <input type="text" name="pcode" value="<?php echo date('Y').date('m').rand(11111,99999); ?>" maxlength="10" required="required" ></div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Job Type
<select class="form-control" name="jtyp" style="width:100%;">
<option value="<?php echo base64_decode(trim($_GET['type'])); ?>"><?php echo base64_decode(trim($_GET['typen'])); ?></option>
</select></div>
<div class="input-group-addon">TAG
<select class="form-control" name="jtag">
<option value="<?php echo base64_decode(trim($_GET['tag'])); ?>"><?php echo base64_decode(trim($_GET['tagn'])); ?></option>
</select></div>
</span>
</div>
</div> 
<div class="form-group">
<label>Company Name <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<input type="text" placeholder="Company Name" maxlength="95" class="form-control" name="company">

</div></div>
<div class="form-group">
<label>Contact Number <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<input type="text" pattern=[0-9]+ placeholder="Company Contact Number" maxlength="10" minlength="10" class="form-control" name="cnum" required="required"></div>
</div>
<div class="form-group">
<label>Company Address <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<input type="text"  placeholder="Company Address"  class="form-control" name="caddress" required="required"></div>
</div>
<hr/>
<div class="form-group">
<label>Post Name <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<input type="text" placeholder="Post Name" maxlength="95" class="form-control" name="postname" required="required">
</div>
</div>
<div class="form-group">
<label>Number of Post <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<input type="text" placeholder="Number of Post" maxlength="10" pattern="[0-9]+" class="form-control" name="number_post" required="required">
</div>
</div>
<div class="form-group">
<label>Priority <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<input type="text" maxlength="65" placeholder="Priority"  class="form-control" name="priority" required="required">
</div>
</div>
<div class="form-group">
<label>Experiance</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<input type="text" placeholder="Computer,excel,bpo,plant,etc" maxlength="25" class="form-control" name="exp">
</div>
</div>
<div class="form-group">
<label>Location <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<input type="text" placeholder="Raipur,Durg,Mumbai,Wizag,Delhi" maxlength="125" class="form-control" name="location" required="required">
</div>
</div>
<div class="form-group">
<label>Gender <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<select class="form-control" name="gender">
<option value="any">Any</option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="transg">TransGender</option>
</select>
</div>
</div>
<div class="form-group"> 
<label>Highest Qualification <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<select class="form-control select2" name="highestqualification"><option value="any">Any</option><?php  $sql=query("SELECT `name` FROM `higest_qual`");
while($run=mysqli_fetch_array($sql)){echo '<option value="'.$run['name'].'">'.ucwords($run['name']).'</option>';}?></select></div></div>
<div class="form-group">
<label>Joining Process <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-circle-o text-red"></i>
</div>
<select class="form-control select2" name="joiningprocess">
<option value="walkin">Walk In</option>
<option value="interview">Interview</option>
<option value="online">Online Interview</option>
</select>
</div>
</div>

<div class="form-group">
<label>TA/DA</label>
<div class="input-group">
&nbsp;&nbsp; Yes   <input type="radio"  name="ta"> 
<br/> &nbsp;&nbsp;&nbsp;&nbsp;No <input type="radio"  name="ta" checked="checked">
</div>
</div>

<div class="form-group">
<label>Post Details</label><br/>
<textarea id="postdetails" name="postdetails" class="form-control" placeholder="Enter Here">
</textarea>
</div>
<div class="form-group">
<label>Salary <small>(monthly)</small> <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
Range &#8377;
</div>
<input type="text" placeholder="From" pattern="[0-9]+" name="startsalary" required="required"> - <input type="text" placeholder="To" name="endsalary" pattern="[0-9]+">
</div>
</div>

<div class="form-group">
<label>Opening Date: <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="openingdate" required="required">
</div>
</div>

<div class="form-group">
<label>End Date: <b style=color:red>*</b></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="date" value="<?php $effectiveDate = strtotime("+1 months", strtotime(date("y-m-d")));
echo $time = date("Y-m-d", $effectiveDate); ?>" class="form-control" name="enddate">
</div>
</div>
<div class="form-group">
<label>Contact Number</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-phone"></i>
</div>
<input type="text" pattern="[0-9]+" placeholder="Alternative Number" class="form-control" name="alternative_number" maxlength="10">
</div>
<br/>
<input type="checkbox" name="recheck" required="required"> <note>Recheck Before Submit</note>
<div align="center">
<br/>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form></div>
</div></div></div></div></div></div>
<?php }?><?php  include_once 'footer.php'; ?><script src="https://rmjob.in/manage/bower_components/select2/dist/js/select2.full.min.js" ></script><script>
CKEDITOR.replace( 'postdetails' );
</script><script> $(function () { $('.select2').select2() }) </script>