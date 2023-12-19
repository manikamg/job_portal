<?php include_once '../layouts/heade_design.php'; include_once 'head.php'; ?>
 <?php if(isset($_POST['inteviewadd'])){
     $intselectcandidate   = (implode(",",$_POST['interviewselect']));
    for ($i=0; $i < count($_POST['postname']); $i++) { 
    $sql=query("INSERT INTO `interview`(`compid`, `clientid`, `candidateid`, `postid`,`ip`) VALUES ('$id','$id','$intselectcandidate','".trim($_POST['postname'][$i])."','".$_SERVER['REMOTE_ADDR']."')");
    }
    if($sql>0){
 echo "<script>window.open('add-interview?success','_self')</script>";
  }else{
    echo "<script>alert('Server Busy'),</script><meta http-equiv=refresh content=0/>";
  }
   } ?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <div class="content-wrapper">
<section class="content-header"><h1><small><a href="dashboard"><< Back</a></small></h1></section><section class="content">
<div align="left"><legend>Resume Search Data</legend></div>
<?php if(isset($_GET['success'])){?><div class="col-md-4"></div><div class="col-md-4">
<div class="box box-warning box-solid"><div class="box-header with-border"><h3 class="box-title"><i class="fa fa-check-square-o"></i>Alert</h3><div class="box-tools pull-right"><button type="button" onclick="window.open('add-interview','_self')" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button></div></div><div class="box-body"> Candidate Short For Interview </div></div></div><div class="col-md-4"></div><div class="col-md-12"></div><?php }?>
<div class="col-md-3"><div class="box"><div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Shorting By</h3>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
              	<li class="active"><select class="form-control" name="jobtypdata">
                	<option value=""> Job For </option>
                	<?php $tpe=printwhileloop("SELECT `id`, `postname` FROM `post_job` GROUP BY `postname`");
                	foreach ($tpe as $key => $xyzu) { ?>
                		<option value="<?php echo $xyzu[0] ?>"><?php echo ucwords($xyzu[1]); ?></option>
                	<?php }?>
                </select></li>
                <li></li>
                <li class="active"><select class="form-control" name="jobtypdata">
                	<option value=""> Job Type</option>
                	<?php $tpe=printwhileloop("SELECT `id`, `name` FROM `jobtype`");
                	foreach ($tpe as $key => $xyzu) { ?>
                		<option value="<?php echo $xyzu[0] ?>"><?php echo $xyzu[1] ?></option>
                	<?php }?>
                </select></li>
                <li></li>
                <li><select class="form-control" name="jobtypdata">
                	<option value="">Job Location</option>
                	<?php $tpie=printwhileloop("SELECT `id`, `name` FROM `job_locations`");
                	foreach ($tpie as $key => $xyzu) { ?>
                		<option value="<?php echo $xyzu[0] ?>"><?php echo $xyzu[1] ?></option>
                	<?php }?>
                </select></li><li></li>
                <li><select class="form-control" name="jobtypdata">
                	<option value="">Highest Qualification</option>
                	<?php $tpiex=printwhileloop("SELECT `id`, `name` FROM `higest_qual`");
                	foreach ($tpiex as $key => $xyzu) { ?>
                		<option value="<?php echo $xyzu[0] ?>"><?php echo $xyzu[1] ?></option>
                	<?php }?>
                </select></li><li></li>
                <li><select class="form-control" name="jobtypdata">
                	<option value="">Industry Type</option>
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
    <form method="post">
            <div class="box-header">
              <div class="col-xs-6"><select class="form-control select2" name="postname[]" required="required" multiple="multiple" data-placeholder="Select a Postname">
                  <option value=""> Select Job </option>
                  <?php $tpe=printwhileloop("SELECT `id`,`postname` FROM `post_job` WHERE `adminid`='$id'");
                  foreach ($tpe as $key => $xyzu) { ?>
                    <option value="<?php echo $xyzu[0] ?>"><?php echo ucwords($xyzu[1]); ?></option>
                  <?php }?>
                </select></div><div class="col-xs-6">
              <button type="submit" name="inteviewadd" class="btn btn-primary"> Short For Interview</button></div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr><th>Selection</th><th>Joining Date</th><th>Pic</th><th>Name</th><th>Contact</th><th>Resume</th></tr>
                </thead>
                <tbody>
            	<?php
            	$i=1;
             $rdata=printwhileloop("SELECT `id`, `admin`, `stfid`, `jobtyp`, `name`, `middle`, `last`, `contact`, `emailid`, `fname`, `mname`, `hq`, `pic`, `resume`, `address`, `pass`, `status`, `regiprice`, `regi_status`, `sread`, `ip`, `datetime` FROM `candidate`");
             foreach($rdata as $key => $value) { ?>
                <tr>
                	<td style="text-align: center;background-color:#F4EFEF;"><input type="checkbox" value="<?php echo $value[0]; ?>" name="interviewselect[]"></td>
                	<td><?php echo dateFormate($value[21]); ?></td>
                	<td><?php if(!empty(($value[12]))){ ?><img src="../assets/candidate/<?php echo (($value[12])); ?>" style="height: 60px;width: 60px;" /><?php } ?></td>
                	<td><?php echo ucwords($value[4]); ?></td>
                	<td><?php echo ($value[7]); ?></td>
                	<td><?php if(!empty($value[13])){ ?><a href="../assets/candidate/<?php echo $value[13]; ?>" target="_blank"><img src="../assets/general/download.png" style="height:30px;width:30px;" /></a><?php }else{?>No<?php }?></td> 
                </tr>
    <?php $i++;}?>
            </tbody>
        </table>
    </div>
  </form>
 </div>
</section>
</div></div>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Candidate Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
 </section>
 </div> 
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
</script><script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script><?php  include_once 'footer.php'; ?>