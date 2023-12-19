<?php 
 include_once 'head.php';
 include_once 'menu.php'; 
 $npost=query("SELECT * FROM `client` WHERE `status`='active'");
if(isset($_POST['submit'])){
$jobtag= mysqli_real_escape_string($db,$_POST['jtag']);
$jobtyp=mysqli_real_escape_string($db,$_POST['jtyp']);
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
 $loc=(explode(",",$location));
   foreach ($loc as $key => $value) {
     $loc=query("INSERT INTO `job_locations`(`name`) VALUES ('$value')");
   }

 	$sql=query("INSERT INTO `post_job`(`postid`,`jobtyp`,`tag`,`adminid`,`compid`, `postname`,`post_number`,`priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`,`postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`,`adm_approve`, `stf_approve`,`ip`) VALUES ('$pcode','$jobtyp','$jobtag','$id','$company','".strtolower($postname)."','$number_post','".strtolower($priority)."','".strtolower($exp)."','".strtolower($location)."','".strtolower($gender)."','".strtolower($highestqualification)."','".strtolower($joiningprocess)."','".strtolower($ta)."','".strtolower($postdetails)."','".strtolower($startsalary)."','".strtolower($endsalary)."','".($openingdate)."','".($enddate)."','".($alternative_number)."','approved','approved','".$_SERVER['REMOTE_ADDR']."')")or die(mysqli_error($db));
 	if($sql>0){
 		echo "<script>window.open('new-job-post?success&".md5(uniqid())."&type=".trim($_GET['type'])."&typen=".trim($_GET['typen'])."&tag=".trim($_GET['tag'])."&tagn=".trim($_GET['tagn'])."','_self')</script>";
 	}else{
 		echo "<script>alert('Server Is Busy')</script><meta http-equiv='refresh' content='0'/>";
 	}
 }
 ?>
 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small>New Job Post</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">New Job Post</li>
      </ol> 
    </section> 
    <a href="new-job-step?<?php echo (md5(uniqid())); ?>&type=<?php echo trim($_GET['type']); ?>&name=<?php echo trim($_GET['typen']); ?>&tag=<?php echo trim($_GET['tag']); ?>&tagn=<?php echo trim($_GET['tagn']); ?>"><< Back</a>
      <div class="row">
      	<div class="col-md-1 col-xs-12"></div>
      	 <form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="col-md-10 col-xs-12">
	<?php if(isset($_GET['success'])){ ?>
         <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <div align="center"><h3 class="box-title">Job Posted  <br/><br/> Successfully</h3></div>
 <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('new-job-post?<?php echo md5(uniqid());?>&type=<?php echo trim($_GET['type']);?>&typen=<?php echo trim($_GET['typen']);?>&tag=<?php echo trim($_GET['tag']); ?>&tagn=<?php echo trim($_GET['tagn']); ?>','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div> 
                <?php } ?>
<div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Post New Job</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
 <div align="right"><label>Job Code</label> : <input type="text" name="pcode" value="<?php echo mt_rand(); ?>" maxlength="10" required="required" ></div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i> Job Type
                  </div>
                  <select class="form-control" name="jtyp" style="width:100%;">
                    <option value="<?php echo base64_decode(trim($_GET['type'])); ?>"><?php echo base64_decode(trim($_GET['typen'])); ?></option>
          </select>
            <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i> TAG
                  </div>
                      <select class="form-control" name="jtag">
                    <option value="<?php echo base64_decode(trim($_GET['tag'])); ?>"><?php echo base64_decode(trim($_GET['tagn'])); ?></option>
          </select>
                    </span>
                </div>
              </div> 
               <div class="form-group">
                  <label>Select Company</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="company">
                       <option value="0">Company</option>
                  <?php while($abc=mysqli_fetch_array($npost)){?>
                  <option value="<?php echo $abc['id']; ?>"><?php echo ucwords($abc['name']).'&nbsp;-&nbsp;'.ucwords($abc['farmname']); ?></option>
              <?php }?>
          </select>
                </div>
              </div>
              <hr/>
               <div class="form-group">
                <label>Post Name</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Post Name" maxlength="95" class="form-control" name="postname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Number of Post</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Number of Post" maxlength="10" pattern="[0-9]+" class="form-control" name="number_post" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Priority</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" maxlength="65" placeholder="Priority"  class="form-control" name="priority" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Experiance</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Computer Operatior," maxlength="25" class="form-control" name="exp" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Location</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Raipur,Durg,Mumbai,Wizag,Delhi" maxlength="125" class="form-control" name="location" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="gender">
                    <option value="any">Any</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="transg">TransGender</option>
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
                    <option value="any">Any</option>
                   <?php  $sql=query("SELECT `name` FROM `higest_qual`");
                        while($run=mysqli_fetch_array($sql)){
                      echo '<option value="'.$run['name'].'">'.ucwords($run['name']).'</option>';
                    }?>
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
                    <option value="walkin">Walk In</option>
                    <option value="interview">Interview</option>
                    <option value="online">Online Interview</option>
                  </select>
                </div>
              </div>
             
              <div class="form-group">
                <label>TA/DA</label>
                <div class="input-group">
                  &nbsp;&nbsp; Yes   <input type="radio"  name="ta"> 
                  <br/> &nbsp;&nbsp;&nbsp;&nbsp;No <input type="radio"  name="ta" checked="checked">
                </div>
              </div>
               
               <div class="form-group">
                <label>Post Details</label><br/>
                <textarea id="postdetails" name="postdetails" rows="10" cols="80" placeholder="Enter Here">
                    </textarea>
                            </div>
              <div class="form-group">
                <label>Salary</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Range &#8377;
                  </div>
                  <input type="text" placeholder="From" pattern="[0-9]+" name="startsalary" required="required"> - <input type="text" placeholder="To" name="endsalary" pattern="[0-9]+">
                </div>
              </div>
              
              <div class="form-group">
                <label>Opening Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="openingdate" required="required">
                </div>
              </div>

              <div class="form-group">
              	 <label>End Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="enddate">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Alternative Number</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" pattern="[0-9]+" placeholder="Alternative Number" class="form-control" name="alternative_number" maxlength="10">
                </div>
                <br/>
                   <input type="checkbox" name="recheck" required="required"> <note>Recheck Before Submit</note>
                <div align="center">
                	<br/>
                	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
             </form>

             

            </div>
            <!-- /.box-body -->
          </div></div></div></div></div></div>
          <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('postdetails')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
 <?php  include_once 'footer.php'; ?>
