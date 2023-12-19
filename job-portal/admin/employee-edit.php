<?php 
 include_once 'head.php';
 include_once 'menu.php';
 if(isset($_POST['submit'])){
  $address = mysqli_real_escape_string($db,$_POST['address']);
      $postion = mysqli_real_escape_string($db,$_POST['postion']);
      $salary = mysqli_real_escape_string($db,$_POST['salary']);
      $adminid = mysqli_real_escape_string($db,$_POST['adminid']);
      $empid = mysqli_real_escape_string($db,$_POST['empid']);
      $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
      $fname = mysqli_real_escape_string($db,$_POST['fname']);
      $mname = mysqli_real_escape_string($db,$_POST['mname']);
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $contact=mysqli_real_escape_string($db,$_POST['contact']);

      $oldpath = $_FILES['pic']['tmp_name'];
      $img      = $_FILES['pic']['name'];
      $newpath ="../assets/employee/".$_FILES['pic']['name'];
      move_uploaded_file($oldpath, $newpath);
      $sql=mysqli_query($db,"UPDATE `employee` SET `pic`='$img',`name`='$fullname',`contact`='$contact',`fname`='$fname',`mname`='$mname',`emailid`='$email',`address`='$address',`post`='$postion',`salary`='$salary' WHERE id='".trim($_POST['did'])."'");
  if($sql>0){
    echo "<script>window.open('employee-edit?id=".trim($_GET['id'])."&success','_self')</script>";
  }else{
      echo "<script>alert('Server Busy')</script>";
  }
  }
  $sqll=mysqli_query($db,"SELECT  * FROM `employee` WHERE `id`='".trim($_GET['id'])."'");
  $run=mysqli_fetch_array($sqll);
  ?> 
  <div class="content-wrapper">
    <section class="content-header">
     <h1><small><a href="employee-manage"><< Back</a></small>
   </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">candidate Edit</a></li>
      </ol>
    </section>
    <div class="row">
        <div class="col-md-2 col-xs-12"></div>
         <div class="col-md-8 col-xs-12">
          
            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success">
            <p><?php echo 'Update SuccessFully'; ?></p>
            </div>
            <?php }?>
            <div class="box box-warning">
            <div class="box-header with-border">
            <h3 class="box-title"> Candidate Update</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype="multipart/form-data" method="post" action="#">
                <div class="form-group"> 
                  <label>Full Name</label> 
                  <input type="hidden"  name="did" value="<?php echo trim($_GET['id']); ?>">
                  <input type="text" class="form-control" name="fullname" value="<?php echo $run['name'] ?>" placeholder="Enter Here" required="required">
                </div> 
                <div class="form-group"> 
                  <label>Postion </label> 
                  <input type="text" class="form-control" name="postion" value="<?php echo $run['post'] ?>" placeholder="Enter Here" required="required">
                </div> 
                 <div class="form-group"> 
                  <label>Salary</label> 
                  <input type="text" class="form-control" name="salary" value="<?php echo $run['salary'] ?>" placeholder="Enter Here" required="required">
                </div>
                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text" class="form-control" pattern="[0-9]+" value="<?php echo $run['contact'] ?>" maxlength="10" name="contact" placeholder="Enter Here" required="required">
                </div>
                 <div class="form-group">
                  <label>Email Id</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $run['emailid'] ?>" placeholder="Enter Here" required="required">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Father's Name</label>
                  <input class="form-control"  name="fname" value="<?php echo $run['fname'] ?>" placeholder="Enter Here">
                </div> 
                <div class="form-group">
                  <label>Mother's Name</label>
                 <input type="text" class="form-control" name="mname" value="<?php echo $run['mname'] ?>" placeholder="Enter Here" required="required">
               </div>
                   <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="3" name="address"  placeholder="Enter Here"><?php echo $run['address']; ?></textarea>
                </div>
                   <div class="form-group">
                  <label>Attach Pic</label><br/>
                  <?php if(!empty($run['pic'])){ ?>
                  <img src="../assets/employee/<?php echo $run['pic'] ?>" style="width: 60px;height: 60px;" >
                  <?php }?>
                  <br/>
                  <input type="file" class="form-control" name="pic" value="<?php echo $run['pic'] ?>"  placeholder="Enter Here">
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
