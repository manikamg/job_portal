<?php 
 include_once 'head.php';
 include_once 'menu.php';
 if(isset($_POST['submit'])){
      $mob = mysqli_real_escape_string($db,$_POST['mob']);
      $mn = mysqli_real_escape_string($db,$_POST['mname']);
      $adminid  = mysqli_real_escape_string($db,$_POST['adminid']);
      $empid    = mysqli_real_escape_string($db,$_POST['empid']);
      $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
      $farmname = mysqli_real_escape_string($db,$_POST['farm']);
      $farmno   = mysqli_real_escape_string($db,$_POST['farmno']);
      $pass     = rand(111111,99999);
      $userid   = 'RMJOB'.rand(1111111,9999999);
      $contact  = mysqli_real_escape_string($db,$_POST['contact']);
      $address  = mysqli_real_escape_string($db,$_POST['address']);
      $email    = mysqli_real_escape_string($db,$_POST['email']);

      $oldpath = $_FILES['pic']['tmp_name'];
      $img      = $_FILES['pic']['name'];
      $newpath ="../assets/clients/".$_FILES['pic']['name'];
      move_uploaded_file($oldpath, $newpath);
$sql=mysqli_query($db,"INSERT INTO `client`(`admin`, `stfid`,`pic`, `name`,`mng_name`,`contact`,`mobile_two`,`emailid`, `address`, `farmname`, `farmno`,`loginid`,`pass`, `ip`) VALUES ('$adminid','$empid','$img','$fullname','$mn','$contact','$mob','$email','$address','$farmname','$farmno','$userid','$pass','".$_SERVER['REMOTE_ADDR']."')")or die(mysqli_error($db));

  if($sql>0){
    echo "<script>window.open('client-add?success','_self')</script>";
    
  }else{
    echo "<script>alert('Server Is Busy')</script>";
  }

 }
  ?>
  <div class="content-wrapper">
    <section class="content-header">
     <h1><small><a href="client-manage"><< Back</a></small>
   </h1>
      <ol class="breadcrumb">
        <li><a href="admin/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">client-add</a></li>
      </ol>
    </section>
    <div class="row">
        <div class="col-md-2 col-xs-12"></div>
         <div class="col-md-8 col-xs-12">
          
            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success">
            <p>Candidate Registration success</p>
            </div>
            <?php }?>
            <div class="box box-warning">
            <div class="box-header with-border">
            <h3 class="box-title"> Client Registration</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype="multipart/form-data" method="post" action="#">
                <div class="form-group"> 
                  <label>Owner Name</label> 
                  <input type="hidden" class="form-control" name="adminid" value="<?php echo $id ?>" required="required">
                  <input type="hidden" class="form-control" name="empid" value="0" required="required">
                  <input type="text" class="form-control" name="fullname" placeholder="Enter Here" required="required">
                </div>
                <div class="form-group"> 
                  <label>Manager/Spoc Name</label> 
                  <input type="text" class="form-control" name="mname" placeholder="Enter Here" required="required">
                </div>
                 <div class="form-group"> 
                  <label>Farm Name</label> 
                  <input type="text" class="form-control" name="farm" placeholder="Enter Here" required="required">
                </div>
                <div class="form-group"> 
                  <label>Farm Registration No.</label> 
                  <input type="text" class="form-control" name="farmno" placeholder="Enter Here" required="required">
                </div>
                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text" class="form-control" pattern="[0-9]+" maxlength="10" name="contact" placeholder="Enter Here" required="required">
                </div>
                <div class="form-group">
                  <label>Contact <small>(Alernative)</small></label>
                  <input type="text" class="form-control" pattern="[0-9]+" maxlength="10" name="mob" placeholder="Enter Here" required="required">
                </div>
                 <div class="form-group">
                  <label>Email Id</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter Here" required="required">
                </div>
                <!-- textarea -->
                
                   <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="3" name="address" placeholder="Enter Here"></textarea>
                </div>
                   <div class="form-group">
                  <label>Comp. Logo</label>
                  <input type="file" class="form-control" name="pic"  placeholder="Enter Here">
                </div>
                
                <div class="form-group">
                  <div align="center"><button type="submit" name="submit" id="submit" class="btn btn-primary"> Submit</button></div><br/>
                </div>
                </div>
              </form>
            </div>
      </div>
    </section>
  </div>
  </div></div></div>
<?php include_once 'footer.php'; ?>
