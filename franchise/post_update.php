
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="col-md-9 col-xs-12">
	<?php  if(isset($_GET['jobid'])){
  $sqll=mysqli_query($db,"SELECT `id`, `postid`, `adminid`, `stfid`, `clientid`, `compid`, `posttype`, `postname`, `post_number`, `priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`, `postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`, `status`, `final_selection`, `adm_approve`, `stf_approve`, `stf_reject`, `read_sft`, `read_adm`, `timedate`, `ip` FROM `post_job` WHERE `id`='".base64_decode(trim($_GET['jobid']))."'");
  $runsqll=mysqli_fetch_array($sqll);
      ?>
<div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Post New Job</h3>
            </div>
            <div class="box-body">
               <div class="form-group">
 <label>Post Code</label>:
  <input type="text" name="pcode" value="<?php echo mt_rand(); ?>" maxlength="10" required="required" >
                <div class="input-group"></div><br/>
                  <label>Select Company</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="company">
                  <?php while($abc=mysqli_fetch_array($npost)){?>
                  <option value="<?php echo $abc['id']; ?>"><?php echo ucwords($abc['name']).'&nbsp;-&nbsp;'.ucwords($abc['farmname']); ?></option>
              <?php }?>
          </select>
                </div><br/><label>Post Type</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="posttype">
                    <?php if(empty($runsqll['posttype'])){?>
                  <option value="<?php echo ($runsqll['posttype']); ?>"><?php echo ucwords($runsqll['posttype']); ?></option>
                    <?php }?>
                  <option value="normal">Normal</option>
                  <option value="technical">Technical</option>
                  <option value="nontechnical">Non-Technical</option>
                  <option value="doctor">Doctor</option>
                  <option value="engineer">Engineer</option>
                  <option value="other">Other</option>
                  </select>
                </div>
              </div>
               <div class="form-group">
                <label>Post Name</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Post Name" value="<?php echo $runsqll['postname']; ?>" maxlength="95" class="form-control" name="postname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Number of Post</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Number of Post" value="<?php echo $runsqll['post_number']; ?>" maxlength="10" pattern="[0-9]+" class="form-control" name="number_post" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Priority</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" maxlength="65" placeholder="Priority" value="<?php echo $runsqll['priority']; ?>"  class="form-control" name="priority" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Experiance</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Computer Operatior," value="<?php echo $runsqll['exp']; ?>" maxlength="25" class="form-control" name="exp" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Location</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Location 1,Location 2,Location 3" value="<?php echo $runsqll['location']; ?>" maxlength="125" class="form-control" name="location" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="gender">
                    <?php if(!empty($runsqll['gender'])){?>
                  <option value="<?php echo ($runsqll['gender']); ?>"><?php echo ucwords($runsqll['gender']); ?></option>
                    <?php }?>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="any">Any</option>
                  </select>
                </div>
              </div>
               <div class="form-group">
                <label>Highest Qualification</label>
                <div class="input-group">
                  <div class="input-group-addon">
                   <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="highestqualification">
                     <?php if(!empty($runsqll['highestqualification'])){?>
                  <option value="<?php echo ($runsqll['highestqualification']); ?>"><?php echo ucwords($runsqll['highestqualification']); ?></option>
                    <?php }?>
                    <option value="any">Any</option>
                    <option value="primary">Primary Education</option>
                    <option value="secondery">Secondery Education</option>
                    <option value="bachelor">Bachelor Degree</option>
                     <option value="diploma">Diploma</option>
                     <option value="diploma">Master Degree</option>
                     <option value="mba">MBA</option>
                     <option value="doctore">Doctore Degree</option>
                     <option value="phD">PhD</option>
                  </select>
                </div>
              </div>
             <div class="form-group">
                <label>Joining Process</label>
                <div class="input-group">
                  <div class="input-group-addon">
                   <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="joiningprocess">
                    <?php if(!empty($runsqll['joiningprocess'])){?>
                  <option value="<?php echo ($runsqll['joiningprocess']); ?>"><?php echo ucwords($runsqll['joiningprocess']); ?></option>
                    <?php }?>
                    <option value="walkin">Walk In</option>
                    <option value="interview">Interview</option>
                    <option value="online">Online Interview</option>
                  </select>
                </div>
              </div>
             
              <div class="form-group">
                <label>TA/DA</label>
                 <select class="form-control" name="ta">
                    <?php if(!empty($runsqll['ta'])){?>
                  <option value="<?php echo ($runsqll['ta']); ?>"><?php echo ucwords($runsqll['ta']); ?></option>
                    <?php }?>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
              </div>
               
               <div class="form-group">
                <label>Post Details</label><br/>
                <textarea id="postdetails" name="postdetails" rows="10" cols="80" placeholder="Enter Here">
                  <?php echo $runsqll['postdetails']; ?>
                    </textarea>
                            </div>
              <div class="form-group">
                <label>Salary</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Range &#8377;
                  </div>
                  <input type="text" placeholder="From" value="<?php echo $runsqll['ssalary']; ?>" pattern="[0-9]+" name="startsalary" required="required"> - <input type="text" placeholder="To" value="<?php echo $runsqll['esalary']; ?>" name="endsalary" pattern="[0-9]+">
                </div>
              </div>
              
              <div class="form-group">
                <label>Opening Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" value="<?php echo $runsqll['sdate']; ?>" class="form-control" name="openingdate" required="required">
                </div>
              </div>

              <div class="form-group">
              	 <label>End Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" value="<?php echo $runsqll['edate']; ?>" name="enddate">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Alternative Number</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" maxlength="10" value="<?php echo $runsqll['alernumber']; ?>" pattern="[0-9]+" placeholder="Alternative Number" class="form-control" name="alternative_number">
                  <input type="hidden" value="<?php echo $runsqll['id']; ?>" name="jodid">
                </div>
                <br/>
                   <input type="checkbox" name="recheck" required="required"> <note>Recheck Before Update</note>
                <div align="center">
                	<br/>
                	<button type="submit" name="post_jobupdate" class="btn btn-primary">Submit</button>
                </div>
              </div>
</div>
</div>
</div>
</div>
 <script>
  $(function () {
    CKEDITOR.replace('postdetails')
    $('.textarea').wysihtml5()
  })
</script>
<?php }?>