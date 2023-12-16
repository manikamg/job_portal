<?php  
include_once 'head.php';
include_once 'menu.php';
$job=mysqli_query($db,"SELECT `id`, `admid`, `stfid`, `compid`, `jobid`, `applicantid`, `status`, `msg`, `stf_status`, `adm_status`, `final_status`, `read_status`, `final_comment`, `final_date`, `timedate`, `ip` FROM `aplied_job` WHERE `id`='".trim($_GET['jid'])."'");
 $dsql=mysqli_fetch_array($job);
//modal data insert
if(isset($_POST['new_submit'])){
 $id=mysqli_real_escape_string($db,$_POST['idkl']);
 $sel=mysqli_real_escape_string($db,$_POST['select']);
 $message=mysqli_real_escape_string($db,$_POST['msg']);
$sql=mysqli_query($db,"UPDATE `aplied_job` SET `job_status`='$sel',`job_comment`='$message',`final_date`='".date('Y-m-d')."' WHERE `id`='$id'")or die(mysqli_error($db));
if($sql>0){
echo "<script>window.open('selected-job-details?jid=".trim($_GET['jid'])."&status=".$sel."','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
}
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="content-wrapper"><section class="content-header">
 <h1><small><a href="selected-job-application"><< Back</a> < Selected Applications</small></h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">Selected Applications</a></li>
      </ol>
    </section> 
    <div class="row">
      <?php if(isset($_GET['status'])){?>
<div class="col-md-4 col-xs-12"></div>
<div class="col-md-3 col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Alert</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove" onclick="window.open('selected-job-details?jid=<?php echo $_GET['jid']; ?>','_self')"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body btn-danger" style="text-align: center;">
              <?php echo strtoupper($_GET['status']); ?> Successfully
            </div>
          </div>
        </div>
        <?php }?>
       <div class="col-md-12">
       	 <div class="box">
            <div class="box-header">
             <table class="table table-bordered" style="background-color: gray;color: #fff;">
             	<tr>
             		<th>Company Name</th>
             		<th>Company RegiNo.</th>
             		<th>Job Name</th>
             		<th>Job Code</th>
             	</tr>
             	<tr>
             		<td><?php echo (companyname($dsql['compid'])); ?></td>
             		<td><?php echo (companynameRgno($dsql['compid'])); ?></td>
             		<td><?php echo ucwords(postName($dsql['jobid']));?></td>
             		<td><?php echo (postCode($dsql['jobid']));?></td>
             	</tr>
             </table>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th><small>Sno.</small></th>
                  <th><small>Selection Date</small></th>
                  <th><small>Post Name /Post Code</small></th>
                  <th><small>Post Owner / Company Name</small></th>
                  <th><small>Apply Last Date</small></th>
                  <th><small>Required Qualification</small></th>
                  <th><small>Apply Date</small></th>
                  <th><small>Applicant Pic</small></th>
                  <th><small>Applicant Name</small></th>
                  <th><small>Applicant Contact No</small></th>
                  <th><small>Highest Qualification</small></th>
                  <th><small>Resume </small></th>
                  <th><small>By Staff </small></th>
                  <th><small>Staff Comment </small></th>
                  <th><small>By Company </small></th>
                  <th><small>Company Comment </small></th>
                </tr>
                </thead> 
                <tbody>
                <?php
                $i=1;
                  $joblist=mysqli_query($db,"SELECT * FROM `aplied_job` WHERE `jobid`='".trim($_GET['jid'])."' AND `stf_status` ='selected'");
                  while($run=mysqli_fetch_array($joblist)){
                 ?>
                 <tr>
              <td><?php echo $i; ?>.</td>
              <td><span class="label label-primary"><?php echo date('d-m-Y',strtotime($run['final_date'])); ?></span></td>
              <td><small><?php echo (postName($run['jobid'])).'&nbsp; <br/> &nbsp;'.(postCode($run['jobid'])); ?></small></td>
              <td><b><small><?php echo ucwords(companyname($run['compid'])); ?></small></b></td>
              <td><small><?php echo date('d-m-Y',strtotime(postApplylastdate($run['jobid']))); ?></small></td>
              <td><span class="label label-warning"><?php echo ucwords(postHighQual($run['jobid'])); ?></span></td>
               <td><small><?php echo date('d-m-Y',strtotime(($run['timedate']))); ?></small></td>

               <td><img src="../assets/candidate/<?php echo ucwords(applicantPic($run['applicantid'])); ?>" style="height: 60px;width: 60px;" /></td>
               <td><span class="label label-primary"><?php echo ucwords(applicantName($run['applicantid'])); ?></span></td>
               <td><small><?php echo ucwords(applicantContact($run['applicantid'])); ?></small></td>
               <td><span class="label label-success"><?php echo ucwords(postHighQual($run['jobid'],'highestqualification')); ?></span></td>
              <td><a href="../assets/candidate/<?php echo (applicantResume($run['applicantid'])); ?>" target="_blank"><img src="../assets/general/download.png" style="height:30px;width:30px;" /></a></td>
              <td style="width: 60px;"><?php echo (ucwords($run['stf_status'])); ?></td>
              <td style="width: 60px;"><?php echo (ucwords($run['stf_comment'])); ?></td>
              <td style="width: 60px;"><span class="label label-success"><?php echo (ucwords($run['final_status'])); ?></span></td>
              <td style="width: 60px;"><?php echo (ucwords($run['final_comment'])); ?></td>
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
<script type="text/javascript">
          $(".statusid").click(function () {
    var ids = $(this).attr('data-id');

    $("#idkl").val(ids);
    $('#myModal').modal('show');
});
        </script>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Status</h4>
        </div> 
        <div class="modal-body">
          <form method="post" action="selected-job-details?jid=<?php echo trim($_GET['jid']); ?>">
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
 <?php  include_once 'footer.php'; ?>