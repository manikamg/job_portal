<?php 
 include_once '../layouts/heade_design.php';
 include_once 'head.php';
if(isset($_POST['submit'])){ 
      $adminid  =   mysqli_real_escape_string($db,$_POST['adminid']);
      $empid    =     mysqli_real_escape_string($db,$_POST['empid']);
      $fullname =  mysqli_real_escape_string($db,$_POST['fullname']);
      $fname    =     mysqli_real_escape_string($db,$_POST['fname']);
      $mname    =     mysqli_real_escape_string($db,$_POST['mname']);
      $email =     mysqli_real_escape_string($db,$_POST['email']);
      $mob   =     mysqli_real_escape_string($db,$_POST['contact']);
      $add   =     mysqli_real_escape_string($db,$_POST['address']);
      $pass  =     rand(111111,99999);
      $finalPref=(implode(",",$_POST['pref']));
      $locationprefXyu=(implode(",", $_POST['locationpref']));
      $chqx  =   mysqli_real_escape_string($db,$_POST['chq']);
      $ind   = (implode(",",$_POST['industries']));
//pic
  $oldpath = $_FILES['pic']['tmp_name'];
//$img=$_FILES['pic']['name'];
$temp = explode(".", $_FILES["pic"]["name"]);
$img = round(microtime(true)) . '.' . end($temp);
$newpath ="../assets/candidate/".$img;
move_uploaded_file($oldpath, $newpath);
//resume
 $oldpathr = $_FILES['resume']['tmp_name'];
$tempr = explode(".", $_FILES["resume"]["name"]);
$imgr = round(microtime(true)) . '.' . end($tempr);
$newpathr ="../assets/candidate/".$imgr;
move_uploaded_file($oldpathr, $newpathr);
  $sql=query("INSERT INTO `candidate`(`admin`,`stfid`,`jobtyp`,`indust`,`preflocation`,`name`, `fname`, `mname`,`hq`,`pic`, `resume`,`address`,`contact`,`emailid`, `pass`,`ip`) VALUES ('$adminid','$empid','$finalPref','$ind','$locationprefXyu','$fullname','$fname','$mname','$chqx','$img','$imgr','$add','$mob','$email','$pass','".$_SERVER['REMOTE_ADDR']."')");
  if($sql>0){
    echo "<script>window.open('candidate-add?success','_self')</script>";
  }else{
    echo "<script>alert('Server Busy'),</script><meta http-equiv=refresh content=0/>";
  }
 }
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <legend>Add Candidate</legend>
        <?php if(isset($_GET['success'])){?>
        <div class="col-md-4"></div>
        <div class="col-md-6">
        <div class="box box-warning box-solid">
        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-check-square-o"></i>Alert</h3>
        <div class="box-tools pull-right">
        <button type="button" onclick="window.open('candidate-add','_self')" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div></div><div class="box-body"> Candidate Add Successfully </div></div></div><div class="col-md-2"></div><?php }?>
<div class="row">
  <form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="col-md-3 col-xs-12">
<div class="box box-solid">
<div class="box-header with-border"><i class="fa fa-text-width"></i><h3 class="box-title">Interested Profile</h3></div><div class="box-body">
  <blockquote><ul>
  <?php $jbval=printwhileloop("SELECT `id`, `name` FROM `jobtype`"); 
  foreach ($jbval as $key => $value) {?>
  <li><input type="checkbox" value="<?php echo $value[0]; ?>" name="pref[]"> <?php echo $value[1]; ?></li> <?php }?> 
  </ul></blockquote></div>
<div class="box-header with-border"><i class="fa fa-text-width"></i><h3 class="box-title">Location Pref</h3></div><div class="box-body">
  <blockquote>
<select class="form-control select2" name="locationpref[]" required="required" multiple="multiple" data-placeholder="Select a location">
  <option value="">Select Any </option>
  <?php $indust=printwhileloop("SELECT `id`, `name` FROM `job_locations`");
  foreach ($indust as $key => $indtyp) {?>
  <option value="<?php echo $indtyp[0] ?>"><?php echo ($indtyp[1]); ?></option>
  <?php }?>
  </select></blockquote></div></div></div>
<div class="col-md-9 col-xs-12">
<div class="box box-solid"> 
<div class="box-body">
  <div class="col-xs-12 col-md-8">
                <div class="form-group"> 
                  <label>Full Name <b style="color:red">*</b></label> 
                  <input type="hidden" class="form-control" name="adminid" value="<?php echo $id; ?>" required="required">
                  <input type="hidden" class="form-control" name="empid" value="<?php echo $id; ?>" required="required">
                  <input type="text" class="form-control" name="fullname" placeholder="Enter Here" required="required">
                </div>
              </div>
              <div class="col-xs-12 col-md-4">
                <label>Highest Qualification <b style="color:red">*</b></label>
                <select class="form-control" name="chq" required="required">
                  <option value="">Select Any </option>
                  <?php $hq=query("SELECT `id`, `name` FROM `higest_qual`");
                  while($row=mysqli_fetch_array($hq)){?>
                  <option value="<?php echo $row['id'] ?>"><?php echo ($row['name']); ?></option>
                <?php }?>
                </select>
              </div>
                <div class="col-xs-6 col-md-6">
                <div class="form-group">
                  <label>Contact Number <b style="color:red">*</b></label>
                  <input type="text" class="form-control" pattern="[0-9]+" maxlength="10" minlength="10" name="contact" placeholder="Enter Here" required="required">
                </div></div>
                <div class="col-xs-6 col-md-6">
                 <div class="form-group">
                  <label>Email Id</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter Here">
                </div></div>
                <div class="form-group">
                  <label>Father's Name</label>
                  <input class="form-control" class="form-control" name="fname" placeholder="Enter Here">
                </div> 
                <div class="form-group">
                  <label>Mother's Name</label>
                 <input type="text" class="form-control" name="mname" placeholder="Enter Here" required="required">
               </div>
                   <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="3" name="address" placeholder="Enter Here"></textarea>
                </div>
                <div class="col-xs-6">
                   <div class="form-group">
                  <label>Attach Pic <b style="color:red">*</b></label>
                  <input type="file" class="form-control" name="pic"  placeholder="Enter Here" required="required">
                </div>
                </div>
                <div class="col-xs-6">
                   <div class="form-group">
                  <label>Attach Resume <b style="color:red">*</b></label>
                  <input type="file" class="form-control" name="resume"  placeholder="Enter Here" required="required">
                </div>
                </div>
                <div class="form-group">
                  <label>Interest Industries <b style="color:red">*</b></label>
                <select class="form-control select2" name="industries[]" required="required" multiple="multiple" data-placeholder="Select a industries">
                  <option value="">Select Any </option>
                  <?php $indust=printwhileloop("SELECT `id`, `name` FROM `industry`");
                  foreach ($indust as $key => $indtyp) {?>
                  <option value="<?php echo $indtyp[0] ?>"><?php echo ($indtyp[1]); ?></option>
                <?php }?>
                </select>
              </div>
                <div class="form-group">
                  <div align="center"><button type="submit" name="submit" id="submit" class="btn btn-primary"> Submit</button></div><br/>
                </div>
                </div>
              </div></div></form> <script>
  $(function () {
    CKEDITOR.replace('postdetails')
    $('.textarea').wysihtml5()
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
</div></section>
<script> $(function () { $('.select2').select2() }) </script><?php include_once 'footer.php'; ?>