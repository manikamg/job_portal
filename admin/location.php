<?php include_once 'head.php';
if(isset($_POST['submit'])){
$pname  = mysqli_real_escape_string($db,$_POST['name']);
$admidx = mysqli_real_escape_string($db,$_POST['admid']);
$stateid = mysqli_real_escape_string($db,$_POST['state']);
$sql=query("INSERT INTO `job_locations`(`admid`,`name`,`stateid`,`active`) VALUES ('$admidx','$pname','$stateid',2)");
 if($sql>0){echo "<script>window.open('location?success','_self')</script>";
 }else{echo "<script>alert('Server busy')</script>";
}
}
//update
if(isset($_POST['update'])){
  $nm     = mysqli_real_escape_string($db,$_POST['name']);
  $formid = mysqli_real_escape_string($db,$_POST['formid']);
  $stateid = mysqli_real_escape_string($db,$_POST['state']);
  $sql=mysqli_query($db,"UPDATE `job_locations` SET `name`='$nm',`stateid`='$stateid' WHERE `id`='$formid'");
 if($sql>0){
  echo "<script>window.open('location?update','_self')</script>";
 }else{
 echo "<script>alert('Server busy')</script>";
}
}
//remove
if(isset($_POST['remove'])){
$sql=mysqli_query($db,"DELETE FROM `job_locations` WHERE `id`='".trim($_POST['did'])."' AND `active`=2");
if($sql>0){
echo "<script>window.open('location?remove','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
}
 ?>
  <div class="container">
    <section class="content-header">
 <h1><small style="font-style: uppercase"><a href=".\"><< Back</a>< Location</small></h1>
      <ol class="breadcrumb">
        <li><a href=".\"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Location</a></li>
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
                <button type="button" class="btn btn-box-tool" onclick="window.open('location','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
                <?php
                if(isset($_GET['update'])){ ?>
         <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Updated Success</h3>
 <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('location','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
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
             $sqlio=mysqli_query($db,"SELECT `id`, `name`,`stateid` FROM `job_locations` WHERE `id`='".trim($_GET['id'])."'");
             $rowx=mysqli_fetch_array($sqlio);  ?>
            <form method="post" action="#">
             <input type="hidden" name="formid" value="<?php echo $_GET['id']; ?>">
             <div class="box-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                <select name="state" class="form-control" required="required">
                <option value=" ">Select Any</option>
                <?php $state=query("SELECT `id`, `statename` FROM `state`");
                while($abc=mysqli_fetch_array($state)){?>
                <option value="<?php echo $abc['id'] ?>"><?php echo ucwords($abc['statename']); ?></option>
                <?php }?>
                </select>
                </div>
              </div>
              <div class="box-body">
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
            <input type="hidden" name="admid" value="<?php echo $run['id']; ?>">
            <div class="box-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                  <select name="state" class="form-control" required="required">
<option value=" ">Select Any</option>
<?php $state=query("SELECT `id`, `statename` FROM `state`");
  while($abc=mysqli_fetch_array($state)){?>
  <option value="<?php echo $abc['id'] ?>"><?php echo ucwords($abc['statename']); ?></option>
  <?php }?>
</select></div></div>
              <div class="box-body">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="type" name="name" class="form-control" id="formname" placeholder="Enter Type" required="required">
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
        <th>State</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody id="myTable" style="height:500px">
    <?php 
  $i=1;
  $sql=mysqli_query($db,"SELECT `id`, `admid`, `name`, `stateid` FROM `job_locations`");
 while($row=mysqli_fetch_array($sql)){?> 
         <tr>
          <td><?php echo $i; ?>.</td> 
          <td><b><?php echo ucwords(getStateName($row['stateid']));?></b></td>
    <td><b><?php echo ucwords($row['name']);?></b></td>
    <td><a href="location?id=<?php echo $row['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
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
