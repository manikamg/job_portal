<?php 
 include_once 'client_session.php';
 include_once 'client_head.php';
//get applicant details
$sql=mysqli_query($db,"SELECT * FROM `candidate` WHERE `id`='".base64_decode(trim($_GET['id']))."'");
$run=mysqli_fetch_array($sql);
//get post details
//get other details
$sqlp=mysqli_query($db,"SELECT * FROM `post_job` WHERE `id`='".base64_decode(trim($_GET['pid']))."'");
$postl=mysqli_fetch_array($sqlp);
//final selection
  if(isset($_POST['jstatus'])){
  $jobid=trim($_POST['joid']);
  $wid=trim($_POST['wid']);
  $stjob=trim($_POST['changjob']);
  $sqlx=mysqli_query($db,"UPDATE `aplied_job` SET `final_status`='$stjob',`final_comment`='$stjob',`final_date`='".date('Y-m-d')."' WHERE `jobid`='$jobid'");
  $sql=mysqli_query($db,"UPDATE `post_job` SET `final_selection`='$stjob' WHERE `id`='$jobid'");
  if($sqlx>0 & $sql>0){
  echo "<script>window.open('applications-details?pid=".base64_encode($jobid)."&id=".base64_encode($wid)."&".$stjob."','_self')</script>";
  }else{
  echo "<script>alert('Server Is Busy')</script>";
  }
  }
  //INSERT INTO `selected_candidate`(`id`, `canid`, `jodid`, `selectiondate`, `canstatus`, `compstatus`, `timedate`, `ip`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <small style="color:black;"><a href="dashboard?main"><< Back</a></small> 
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard?main"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
      	<div class="col-md-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Post Apply For</h3>
            </div>
            <!-- /.box-header -->
            <!-- $sqlp=mysqli_query($db,"SELECT `id`, `postid`, `adminid`, `stfid`, `clientid`, `compid`, `postname`, `post_number`, `priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`, `postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`, `status`, `adm_approve`, `stf_approve`, `read_sft`, `read_adm`, `timedate`, `ip` FROM `post_job` WHERE `postid`='".trim($_GET['pid'])."'");
