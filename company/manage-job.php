<?php 
 include_once 'head.php';
 include_once 'menu.php'; 
if(isset($_POST['remove'])){
$sql=mysqli_query($db,"DELETE FROM `post_job` WHERE `id`='".trim($_POST['did'])."'");
if($sql>0){
echo "<script>window.open('manage-job?remove','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
}
?>
<?php 
if(isset($_POST['chng'])){
$sql=mysqli_query($db,"UPDATE `post_job` SET `status`='".trim($_POST['poststtus'])."' WHERE `id`='".trim($_POST['postid'])."'")or die(mysqli_error($db));
if($sql>0){
echo "<script>window.open('manage-job?updated','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
} 
 if(isset($_POST['approval_post'])){
  $stf=trim($_POST['status_name']);
  $idi=trim($_POST['status_id']);
  if($stf=='reject'){
  $reas='Due Less And InCorrect Info On Job Post';
  }else{
  $reas='';
  }
   $sql=mysqli_query($db,"UPDATE `post_job` SET `adm_approve`='$stf',`stf_approve`='$stf',`stf_reject`='$reas' WHERE `id`='$idi'")or die(mysqli_error($db));
  if($sql>0){
   // echo "<script>window.open('manage-job?success','_self')</script>";
  }else{
    echo "<script>alert('Server Busy')</script>";
  } 
  }
?>

 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small>Manage Job</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">New Job Post</li>
      </ol>
    </section>
      <div class="row">
      	<div class="col-md-12 col-xs-12">
      		 <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sno</th>
                  <th>Company Name</th>
                  <th>Post Name</th>
                  <th>Number of Post</th>
                  <th>Post Date</th>
                  <th>List Status</th>
                  <th>Status</th>
                  <th>Full Post</th>
                  <th>Edit</th>
                  <th>Remove</th>
                </tr>
                </thead>
                <?php
                $i=1;
                 $pl=mysqli_query($db,"SELECT DISTINCT `id`, `postid`, `jobtyp`, `adminid`, `stfid`, `clientid`, `posttype`, `compid`, `postname`, `post_number`, `priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`, `postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`, `status`, `final_selection`, `adm_approve`, `stf_approve`, `stf_reject`, `read_sft`, `read_adm`, `timedate`, `ip` FROM `post_job`  ORDER BY `timedate` DESC");
                while($row=mysqli_fetch_array($pl)){?>
                <tbody>
                <tr> 
                  <td><?php echo $i; ?>.</td>
                  <td><?php echo ucwords(companyname($row['compid'])); ?></td>
                  <td><?php echo ucwords($row['postname']) ?></td>
                  <td><?php echo ucwords($row['post_number']) ?></td>
                  <td><?php echo date('d/m/Y',strtotime($row['timedate'])); ?></td>
                   <td><form method="post">
                    <?php if($row['stf_approve']=='no'){?>
                    <input type="hidden" name="status_name" value="approved">
                     <input type="hidden" name="status_id" value="<?php echo $row['id'] ?>">
                    <button name="approval_post" type="submit" class="btn btn-info">Approve</button>
                    <?php }else{ echo '<b style=color:green><i class="fa fa-circle text-success"></i> Live</b>'; }?>
                   </form></td> 
                   <td><form method="post">
                   	<input type="hidden" name="postid" value="<?php echo $row['id'] ?>">
                   	<?php if($row['status']=='active'){?>
                   	<input type="hidden" name="poststtus" value="deactive">
                   	<button name="chng" type="submit" class="btn btn-success">Active</button>
                   	<?php }else{?>
                   		<input type="hidden" name="poststtus" value="active">
                   		<button name="chng" type="submit" class="btn btn-danger btn-flat" style="font-size: 10px;"><small>Deactive</small></button>
                   		<?php }?>
                   </form></td><td>
      <a href="view-posted-job?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-primary"><i class="fa fa-files-o"></i></a>
    </td>
    <td>
      <a href="edit-job-post?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
    </td> 
    <td>
      <form method="post" class="delete_form" action="#">
      <input type="hidden" name="did" value="<?php echo $row['id']; ?>">
      <button type="submit" name="remove" class="btn btn-danger" onclick="return confirm('confirm to remove')"><i class="fa fa-trash"></i></button>
     </form></td>
                </tr>
            </tbody>
        <?php $i++;}?>
        </table>
    </div>
</div>
</div>
</div>
</div>
  <?php  include_once 'footer.php'; ?>