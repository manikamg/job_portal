<?php 
include_once '../config.php';
if(isset($_POST['submitemp'])){
$eid=trim($_POST['empid']);
$cid=trim($_POST['compid']);
$ename=mysqli_real_escape_string($db,$_POST['empname']);
$email=mysqli_real_escape_string($db,$_POST['empemail']);
$loginid='GHS'.rand('1111111','9999999');
$pass=strtoupper(mt_rand());
$check=mysqli_query($db,"SELECT * FROM `assign_to_emp` WHERE `compid`='$cid' AND `status`='yes'")or die(mysqli_error($db));
if(empty(mysqli_num_rows($check))){

$chk=mysqli_query($db,"SELECT `id`, `mem_id`, `name`, `email`, `loginid`, `password`, `pic`, `is_super`, `created_at`, `updated_at` FROM `admins` WHERE `mem_id`='$eid'");
if(empty(mysqli_num_rows($chk))){
	//echo 'xxxxxxxx';
$sqltwo=mysqli_query($db,"INSERT INTO `assign_to_emp`(`empid`, `compid`) VALUES ('$eid','$cid')")or die(mysqli_error($db));
$sql=mysqli_query($db,"INSERT INTO `admins`(`mem_id`,`name`, `email`, `loginid`, `password`,`is_super`) VALUES ('$eid','$ename','$email','$loginid','$pass',1)")or die(mysqli_error($db));
}else{
	//echo 'yyyyyyyyy';
$abc=mysqli_fetch_array($chk);
$sqltwo=mysqli_query($db,"INSERT INTO `assign_to_emp`(`empid`, `compid`) VALUES ('$eid','$cid')")or die(mysqli_error($db));
//$sql=mysqli_query($db,"INSERT INTO `admins`(`mem_id`,`name`, `email`, `loginid`, `password`,`is_super`) VALUES ('$eid','".$abc['name']."','".$abc['email']."','".$abc['loginid']."','".$abc['password']."',1)")or die(mysqli_error($db));
}

if($sqltwo>0 && $sql>0){
echo "<script>window.open('employee-assign?success&id=".$eid."','_self')</script>";
}else{
echo "<script>alert('Server Busy')<script><meta http-equiv='refresh' content='0'/>";
}
}else{
echo "<script>window.open('employee-assign?failed&id=".$eid."','_self')</script>";
}
}
?>