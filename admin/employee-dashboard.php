<?php 
include_once 'employee_head.php';
$complist=mysqli_query($db,"SELECT `id`, `empid`, `compid`, `status`, `timedate` FROM `assign_to_emp` WHERE `empid`='".$run['mem_id']."' AND `status`='yes'");
while($xx=mysqli_fetch_array($complist)){ 
$ab[]=$xx['compid'];
}
?> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Welcome Back, <b><?php echo $run['name']; ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Employee Manage Area</li>
      </ol>
    </section> 
    <section class="content">
      <div class="col-md-12 col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border"> 
              <!-- <h3 class="box-title">Client<small> Manage</small></h3> -->
      	<table id="example1" class="table table-fixedheader table-bordered table-striped">
    <thead>
	<tr>
	<th>Sno</th>
	<th>Company Name</th>
	<th>Post Name</th>
	<th>NOP</th>
	<th>Post Last Date</th>
	<th>Status</th>
	<th>Full Post</th>
	<th>Edit</th>
	</tr>
    </thead>
    <tbody id="myTable">
     <?php 
     $i=1;
        foreach ($ab as $key => $value) {
        $complist=mysqli_query($db,"SELECT `id`, `postid`, `adminid`, `stfid`, `clientid`, `compid`, `postname`, `post_number`, `priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`, `postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`, `status`, `final_selection`, `adm_approve`, `stf_approve`, `read_sft`, `read_adm`, `timedate`, `ip` FROM `post_job` WHERE `compid`='$value'");
        while($row=mysqli_fetch_array($complist)){ ?>
		<tr>
		<td><?php echo $i; ?>.</td>
		<td><?php echo ucwords(companyname($row['compid'])); ?></td>
		<td><?php echo ucwords($row['postname']) ?></td>
		<td><?php echo ucwords($row['post_number']) ?></td>
		<td><?php echo date('d/m/Y',strtotime($row['edate'])).'('.date('M',strtotime($row['edate'])).')'; ?></td>
		<td><form method="post">
		<input type="hidden" name="postid" value="<?php echo $row['id'] ?>">
		<?php if($row['stf_approve']=='approved'){?>
		<input type="hidden" name="poststtus" value="deactive">
		<button name="chng" type="button" readonly="readonly" class="btn btn-success btn-flat" style="font-size: 12px;width: 100%;"><?php echo ucwords($row['stf_approve']); ?></button>
		<?php }elseif($row['stf_approve']=='no'){?>
		<input type="hidden" name="poststtus" value="active">
		<button name="chng" type="button" readonly="readonly" class="btn btn-default btn-flat" style="font-size: 12px;width: 100%;">New Application</button>
		<?php }else{?>
			<input type="hidden" name="poststtus" value="active">
		<button name="chng" type="button" readonly="readonly" class="btn btn-danger btn-flat" style="font-size: 12px;width: 100%;"><?php echo ucwords($row['stf_approve']).'ed'; ?></button>
	    <?php }?>
		</form></td>
		<td>
		<a href="view-posted-employee-job?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-primary"><i class="fa fa-files-o"></i></a>
		</td>
		<td> 
		<a href="edit-job-post-employee?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
		</td> 
		<!-- <td>
		<form method="post" class="delete_form" action="#">
		<input type="hidden" name="did" value="<?php //echo $row['id']; ?>">
		<button type="submit" name="remove" class="btn btn-danger" onclick="return confirm('confirm to remove')"><i class="fa fa-trash"></i></button>
		</form></td> -->
		</tr>
  <?php $i++;}}?>
    </tbody>
  </table>
</div>
</div>
</div>
</section>
</div>
 <?php  include_once 'footer.php'; ?>
