 <?php 
 include_once 'head.php';
 include_once 'menu.php';
 error_reporting(0);
 if(isset($_POST['submit'])){
  $pname     = mysqli_real_escape_string($db,$_POST['name']);
  $jobid     = mysqli_real_escape_string($db,$_POST['jobcat']);
  $sql=query("INSERT INTO `jobtype`(`name`,`catid`) VALUES ('$pname','$jobid')");
 if($sql>0){
  echo "<script>window.open('job-type?success','_self')</script>";
 }else{
 echo "<script>alert('Server busy')</script>";
}
}
//update
if(isset($_POST['update'])){
  $nm     = mysqli_real_escape_string($db,$_POST['name']);
  $jobid  = mysqli_real_escape_string($db,$_POST['jobcat']);
  $formid = mysqli_real_escape_string($db,$_POST['formid']);
  $sql=mysqli_query($db,"UPDATE `jobtype` SET `name`='$nm',`catid`='$jobid' WHERE `id`='$formid'");
 if($sql>0){
  echo "<script>window.open('job-type?update','_self')</script>";
 }else{
 echo "<script>alert('Server busy')</script>";
}
}
//remove
if(isset($_POST['remove'])){
$sql=mysqli_query($db,"DELETE FROM `jobtype` WHERE `id`='".trim($_POST['did'])."'");
if($sql>0){
echo "<script>window.open('job-type?remove','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
}
 ?>
  <div class="content-wrapper">
    <section class="content-header">
 <h1><small style="font-style: uppercase">Job Type</small></h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Job Type</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <?php
                if(isset($_GET['success'])){ ?>
         <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('job-type','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
                <?php
                if(isset($_GET['update'])){ ?>
         <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Updated Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('job-type','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
               <?php if(isset($_GET['remove'])){ ?>
         <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Removed Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('job-type','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Job Type </h3>
            </div>
          <?php 
            if(isset($_GET['id'])){ 
             $sqlio=mysqli_query($db,"SELECT `id`, `name`,`catid`, `timedate` FROM `jobtype` WHERE `id`='".trim($_GET['id'])."'");
             $rowx=mysqli_fetch_array($sqlio);  ?>
            <form method="post" action="#">
              <input type="hidden" name="formid" value="<?php echo $_GET['id']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Categories</label> 
          <select class="form-control" name="jobcat"> 
              <?php $jobtypx=query("SELECT `id`, `postname`, `typ`, `icon`, `active` FROM `postnames` ORDER BY `id` DESC"); while($abcx=mysqli_fetch_array($jobtypx)){?>
              <option value="<?php echo $abcx['id']; ?>"><?php echo ucwords($abcx['postname']); ?></option><?php }?>
          </select> 
        </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="type" name="name" class="form-control" value="<?php echo $rowx['name']; ?>" id="formname" placeholder="Form Heading" required="required">
                </div>
              </div>

              <div align="center"><div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <button type="button" onclick="window.open('job-type','_self');" class="btn btn-secondary">Cancel</button>
              </div></div>
            </form>
            <?php }else{?>
<form method="post" action="#">
              <input type="hidden" name="admid" value="<?php echo $id; ?>">
              <div class="box-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Job Categories</label> 
          <select class="form-control" name="jobcat"> 
              <?php $jobtypx=query("SELECT `id`, `postname`, `typ`, `icon`, `active` FROM `postnames` ORDER BY `id` DESC"); while($abcx=mysqli_fetch_array($jobtypx)){?>
              <option value="<?php echo $abcx['id']; ?>"><?php echo ucwords($abcx['postname']); ?></option><?php }?>
          </select> 
          <span class="input-group-btn">
          <button type="button" class="btn btn-info btn-flat" onclick="window.open('job-cat','_self');">Add New</button></span>
                </div>
              </div>
              <div class="box-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="type" name="name" class="form-control" id="formname" placeholder="Form Heading" required="required">
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
              <h3 class="box-title">Job Type List</h3>
            </div>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <table class="table table-fixedheader table-bordered table-striped">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Name</th>
        <th>Job Categories</th>
        <th>Edit</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody id="myTable" style="height:500px">
    <?php 
  $i=1;
  $sql=mysqli_query($db,"SELECT `id`, `name`, `catid`, `timedate` FROM `jobtype`");
 while($row=mysqli_fetch_array($sql)){?> 
         <tr>
          <td><?php echo $i; ?>.</td> 
    <td><b><?php echo ucwords($row['name']);?></b></td>
    <td><b><?php echo ucwords(jobtypidtojobcat($row['catid']));?></b></td>
    <td><a href="job-type?id=<?php echo $row['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
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
    </section>
  </div>
  <script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>

<?php include_once 'footer.php';?>
