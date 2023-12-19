<?php
if(isset($_POST['comp_logo'])){
$oldpath = $_FILES['pic']['tmp_name'];
$temp = explode(".", $_FILES["pic"]["name"]);
$img = round(microtime(true)) . '.' . end($temp);
$newpath ="../assets/clients/".$img;
move_uploaded_file($oldpath, $newpath);
$id=trim($_POST['id']);
$sql=mysqli_query($db,"UPDATE `client` SET `logo`='$img' WHERE `id`='$id'");
if($sql>0){
echo "<script>window.open('client-profile-update?image','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
}
if(isset($_POST['update'])){
$cid=trim($_POST['id']);
$ownername=mysqli_real_escape_string($db,$_POST['ownername']);
$farmname=mysqli_real_escape_string($db,$_POST['fname']);
$contact=mysqli_real_escape_string($db,$_POST['contact']);
$contact_two=mysqli_real_escape_string($db,$_POST['contact_two']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$email_two=mysqli_real_escape_string($db,$_POST['email_two']);
$farm_number=mysqli_real_escape_string($db,$_POST['rno']);
$about=mysqli_real_escape_string($db,$_POST['about']);
$address=mysqli_real_escape_string($db,$_POST['faddress']);
$mngname=mysqli_real_escape_string($db,$_POST['mng']);
$psql=mysqli_query($db,"UPDATE `client` SET `name`='$ownername',`mng_name`='$mngname',`contact`='$contact',`mobile_two`='$contact_two',`emailid`='$email',`email_two`='$email_two',`address`='$address',`farmname`='$farmname',`farmno`='$farm_number',`about`='$about' WHERE `id`='$cid'")or die(mysqli_error($db));

if($psql>0){
echo "<script>window.open('client-profile-update?success','_self')</script>";
}else{
echo "<script>alert('Server Is Busy')</script>";
}
}
?>