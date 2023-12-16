<?php  
 include_once 'client_session.php';
 include_once 'client_head.php';
//get applicant details
$sql=query("SELECT * FROM `candidate` WHERE `id`='".base64_decode(trim($_GET['pid']))."'");
$run=mysqli_fetch_array($sql);
//get post details
//get other details
$sqlp=query("SELECT * FROM `post_job` WHERE `id`='".base64_decode(trim($_GET['pid']))."'");
$postl=mysqli_fetch_array($sqlp);
//final selection
  if(isset($_POST['jstatus'])){
  $jobid=trim($_POST['joid']);
  $wid=trim($_POST['wid']);
  $stjob=trim($_POST['changjob']);
  $sqlx=query("UPDATE `aplied_job` SET `final_status`='$stjob',`final_comment`='$stjob',`final_date`='".date('Y-m-d')."' WHERE `jobid`='$jobid'");
  $sql=mysqli_query($db,"UPDATE `post_job` SET `final_selection`='$stjob' WHERE `id`='$jobid'");
  if($sqlx>0 & $sql>0){
  echo "<script>window.open('applications-details?pid=".base64_encode($jobid)."&id=".base64_encode($wid)."&".$stjob."','_self')</script>";
  }else{
  echo "<script>alert('Server Is Busy')</script>";
  }
  }
  //candidate interview selection
 if(isset($_POST['candidateselection'])){
        $applicant=  input_validate($_POST['applicantid']);
        $jid=  input_validate($_POST['jobid']);
        $sql=query("INSERT INTO `selected_candidate`(`canid`, `jodid`,`ip`) VALUES ('$applicant','$jid','".$_SERVER['REMOTE_ADDR']."')");
        if($sql>0){
          echo "<meta http-equiv='refresh' content='0'/>";
        }else{
          echo "<meta http-equiv='refresh' content='0'/>";
        }
        } 

 if(isset($_POST['firstround'])){
        $applicant =  input_validate($_POST['applicantid']);
        $jid       =  input_validate($_POST['jobid']);
        $sql = query("UPDATE `selected_candidate` SET `selection1`=1 WHERE `canid`='$applicant' AND `jodid`='$jid' AND `compstatus`=0");
        if($sql>0){
          echo "<meta http-equiv='refresh' content='0'/>";
        }else{
          echo "<meta http-equiv='refresh' content='0'/>";
        }
        } 
if(isset($_POST['secondround'])){
        $applicant =  input_validate($_POST['applicantid']);
        $jid       =  input_validate($_POST['jobid']);
        $sql = query("UPDATE `selected_candidate` SET `selection2`=1 WHERE `canid`='$applicant' AND `jodid`='$jid' AND `compstatus`=0");
        if($sql>0){
          echo "<meta http-equiv='refresh' content='0'/>";
        }else{
          echo "<meta http-equiv='refresh' content='0'/>";
        }
        } 
        if(isset($_POST['thirdround'])){
        $applicant =  input_validate($_POST['applicantid']);
        $jid       =  input_validate($_POST['jobid']);
        $sql = query("UPDATE `selected_candidate` SET `final_selection`=1 WHERE `canid`='$applicant' AND `jodid`='$jid' AND `compstatus`=0");
        if($sql>0){
          echo "<meta http-equiv='refresh' content='0'/>";
        }else{
          echo "<meta http-equiv='refresh' content='0'/>";
        }
        } 
        
if(isset($_POST['delt'])){
        $idi=  input_validate($_POST['did']);
        $sql = query("UPDATE `aplied_job` SET `stf_status`='reject',`stf_comment`='reject',`adm_status`='reject',`adm_comment`='reject',`final_status`='reject',`job_status`='reject',`final_comment`='reject' WHERE `id`='$idi'")or die(mysqli_error($db));
        if($sql>0){
          echo "<meta http-equiv='refresh' content='0'/>";
        }else{
          echo "<meta http-equiv='refresh' content='0'/>";
        }
        } 
  if(isset($_POST['joiningpost'])){
  $pid =  input_validate($_POST['postid']);  
  $sql    = query("UPDATE `selected_candidate` SET `selectiondate`='".date("Y-m-d H:i:s")."', `compstatus`=1 WHERE `id`='$pid'")or die(mysqli_error($db));
  if($sql>0){
  echo "<meta http-equiv='refresh' content='0'/>";
  }else{
  echo "<meta http-equiv='refresh' content='0'/>";
  }
  } 
  if(isset($_POST['cancelfinalselection'])){
  $pid =  input_validate($_POST['postid']);  
  $sql    = query("UPDATE `selected_candidate` SET `compstatus`=0 WHERE `id`='$pid'")or die(mysqli_error($db));
  if($sql>0){
  echo "<meta http-equiv='refresh' content='0'/>";
  }else{
  echo "<meta http-equiv='refresh' content='0'/>";
  }
  } 
  if(isset($_POST['cancelallfinalselection'])){
  $pid =  input_validate($_POST['postid']);  
  $sql    = query("UPDATE `selected_candidate` SET `selection1`=0,`selection2`=0,`final_selection`=0,`canstatus`=0,`compstatus`=0 WHERE `id`='$pid'")or die(mysqli_error($db));
  if($sql>0){
  echo "<meta http-equiv='refresh' content='0'/>";
  }else{
  echo "<meta http-equiv='refresh' content='0'/>";
  }
  } 
  ?>
