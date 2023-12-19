 <?php include_once '../layouts/heade_design.php'; include_once 'head.php'; 
if(isset($_POST['saveresume'])){
  $resumids=(implode(",",$_POST['selct']));
  $sql=query("INSERT INTO `saveresume`(`resumid`, `adminid`, `stfid`) VALUES ('$resumids','$id','$id')");
  if($sql>0){
    echo "<script>window.open('resume-data?success','_self')</script>";
  }else{
    echo "<script>alert('Server Busy'),</script><meta http-equiv=refresh content=0/>";
  }
}
?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script type="text/javascript">
  function joblocation(id){
    window.open('resume-data?locate='+id+'&key=php developer','_self');
 }
 function higqaul(hid){
  window.open('resume-data?locate=<?php echo trim($_GET["locate"]); ?>&hq='+hid+'&key=php developer','_self');
 }
 function jobtypdata(id) {
   window.open('resume-data?locate=<?php echo trim($_GET['locate']); ?>&hq=<?php echo trim($_GET['hq']); ?>&jobype='+id+'&key=php developer','_self');
   
 }
 function industries(id){
   window.open('resume-data?locate=<?php echo trim($_GET['locate']); ?>&hq=<?php echo trim($_GET['hq']); ?>&jobype=<?php echo trim($_GET['jobype']); ?>&ind='+id+'&key=php developer','_self');
 } 
 </script>
  <div class="content-wrapper">
