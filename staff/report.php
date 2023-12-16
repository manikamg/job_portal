
<div class="col-md-12 col-xs-12">
	<?php if(isset($_GET['resportid'])){ ?>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Applied List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sno.</th>
                  <th>Resume</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Contact No.</th>
                  <th>Highest Qualification</th>
                  <th>Interview</th>
                </tr>
                </thead>
                <?php
                $i=1;
                 $postappliedlist=mysqli_query($db,"SELECT `id`, `admid`, `stfid`, `compid`, `jobid`, `applicantid`, `status`, `msg`, `stf_status`, `stf_comment`, `adm_status`, `adm_comment`, `final_status`, `job_status`, `job_comment`, `read_status`, `final_comment`, `final_date`, `timedate`, `ip` FROM `aplied_job` WHERE `jobid`='".base64_decode(trim($_GET['resportid']))."'");
                 while($runpostappliedlist=mysqli_fetch_array($postappliedlist)){?>
                <tbody>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><a href="../assets/candidate/<?php echo applicantResume($runpostappliedlist['applicantid']); ?>" target="_blank"><img class="profile-user-img img-responsive img-circle" name="resume" src="../assets/general/download.png" alt="focusmedia.co.in"></a><p class="text-muted text-center" style="text-transform: uppercase;">Resume</p><a></td>
                   <td><a href="../assets/candidate/<?php echo applicantPic($runpostappliedlist['applicantid']); ?>" target="_blank"><img class="profile-user-img img-responsive img-circle" name="resume" src="../assets/candidate/<?php echo applicantPic($runpostappliedlist['applicantid']); ?>" alt="focusmedia.co.in"></a></td>
                  <td><?php echo ucwords(applicantName($runpostappliedlist['applicantid'])); ?></td>
                  <td><?php echo applicantContact($runpostappliedlist['applicantid']); ?></td>
                  <td class="text-nowrap"><?php echo applicantHighqualName($runpostappliedlist['applicantid']); ?></td>
                  <td><select id="getid"  onchange="selectstaus(this);">
                  	<option value="">Action</option>
                  	<option value="select">Selected</option>
                  	<option value="reject">Rejected</option>
                  </select></td>
                </tr>
                </tbody>
            <?php $i++;}?> 
              </table>
            </div>
          </div>
        </div>
      </div>
       <script type="text/javascript">
      	function selectstaus(id) {
      		alert(id);
      		window.open('dashboard?resportid=<?php echo trim($_GET['resportid']); ?>&updateid='+id,'_self');
      	}else{
      		window.open('dashboard?resportid=<?php echo trim($_GET['resportid']); ?>','_self');
      	}
      </script>
      <?php }?> 