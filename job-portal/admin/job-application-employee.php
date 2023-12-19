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
            	<div class="table-responsive">
              <!-- <h3 class="box-title">Client<small> Manage</small></h3> -->
        <table id="example1" class="table table-fixedheader table-bordered table-striped">
    <thead>
  <tr>
                  <th><small>Sno.</small></th>
                  <th><small>Reject Date</small></th>
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
                  <th><small>By Company </small></th>
                  <th><small>Company Comment </small></th>
                  <th><small>Final Job </small></th>
                  <th><small>Final Job Comment </small></th>
                </tr>
    </thead>
    <tbody id="myTable" style="height:400px">
     <?php
                $i=1;
                  $joblist=mysqli_query($db,"SELECT * FROM `aplied_job` WHERE `jobid`='".base64_decode(trim($_GET['jobid']))."'");
                  while($run=mysqli_fetch_array($joblist)){
                 ?>
                 <tr>
              <td><?php echo $i; ?>.</td>
              <td><span class="label label-danger"><?php echo date('d-m-Y',strtotime($run['final_date'])); ?></span></td>
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
              
              <td style="width: 60px;">
                     <?php if($run['final_status']=='rejected'){echo '<span class="label label-danger">'.(ucwords($run['final_comment'])).'</span>';}elseif($run['final_status']=='selected'){echo '<span class="label label-info">'.(ucwords($run['final_comment'])).'</span>';}elseif($run['final_status']=='open'){echo '<span class="label label-default">No FeedBack</span>';} ?></td>
              <td style="width: 60px;"><?php echo (ucwords($run['final_comment'])); ?></td>
              <td style="width: 60px;">
                     <?php if($run['job_status']=='rejected'){echo '<span class="label label-danger">'.(ucwords($run['job_status'])).'</span>';}elseif($run['job_status']=='selected'){echo '<span class="label label-info">'.(ucwords($run['job_status'])).'</span>';}elseif($run['job_status']=='no'){echo '<span class="label label-default">No FeedBack</span>';} ?></td>
              <td style="width: 60px;"><?php echo (ucwords($run['job_comment'])); ?></td>
          </tr>
        <?php $i++;}?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</section>
</div>
 <?php  include_once 'footer.php'; ?>
