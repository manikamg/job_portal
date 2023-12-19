<?php 
 include_once 'head.php';
 include_once 'menu.php';
 if(isset($_POST['submit'])){
      $adminid = mysqli_real_escape_string($db,$_POST['adminid']);
      $empid = mysqli_real_escape_string($db,$_POST['empid']);
      $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
      $fname = mysqli_real_escape_string($db,$_POST['fname']);
      $mname = mysqli_real_escape_string($db,$_POST['mname']);
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $pass = rand(111111,99999);
  $sql=mysqli_query($db,"INSERT INTO `candidate`(`admin`, `stfid`,`name`, `fname`, `mname`, `emailid`, `pass`) VALUES ('$adminid','$empid','$fullname','fname','mname','email','pass')");
  if($sql>0){
    $msg="Candidate Registration success";
  }else{
     $msg="Fail Registration success";
  }

 }
  ?>
  <div class="content-wrapper">
    <section class="content-header">
     <h1><small><a href="candidate-manage"><< Back</a></small>
   </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">candidate-add</a></li>
      </ol>
    </section>
    <div class="row">
        <div class="col-md-2 col-xs-12"></div>
         <div class="col-md-8 col-xs-12">
          
            <?php if(isset($msg)){ ?>
            <div class="alert alert-success">
            <p><?php echo $msg; ?></p>
            </div>
            <?php }?>
            <div class="box box-warning">
            <div class="box-header with-border">
            <h3 class="box-title"> Candidate Registration</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype="multipart/form-data" method="post" action="#">
                <div class="form-group"> 
                  <label>Full Name</label> 
                  <input type="hidden" class="form-control" name="adminid" value="<?php echo $id ?>" required="required">
                  <input type="hidden" class="form-control" name="empid" value="0" required="required">
                  <input type="text" class="form-control" name="fullname" placeholder="Enter Here" required="required">
                </div>
                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text" class="form-control" pattern="[0-9]+" maxlength="10" name="contact" placeholder="Enter Here" required="required">
                </div>
                 <div class="form-group">
                  <label>Email Id</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter Here" required="required">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Father's Name</label>
                  <textarea class="form-control" rows="3" name="fname" placeholder="Enter Here"></textarea>
                </div> 
                <div class="form-group">
                  <label>Mother's Name</label>
                 <input type="text" class="form-control" name="mname" placeholder="Enter Here" required="required">
               </div>
                   <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="3" name="address" placeholder="Enter Here"></textarea>
                </div>
                   <div class="form-group">
                  <label>Attach Pic</label>
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
