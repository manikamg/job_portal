<form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="col-md-9 col-xs-12">
	<?php
                if(isset($_GET['post-job'])){ ?>
         <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <div align="center"><h3 class="box-title">Job Posted  <br/><br/> Successfully</h3></div>
 <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('dashboard?new-job','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
<div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Post New Job</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
               <div class="form-group">
 <label>Post Code</label>: <input type="text" name="pcode" value="<?php echo mt_rand(); ?>" maxlength="10" required="required" ><br/>
 <label>Job Type</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="jtyp">
                  <?php $jobtyp=mysqli_query($db,"SELECT `id`, `name` FROM `jobtype` ORDER BY `timedate` ASC"); while($abc=mysqli_fetch_array($jobtyp)){?>
                  <option value="<?php echo $abc['id']; ?>"><?php echo ucwords($abc['name']); ?></option><?php }?>
          </select>
                </div>
              </div>
              <div class="form-group">
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
                </div>
              </div>
               <div class="form-group">
                <label>Post Name</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Post Name" maxlength="95" class="form-control" name="postname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Number of Post</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Number of Post" maxlength="10" pattern="[0-9]+" class="form-control" name="number_post" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Priority</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" maxlength="65" placeholder="Priority"  class="form-control" name="priority" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Experiance</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Computer Operatior," maxlength="25" class="form-control" name="exp" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Location</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Location 1,Location 2,Location 3" maxlength="125" class="form-control" name="location" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="gender">
                    <option value="any">Any</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="transg">TransGender</option>
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
                    <option value="any">Any</option>
                   <?php  $sql=query("SELECT `name` FROM `higest_qual`");
                        while($runpo=mysqli_fetch_array($sql)){
                      echo '<option value="'.$runpo['name'].'">'.ucwords($runpo['name']).'</option>';
                    }?> 
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
                    <option value="walkin">Walk In</option>
                    <option value="interview">Interview</option>
                    <option value="online">Online Interview</option>
                  </select>
                </div>
              </div>
             
              <div class="form-group">
                <label>TA/DA</label>
                <div class="input-group">
                  <!-- <div class="input-group-addon">
                   <i class="fa fa-circle-o text-red"></i>
                  </div> -->
                  &nbsp;&nbsp;
                       Yes   <input type="radio"  name="ta"> 
                  <br/> &nbsp;&nbsp;&nbsp;&nbsp;No <input type="radio"  name="ta" checked="checked">
                </div>
              </div>
               
               <div class="form-group">
                <label>Post Details</label><br/>
                <!-- <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="Enter Here">
                    </textarea> -->
                <textarea id="postdetails" name="postdetails" rows="10" cols="80" placeholder="Enter Here">
                    </textarea>
                            </div>
              <div class="form-group">
                <label>Salary</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Range &#8377;
                  </div>
                  <input type="text" placeholder="From" pattern="[0-9]+" name="startsalary" required="required"> - <input type="text" placeholder="To" name="endsalary" pattern="[0-9]+">
                </div>
              </div>
              
              <div class="form-group">
                <label>Opening Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" value="<?php $cdate= date('Y-m-d'); echo $cdate; ?>" class="form-control" name="openingdate" required="required">
                </div>
              </div>

              <div class="form-group">
              	 <label>End Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" value="<?php echo date('Y-m-d', strtotime("+1 months", strtotime($cdate))); ?>" class="form-control" name="enddate">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Alternative Number</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" maxlength="10" pattern="[0-9]+" placeholder="Alternative Number" class="form-control" name="alternative_number">
                </div>
                <br/>
                   <input type="checkbox" name="recheck" required="required"> <note>Recheck Before Submit</note>
                <div align="center">
                	<br/>
                	<button type="submit" name="post_job" class="btn btn-primary">Submit</button>
                </div>
              </div>
</div>
</div>  
</div>
 <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('postdetails')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>