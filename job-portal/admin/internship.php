<?php 
include_once 'head.php';
 if(isset($_POST['submit'])){
  $internname = mysqli_real_escape_string($db,$_POST['internname']);
  $farmname= mysqli_real_escape_string($db,$_POST['farmname']);
  $details= mysqli_real_escape_string($db,$_POST['details']);
   //SELECT `id`, `name`, `typ`, `details` FROM `internship`
           // submit->internname,farmname,details
  $sql=mysqli_query($db,"INSERT INTO `internship`(`name`, `typ`, `details`) VALUES ('$internname','$farmname','$details')");
  if($sql>0){
  echo "<script>window.open('internship?success','_self')</script>";
  }else{
  echo "<script>alert('Server busy')</script>";
  }
}

//remove
if(isset($_POST['remove'])){
$sql=mysqli_query($db,"DELETE FROM `internship` WHERE `id`='".trim($_POST['did'])."'");
if($sql>0){
echo "<script>window.open('internship?remove','_self')</script>";
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
        <li><a href="#">Internship</a></li>
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
            <button type="button" class="btn btn-box-tool" onclick="window.open('internship','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?><?php
                if(isset($_GET['remove'])){ ?>
         <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Removed Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('internship','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Internship</h3>
            </div>
<form method="post" action="#" enctype="multipart/form-data">
              <input type="hidden" name="admid" value="<?php echo $id; ?>">
              <div class="box-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Comapny Name</label>
                  <select name="internname" class="form-control" id="name">
                   <?php $jobcat=query("SELECT `id`, `name` FROM `company` ORDER BY `id` DESC");while($row=mysqli_fetch_array($jobcat)){ ?>
                     <option value="<?php echo $row['id'] ?>"><?php echo ucwords($row['name']); ?></option>
                     <?php }?>
                   </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Intership Name</label>
                  <input type="text" name="farmname" class="form-control" id="formname"  required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Details</label>
                  <textarea type="text" name="details" class="form-control details" id="details" ></textarea>
                </div>
              </div> 
            <div align="center"><div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div></div>
            </form>
          </div>
        </div> 
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Internship List</h3>
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
  $sql=mysqli_query($db,"SELECT `id`, `name`, `typ`, `details` FROM `internship` ORDER BY `id` DESC");
 while($row=mysqli_fetch_array($sql)){?> 
    <tr><td><?php echo $i; ?>.</td>
    <td><b><?php echo Intern2company($row['name']);?></b></td>
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