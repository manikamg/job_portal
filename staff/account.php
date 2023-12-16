<?php 
 include_once '../layouts/heade_design.php';
 include_once 'head.php';
 ///UPDATE `admins` SET `id`=[value-1],`admid`=[value-2],`name`=[value-3],`company`=[value-4],`email`=[value-5],`loginid`=[value-6],`password`=[value-7],`pic`=[value-8],`is_super`=[value-9],`created_at`=[value-10],`updated_at`=[value-11] WHERE `id`
//submit area
if(isset($_POST['submit'])){
$oldpath = $_FILES['pic']['tmp_name'];
//$img=$_FILES['pic']['name'];
$temp = explode(".", $_FILES["pic"]["name"]);
$img = round(microtime(true)) . '.' . end($temp);
$newpath ="../assets/clients/".$img;
move_uploaded_file($oldpath, $newpath);
$id=trim($_POST['id']);
$sql=mysqli_query($db,"UPDATE `admins` SET `pic`='$img' WHERE `id`='$id'");
if($sql>0){
echo "<script>window.open('account?image','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
} 
if(isset($_POST['submit_data'])){
$cid=trim($id);
$comp=mysqli_real_escape_string($db,$_POST['compname']);
$manager=mysqli_real_escape_string($db,$_POST['mname']);
$call=mysqli_real_escape_string($db,$_POST['mob']);
$address=mysqli_real_escape_string($db,$_POST['add']);
$aboutus=mysqli_real_escape_string($db,$_POST['about']);
$psql=mysqli_query($db,"UPDATE `admins` SET `name`='$manager',`company`='$comp',`contact`='$call',`address`='$address',`about`='$aboutus' WHERE `id`='$cid'");
if($psql>0){
echo "<script>window.open('account?success','_self')</script>";
}else{
echo "<script>alert('Server Is Busy')</script>";
}
}
if(isset($_POST['passwordupdate'])){
$cid=trim($id);
$oldpassword=mysqli_real_escape_string($db,$_POST['oldpass']);
$npass=mysqli_real_escape_string($db,$_POST['newpass']);
$confirmpass=mysqli_real_escape_string($db,$_POST['cpass']);
$psql=mysqli_query($db,"UPDATE `admins` SET `password`='$npass' WHERE `id`='$cid'");
if($psql>0){
echo "<script>window.open('account?passchange','_self')</script>";
}else{
echo "<script>alert('Server Is Busy')</script>";
}
}
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
         <small style="color:black;"><a href="dashboard"><< Back</a></small> 
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Account</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <?php if(isset($_GET['success'])){ ?>
          <div class="box box-warning box-solid">
          <div class="box-header with-border">
          <div align="center"><h3 class="box-title" style="text-align: center;">Profile Updated <br/>Successfully</h3>
          <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" onclick="window.open('account','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
          </div></div></div>
          <?php } ?>
        <div class="col-md-3">
          <?php  if(isset($_GET['image'])){ ?>
         <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <div align="center"><h3 class="box-title">Logo Updated <br/> Successfully</h3></div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('account','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <label>Change Logo</label>
              <form role="form" enctype="multipart/form-data" method="post" action="#">
                 <?php if(empty($run['pic'])){ ?>
             No Logo Found  
           <?php }else{?>
          <img class="profile-user-img img-responsive img-circle" src="../assets/clients/<?php echo $run['pic']; ?>" alt="<?php echo $run['name']; ?>">   
          <?php }?> 
              <p class="text-muted text-center" style="text-transform: uppercase;"><?php echo $run['name']; ?></p>
              <br/>
              <input type="hidden" name="id" value="<?php echo $run['id']; ?>" class="form-control">
            <input type="file" name="pic" class="form-control">
            <br/>
            <button type="submit" name="submit" class="btn btn-primary btn-block"><b>Update</b></button>
            </div>
            </form>
          </div></div>
          <div class="col-md-9"><div class="box">
          <form method="post" name="form data send" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <div class="box-header with-border">
              <h3 class="box-title">Primary Details</h3>
              <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button></div>
            </div>
         <div class="box-body">
      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Company Name</label>
           <input type="text" name="compname" required="required" id="password" class="form-control" placeholder="Enter First Name" value="<?php echo $run['company'] ?>"> 
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Name</label>
           <input type="text" name="mname" id="password" class="form-control" placeholder="Onwer/Manager Name" value="<?php echo $run['name'] ?>">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label>Contact Number <b style="color: red;">*</b></label>
           <input type="text" name="mob" id="mobile" class="form-control" placeholder="Contact Number" maxlength="25" value="<?php echo $run['contact'] ?>" required="required">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-8">
          <div class="form-group">
            <label>Address  </label>
          <input type="text" name="add" class="form-control" maxlength="125" placeholder="Address" value="<?php echo $run['address']; ?>" >
         </div></div>
        <div class="col-xs-12 col-sm-6 col-md-12">
          <div class="form-group">
            <label>Your Details </label>
          <textarea class="form-control" maxlength="225" name="about" placeholder="About Us" ><?php echo $run['about'] ?></textarea>
         </div></div>
			<hr class="colorgraph"><div class="row"><div class="col-xs-12"><div align="center"><button type="submit" style="width: 20%" name="submit_data" class="btn btn-success btn-block">Update</button></div></div></div>
		</form>
       </div>
     </div>
   </div>
 </div>
</div>
<div class="box">
  <?php if(isset($_GET['passchange'])){?> <b>Password Updated</b> <?php }?>
  <form method="post" name="form data send" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <div class="box-header with-border">
              <h3 class="box-title">Password Change</h3>
              <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button></div>
            </div>
         <div class="box-body">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3"></div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="col-xs-12 col-sm-6 col-md-12">
          <div class="form-group">
            <label>Old Password</label> 
           <input type="text" name="oldpass" required="required" id="password" class="form-control" placeholder="Old Password"> 
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-12">
          <div class="form-group">
            <label>New Password</label>
           <input type="text" name="newpass" id="password" class="form-control" placeholder="New Password" >
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-12">
          <div class="form-group">
            <label>Confirm Password <b style="color: red;">*</b></label>
           <input type="text" name="cpass" id="mobile" class="form-control" placeholder="Confirm Password">
         </div></div>
         
      <hr class="colorgraph"><div class="row"><div class="col-xs-12"><div align="center"><button type="submit" style="width: 20%" name="passwordupdate" class="btn btn-success btn-block">Update</button></div></div></div>
    </form>
       </div>
       <div class="col-xs-12 col-sm-6 col-md-3"></div></div>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</section>
</div>
<?php include_once 'footer.php';?>
