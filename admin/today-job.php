<?php  include_once 'head.php';
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
//echo "<script>window.open('manage-job?updated','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
} 
 if(isset($_POST['approval_post'])){
  $stf=trim($_POST['status_name']);
  $idi=trim($_POST['status_id']);
  $salary=trim($_POST['salary']);
  if($stf=='reject'){
  $reas='Due Less And InCorrect Info On Job Post';
  }else{
  $reas='';
  }
   $sql=mysqli_query($db,"UPDATE `post_job` SET `ctc`='$salary',`adm_approve`='$stf',`stf_approve`='$stf',`stf_reject`='$reas' WHERE `id`='$idi'")or die(mysqli_error($db));
  if($sql>0){
   echo "<script>alert('Update Successfully')</script>";
  }else{
    echo "<script>alert('Server Busy')</script>";
  } 
  }
?>
 <div class="container">
      <div class="row">
      	<div class="col-md-12 col-xs-12">
      		 <div class="box">
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Company</th>
                  <th>Post</th>
                  <th>Salary</th>
                  <th>Live Status</th>
                </tr>
                </thead>
                <?php
                $i=1;
                 $pl=mysqli_query($db,"SELECT DISTINCT `id`, `postid`, `jobtyp`, `adminid`, `stfid`, `clientid`, `posttype`, `compid`, `postname`, `post_number`, `priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`, `postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`, `status`, `final_selection`, `adm_approve`, `stf_approve`, `stf_reject`, `read_sft`, `read_adm`, `timedate`, `ip` FROM `post_job` ORDER BY `id` DESC");
                while($row=mysqli_fetch_array($pl)){?>
                <tbody>
                <form method="post"><tr> 
                  <td><?php if($row['compid']=='0'){ echo 'NONE';}else{ echo ucwords(companyname($row['compid']));} ?><br/><?php echo (company2CompNo($row['compid'])) ?></td> 
                  <td><?php echo ucwords($row['postname']) ?> (<?php echo ucwords($row['post_number']) ?>)</td>
                   <td><input type="text" maxlength="25" placeholder="salary" name="salary"></td>
                   <td>
                    <?php if($row['stf_approve']=='no'){?>
                    <input type="hidden" name="status_name" value="approved">
                     <input type="hidden" name="status_id" value="<?php echo $row['id'] ?>">
                    <button name="approval_post" type="submit" class="btn btn-info">Approve</button>
                    <?php }else{ echo '<b style=color:green><i class="fa fa-circle text-success"></i> Live</b>'; }?>
                   </td> 
                   <!--<td><form method="post">
                   	<input type="hidden" name="postid" value="<?php echo $row['id'] ?>">
                   	<?php if($row['status']=='active'){?>
                   	<input type="hidden" name="poststtus" value="deactive">
                   	<button name="chng" type="submit" class="btn btn-success">Active</button>
                   	<?php }else{?>
                   		<input type="hidden" name="poststtus" value="active">
                   		<button name="chng" type="submit" class="btn btn-danger btn-flat" style="font-size: 10px;"><small>Deactive</small></button>
                   		<?php }?>
                   </form></td>-->
                </tr></form>
            </tbody>
        <?php $i++;}?>
        </table>
              </div>
    </div>
</div>
</div>
</div>
</div>
  <?php  include_once 'footer.php'; ?>