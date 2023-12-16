 <?php 
 include_once 'head.php';
 include_once 'menu.php';
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <div class="content-wrapper">
    <section class="content-header">
 <h1><small>Reject Applications</small></h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">Reject Applications</a></li>
      </ol>
    </section> 
    <div class="row">
       <div class="col-md-12">
       	 <div class="box">
           <!--  <div class="box-header">
              <h3 class="box-title">Reject Applications</h3>
            </div> -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
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
                  <th><small>By Staff </small></th>
                  <th><small>Staff Comment </small></th>
                  <th><small>By Company </small></th>
                  <th><small>Company Comment </small></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                  $joblist=mysqli_query($db,"SELECT * FROM `aplied_job` WHERE `job_status` ='rejected'");
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
              <td style="width: 60px;"><?php echo (ucwords($run['final_status'])); ?></td>
              <td style="width: 60px;"><?php echo (ucwords($run['final_comment'])); ?></td>
              <td style="width: 60px;"><?php echo (ucwords($run['job_status'])); ?></td>
              <td style="width: 60px;"><?php echo (ucwords($run['job_comment'])); ?></td>
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