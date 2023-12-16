<?php 
 include_once 'head.php';
 include_once 'menu.php';
 $sql=mysqli_query($db,"SELECT  * FROM `candidate`");
 while($row=mysqli_fetch_array($sql)){
  $array[] = $row;
 }
 //read profile 
 if(isset($_GET['read'])){
  $sql=mysqli_query($db,"UPDATE `candidate` SET `sread`=2 WHERE `id`='".base64_decode(trim($_GET['id']))."'");
 }
 if(isset($_POST['status_update'])){
  $pid=trim($_POST['proid']);
  $st=mysqli_real_escape_string($db,$_POST['status']);
  $sql=mysqli_query($db,"UPDATE `candidate` SET `regiprice`='200',`regi_status`='$st' WHERE `id`='$pid'");
  if($sql>0){
    echo "<script>window.open('full-profile?id=".trim(base64_encode($pid))."&active','_self')</script>";
  }
    echo "<script>alert('Server Busy')</script>";
 }

if(isset($_POST['submit'])){
$oldpath = $_FILES['pic']['tmp_name'];
//$img=$_FILES['pic']['name'];
$temp = explode(".", $_FILES["pic"]["name"]);
$img = round(microtime(true)) . '.' . end($temp);
$newpath ="../assets/candidate/".$temp;
move_uploaded_file($oldpath, $newpath);
$id=trim($_POST['id']);
$sql=mysqli_query($db,"UPDATE `candidate` SET `pic`='$img' WHERE `id`='$id'");
if($sql>0){
echo "<script>window.open('full-profile?id=".trim($_GET['id'])."&image','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
}
if(isset($_POST['submit_resume'])){
$oldpath = $_FILES['resume']['tmp_name'];
//$img=$_FILES['resume']['name'];
$temp = explode(".", $_FILES["resume"]["name"]);
$img = round(microtime(true)) . '.' . end($temp);
$newpath ="../assets/candidate/".$temp;
move_uploaded_file($oldpath, $newpath);
$id=trim($_POST['id']);
$sql=mysqli_query($db,"UPDATE `candidate` SET `resume`='$img' WHERE `id`='$id'");
if($sql>0){
echo "<script>window.open('full-profile?id=".trim($_GET['id'])."&resume','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
}
 
if(isset($_POST['submit_data'])){
//$cid=trim($_POST['id']);
$pid=trim($_POST['profilid']);
$pidd=trim(base64_decode($_POST['profilid']));
foreach ($_POST['fieldname'] as $key => $value) {
$type=mysqli_real_escape_string($db,$_POST['type'][$key]);
$fieldname=mysqli_real_escape_string($db,$value);
$field_value=mysqli_real_escape_string($db,$_POST['value'][$key]);

//if($fieldname='firstname'){
$sql=mysqli_query($db,"UPDATE `candidate_data` SET `fieldvalue`='$field_value',`update_at`='".date('Y-m-d')."' WHERE `candidateid`='$pidd' AND `fieldname`='$fieldname'")or die(mysqli_error($db));

}
if($sql>0){
echo "<script>window.open('full-profile?id=".trim($pid)."&success','_self')</script>";
}else{
echo "<script>alert('Server Is Busy')</script>";
}
}
$sql=mysqli_query($db,"SELECT * FROM `candidate` WHERE `id`='".(base64_decode(trim($_GET['id'])))."'");
$run=mysqli_fetch_array($sql);
?>
  <div class="content-wrapper">
    <section class="content-header">
 <h1><small><a href="candidate-manage"><< Back</a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">Full Profile</a></li>
      </ol>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <?php
                if(isset($_GET['active'])){ ?>
         <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Candidate Active</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('full-profile?id=<?php echo $_GET['id']; ?>','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
            
          <div class="box box-primary">
            <div class="box-body box-profile">
              <form role="form" enctype="multipart/form-data" method="post" action="#">
                <?php if(!empty($run['pic'])){?>
              <a href="../assets/candidate/<?php echo $run['pic']; ?>" target="_blank"><img class="profile-user-img img-responsive img-circle" name="pic" src="../assets/candidate/<?php echo $run['pic']; ?>" alt="GHS"></a>
            <?php }else{ echo '<b style="text-align:center;">No Photo</b>'; }?>
              <p class="text-muted text-center" style="text-transform: uppercase;"><?php echo $run['name']; ?></p>
              <br/>
              <input type="hidden" name="id" value="<?php echo $run['id']; ?>" class="form-control">
           <!--  <input type="file" name="pic" class="form-control"> -->
            <br/>
            <!-- <button type="submit" name="submit" class="btn btn-primary btn-block"><b>UPDATE</b></button> -->
            </div>
            </form>
          </div>
           <?php
              if(isset($_GET['resume'])){ ?>
         <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <div align="center"><h3 class="box-title">Resume Uploaded<br/> Successfully</h3></div>

              <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" onclick="window.open('full-profile?id=<?php echo $_GET['id']; ?>','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <form role="form" enctype="multipart/form-data" method="post" action="#">
              <p class="text-muted text-center" style="text-transform: uppercase;">Resume</p>
              <br/>
              <input type="hidden" name="id" value="<?php echo $run['id']; ?>" class="form-control">
              <?php if(!empty($run['resume'])){?>
             <a href="../assets/candidate/<?php echo $run['resume']; ?>" target="_blank"><img class="profile-user-img img-responsive img-circle" name="pic" src="../assets/general/download.png" alt="Resume"></a>
           <?php }else{ echo 'No Resume';}?>
             <!--<input type="file" value="<?php //echo $run['resume']; ?>" name="resume" class="form-control"> -->
            <br/>
            <!--<button type="submit" name="submit_resume" class="btn btn-primary btn-block"><b>UPDATE</b></button> -->
            </form></div>
          <?php if($run['regi_status']=='no'){?>
               <div class="box box-primary">
            <div class="box-body box-profile">
              <form role="form" enctype="multipart/form-data" method="post" action="#">
              <p class="text-muted text-center" style="text-transform: uppercase;">Status</p>
              <br/>
              <input type="hidden" name="proid" value="<?php echo base64_decode($_GET['id']); ?>">
              <select class="form-control" name="status">
                <option value="no">Pending</option>
                <option value="yes">Active</option>
              </select>
            <br/> 
            <button type="submit" name="status_update" class="btn btn-primary btn-block"><b>UPDATE</b></button> 
            </form></div></div></div></div>
          <?php }else{?>
            </div></div>
          <?php }?>
            <form method="post" name="form data send" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
          <div class="col-md-9">
             <?php
                if(isset($_GET['success'])){ ?>
         <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <div align="center"><h3 class="box-title" style="text-align: center;">Profile Uodated <br/>Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('full-profile?id=<?php echo $_GET['id']; ?>','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
                <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Primary Details</h3>
              <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button></div>
            </div>
         <div class="box-body">
      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label>First Name</label>
           <input type="text" name="fname" required="required" id="password" class="form-control" placeholder="Enter First Name" value="<?php echo $run['name'] ?>" readonly="readonly">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label>Middle Name</label>
           <input type="text" name="mname" id="password" class="form-control" placeholder="Enter Middle Name" value="<?php echo $run['middle'] ?>" readonly="readonly">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label>Last Name</label>
           <input type="text" name="lname" id="password" class="form-control" placeholder="Enter Last Name" value="<?php echo $run['last'] ?>" readonly="readonly">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Primary Contact</label>
           <input type="text" name="contact" required="required" pattern="[0-9]+" id="password" class="form-control" placeholder="Contact Number" value="<?php echo $run['contact'] ?>" readonly="readonly">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Primary Email </label> 
           <input type="email" name="email" id="password" value="<?php echo $run['emailid']; ?>" class="form-control" placeholder="Enter Email" tabindex="5" readonly="readonly">
         </div></div></div>
       </div></div>
            <?php
      $check=mysqli_query($db,"SELECT DISTINCT `type` FROM `candidate_data` WHERE `candidateid`='".(base64_decode(trim($_GET['id'])))."'");
            while($run=mysqli_fetch_array($check)){ ?>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo ucwords($run['type']); ?></h3>
              <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button></div>
            </div>
         <div class="box-body">
      <div class="row">
          <?php 
      $field=mysqli_query($db,"SELECT `id`, `admid`, `frenchiseid`, `candidateid`,`input_field`,`inputvalue`,`type`, `fieldname`, `fieldvalue`, `timedate`, `ip` FROM `candidate_data` WHERE `candidateid`='".(base64_decode(trim($_GET['id'])))."' AND `type`='".$run['type']."'");
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
        <div align="center">  
          <input type="hidden" name="profilid" value="<?php echo trim($_GET['id']); ?>">
          <button type="submit" style="width: 20%" name="submit_data" class="btn btn-success btn-block">Update</button></div>
        </div>
       </div>
     </form>
    </div>
  </div>
</div>
<?php  include_once 'footer.php'; ?>
