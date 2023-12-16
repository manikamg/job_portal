<?php 
 include_once 'head.php';
 include_once 'menu.php';
 error_reporting(0);
 if(isset($_POST['submit'])){
  $place     = mysqli_real_escape_string($db,$_POST['place']);
  $formname  = mysqli_real_escape_string($db,$_POST['formname']);
  $fieldtype = mysqli_real_escape_string($db,$_POST['fieldtype']);
  $admid     = mysqli_real_escape_string($db,$_POST['admid']);
  $sql=mysqli_query($db,"INSERT INTO `formsetting`(`admid`, `field`, `name`, `type`) VALUES ('$admid','".strtolower($place)."','".strtolower($formname)."','".strtolower($fieldtype)."')");
 if($sql>0){
  echo "<script>window.open('form-setting?success','_self')</script>";
 }else{
 echo "<script>alert('Server busy')</script>";
}
}
//update
if(isset($_POST['update'])){
  $place     = mysqli_real_escape_string($db,$_POST['place']);
  $formname  = mysqli_real_escape_string($db,$_POST['formname']);
  $fieldtype = mysqli_real_escape_string($db,$_POST['fieldtype']);
  $formid    = mysqli_real_escape_string($db,$_POST['formid']);
  $sql=mysqli_query($db,"UPDATE `formsetting` SET `field`='$place',`name`='$formname',`type`='$fieldtype' WHERE `id`='$formid'");
 if($sql>0){
  echo "<script>window.open('form-setting?update','_self')</script>";
 }else{
 echo "<script>alert('Server busy')</script>";
}
}
//remove
if(isset($_POST['remove'])){
$sql=mysqli_query($db,"DELETE FROM `formsetting` WHERE `id`='".trim($_POST['did'])."'");
if($sql>0){
echo "<script>window.open('form-setting?remove','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
}
 ?>
  <div class="content-wrapper">
    <section class="content-header">
 <h1><small style="font-style: uppercase">Form Setting</small></h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Form Setting</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <?php
                if(isset($_GET['success'])){ ?>
         <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('form-setting','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
                <?php
                if(isset($_GET['update'])){ ?>
         <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Updated Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('form-setting','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
                                <?php
                if(isset($_GET['remove'])){ ?>
         <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Removed Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('form-setting','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Setting</h3>
            </div>
            <?php if(isset($_GET['id'])){ 
             $sql=mysqli_query($db,"SELECT  `id`, `admid`, `field`, `name`, `type`, `timdate` FROM `formsetting` WHERE `id`='".trim($_GET['id'])."'");
             $row=mysqli_fetch_array($sql);  ?>
            <form method="post" action="#">
              <input type="hidden" name="formid" value="<?php echo $_GET['id']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Filed Place</label>
                  <select type="type" name="place" class="form-control" id="place">
                     <option value="<?php echo $row['field'] ?>"><?php echo ucwords($row['field']); ?> Info</option>
                    <option value="general">General Info</option>
                    <option value="family">Family Info</option>
                    <option value="hobbies">Hobbies Info</option>
                    <option value="qualification">Qualification Info</option>
                    <option value="contact">Contact Info</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Field Name</label>
                  <input type="type" name="formname" value="<?php echo ($row['name']); ?>" class="form-control" id="formname" placeholder="Form Heading" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Field Type</label>
                  <select  class="form-control" id="fieldtype" name="fieldtype">
                    <option value="<?php echo ($row['type']); ?>"><?php echo ucwords($row['type']); ?></option>
                  <option value="normal">Normal</option>
                  <option value="large">Large</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div align="center"><div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
              </div></div>
            </form>
            <?php }else{?>
<form method="post" action="#">
              <input type="hidden" name="admid" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Filed Place</label>
                  <select type="type" name="place" class="form-control" id="place">
                    <option value="general">General Info</option>
                    <option value="family">Family Info</option>
                    <option value="hobbies">Hobbies Info</option>
                    <option value="qualification">Qualification Info</option>
                    <option value="contact">Contact Info</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Field Name</label>
                  <input type="type" name="formname" class="form-control" id="formname" placeholder="Form Heading" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Field Type</label>
                  <select  class="form-control" id="fieldtype" name="fieldtype">
                  <option value="normal">Normal</option>
                  <option value="large">Large</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div align="center"><div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div></div>
            </form>
            <?php }?>
          </div>
        </div> 
        <div class="col-md-6">
          <!-- @if($message = Session::get('delete'))
            <div class="alert alert-danger">
            <p>{{$message}}</p>
            </div>
            @endif
                @if($message = Session::get('update'))
            <div class="alert alert-danger">
            <p>{{$message}}</p>
            </div>
            @endif -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Form Field List</h3>
            </div>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <table class="table table-fixedheader table-bordered table-striped">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Field</th>
        <th>Tag Name</th>
        <th>Size</th>
        <th>Edit</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody id="myTable" style="height:500px">
    <?php 
$i=1;
    $sql=mysqli_query($db,"SELECT  `id`, `admid`, `field`, `name`, `type`, `timdate` FROM `formsetting`");
while($row=mysqli_fetch_array($sql)){?> 
         <tr>
          <td><?php echo $i; ?>.</td>
    <td>
    <?php if($row['field']=='general'){?>
        <span class="label label-primary"><?php echo $row['type'];?></span>
        <?php }elseif($row['field']=='family'){?>
        <span class="label label-right bg-green"><?php echo $row['type']; ?></span>
        <?php }elseif($row['field']=='contact'){?>
        <span class="label label-warning"><?php echo $row['type'];?></span>
        <?php }elseif($row['field']=='hobbies'){?>
        <span class="label label-default"><?php echo $row['type']; ?></span>
        <?php }elseif($row['field']=='qualification'){?>
        <span class="label label-success"><?php echo $row['type']; ?></span>
        <?php }?>
      </td>
    <td><b><?php echo $row['name'];?></b></td>
    <td><?php echo $row['type'];?></td>
    <td><a href="form-setting?id=<?php echo $row['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
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