$postl=mysqli_fetch_array($sqlp); -->
            <div class="box-body">
            	<div class="table-responsive">
              <table class="table table-responsive">
              	<tr> 
              		<th>Post Name</th>
              		<th>Salary Range</th>
              		<th>NOP</th>
              		<th>Gender</th>
              		<th>Join Process</th>
              		<th>Last Date </th>
              	</tr><tr>
              		<td><?php echo ucwords(postName($postl['id'])); ?></td>
              		<td><?php echo '&#8377;'.(($postl['ssalary'])).'&nbsp;-&nbsp;&#8377;'.(($postl['esalary'])); ?></td>
              		<td><?php echo ucwords(($postl['post_number'])); ?></td>
              		<td><?php echo ucwords(($postl['gender'])); ?></td>
              		<td><?php echo ucwords($postl['joiningprocess']); ?></td>
              		
              		<td><?php echo date('d/M/Y',strtotime($postl['timedate'])); ?></td>
              	</tr>
              </table>
          </div>

            <span class="label label-success"><?php echo strtoupper($postl['stf_approve']);?></span>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-3">
         
          <div class="box box-primary">
            <div class="box-body box-profile">
                 <?php if(empty($run['pic'])){ ?>
             <img class="profile-user-img img-responsive img-circle" src="../assets/general/jobs.png" alt="<?php echo $run['name']; ?>">  
           <?php }else{?>
          <img class="profile-user-img img-responsive img-circle" src="../assets/candidate/<?php echo $run['pic']; ?>" alt="<?php echo $run['name']; ?>">   
          <?php }?> 	
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-body box-profile">
               <?php if(!empty($run['resume'])){ ?>
             <a href="../assets/candidate/<?php echo $run['resume']; ?>">
             	<img class="profile-user-img img-responsive img-circle" src="../assets/general/download.png" alt="<?php echo $run['resume']; ?>"/></a> 
             	<div style="text-align: center;"><b>Resume</b></div> 
           <?php }else{?>
           <b>No Resume</b>  
          <?php }?> 
            </div>
            </form>
          </div>
          </div>
          <div class="col-md-9">
          	 <?php
                if(isset($_GET['selected'])){ ?>
         <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <div align="center"><h3 class="box-title" style="text-align: center;">Applicant <br/><br/><?php  if(isset($_GET['selected'])){ echo 'Selected Successfully';} ?></h3>
         <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" onclick="window.open('applications-details?pid=<?php echo $_GET['pid'] ?>&id=<?php echo $_GET['id'] ?>','_self')" data-widget="remove"><i class="fa fa-times"></i></button></div></div></div><?php } ?>
           <div class="box collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Primary Details</h3>
              <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button></div>
            </div>
         <div class="box-body">
      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label>First Name</label>
           <input type="text" name="fname" required="required" id="password" class="form-control" placeholder="Enter First Name" value="<?php echo $run['name'] ?>">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label>Middle Name</label>
           <input type="text" name="mname" id="password" class="form-control" placeholder="Enter Middle Name" value="<?php echo $run['middle'] ?>">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label>Last Name</label>
           <input type="text" name="lname" id="password" class="form-control" placeholder="Enter Last Name" value="<?php echo $run['last'] ?>">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Contact Number</label>
           <input type="text" name="contact" required="required" pattern="[0-9]+" id="password" class="form-control" placeholder="Contact Number" value="<?php echo $run['contact'] ?>">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Email Id</label> 
           <input type="email" name="email" id="password" value="<?php echo $run['emailid']; ?>" class="form-control" placeholder="Enter Email" tabindex="5">
         </div></div></div>
       </div></div>
          	<?php
			$check=mysqli_query($db,"SELECT DISTINCT `type` FROM `candidate_data` WHERE `candidateid`='".base64_decode(trim($_GET['id']))."'");
            while($run=mysqli_fetch_array($check)){ ?>
          <div class="box collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo ucwords($run['type']); ?></h3>
              <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button></div>
            </div>
         <div class="box-body">
      <div class="row">

					 <?php 
      $field=mysqli_query($db,"SELECT `id`, `admid`, `frenchiseid`, `candidateid`,`input_field`,`inputvalue`,`type`, `fieldname`, `fieldvalue`, `timedate`, `ip` FROM `candidate_data` WHERE `candidateid`='".base64_decode(trim($_GET['id']))."' AND `type`='".$run['type']."'");
            while($value=mysqli_fetch_array($field)){ 
            $arr = explode(' ',trim($value['inputvalue']));
            $fieldtype=$arr[0]; // will print Test
              ?>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label><?php echo ucwords($value['inputvalue']); ?></label>
            <input type="hidden" name="type[]" value="<?php echo strtolower($value['type']); ?>">
            <input type="hidden" name="fieldname[]" value="<?php echo $value['fieldname']; ?>">
            <?php if($value['input_field']=='normal'){?>
            <input type="<?php if($fieldtype=='contact'){ echo 'number';}elseif($fieldtype=='email'){ echo 'email';}elseif($fieldtype=='date'){ echo 'date';}else{ echo 'text';} ?>" name="value[]" id="password" class="form-control" placeholder="Enter Here" value="<?php echo ucwords($value['fieldvalue']); ?>">
          <?php }else{?>
            <textarea  name="value[]" id="password" class="form-control" placeholder="Enter Here"><?php echo ucwords($value['fieldvalue']); ?></textarea>
          <?php }?>
          </div>
        </div>
      <?php }?>
      </div>
    </div></div>
    <?php }?>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Final Selection</h3>
            </div>
            <div class="box-body">
            	<?php if(empty($postl['final_selection'])){ ?>
            	<table class="table table-responsive">
            		<tr>
            			<th>
             <form method="post" name="form data send" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
             <input type="hidden" name="joid" value="<?php echo base64_decode(trim($_GET['pid'])); ?>">
             <input type="hidden" name="wid" value="<?php echo base64_decode(trim($_GET['id'])); ?>">
             <input type="hidden" name="changjob" value="selected">
             <button type="submit" name="jstatus" class="btn btn-success">Selected</button>
             </form></th>
             <th>
             <form method="post" name="form data send" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
             <input type="hidden" name="joid" value="<?php echo trim($_GET['pid']); ?>">
             <input type="hidden" name="wid" value="<?php echo trim($_GET['id']); ?>">
             <input type="hidden" name="changjob" value="reject">
             <button type="submit"  name="jstatus"class="btn btn-danger">Reject</button>
             </form></th>
         </tr>
         </table>
     <?php }else{
     	echo '<div align="center"><button class="btn btn-success" disable="disable">'.$postl['final_selection'].'</b></button></div>';
     }?>
            </div>
          </div>
        </div>
			</div>
          </div>
      </div>
</div>
  </div>
</div>

<?php include_once 'footer.php';?>
