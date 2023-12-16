<?php
 include_once '../layouts/heade_design.php';
 include_once 'head.php';
 $job=mysqli_query($db,"SELECT `id`, `admid`, `stfid`, `compid`, `jobid`, `applicantid`, `status`, `msg`, `stf_status`, `adm_status`, `final_status`, `read_status`, `final_comment`, `final_date`, `timedate`, `ip` FROM `aplied_job` WHERE `jobid`='".base64_decode(trim($_GET['id']))."'");
 $dsql=mysqli_fetch_array($job);
if(isset($_POST['new_submit'])){
    $canid= input_validate($_POST['idkl']);
    $poid= input_validate($_POST['postid']);
    $message= input_validate($_POST['msg']);
    $applicantid_id= input_validate($_POST['applicantid']);
    $selectType= input_validate($_POST['select']);
    $sql=query("INSERT INTO `selected_candidate`(`canid`, `jodid`, `selection1`, `selection2`, `final_selection`,`reject_reason`,`ip`) VALUES ('$applicantid_id','$poid',1,1,1,'$message','".$_SERVER['REMOTE_ADDR']."')");
    if($selectType=='selected'){$stus=2;}else{$stus=3;}
    $update=query("UPDATE `candidate` SET `select_status`='$stus' WHERE `id`='$applicantid_id'");
    if($sql>0 && $update>0){
        echo "<script>alert('Update Successfull')</script><meta http-equiv='refresh' content='0'/>";
    }else{
        echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
    }
}
?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <div class="content-wrapper">
<section class="content-header"><h1><small><a href="manage-job-post"><< Back</a> < Appllied Applications</small></h1></section> <div class="row"><?php if(isset($_GET['status'])){?>
<div class="col-md-4 col-xs-12"></div>
<div class="col-md-3 col-xs-12">
<div class="box box-warning">
<div class="box-header with-border">
<h3 class="box-title">Alert</h3>
<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="remove" onclick="window.open('new-application-details?jid=<?php echo $_GET['jid']; ?>','_self')"><i class="fa fa-times"></i></button>
</div></div><div class="box-body btn-danger" style="text-align: center;">
<?php echo strtoupper($_GET['status']); ?> Successfully</div></div></div><?php }?>
<div class="col-md-12">
<div class="box">
<div class="box-header">
<div class="table-responsive">
<table class="table table-bordered" style="background-color: gray;color: #fff;">
<tr>
<th>Company Name <br/>  RegiNo</th>
<th>Priority</th>
<th>R.Qualification</th>
<th>Job Name</th>
<th>Job Code</th>
</tr> 
<tr>
<td><?php echo getidtocompname(($id)).'<br/>'.(companynameRgno($dsql['compid'])); ?></td>
<td><?php echo ucwords(postPriority($dsql['compid'])); ?></td>
<td><?php echo ucwords(postHighQual($dsql['jobid']));?></td>
<td><?php echo ucwords(postName($dsql['jobid']));?></td>
<td><?php echo (postCode($dsql['jobid']));?></td>
</tr>
</table>
</div></div>
<div class="box-body"><div class="table-responsive">
<table id="example2" class="table table-bordered">
<thead>
<tr>
<th><small>Sno.</small></th>
<th><small>Job Code</small></th>
<th><small>Apply Date</small></th>
<th><small>Photo</small></th>
<th><small>Name</small></th>
<th><small>High. Qualification</small></th>
<th><small>Contact No</small></th>
<th><small>Resume </small></th>
<th><small>Status</small></th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$joblist=mysqli_query($db,"SELECT * FROM `aplied_job` WHERE `jobid`='".base64_decode(trim($_GET['id']))."' AND `stf_status` ='open' ORDER BY `timedate` DESC");
while($run=mysqli_fetch_array($joblist)){
?>
<tr>
<td><?php echo $i; ?>.</td>
<td><small><?php echo (postCode($run['jobid'])); ?></small></td>
<td><small><?php echo date('d-m-Y',strtotime(($run['timedate']))); ?></small></td>
<td><?php  if(!empty(applicantPic($run['applicantid']))){ ?><img src="../assets/candidate/<?php echo (applicantPic($run['applicantid'])); ?>" style="height: 60px;width: 60px;" /><?php } ?></td>
<td><span class="label label-primary"><?php echo ucwords(applicantName($run['applicantid'])); ?></span></td>
<td><small><?php echo ucwords(applicantHighqual($run['applicantid'],'highestqualification')); ?></small></td>
<td><small><?php echo ucwords(applicantContact($run['applicantid'])); ?></small></td>
<td><a href="../assets/candidate/<?php echo (applicantResume($run['applicantid'])); ?>" target="_blank"><img src="../assets/general/download.png" style="height:30px;width:30px;" /></a></td>
<td style="width: 60px;">
<?php if(CheckUserStatus($run['applicantid'])==1){ ?>
<?php if($run['stf_status']=='open'){?>
<button type="button" class="btn btn-default statusid" data-toggle="modal" data-target="#modal-default" data-id="<?php echo $run['id']; ?>" data-applicantid="<?php echo $run['applicantid']; ?>">
Status
</button>
<?php }?>
<?php }elseif(CheckUserStatus($run['applicantid'])==3){?>
<button class=btn btn-primary style=color:red;>Rejected</button>
<?php }else{?>
<button class=btn btn-primary style=color:green;>Selected</button><?php }?>
</td>
</tr>
<?php $i++;}?>
</tbody>
</table>    
</div></div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$(".statusid").click(function () {
var ids = $(this).attr('data-id');
var applyid = $(this).attr('data-applicantid');
$("#idkl").val(ids);
$("#applicantid").val(applyid);
$('#myModal').modal('show');
});
</script>
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Change Status</h4>
</div> 
<div class="modal-body">
<form method="post">
<input type="hidden" class="form-control" name="idkl" id="idkl">
<input type="hidden" class="form-control" name="applicantid" id="applicantid">
<input type="hidden" class="form-control" name="postid" value="<?php echo $dsql['jobid']; ?>">
<label>Select Status</label>
<select class="form-control" name="select" style="width: 50%;" onchange="selectl(this.value);">
<option value="selected">Selected</option>
<option value="rejected">Rejected</option>
</select><br/>
<div id="msg" style="display: none;">
<label>Reject Reason</label>
<input type="type" name="msg" class="form-control" placeholder="Enter Here" style="width: 50%;"></div><br/><br/>
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
</script><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div><?php  include_once 'footer.php'; ?>