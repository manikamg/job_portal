<?php 
include_once 'head.php';
 if(isset($_POST['submit'])){
  $internname = mysqli_real_escape_string($db,$_POST['cname']);
  $mob= mysqli_real_escape_string($db,$_POST['mob']);
  $mail= mysqli_real_escape_string($db,$_POST['mail']);
  $details= mysqli_real_escape_string($db,$_POST['details']);
  $sql=mysqli_query($db,"INSERT INTO `company`(`name`, `contact`, `mail`, `details`) VALUES ('$internname','$mob','$mail','$details')");
  if($sql>0){
  echo "<script>window.open('company?success','_self')</script>";
  }else{
  echo "<script>alert('Server busy')</script>";
  }
}

//remove
if(isset($_POST['remove'])){
$sql=mysqli_query($db,"DELETE FROM `company` WHERE `id`='".trim($_POST['did'])."'");
if($sql>0){
echo "<script>window.open('company?remove','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
}
?> 
  <div class="container">
    <section class="content-header">
 <h1><small style="font-style: uppercase"><a href=".\"><< Back</a>< Job Tag</small></h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Company</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <?php if(isset($_GET['success'])){ ?>
         <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add Success</h3>
         <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" onclick="window.open('company','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?><?php
                if(isset($_GET['remove'])){ ?>
         <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Removed Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('company','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Company</h3>
            </div>
          <?php 
            if(isset($_GET['id'])){ 
             $sqlio=mysqli_query($db,"SELECT `id`, `postname`, `typ`, `icon`, `active` FROM `postnames` WHERE `id`='".trim($_GET['id'])."'");
             $rowx=mysqli_fetch_array($sqlio);  ?>
            <form method="post" enctype="multipart/form-data">
              <input type="hidden" name="catid" value="<?php echo $_GET['id']; ?>">
              <input type="hidden" name="admid" value="<?php echo $run['id']; ?>">
              <div class="box-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="type" name="name" class="form-control" id="formname" placeholder="Job Category" value="<?php echo $rowx['postname'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Icon</label>
                  <input type="file" name="icon" class="form-control" value="<?php echo $rowx['postname'] ?>"   required="required">
                </div>
              </div>

              <div align="center"><div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <button type="button" onclick="window.open('internship','_self');" class="btn btn-secondary">Cancel</button>
              </div></div>
            </form>
            <?php }else{?>
            
<form method="post" action="#" enctype="multipart/form-data">
              <input type="hidden" name="admid" value="<?php echo $id; ?>">
              <div class="box-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Comapny Name</label>
                  <input type="text" name="cname" class="form-control" id="formname" placeholder="Job Category" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Contact Details</label>
                  <input type="text" name="mob" class="form-control" id="formname" placeholder="mobile*" maxlength="10"  required="required">
                  <input type="text" name="mail" class="form-control" id="formname" placeholder="email" maxlength="65">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Details</label>
                  <textarea type="text" name="details" class="form-control" id="formname" ></textarea>
                </div>
              </div> 
            <div align="center"><div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div></div>
            </form>
            <?php }?>
          </div>
        </div> 
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Company List</h3>
            </div>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <table class="table table-fixedheader table-bordered table-striped">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Name</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody id="myTable">
    <?php 
  $i=1;
  $sql=mysqli_query($db,"SELECT `id`, `name`, `contact`, `mail`, `details` FROM `company` ORDER BY `id` DESC");
 while($row=mysqli_fetch_array($sql)){?> 
    <tr><td><?php echo $i; ?>.</td>
    <td><b><?php echo ucwords($row['name']);?></b></td>
    <td><?php echo ucwords($row['name']);?></td> 
      <td><?php echo $row['contact'];?><br/><?php echo ucwords($row['mail']);?></td> 
    <td>   
      <form method="post" class="delete_form" action="#">
      
      <input type="hidden" name="did" value="<?php echo $row['id']; ?>" />
      <button type="submit" name="remove" class="btn btn-danger"><i class="fa fa-trash"></i></button>
     </form></td>
   </tr>
    <?php $i++;} ?>
    </tbody>
  </table>
        </div>
      </div>
      </div>
      </section>
<?php include_once 'footer.php';?>