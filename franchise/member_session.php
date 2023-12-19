<?php
ob_clean();
session_start();
date_default_timezone_set('Asia/Kolkata');
if (!isset($_SESSION['franchise'])) {
    header('location:../franchise-login.php');
}
include_once '../config.php';
include_once 'function.php';

$id = trim($_SESSION['franchise']);
$sql = mysqli_query($db, "SELECT * FROM `admins` WHERE `id`='$id'");
$runs = mysqli_fetch_array($sql);
?>