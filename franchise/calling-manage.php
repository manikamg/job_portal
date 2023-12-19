 <?php
 include_once '../layouts/heade_design.php';
 include_once 'head.php';
 $apply=sqlquery("SELECT `id` FROM `aplied_job` WHERE `applicantid`='".$id."'");
 $ab=mysqli_num_rows($apply); 
 //calling data list
 if(isset($_POST['noresponse_success'])){
  $sql=sqlquery("UPDATE `telli_calling` SET `norespons`=1 WHERE `id`='".trim($_POST['noresponse'])."'");
  if($sql>0){
    echo "<script>alert('No Response Add')</script><meta http-equiv='refresh' content='0'/>";
  }else{
    echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
}
if(isset($_POST['wrongno_success'])){
  $sql=sqlquery("UPDATE `telli_calling` SET `wronno`=1 WHERE `id`='".trim($_POST['wrongno'])."'");
  if($sql>0){
    echo "<script>alert('Wrong Number Add')</script><meta http-equiv='refresh' content='0'/>";
  }else{
    echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
}
if(isset($_POST['calling_submit'])){
  $sql=sqlquery("UPDATE `telli_calling` SET `location`='".mysqli_real_escape_string($db,$_POST['location'])."',`hedu`='".mysqli_real_escape_string($db,$_POST['high_edu'])."',`exp_type`='".mysqli_real_escape_string($db,$_POST['exp'])."',`exp`='".mysqli_real_escape_string($db,$_POST['total_exp'])."',`details`='".mysqli_real_escape_string($db,$_POST['details'])."',`post_looking`='".mysqli_real_escape_string($db,$_POST['post'])."',`comment`='".mysqli_real_escape_string($db,$_POST['comment'])."',`reply_date`='".time()."',`finalstatus`=1 WHERE `id`='".trim($_POST['postid'])."'");
  if($sql>0){
    echo "<script>alert('Data Submited Successfully')</script><meta http-equiv='refresh' content='0'/>";
  }else{
    echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
}?>
  <div class="content-wrapper">
    <section class="content-header">
     <h1><small><a href="dashboard"><span class="label label-default"><< Back</a></span></small></h1>
      <section class="content">
      <div class="row"><br/><br/><br/><br/><br/>
        <a href="upload-data"><div class="col-md-3 col-sm-6 col-xs-12"></div><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-cloud-upload"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Upload Calling </span>
              <span class="info-box-number">Data<small></small></span>
            </div>
          </div>
        </div></a> 
        <a href="telling-calling-data"><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-map-signs"></i></span>
              <div class="info-box-content">
              <span class="info-box-text">Telling Calling <br/>Data List</span>
              <span class="info-box-number"><?php echo tellicalling_data($id,1); ?></span>
            </div>
          </div> 
        </div>calling-list
        <div class="clearfix visible-sm-block"></div></a>
        <div class="col-md-12 col-sm-12 col-xs-12"></div><div class="col-md-3 col-sm-6 col-xs-12"></div>
  <a href="telling-calling-list-lead"><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Lead List</span>
              <span class="info-box-number"><?php echo tellicalling_data($id,2); ?></span>
            </div>
          </div>
        </div></a>
        <a href="telling-calling-list-lead-full-report"><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
           <div class="info-box-content">
              <span class="info-box-text">Full</span>
              <span class="info-box-number">Report</span>
            </div>
          </div>
        </div></a>
        <div class="col-md-12 col-sm-12 col-xs-12"></div>
        <div class="col-md-5 col-sm-6 col-xs-12"></div>
        <a href="calling-list"><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
           <div class="info-box-content">
              <span class="info-box-text">Calling </span>
              <span class="info-box-number">Data</span>
            </div>
          </div>
        </div></a>
        <div class="col-md-12 col-sm-12 col-xs-12"></div>
      </div>
    </section>
</div>
<?php include_once 'footer.php'; ?>