<div class="content-wrapper">
<section class="content-header"><small style="color:black;"><a href="dashboard?main"><< Back</a></small></section>
    <section class="content">
      <div class="row">
      	<div class="col-md-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border"><h3 class="box-title">Post Details</h3></div>
            <div class="box-body">
            	<div class="table-responsive">
              <table class="table table-responsive">
              	<tr> <th>Post Name</th> <th>Salary Range</th> <th>NOP</th> <th>Gender</th> <th>Join Process</th> <th>Last Date </th><th>Qualification</th></tr><tr>
              		<td><?php echo ucwords(postName($postl['id'])); ?></td>
              		<td><?php echo '&#8377;'.(($postl['ssalary'])).'&nbsp;-&nbsp;&#8377;'.(($postl['esalary'])); ?></td>
              		<td><?php echo ucwords(($postl['post_number'])); ?></td>
              		<td><?php echo ucwords(($postl['gender'])); ?></td>
              		<td><?php echo ucwords($postl['joiningprocess']); ?></td> 
              		<td><?php echo date('d~M Y',strtotime($postl['timedate'])); ?></td>
                  <td><?php echo ($postl['highestqualification']); ?></td>
              	</tr>
              </table><br/>
            </div></div></div>
              <div class="table-responsive">
          <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
<th style="background-color:#E7E9F0;color:#000;"><small>Sno.</small></th>
<th style="background-color:#E7E9F0;color:#000;"><small>Apply Date</small></th>
<th style="background-color:#E7E9F0;color:#000;"><small>Applicant Pic</small></th>
<th style="background-color:#E7E9F0;color:#000;"><small>Applicant Name</small></th>
<th style="background-color:#E7E9F0;color:#000;"><small>High. Qual.</small></th>
<th style="background-color:#E7E9F0;color:#000;"><small>Applicant Contact</small></th>
<th style="background-color:#E7E9F0;color:#000;"><small>Resume/CV</small></th> 
<th style="background-color:#E7E9F0;color:#000;"><small>First Round</small></th>
<th style="background-color:#E7E9F0;color:#000;"><small>Second Round </small></th>
<th style="background-color:#E7E9F0;color:#000;"><small>Final Selection </small></th>
<th style="background-color:#E7E9F0;color:#000;"><small>Action</small></th>
                </tr>
      </thead>  
      <?php 
      $x=1;
      $allaplication=query("SELECT * FROM `aplied_job` WHERE `compid`='$id' AND `jobid`='".base64_decode(trim($_GET['pid']))."' AND `stf_status`='selected' ORDER BY `timedate` DESC");
      while($run=mysqli_fetch_array($allaplication)){?>
      <tbody>
      <tr>   
      <td><?php echo $x; ?>.</td>
      <td><span class="label label-primary"><?php echo date('d-m-Y',strtotime($run['timedate'])); ?></span></td>
      <td><?php if(empty(applicantPic($run['applicantid']))){ ?>
      <img src="../assets/general/1.png" alt="GHS" width="60px;" height="60px;">
      <?php }else{?>
      <img src="../assets/candidate/<?php echo applicantPic($run['applicantid']); ?>" alt="GHS" width="60px;" height="60px;">
      <?php }?></td>
      <td><span class="label label-info"><?php echo ucwords(applicantName($run['applicantid'])); ?></span></td>
      <td><span class="label label-info"><?php echo applicantQuali($run['applicantid']); ?></span></td>
      <td><a href="tel:<?php echo applicantContact($run['applicantid']); ?>" style="color: #000;"><b><?php echo applicantContact($run['applicantid']); ?></b></a></td>
      <td>
      <?php if(!empty(applicantResume($run['applicantid']))){ ?>
      <a href="../assets/candidate/<?php echo applicantResume($run['applicantid']); ?>" target="_blank"><img  name="pic" src="../assets/general/download.png" width="30px;" height="30px;"></a>
    <?php }else{ echo 'No Resume';}?>
    </td> 
    <?php if(FinalSelectionOfCandidate($run['applicantid'],$run['jobid'])!=1){?>
    <?php $val=checkapplicantApply($run['applicantid'],$run['jobid']);
       if($val >=1){ ?>
        <td>
        <?php if((checkapplicantApplyStatus($run['applicantid'],$run['jobid']))==1){?>
          <button type="button"  class="btn btn-danger"><i class="fa fa-user"></i> Selected</button>
        <?php }else{?>
          <form method="post">
        <input type="hidden" name="applicantid" value="<?php echo $run['applicantid']; ?>">
        <input type="hidden" name="jobid" value="<?php echo $run['jobid']; ?>">
        <input type="hidden" name="firstselected" value="1">
        <button type="submit" name="firstround" onclick="return confirm('confirm to select candidate for first Round');" class="btn btn-primary">Select</button></form><?php }?></td>
        <td><?php if((checkapplicantApplyStatusSecond($run['applicantid'],$run['jobid']))==1){ ?> <button type="button"  class="btn btn-danger"><i class="fa fa-user"></i> Selected</button>
        <?php }else{?><form method="post">
        <input type="hidden" name="applicantid" value="<?php echo $run['applicantid']; ?>">
        <input type="hidden" name="jobid" value="<?php echo $run['jobid']; ?>">
        <input type="hidden" name="firstselected" value="1">
        <button type="submit" name="secondround" onclick="return confirm('confirm to select candidate for second Round')" class="btn btn-warning">Select</button></form><?php }?></td>
        <td><?php if((checkapplicantApplyStatusFinal($run['applicantid'],$run['jobid']))==1){ ?> <button type="button"  class="btn btn-danger"><i class="fa fa-user"></i> Selected</button>
        <?php }else{?><form method="post">
        <input type="hidden" name="applicantid" value="<?php echo $run['applicantid']; ?>">
        <input type="hidden" name="jobid" value="<?php echo $run['jobid']; ?>">
        <input type="hidden" name="firstselected" value="1">
        <button type="submit" name="thirdround" onclick="return confirm('confirm to select candidate for Post')" class="btn btn-success">Select</button></form><?php }?></td>
      <?php }else{?> 
         <td colspan="3"><form method="post">
        <input type="hidden" name="applicantid" value="<?php echo $run['applicantid']; ?>">
        <input type="hidden" name="jobid" value="<?php echo $run['jobid']; ?>">
        <button type="submit" name="candidateselection"  class="btn btn-success">Select For Interview</button></form></td>
      <?php }?>

        <td> 
        <?php if((checkapplicantApplyStatusFinalByCandidate($run['applicantid'],$run['jobid']))!=1){?>
        <form method="post">
        <input type="hidden" name="did" value="<?php echo $run['id']; ?>"><button type="submit" name="delt" onclick="return confirm('confirm to remove applicant')" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
        <?php }else{?>
        <form method="post">
          <input type="hidden" name="postid" value="<?php echo checkapplicantApplyStatusFinalByCandidateById($run['applicantid'],$run['jobid']);  ?>">
           <button type="submit" name="joiningpost" onclick="return confirm('Confirm This Action');" class="btn btn-block btn-social btn-bitbucket" style="color: #fff;">
          <i class="fa fa-bell" style="color: #fff;"></i> Inform To Join Candidate
              </button></div></form>
            <?php }?>
        </td>
        <?php }else{?>
           <td colspan="4"><div class="btn-group">
                  <button type="button" class="btn btn-info btn-flat">Candidate Selected For Job</button>
                  <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li> <form method="post">
          <input type="hidden" name="postid" value="<?php echo checkapplicantApplyStatusFinalByCandidateById($run['applicantid'],$run['jobid']);  ?>">
           <button type="submit" name="cancelfinalselection" onclick="return confirm('Confirm This Action');" class="btn btn-warning" style="color: #fff;">Cancel Final Selection</button></form></li>
           <li class="divider"></li>
                    <li> <form method="post">
          <input type="hidden" name="postid" value="<?php echo checkapplicantApplyStatusFinalByCandidateById($run['applicantid'],$run['jobid']);  ?>">
           <button type="submit" name="cancelallfinalselection" onclick="return confirm('Confirm This Action');" class="btn btn-danger" style="color: #fff;">Cancel All Selection</button></form>
         </li>
                  </ul>
                </div></td>
        <?php }?>
        </tr> </tbody>
              <?php $x++;}?>
              </table></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php include_once 'footer.php';?> 
