<div class="col-md-9"> 
<?php 
   $jd=query("SELECT * FROM `post_job` WHERE `compid`='$id' AND `status`='active'")or die(mysqli_error($db)); 
   while($gt=mysqli_fetch_array($jd)){
   $clientpost=query("SELECT * FROM `aplied_job` WHERE `compid`='".$gt['compid']."' AND `jobid`='".$gt['id']."' AND `stf_status`='selected'"); 
        $tApply=mysqli_num_rows($clientpost); ?> 
     <div class="col-md-6 col-xs-12">
          <div class="box box-danger direct-chat direct-chat-primary">
            <div class="box-header with-border">
            <?php 
             $xy=($gt['stf_approve']);
              if($xy=='no'){
              echo '<span class="label label-danger">On Process</span>'; }elseif($xy=='approved'){
               echo '<span class="label label-success">Active</span>'; } ?><br/>
              <h3 class="box-title"><?php echo ucwords($gt['postname']); ?> <small>- <?php echo ($gt['post_number']); ?> post</small></h3>
              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="Total Apply" class="badge bg-light-blue"><?php echo $tApply; ?></span>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Post Details" data-widget="chat-pane-toggle">
                  <span data-toggle="tooltip"  class="badge bg-light-blank"><i class="fa fa-black-tie"></i></span></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="direct-chat-messages">
               <?php
                 if(!empty($tApply)>0){ 
                  while($runxq=mysqli_fetch_array($clientpost)){?>
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix"> 
                    <span class="direct-chat-name pull-left"><?php echo ucwords(applicantName($runxq['applicantid'])); ?><?php if($runxq['final_status']=='selected'){ echo '- <b style="color:red">Selected</b>'; } ?></span>
                    <span class="direct-chat-timestamp pull-right"><?php echo (date('d/M/Y',strtotime($runxq['timedate']))); ?></span>
                  </div>
                  <?php if(empty($runxq['applicantid'])){ ?>
            <img class="direct-chat-img"  src="../assets/candidate/<?php echo applicantPic($runxq['applicantid']); ?>" alt="<?php echo $runxq['name']; ?>"> 
               <?php }else{?>
              <img class="direct-chat-img"  src="../dist/img/user1-128x128.jpg" alt="<?php echo $runxq['applicantid']; ?>">
               <?php }?>
                  <div class="direct-chat-text">
                  <?php  if(empty($runxq['msg'])){ echo $runxq['msg']; }else{ echo 'I am eligible and Deserving Condidate for this post'; } ?>
                  <br/>

                  <div align="right"><a href="all-applications?token=<?php echo md5(mt_rand()); ?>&pid=<?php echo base64_encode($runxq['jobid']); ?>&id=<?php echo base64_encode($runxq['applicantid']); ?>"><span class="label label-danger">View >></span></div>
                  </div>
                </div>
              <?php }}else{?>
                 <b>Currently No Applicant Found!</b>
              <?php }?>
              </div>
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../assets/general/jobs.png" alt="rmjob.in">
                      <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              <?php echo ucwords($gt['postname']); ?>
                              <small class="contacts-list-date pull-right"><?php echo date('d/M/Y',strtotime($gt['timedate'])); ?></small>
                            </span>
                        <span class="contacts-list-msg">
                          <table class="table table-bordered">
                          <tr><th>Number of Post:</th><th><b><?php echo ($gt['post_number']); ?></b></th></tr>
                          <tr><th>Priority:</th><th><b><?php echo ucwords($gt['priority']); ?></b></th></tr>
                          <tr><th>Experiance:</th><th><b><?php echo ($gt['exp']); ?></b></th></tr>
                          <tr><th>Qualification:</th><th><b><?php echo ($gt['highestqualification']); ?></b></th></tr>
                          <tr><th>Joining Process:</th><th><b><?php echo ($gt['joiningprocess']); ?></b></th></tr>
                          <tr><th>Gender:</th><th><b><?php echo ($gt['gender']); ?></b></th></tr>
                        </table>
                        </span>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="box-footer">
              <form action="#" method="post">
                <div class="input-group">
                      <span class="input-group-btn">
                        <button onclick="window.open('all-applications?token=<?php echo md5(mt_rand()); ?>&link=<?php echo md5(mt_rand()); ?>&pid=<?php echo base64_encode($gt['id']); ?>&logitude=<?php echo md5(mt_rand()); ?>','_self')" type="button" class="btn btn-primary btn-flat" style="width: 100%;">View All</button>
                      </span>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php }?>
    </div>