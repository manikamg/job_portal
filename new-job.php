<?php
   include("config.php");
   include("function.php");
?><!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title>Post New Job | Root Placement</title><link rel="icon" type="image/gif/png" href="https://rootplacement.com/images/rootplacement-new.png"><?php include_once 'css.php'; ?></head><div class="container"><h1><small>Select Job Category</small></h1><ol class="breadcrumb"><li> <a href="../.\"><< Back</a></li></ol>  <div class="row"><br/><br/><div class="col-md-1 col-xs-12"></div><div class="col-md-10 col-xs-12"><div class="box box-danger"><div class="box-header"><h3 class="box-title">Select Job Category</h3></div><div class="box-body"><div class="col-lg-12 col-xs-12"><?php $jobtyp=query("SELECT `id`, `name` FROM `jobtype` ORDER BY `timedate` ASC"); while($abc=mysqli_fetch_array($jobtyp)){?><a href="new-job-step?<?php echo md5(uniqid()); ?>&<?php echo md5(uniqid()); ?>&type=<?php echo base64_encode($abc['id']); ?>&<?php echo md5(uniqid()); ?>&name=<?php echo base64_encode($abc['name']); ?>"><div class="col-lg-4 col-xs-12"><div class="small-box bg-aqua small-box-footer" style="height:75px;"><div class="inner"><h4><?php echo ucwords($abc['name']); ?> <i class="fa fa-arrow-circle-right"></i></h4></div></div></a></div><?php }?></div><div class="col-lg-12 col-xs-12"><hr/></div></div></div></div></div></div><script>$(function () {
    CKEDITOR.replace('postdetails')
    $('.textarea').wysihtml5()
  })</script><?php  include_once 'footer.php'; ?>