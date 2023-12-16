<?php 
 include_once '../layouts/heade_design.php';
 include_once 'head.php';
if(isset($_POST['post_job'])){
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
$stf    =mysqli_real_escape_string($db,$_POST['stfid']);
$ptyxxy =(implode(",",$_POST['posttype']));
$ind    =(implode(",",$_POST['industries']));
if(empty(mysqli_real_escape_string($db,$_POST['comhide']))){
  $cv=0;
}else{
  $cv=1;
}
if(empty($_POST['selectcomp'])){
 $sql_clint=query("INSERT INTO `client`(`admin`,`stfid`,`name`,`mng_name`, `contact`,`farmname`, `farmno`,`ip`) VALUES ('$id','$stf',0,'$company','$company_no','$company_regi','$company_manager_name','".$_SERVER['REMOTE_ADDR']."')")or die(mysqli_error($db));
 $lclient=mysqli_insert_id($db);
}else{
  $lclient=trim($_POST['selectcomp']);
}
  $sql=query("INSERT INTO `post_job`(`postid`,`indust`,`adminid`,`stfid`,`posttype`,`compid`, `postname`,`post_number`,`priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`,`postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`,`comphide`,`ip`) VALUES ('$pcode','$ind','$id','$stf','$ptyxxy','$lclient','".strtolower($postname)."','$number_post','".strtolower($priority)."','".strtolower($exp)."','".strtolower($location)."','".strtolower($gender)."','".strtolower($highestqualification)."','".strtolower($joiningprocess)."','".strtolower($ta)."','".strtolower($postdetails)."','".strtolower($startsalary)."','".strtolower($endsalary)."','".($openingdate)."','".($enddate)."','".($alternative_number)."','$cv','".$_SERVER['REMOTE_ADDR']."')")or die(mysqli_error($db));
  if($sql>0){
    echo "<script>window.open('new-job-post?success','_self')</script>";
  }else{
    echo "<script>alert('Failed Server Is Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
 }
 ?>
  <div class="content-wrapper">
    <section class="content-header">
     <h1><small><a href="manage-job-post"><span class="label label-default"><< Back</a></span></small></h1>
      <section class="content">
        <?php if(isset($_GET['success'])){?>
          <div class="col-md-3"></div>
          <div class="col-md-3">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-check-square-o"></i>Alert</h3>
     <div class="box-tools pull-right">
              <button type="button" onclick="window.open('new-job-post','_self')" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body"> Job Post Successfully </div>
          </div>
        </div>
      <?php }?>
      <div class="row">
<div class="col-md-12 col-xs-12">
            <div class="box-body">
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
            <script>
function myFunction() {
  var x = document.getElementById("myDIV");
  var y = document.getElementById("DivFull");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    y.style.display = "block";
    x.style.display = "none";
  }
}
</script>
            <div class="box-body">
               <div class="form-group">
 <label>Post Code</label>:
  <input type="text" name="pcode" value="<?php echo mt_rand(); ?>" maxlength="10" required="required" ><div class="input-group"></div><br/>
                  <legend>Company Details</legend>
                <div align="left"><button type="button" onclick="myFunction()" class="btn btn-defult btn-sm">Add New</button></div>
                  <div class="col-xs-12 col-md-3"></div>
                  <div id="myDIV"><div class="col-xs-12 col-md-6"> 
                    <select class="form-control select2" name="selectcomp" onchange="joblocation(this.value);" style="width: 100%;"><option value=""> Select Company</option>
              <?php $tpie=printwhileloop("SELECT `id`,`name`, `mng_name` FROM `client` WHERE `admin`='$id'");
                  foreach ($tpie as $key => $xyzu) { ?>
                    <option value="<?php echo $xyzu[0]; ?>"><?php echo ucwords($xyzu[1]).'-'.ucwords($xyzu[2]); ?></option>
                  <?php }?>
                </select>
                  </div>
                  <div class="col-xs-12 col-md-3"></div></div>
                  <div class="col-xs-12 col-md-12"></div>
                  <div id="DivFull">
                  <div class="col-xs-12 col-md-6">
                  <label>Company Name <b style="color: red">*</b></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" name="company"  placeholder="Enter Company Name" class="form-control" required="required">
                </div>
              </div>
              <div class="col-xs-12 col-md-6">
                <label>Contact Person Name </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" name="company_manager" placeholder="Company Manager/Owner Name" class="form-control">
                </div>
              </div>
              <div class="col-xs-12 col-md-6">
                <label>Contact Number <b style="color: red">*</b></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" name="company_contact_number" pattern="[0-9]+" placeholder="Enter Company Contact Number" class="form-control" required="required">
                </div>
              </div>
              <div class="col-xs-12 col-md-6">
                <label>Registraion No. </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" name="company_regi_number" placeholder="Enter Company Name" class="form-control">
                </div>
              </div></div>
                <div style="text-align: right;"><small>Hide Company Info : <input type="checkbox" value="1" name="comhide"></small></div>
                <br/><hr/>
                <div class="col-xs-12 col-md-6">
                <label>Post Type</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="posttype[]" multiple="multiple">
                  <?php $jyp=printwhileloop("SELECT `id`, `name`, `timedate` FROM `jobtype`");
                  foreach ($jyp as $key => $valuetyu) { ?>
                    <option value="<?php echo $valuetyu[0] ?>"><?php echo $valuetyu[1] ?></option>
                  <?php }?>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-md-6">
               <div class="form-group">
                <label>Post Name</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div> 
                  <input type="hidden" value="<?php echo $id; ?>" name="stfid" required="required">
                  <input type="text" placeholder="Post Name" maxlength="95" class="form-control" name="postname" required="required">
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Number of Post</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Number of Post" maxlength="10" pattern="[0-9]+" class="form-control" name="number_post" required="required">
                </div>
              </div>
            </div>
             <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Experiance On</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Computer Operatior,Plan,Management,etc" maxlength="25" class="form-control" name="exp" required="required">
                </div>
              </div>
            </div>
              <div class="form-group">
                <label>Priority</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" maxlength="65" placeholder="computer skill,excel,ms-word,etc"  class="form-control" name="priority" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Location</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Location 1,Location 2,Location 3" maxlength="125" class="form-control" name="location" required="required">
                </div>
              </div>
              <div class="col-xs-12 col-md-3">
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="any">Any</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6">
               <div class="form-group">
                <label>Required Qualification <b style="color: red;">*</b></label>
                <div class="input-group">
                  <div class="input-group-addon">
                   <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="highestqualification" required="required">
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
            </div>
            <div class="col-xs-12 col-md-3">
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
             </div>
              <div class="form-group">
                <label>TA/DA</label>
                <div class="input-group">
                  &nbsp;&nbsp;
                       Yes   <input type="radio"  name="ta"> 
                  <br/> &nbsp;&nbsp;&nbsp;&nbsp;No <input type="radio"  name="ta" checked="checked">
                </div>
              </div>
               
               <div class="form-group">
                <label>Post Details <small>Min.50</small></label><br/>
                <textarea id="postdetails" name="postdetails" rows="10" cols="80" placeholder="Enter Here" minlength="50">
                    </textarea>
                            </div>
                            <div class="form-group">
                  <label>Targeted Industries <b style="color:red">*</b></label>
                <select class="form-control select2" name="industries[]" required="required" multiple="multiple" data-placeholder="Select a industries">
                  <option value="">Select Any </option>
                  <?php $indust=printwhileloop("SELECT `id`, `name` FROM `industry`");
                  foreach ($indust as $key => $indtyp) {?>
                  <option value="<?php echo $indtyp[0] ?>"><?php echo ($indtyp[1]); ?></option>
                <?php }?>
                </select>
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
              <div class="col-xs-12 col-md-6">
              <div class="form-group">
                <label>Opening Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="openingdate" required="required">
                </div>
              </div>
             </div>
             <div class="col-xs-12 col-md-6">
              <div class="form-group">
              	 <label>End Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" value="<?php echo date('Y-m-d', strtotime("+1 months", strtotime(date('Y-m-d')))); ?>" class="form-control" name="enddate">
                </div>
              </div>
            </div>
              <div class="form-group">
                <label>Contact Person Number</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" maxlength="10" pattern="[0-9]+" placeholder="Alternative Number" class="form-control" name="alternative_number">
                </div>
                <br/>
                   <input type="checkbox" name="recheck" required="required"> <note>Recheck Before Submit</note>
                <div align="center">
                	<br/>
                	<button type="submit" name="post_job" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
</div>
</div>
</div>
<div class="col-md-3 col-xs-12">
<div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Important</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <blockquote>
                <small><ul><li>Use Industry standard Job Titles / Designations</li>
<li>Describe specific Job requirement with some punchy text</li>
<li>Mention atleast 5 Key Skills for better response</li>
<li>Include Salary Range, Experience & Benefits</li>
<li>Identify and add compelling & popular keyskills</li>
<li>Proofread your self , check spelling mistakes</li>
<li>Share the activated Job link on your company's social networks</li></ul></small>
              </blockquote>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
</div>
</div>
</div>
</div></section>
 <script> $(function () {CKEDITOR.replace('postdetails') 
  $('.textarea').wysihtml5()})</script><script> $(function () { $('.select2').select2() }) </script><?php include_once 'footer.php'; ?>