<section class="content-header"><h1><small><a href="dashboard"><< Back</a></small></h1></section>
    <section class="content">
    	<div align="left"><legend>Resume Search Data</legend></div>
      <?php if(isset($_GET['success'])){?>
        <div class="col-md-4"></div>
        <div class="col-md-6">
        <div class="box box-warning box-solid">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-check-square-o"></i>Alert</h3>
        <div class="box-tools pull-right">
        <button type="button" onclick="window.open('resume-data','_self')" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div></div><div class="box-body"> Resume Saved Successfully </div></div></div><div class="col-md-2"></div><?php }?>
        <div class="col-md-3">
 	 <div class="box">
        <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Shorting By</h3>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked"><li><div align="center"><label><small>Location</small></label></div><select class="form-control select2" name="joblocation" onchange="joblocation(this.value);">
                <?php if(!isset($_GET['locate'])){?><option value=""> Location</option><?php }else{?> <option value="<?php echo trim($_GET['locate']); ?>"><?php echo ucwords(LocationName(trim($_GET['locate']))); ?></option> <?php }?>
              <?php $tpie=printwhileloop("SELECT `id`, `name` FROM `job_locations`");
                  foreach ($tpie as $key => $xyzu) { ?>
                    <option value="<?php echo $xyzu[0] ?>"><?php echo ucwords($xyzu[1]) ?></option>
                  <?php }?>
                </select></li>
                <li></li>
                <li><div align="center"><label><small>Highest Qualification</small></label><div align="center"><select class="form-control select2" name="higqaul" onchange="higqaul(this.value);">
                  <?php if(!isset($_GET['hq'])){?><option value=""> Highest Qualification</option><?php }else{?> <option value="<?php echo trim($_GET['hq']); ?>"><?php echo ucwords(HighestQualification(trim($_GET['hq']))); ?></option> <?php }?>
                <?php $tpiex=printwhileloop("SELECT `id`, `name` FROM `higest_qual`");
                  foreach ($tpiex as $key => $xyzu) { ?>
                    <option value="<?php echo $xyzu[0] ?>"><?php echo ucwords($xyzu[1]) ?></option>
                  <?php }?>
                </select></li><li></li>
                <li class="active"><div align="center"><label><small>Job Type</small></label></div>
                <select class="form-control select2" id="jobtypdata" name="jobtypdata" onchange="jobtypdata(this.value);">  
                	<?php if(!isset($_GET['jobype'])){?><option value=""> Job Type</option><?php }else{?> <option value="<?php echo trim($_GET['jobype']); ?>"><?php echo ucwords(getJobIdToJobtypName(trim($_GET['jobype']))); ?></option> <?php }?>
                	<?php $tpe=printwhileloop("SELECT `id`, `name` FROM `jobtype`");
                	foreach ($tpe as $key => $xyzu) { ?>
                		<option value="<?php echo $xyzu[0] ?>"><?php echo ucwords($xyzu[1]); ?></option>
                	<?php }?>
                </select></li>
                <li></li>
                 
                <li><div align="center"><label><small>Pref Industries</small></label></div><select class="form-control select2" name="industries" onchange="industries(this.value);">
                  <?php if(!isset($_GET['ind'])){?><option value=""> Pref. Industries</option><?php }else{?> <option value="<?php echo trim($_GET['ind']); ?>"><?php echo ucwords(IndustiesName(trim($_GET['ind']))); ?></option> <?php }?>
                	<?php $why=printwhileloop("SELECT `id`, `name` FROM `industry`");
                	foreach ($why as $key => $xyzo) { ?>
                	<option value="<?php echo $xyzo[0] ?>"><?php echo $xyzo[1] ?></option>
                	<?php }?>
                </select>
                </li>
              </ul>
            </div>
          </div>
        </div>
   </div>
 <div class="col-md-9">
 	 <div class="box">
            <div class="box-header">
              <?php  if(!empty(trim($_GET['key']))){ ?>
        <h3 class="box-title">Keyword : <?php echo strtoupper(trim($_GET['key'])); ?></h3> <?php }?>
            </div>
            <form method="post">
            <div class="box-body">
              <button type="submit" name="saveresume" class="btn btn-default">Save Selected Resumes </button>
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr><th></th></tr>
                </thead>
                <tbody> 
              <?php
              $con1='';
              $con2='';
              $con3='';
              $con4='';
              $con5='';
               if(isset($_GET['locate'])){
                $con1= "AND `preflocation` LIKE '".input_validate($_GET['locate'])."%'";
             }
             if(isset($_GET['hq'])){
                $con2= "AND `hq` LIKE '".input_validate($_GET['hq'])."%'";
             }
             if(isset($_GET['jobype'])){
                 $con3= "AND `jobtyp` LIKE '".input_validate($_GET['jobype'])."%'";
             }
             if(isset($_GET['ind'])){
                 $con4= "AND `indust` LIKE '".input_validate($_GET['ind'])."%'";
             }
             if(isset($_GET['resumeid'])){
               $con5= "`id` LIKE '".input_validate($_GET['resumeid'])."%' AND";
             }
            $rdata=printwhileloop("SELECT `id`, `admin`, `stfid`, `jobtyp`, `indust`, `preflocation`, `name`, `middle`, `last`, `contact`, `emailid`, `fname`, `mname`, `hq`, `pic`, `resume`, `address`, `pass`, `status`, `regiprice`, `regi_status`, `sread`, `ip`, `datetime` FROM `candidate` WHERE $con5 `admin`!='$id' $con1 $con2 $con3 $con4");
             foreach($rdata as $key => $value) { ?>
                <tr><td>
           <div class="box box-widget">
            <div class="box-header with-border">
            <div class="user-block"> 
            <input type="checkbox" name="selct[]" value="<?php echo $value[0]; ?>">
            </div>
            </div>
            <div class="box-body">
               <div class="col-md-8">
               <b>Preference Skills</b><br/> <ul><?php $jl=explode(",",$value[3]);
         foreach ($jl as $key => $valuexy) {
              echo '<li>'.ucwords(IndustiesName($valuexy)).'</li>';
          } ?></ul><br/>
          <b>Interested</b><br/><?php $jlx=explode(",",$value[4]);
         foreach($jlx as $key => $valuexyz) { 
              echo '<span class="pull-right badge bg-aqua">'.ucwords(IndustiesName($valuexyz)).'</span>';
          } ?></p>
          <p><br/><b>Location Pref.</b> <ul><br/>
            <?php $jlxop=explode(",",$value[5]);
         foreach($jlxop as $key => $valuexyzloc) { 
              echo '<li>'.ucwords(LocationName($valuexyzloc)).'</li>';
          } ?></ul></div>
                 <div class="col-md-4">
                 	<div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
              <?php if(!empty($value[14])){?><img class="img-circle" style="height:45px;height: 60px;" src="../assets/candidate/<?php echo $value[14]; ?>" alt="<?php echo $value[6]; ?>"><?php }?>
              </div>
              <h3 class="widget-user-username"><?php echo ucwords($value[6]); ?></h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Qualification <span class="pull-right badge bg-blue"><?php echo ucwords(HighestQualification($value[13])); ?></span></a></li>
                <li><a href="#"><span class="pull-right badge bg-aqua"><?php echo ucwords($value[18]); ?></span></a><br/></li>
                <li><a href="#">Joined <span class="pull-right badge bg-green"><?php echo dateFormate($value[23]); ?></span></a></li>
                <li>
                <?php 
                 if(!empty($value[9])){?><button type="button" class="btn btn-default btn-xs"><i class="fa fa-mobile-phone fa-2x" style="color: green;"></i></button>
            <?php }else{?><button type="button" disabled="disabled" class="btn btn-default btn-xs"><i class="fa fa-mobile-phone fa-2x"></i></button><?php }?>
            <?php if(!empty($value[10])){?><button type="button" class="btn btn-default btn-xs"><i class="fa fa-send fa-2x" style="color: green"></i></button>
            <?php }else{?><button type="button" disabled="disabled" class="btn btn-default btn-xs"><i class="fa fa-send fa-2x"></i></button><?php }?></li></ul></div>
          </div><hr/></div><?php  if(!empty(($value[15]))){ ?><a href="../assets/candidate/<?php echo $value[15]; ?>" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-download"></i> Resume Download</a><?php }?><button type="button" name="view"  id="<?php echo $value[0]; ?>" class="btn btn-default btn-xs view_data"><i class="fa fa-search"></i>  View Details</button></td></div></div></td></tr><?php }?></tbody></table></div></form></div></div></section>
</div></div><div id="dataModal" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Candidate Details</h4></div><div class="modal-body" id="employee_detail"></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>  
<script type="text/javascript">
$(document).ready(function(){  
      $('.view_data').click(function(){  
           var call_id = $(this).attr("id");  
           $.ajax({  
                url:"candidate.php",  
                method:"post",  
                data:{post_id:call_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script><?php  include_once 'footer.php'; ?>