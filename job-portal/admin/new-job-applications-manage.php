<?php  include_once 'head.php';
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

$sql=mysqli_query($db,"UPDATE `aplied_job` SET `stf_status`='$sel',`stf_comment`='$message',`final_date`='".date('Y-m-d')."' WHERE `id`='$id'")or die(mysqli_error($db));
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
}
}
?>
  <div class="container">
    <section class="content-header">
 <h1><small><a href="dashboard?id=<?php echo trim($_GET['id']); ?>"><< Back</a> New Job Applications</small></h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">New Job Applications</a></li>
      </ol>
    </section> 
    <div class="row">
       <div class="col-md-12">
       	 <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Job Applications</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th><small>Sno.</small></th>
                  <th><small>Post Name /Post Code</small></th>
                  <th><small>Location</small>
                  <th><small>Company Name</small></th>
                  <th><small>RegiNo.</small></th>
                  <th><small>Apply Last Date</small></th>
                  <th><small>Required Qualification</small></th>
                  <th><small>Total Application</small></th>
                  <th><small>View</small></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                  $joblist=mysqli_query($db,"SELECT `id`, `admid`, `stfid`, `compid`, `jobid`, `applicantid`, `mobileno`, `status`, `msg`, `stf_status`, `stf_comment`, `adm_status`, `adm_comment`, `final_status`, `job_status`, `job_comment`, `read_status`, `final_comment`, `final_date`, `timedate`, `ip` FROM `aplied_job` WHERE `admid`='".trim($_GET['id'])."' AND `status`='applied' AND `stf_status` ='open' GROUP BY `jobid` ORDER BY `id` DESC");
                  while($run=mysqli_fetch_array($joblist)){ ?> 
                 <tr>
              <td><?php echo $i; ?>.</td>
              <td><small><?php echo (postName($run['jobid'])).'&nbsp; <br/> &nbsp;'.(postCode($run['jobid'])); ?></small></td>
              <td><small><?php echo (postNametoLocation($run['jobid']));?></small></td>
              <td><b><small><?php if((companyname($run['compid'])!=0)){ echo ucwords(companyname($run['compid']));}else{ echo 'Not Available'; } ?></small></b></td>
              <td><small><?php if((companynameRgno($run['compid'])!=0)){ echo ucwords(companynameRgno($run['compid']));}else{ echo 'Not Available'; } ?></small></td>
              <td><small><?php echo date('d-m-Y',strtotime(postApplylastdate($run['jobid']))); ?></small></td>
              <td><span class="label label-warning"><?php echo ucwords(postHighQual($run['jobid'])); ?></span></td>
              <td><span class="label label-danger"><?php echo ucwords(postHighQual($run['jobid'])); ?></span></td>
              <td><button type="button" onclick="window.open('new-application-details?id=<?php echo trim($_GET['id']); ?>&jid=<?php echo base64_encode($run['jobid']) ?>','_self')" class="btn btn-primary">View</button></td>
          </tr>
        <?php $i++;}?>
        </tbody>
        </table>    
        <script type="text/javascript">
          $(".statusid").click(function () {
    var ids = $(this).attr('data-id');

    $("#idkl").val(ids);
    $('#myModal').modal('show');
});
        </script>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Status</h4>
        </div> 
        <div class="modal-body">
          <form method="post" action="new-job-application">
            <input type="hidden" class="form-control" name="idkl" id="idkl">
            <label>Select Status</label>
            <select class="form-control" name="select" style="width: 50%;" onchange="selectl(this.value);">
              <option value="selected">Selected</option>
              <option value="rejected">Rejected</option>
            </select><br/>
            <div id="msg" style="display: none;">
              <label>Reject Reason</label>
           <input type="type" name="msg" class="form-control" placeholder="Enter Here" style="width: 50%;">
            </div><br/><br/>
            <button type="submit" name="new_submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <script type="text/javascript">
          function selectl(id){
             if(id=='rejected'){
               document.getElementById('msg').style.display = 'block';
             }else{
              document.getElementById('msg').style.display = 'none';
             }
          }
        </script>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        <!-- <script src="../bower_components/jquery/dist/jquery.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<?php  include_once 'footer.php'; ?>