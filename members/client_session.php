<?php  
//ob_clean();
session_start();
if(!isset($_SESSION['client'])){
  header('location:../client');
}
date_default_timezone_set('Asia/Kolkata');
 include_once '../config.php';
 include_once '../function.php';
$id=trim($_SESSION['client']);
$sql=mysqli_query($db,"SELECT * FROM `client` WHERE `id`='$id'");
$run=mysqli_fetch_array($sql);
?> 