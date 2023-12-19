<?php 
 include_once 'head.php';
 include_once 'menu.php'; 
 $npost=mysqli_query($db,"SELECT * FROM `client` WHERE `status`='active'");
 $getpost=mysqli_query($db,"SELECT * FROM `post_job` WHERE `id`='".base64_decode(trim($_GET['id']))."'");
 $postd=mysqli_fetch_array($getpost);
 if(isset($_POST['submit'])){
  $company=mysqli_real_escape_string($db,$_POST['company']);
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
  $jobid=mysqli_real_escape_string($db,$_POST['jobid']);
  
  $sql=mysqli_query($db,"UPDATE `post_job` SET `postid`='$pcode',`compid`='$company',`postname`='".strtolower($postname)."',`post_number`='$number_post',`priority`='".strtolower($priority)."',`exp`='".strtolower($exp)."',`location`='".strtolower($location)."',`gender`='".strtolower($gender)."',`highestqualification`='".strtolower($highestqualification)."',`joiningprocess`='".strtolower($joiningprocess)."',`ta`='".strtolower($ta)."',`postdetails`='".strtolower($postdetails)."',`ssalary`='".strtolower($startsalary)."',`esalary`='".strtolower($endsalary)."',`sdate`='".($openingdate)."',`edate`='".($enddate)."',`alernumber`='".($alternative_number)."',`ip`='".$_SERVER['REMOTE_ADDR']."' WHERE `id`='$jobid'")or die(mysqli_error($db));
 	if($sql>0){
 		echo "<script>window.open('edit-job-post?id=".base64_encode($jobid)."&success','_self')</script>";
 	}else{
 		echo "<script>alert('Server Is Busy')</script><meta http-equiv='refresh' content='0'/>";
 	}
 }
 ?>
 <div class="content-wrapper">
    <section class="content-header"><h1><small>Edit Job Post << <a href="manage-job">Back</a></small></h1><ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">New Job Post</li>
      </ol>
    </section>
      <div class="row">
      	<div class="col-md-1 col-xs-12"></div>
      	 
<div class="col-md-10 col-xs-12">
	<?php
      if(isset($_GET['success'])){ ?>
         <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <div align="center"><h3 class="box-title">Job Posted  <br/><br/> Successfully</h3></div>
 <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" onclick="window.open('new-job','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
    <?php } ?>
    <form  method="post">
   <div class="box box-danger">
    <div class="box-header">
    <h3 class="box-title">Post New Job</h3>
    </div>
    <div class="box-body">
    <div class="form-group">
 <label>Post Code</label>: 
 <input type="hidden" name="jobid" value="<?php echo base64_decode(trim($_GET['id'])); ?>" required="required" >
 <input type="text" name="pcode" value="<?php echo $postd['postid']; ?>" maxlength="10" required="required" >
                <div class="input-group">
                </div>
              <br/>
                  <label>Select Company</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="company">
                    <option value="<?php echo $postd['compid']; ?>"><?php echo companyname($postd['compid']); ?></option>
                  <?php while($abc=mysqli_fetch_array($npost)){?>
                  <option value="<?php echo $abc['id']; ?>"><?php echo ucwords($abc['name']).'&nbsp;-&nbsp;'.ucwords($abc['farmname']); ?></option>
              <?php }?>
          </select>
                </div>
              </div>
               <div class="form-group">
                <label>Post Name</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Post Name" maxlength="95" value="<?php echo $postd['postname']; ?>" class="form-control" name="postname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Number of Post</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Number of Post" maxlength="10" value="<?php echo $postd['post_number']; ?>" pattern="[0-9]+" class="form-control" name="number_post" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Priority</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" maxlength="65" placeholder="Priority" value="<?php echo $postd['priority']; ?>" class="form-control" name="priority" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Experiance</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Computer Operatior," value="<?php echo $postd['exp']; ?>" maxlength="25" class="form-control" name="exp" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Location</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Raipur,Durg,Mumbai" value="<?php echo $postd['location']; ?>" maxlength="125" class="form-control" name="location" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="gender">
                    <option value="<?php echo $postd['gender']; ?>"><?php echo $postd['gender']; ?></option>
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
                     <option value="<?php echo $postd['highestqualification']; ?>"><?php echo ucwords($postd['highestqualification']); ?></option>
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
                    <option value="<?php echo $postd['joiningprocess']; ?>"><?php echo $postd['joiningprocess']; ?></option>
                    <option value="walkin">Walk In</option>
                    <option value="interview">Interview</option>
                    <option value="online">Online Interview</option>
                  </select>
                </div>
              </div>
             
              <div class="form-group">
                <label>TA/DA</label>
                <div class="input-group">
                  &nbsp;&nbsp;&nbsp;&nbsp;Yes   <input type="radio"  name="ta" <?php if($postd['ta']=='on'){ echo 'checked';} ?>> 
                  <br/> &nbsp;&nbsp;&nbsp;&nbsp;No <input type="radio"  name="ta" <?php if($postd['ta']=='off'){ echo 'checked';} ?>>
                </div>
              </div>
               
               <div class="form-group">
                <label>Post Details</label><br/>
                <textarea id="postdetails" name="postdetails" rows="10" cols="80" placeholder="Enter Here">
                  <?php echo $postd['postdetails']; ?>
                    </textarea>
                            </div>
              <div class="form-group">
                <label>Salary</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Range &#8377;
                  </div>
                  <input type="text" placeholder="From"  value="<?php echo $postd['ssalary']; ?>" name="startsalary" required="required"> - <input type="text" value="<?php echo $postd['esalary']; ?>" placeholder="To" name="endsalary">
                </div>
              </div>
              <div class="form-group">
                <label>Opening Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" value="<?php echo $postd['sdate']; ?>" name="openingdate" required="required">
                </div>
              </div>

              <div class="form-group">
              	 <label>End Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" value="<?php echo $postd['edate']; ?>" name="enddate">
                </div>
              </div>
              <div class="form-group">
                <label>Alternative Number</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" placeholder="Alternative Number" value="<?php echo $postd['alernumber']; ?>" class="form-control" name="alternative_number">
                </div>
                <?php if($postd['stf_approve']=='approved'){ ?><br/>
                <div align="center"><button type="button" disabled="disabled" class="btn btn-danger">This is Approved Job Post.! Recommended Do Not Change</button></div><br/>
              <?php }?>
                <br/>
                   <input type="checkbox" name="recheck" required="required"> <note>Recheck Before Submit</note>
                <div align="center">
                	<br/>
                	<button type="submit" name="submit" class="btn btn-warning">Update</button>
                </div>
              </div> </div>
          </div></div></div></div>
          </form>
          <script>
  $(function () {
    CKEDITOR.replace('postdetails')
    $('.textarea').wysihtml5()
  })
</script>
 <?php  include_once 'footer.php'; ?>
