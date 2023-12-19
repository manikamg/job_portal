<?php 
 include_once 'head.php';
 include_once 'menu.php';
 if(isset($_GET['jobid'])){
 $job_update=mysqli_query($db,"UPDATE `aplied_job` SET `read_status`=2 WHERE `id`='".trim($_GET['jobid'])."'");
 if($job_update>0){
 	echo "<script>window.open('new-job-application','_self')</script>";
 }
 }
 ?>
<?php
if(isset($_POST['new_submit'])){
 $id=mysqli_real_escape_string($db,$_POST['idkl']);
 $sel=mysqli_real_escape_string($db,$_POST['select']);
 $message=mysqli_real_escape_string($db,$_POST['msg']);

$sql=mysqli_query($db,"UPDATE `aplied_job` SET `final_status`='$sel',`final_comment`='$message',`final_date`='".date('Y-m-d')."' WHERE `id`='$id'")or die(mysqli_error($db));
if($sql>0){
echo "<script>window.open('new-job-application?status=".$sel."','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
}
}
?>
<?php
if(isset($_POST['remove'])){

$sql=mysqli_query($db,"UPDATE `aplied_job` SET `final_status`='delet' WHERE `id`='".trim($_POST['did'])."'");
if($sql>0){
echo "<script>alert('Deleted Successfully')</script><meta http-equiv='refresh' content='0' />";
}else{
echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0' />";
} }
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <div class="content-wrapper">
    <section class="content-header">
 <h1><small>Selected Applications</small></h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">Selected Applications</a></li>
      </ol>
    </section> 
    <div class="row">
       <div class="col-md-12">
       	 <div class="box">
           <!--  <div class="box-header">
              <h3 class="box-title">Selected Applications</h3>
            </div> -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th><small>Sno.</small></th>
                  <th><small>Post Name /Post Code</small></th>
                  <th><small>Post Owner / Company Name</small></th>
                  <th><small>Apply Last Date</small></th>
                  <th><small>Required Qualification</small></th>
                  <th><small>Selected List</small></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                  $joblist=mysqli_query($db,"SELECT * FROM `aplied_job` WHERE `stf_status`='selected' GROUP BY `jobid` ORDER BY `id` DESC");
                  while($run=mysqli_fetch_array($joblist)){
                 ?>
                 <tr>
              <td><?php echo $i; ?>.</td>
              <td><small><?php echo (postName($run['jobid'])).'&nbsp; <br/> &nbsp;'.(postCode($run['jobid'])); ?></small></td>
              <td><b><small><?php echo ucwords(companyname($run['compid'])); ?></small></b></td>
              <td><small><?php echo date('d-m-Y',strtotime(postApplylastdate($run['jobid']))); ?></small></td>
              <td><span class="label label-warning"><?php echo ucwords(postHighQual($run['jobid'])); ?></span></td>
               <td>
                 <button onclick="window.open('selected-job-details?jid=<?php echo $run['jobid'] ?>','_self')" class="btn btn-primary"> View</button>
               </td>

          </tr>
        <?php $i++;}?>
        </tbody>
        </table>    
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
        <!-- <script src="../bower_components/jquery/dist/jquery.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<?php  include_once 'footer.php'; ?>