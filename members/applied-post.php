 <div class="col-md-9"> 
          <div class="box">
            <div class="box-body table-responsive">
              <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Applied Jobs</h3>
            </div>
            <div class="box-body">
              <div class="box-group" id="accordion">
                  <?php
                   $apply=mysqli_query($db,"SELECT `id`, `admid`, `stfid`, `compid`, `jobid`, `applicantid`, `mobileno`, `status`, `msg`, `stf_status`, `stf_comment`, `adm_status`, `adm_comment`, `final_status`, `job_status`, `job_comment`, `read_status`, `final_comment`, `final_date`, `timedate`, `ip` FROM `aplied_job` WHERE `applicantid`='".$id."'"); 
                  while($ab=mysqli_fetch_array($apply)){ ?>
                <div class="col-md-6 col-xs-12">
                <div class="box box-default box-solid"> 
                <div class="box-header with-border">
                  <table class="table no-margin">
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">Post Name</a></td>
                    <td><span class="label label-warning"><?php echo ucwords(postName($ab["jobid"]));?></span></td>
                  </tr>
                  <tr>
                    <td><a>Company Name</a></td>
                    <td><span class="label label-success"><?php echo ucwords(companyname(postComp($ab["jobid"])));  ?></span></td>
                   </tr>
                 <tr>
                    <td><a>Apply Date</a></td>
                    <td><span class="label label-primary"><?php echo date('d/m/Y',strtotime($ab["timedate"]));  ?></span></td>
                   </tr>
                   <tr>
                    <td><a>Status</a></td>
                    <td>
                    <?php if(($ab["final_status"]=='Selected')){  echo ' <i class="fa fa-check"></i> <span class="label label-warning"> Congratulation You Are '.ucwords($ab["final_status"]).'</span>';  }elseif($ab["final_status"]=='open'){?>
                     <span class="label label-info">Applied Successfully</span>
                     <?php }else{?>
                      <span class="label label-danger"><?php echo $ab["final_status"]; ?></span>
                      <?php }?></td>
                   </tr>
                   <?php if(!empty($ab["final_date"])){?>
                   <tr>
                    <td><a>Selected Date</a></td>
                    <td><span class="label label-primary"><?php echo date('d/m/Y',strtotime($ab["final_date"]));  ?></span></td>
                  </tr>
          <?php  
          if((checkapplicantApplyStatus($id,$ab['jobid']))==1){?>
            <tr><th colspan="2" style="text-align: center;">Your Current Status</th></tr>
          <tr><th>First Level Interview</th><td><button type="button" class="btn btn-warning"> Selected</button>
                   </td></tr>
                 <?php }?>
                 <?php 
          if((checkapplicantApplyStatusSecond($id,$ab['jobid']))==1){?>
          <tr><th>Second Level Interview</th><td><button type="button" class="btn btn-warning"> Selected</button>
                   </td></tr>
                 <?php }?>
                 <?php 
          if((checkapplicantApplyStatusFinal($id,$ab['jobid']))==1){?>
          <tr><th>Final Status</th><td><button type="button" class="btn-lg btn btn-warning"><i class="fa fa-trophy" style="color:#fff;"></i> Congratulations<br/> You Are Selected</button>
                   </td></tr>
                 <?php }?>
                    <?php 
          if((checkapplicantApplyStatusFinal($id,$ab['jobid']))==1){?>
            <tr><th colspan="2" style="text-align: center;size:5"><label class="label label-danger">Confirm From Your Side</label></th></tr>
        <?php
         if((checkapplicantApplyStatusFinalByCandidate($id,$ab['jobid']))!=1){?>
          <tr><td colspan="2">
            <div align="center">
              <form method="post">
                <input type="hidden" name="postid" value="<?php echo $ab['jobid'];  ?>">
              <button type="submit" name="joiningpost" onclick="return confirm('Confirm Your Joining');" class="btn btn-block btn-social btn-bitbucket" style="color: #fff;">
                <i class="fa fa-hand-stop-o" style="color: #fff;"></i> Yes..! I Am Joining This Job Post
              </button></div></form></td></tr>
                 <?php }else{?>
                <td colspan="2"><div align="center"> <label class="label label-success">Your Are Joining </label></div></td>
                 <?php }?>
                 <?php }?>
                 <?php }?>
                </tbody>
              </table>
              </div>
            </div>
           </div>
           <?php }?>
         </div></div></div></div></div></div>