<?php
 include_once '../layouts/heade_design.php';
 include_once 'head.php';
 if(isset($_POST['removejob'])){
  $sql=sqlquery("DELETE FROM `post_job` WHERE `id`='".trim($_POST['pid'])."'");
  if($sql>0){
    echo "<script>alert('Update Successfully')</script><meta http-equiv='refresh' content='0'/>";
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
}
if(isset($_POST['post_job_update'])){
$postname=mysqli_real_escape_string($db,$_POST['postname']);
$postdetails=mysqli_real_escape_string($db,$_POST['postdetails']);
$startsalary=mysqli_real_escape_string($db,$_POST['startsalary']);
$endsalary=mysqli_real_escape_string($db,$_POST['endsalary']);
$openingdate=mysqli_real_escape_string($db,$_POST['openingdate']);
$enddate=mysqli_real_escape_string($db,$_POST['enddate']);
$priority=mysqli_real_escape_string($db,$_POST['priority']);
$exp=mysqli_real_escape_string($db,$_POST['exp']);
$location=mysqli_real_escape_string($db,$_POST['location']);
$gender=mysqli_real_escape_string($db,$_POST['gender']);
$highestqualification=mysqli_real_escape_string($db,$_POST['highestqualification']);
$joiningprocess=mysqli_real_escape_string($db,$_POST['joiningprocess']);
$ta=mysqli_real_escape_string($db,$_POST['ta']);
$alternative_number=mysqli_real_escape_string($db,$_POST['alternative_number']);
$pcode=mysqli_real_escape_string($db,$_POST['pcode']);
$number_post=mysqli_real_escape_string($db,$_POST['number_post']);
$company=mysqli_real_escape_string($db,$_POST['company']);
$company_no=mysqli_real_escape_string($db,$_POST['company_contact_number']);
$company_regi=mysqli_real_escape_string($db,$_POST['company_regi_number']);
$company_manager_name=mysqli_real_escape_string($db,$_POST['company_manager']);
$stf=mysqli_real_escape_string($db,$_POST['stfid']);
$compid=mysqli_real_escape_string($db,$_POST['companyid']);
$jid=mysqli_real_escape_string($db,$_POST['jobid']);
$ptyxxy=mysqli_real_escape_string($db,$_POST['posttype']);
 $sql= query("UPDATE `post_job` SET `postid`='$pcode',`adminid`='$id',`stfid`='$stf',`posttype`='$ptyxxy',`compid`='$compid',`postname`='".strtolower($postname)."',`post_number`='$number_post',`priority`='".strtolower($priority)."',`exp`='".strtolower($exp)."',`location`='".strtolower($location)."',`gender`='".strtolower($gender)."',`highestqualification`='".strtolower($highestqualification)."',`joiningprocess`='".strtolower($joiningprocess)."',`ta`='".strtolower($ta)."',`postdetails`='".strtolower($postdetails)."',`ssalary`='".strtolower($startsalary)."',`esalary`='".strtolower($endsalary)."',`sdate`='".strtolower($openingdate)."',`edate`='".strtolower($enddate)."',`alernumber`='".($alternative_number)."' WHERE `id`='$jid'")or die(mysqli_error($db));
  if($sql>0){
    echo "<script>window.open('manage-job-post?success','_self')</script>";
  }else{
    echo "<script>alert('Failed Server Is Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
 }
?>
  <div class="content-wrapper">
    <section class="content-header">
     <h1><small><a href="calling-manage"><span class="label label-default"><< Back</a></span></small></h1><section class="content">
      <div class="row">
        <?php if(!isset($_GET['update'])){?> 
<div class="col-md-12 col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Job List</h3>
              <div align="right"><button type="button" onclick="window.open('new-job-post','_self')" class="btn btn-info btn-small">Add New Job+</button></div>
            </div>
            <div class="box-body">
            	<div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sno.</th>
                  <th>Remove</th>
                  <th>Edit</th>
                  <th>Post Type</th>
                  <th>Post Name</th>
                  <th>NoF Post</th>
                  <th>Priority</th>
                  <th>Exp.</th>
                  <th>View</th>
                </tr>
                </thead>
                <?php
                $i=1;
                $postlist=query("SELECT * FROM `post_job` WHERE `adminid`='$id'");
                 while($runpost=mysqli_fetch_array($postlist)){ $qstringxiuq = str_replace(' ', '-', ($runpost['postname']));?>
                <tbody>
                <tr>
                  <td><?php echo $i; ?>.</td>
                  <td><form method="post" action="#">
                  	<input type="hidden" name="pid" value="<?php echo $runpost['id']; ?>">
                  	<button type="submit" name="removejob" onclick="return confirm('confirm To Remove')"><i class="fa fa-trash" style="color: red;"></i></button>
                  </form></td>
                  <td><button type="button" onclick="window.open('manage-job-post?<?php echo md5(uniqid()); ?>&jobid=<?php echo base64_encode($runpost['id']); ?>&<?php echo md5(uniqid()); ?>&update&<?php echo md5(uniqid()); ?>','_self')"><i class="fa fa-edit" style="color: blue;"></i></button></td> 
                  <td><ul><?php 
                  foreach (explode(",",$runpost['posttype']) as $key => $valuepty) {
                  echo '<li>'.jobtypidtoname($valuepty).'</li>'; }?></ul></td>
                  <td><?php echo ucwords($runpost['postname']); ?></td>
                  <td><?php echo ucwords($runpost['post_number']); ?></td>
                  <td><?php echo ucwords($runpost['priority']); ?></td> 
                  <td class="text-nowrap"><?php echo ucwords($runpost['exp']); ?></td>
                  <td style="color: red;">
                     <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Manage <span class="caret"></span>
                </a> 
                <ul class="dropdown-menu">
                  <li role="presentation"><input type="button" name="view" value="view" id="<?php echo ($runpost['id']); ?>" class="btn btn-default view_data" style=width:70%; /></li>
                  <li role="presentation"><button onclick="window.open('https://rmjob.in/post-view/<?php echo $qstringxiuq; ?>//<?php echo ($runpost['id']); ?>/apply','_blank')" class="btn btn-default" style=width:70%;>Apply</button></li>
                  <li role="presentation"><button onclick="window.open('apply-data-for-job?<?php echo md5(uniqid()); ?>&<?php echo md5(uniqid()); ?>&id=<?php echo base64_encode($runpost['id']); ?>&<?php echo md5(uniqid()); ?>','_self')" class="btn btn-default" style=width:70%;>Apply Data</button></li>
                </ul>
              </li></td>
                </tr></tbody>
            <?php $i++;}?> 
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }else{?> 
  <?php $postd=query("SELECT * FROM `post_job` WHERE `id`='".base64_decode(trim($_GET['jobid']))."'");
        $rund=mysqli_fetch_array($postd);?>
<form role="form" enctype="multipart/form-data" method="post">
<div class="col-md-9 col-xs-12">
  <?php if(isset($_GET['post-job'])){ ?>
         <div class="box box-warning box-solid">
           <div class="box-header with-border">
   <div align="center"><h3 class="box-title">Job Posted  <br/><br/> Successfully</h3></div>
 <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('dashboard?new-job','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
<div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Post New Job</h3>
            </div>
            <div class="box-body">
               <div class="form-group">
 <label>Post Code</label>:
  <input type="text" name="pcode" value="<?php echo $rund['postid'] ?>" maxlength="10" required="required" readonly ><div class="input-group"></div><br/>
                  <legend>Company Details</legend>
                  <label>Company Name <b style="color: red">*</b></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="hidden" name="companyid" value="<?php echo ($rund['adminid']); ?>">
                  <input type="hidden" name="jobid" value="<?php echo ($rund['id']); ?>">
                  <input type="text" name="company" value="<?php echo companyname($rund['compid']); ?>" placeholder="Enter Company Name" class="form-control" required="required" readonly="readonly">
                </div>
                
                <label>Company Manager/Owner Name </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" name="company_manager" value="<?php echo companyOwner($rund['compid']); ?>" placeholder="Company Manager/Owner Name" class="form-control" readonly="readonly">
                </div>
                <label>Contact Number <b style="color: red">*</b></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" name="company_contact_number" value="<?php echo companyContact($rund['compid']); ?>" pattern="[0-9]+" placeholder="Enter Company Contact Number" class="form-control" required="required" readonly="readonly">
                </div>
                <label>Registraion No. </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo companynameRgno($rund['compid']); ?>" name="company_regi_number" placeholder="Enter Company Name" class="form-control" readonly="readonly">
                </div>
                <br/><hr/>
                <label>Post Type</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="posttype">
                    <option value="<?php echo $rund['posttype'] ?>"><?php echo $rund['posttype'] ?></option>
                  <option value="normal">Normal</option>
                  <option value="technical">Technical</option>
                  <option value="nontechnical">Non-Technical</option>
                  <option value="doctor">Doctor</option>
                  <option value="engineer">Engineer</option>
                  <option value="other">Other</option>
                  </select>
                </div>
              </div>
               <div class="form-group">
                <label>Post Name</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div> 
                  <input type="hidden" value="<?php echo $id; ?>" name="stfid" required="required">
                  <input type="text" placeholder="Post Name" maxlength="95" class="form-control" value="<?php echo $rund['postname'] ?>" name="postname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Number of Post</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo $rund['post_number'] ?>" placeholder="Number of Post" maxlength="10" pattern="[0-9]+" class="form-control" name="number_post" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Priority</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo $rund['priority'] ?>" maxlength="65" placeholder="Priority"  class="form-control" name="priority" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Experiance</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo $rund['exp'] ?>" placeholder="Computer Operatior," maxlength="25" class="form-control" name="exp" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Location</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo $rund['location'] ?>" placeholder="Location 1,Location 2,Location 3" maxlength="125" class="form-control" name="location" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="gender">
                    <option value="<?php echo $rund['gender'] ?>"><?php echo $rund['gender'] ?></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="any">Any</option>
                  </select>
                </div>
              </div>
               <div class="form-group">
                <label>Highest Qualification</label>
                <div class="input-group">
                  <div class="input-group-addon">
                   <i class="fa fa-circle-o text-red"></i>
                  </div> 
                  <select class="form-control" name="highestqualification">
                    <option value="<?php echo $rund['highestqualification'] ?>"><?php echo $rund['highestqualification'] ?></option>
                     <option value="any">Any</option>
                     <option value="primary">Primary Education</option>
                     <option value="secondery">Secondery Education</option>
                     <option value="bachelor">Bachelor Degree</option>
                     <option value="diploma">Diploma</option>
                     <option value="diploma">Master Degree</option>
                     <option value="mba">MBA</option>
                     <option value="doctore">Doctore Degree</option>
                     <option value="phD">PhD</option>
                  </select>
                </div>
              </div>
             <div class="form-group">
                <label>Joining Process</label>
                <div class="input-group">
                  <div class="input-group-addon">
                   <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="joiningprocess">
                    <option value="<?php echo $rund['joiningprocess'] ?>"><?php echo $rund['joiningprocess'] ?></option>
                    <option value="walkin">Walk In</option>
                    <option value="interview">Interview</option>
                    <option value="online">Online Interview</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>TA/DA</label>
                <div class="input-group">
                  &nbsp;&nbsp;
                       Yes   <input type="radio"  name="ta" <?php if($rund['ta']=='on'){ echo 'checked="checked"'; }else{ echo '';} ?>> 
                  <br/> &nbsp;&nbsp;&nbsp;&nbsp;No <input type="radio"  name="ta" <?php if($rund['ta']!='on'){ echo 'checked="checked"'; }else{ echo '';} ?>>
                </div>
              </div>
               
               <div class="form-group">
                <label>Post Details</label><br/>
                <textarea id="postdetails" name="postdetails" rows="10" cols="80" placeholder="Enter Here"><?php echo $rund['postdetails'] ?></textarea>
                            </div>
              <div class="form-group">
                <label>Salary</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Range &#8377;
                  </div>
                  <input type="text" value="<?php echo $rund['ssalary'] ?>" placeholder="From" pattern="[0-9]+(\.[0-9][0-9]?)?" name="startsalary" required="required"> - <input type="text" value="<?php echo $rund['esalary'] ?>" placeholder="To" name="endsalary" pattern="[0-9]+(\.[0-9][0-9]?)?">
                </div>
              </div>
              
              <div class="form-group">
                <label>Opening Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" value="<?php echo $rund['sdate'] ?>" class="form-control" name="openingdate" required="required">
                </div>
              </div>

              <div class="form-group">
                 <label>End Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" value="<?php echo $rund['edate'] ?>" class="form-control" name="enddate">
                </div>
              </div>
              <div class="form-group">
                <label>Contact Person Number</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" maxlength="10" value="<?php echo $rund['alernumber'] ?>" pattern="[0-9]+" placeholder="Alternative Number" class="form-control" name="alternative_number">
                </div>
                <br/>
                   <input type="checkbox" name="recheck" required="required"> <note>Recheck Before Submit</note>
                <div align="center">
                  <br/>
                  <button type="submit" name="post_job_update" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
  <?php }?>
  </section></div>
  <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Post Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<script>     
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var call_id = $(this).attr("id");  
           $.ajax({  
                url:"post-details-view.php",  
                method:"post",  
                data:{post_id:call_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script><?php include_once 'footer.php'; ?> 