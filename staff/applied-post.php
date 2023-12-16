 <div class="col-md-9"> 
          <div class="box">
            <div class="box-body table-responsive">
              <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Calling List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                  <?php
                   $apply=mysqli_query($db,"SELECT * FROM `aplied_job` WHERE `applicantid`='".$id."'");
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
                 <?php }?>
                </tbody>
              </table>
              </div>
            </div>
           </div>
           <?php }?>