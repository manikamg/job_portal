 <?php  
 include_once 'employee_head.php';
 $getpost=mysqli_query($db,"SELECT * FROM `post_job` WHERE `id`='".base64_decode(trim($_GET['id']))."'");
 $postd=mysqli_fetch_array($getpost);
 if(isset($_POST['approval_post'])){
  $stf=trim($_POST['status_name']);
  $idi=trim($_POST['status_id']);
  $rmsg=mysqli_real_escape_string($db,$_POST['rejectmsg']);  
  $sql=mysqli_query($db,"UPDATE `post_job` SET `adm_approve`='$stf',`stf_approve`='$stf',`stf_reject`='$rmsg' WHERE `id`='$idi'")or die(mysqli_error($db));
  if($sql>0){
    echo "<script>window.open('view-posted-employee-job?id=".base64_encode($idi)."&status','_self')</script>";
  }else{
    echo "<script>alert('Server Busy')</script>";
  } 
  }
 $read=mysqli_query($db,"UPDATE `post_job` SET `read_sft`=2 WHERE `id`='".base64_decode(trim($_GET['id']))."'");
 if($read>0){
  echo "<script>window.open('view-posted-employee-job?id=id'),<http-equiv='refresh' content='0'/></script>";
 }
 ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>View Job Post << <a href="employee-dashboard">Back</a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">New Job Post</li>
      </ol>
    </section>
      <div class="row">
      	<div class="col-md-1 col-xs-12"></div>
      	 <form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="col-md-10 col-xs-12">
	<?php
                if(isset($_GET['success'])){ ?>
         <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <div align="center"><h3 class="box-title">Job Posted  <br/><br/> Successfully</h3></div>
 <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('new-job','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
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
 <label>Post Code</label>: 
 <input type="text" name="pcode" value="<?php echo $postd['postid']; ?>" maxlength="10" required="required" readonly="readonly">
                <div class="input-group">
                </div>
              <br/>
                  <label>Select Company</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="company" readonly="readonly">
                    <option value="<?php echo $postd['compid']; ?>"><?php echo companyname($postd['compid']); ?></option>
                </select>
                </div>
              </div>
               <div class="form-group">
                <label>Post Name</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Post Name" maxlength="95" value="<?php echo $postd['postname']; ?>" class="form-control" name="postname" required="required" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label>Number of Post</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Number of Post" maxlength="10" value="<?php echo $postd['post_number']; ?>" pattern="[0-9]+" class="form-control" name="number_post" required="required" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label>Priority</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <?php $lcx=$postd['priority'];
                  $xlx=explode(',', $lcx);
                  foreach ($xlx as $key => $value) {?>
                  <span class="label label-warning"><i class="fa fa-job"></i> <?php echo ucwords($value); ?></span>  &nbsp;
                <?php }?>
                </div>
              </div>
              <div class="form-group">
                <label>Experiance</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" placeholder="Computer Operatior," value="<?php echo $postd['exp']; ?>" maxlength="25" class="form-control" name="exp" required="required" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label>Location</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <?php $lc=$postd['location'];
                  $mm=explode(',', $lc);
                  foreach ($mm as $key => $value) {?>
                  <span class="label label-primary"><i class="fa fa-bookmark-o"></i> <?php echo ucwords($value); ?></span>  &nbsp;
                <?php }?>
                </div>
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="gender" readonly="readonly">
                    <option value="<?php echo $postd['gender']; ?>"><?php echo ucwords($postd['gender']); ?></option>
                  </select>
                </div>
              </div>
               <div class="form-group">
                <label>Highest Qualification</label>
                <div class="input-group">
                  <div class="input-group-addon">
                   <i class="fa fa-circle-o text-red"></i>
                  </div>
                   
                  <select class="form-control" name="highestqualification" readonly="readonly">
                     <option value="<?php echo $postd['highestqualification']; ?>"><?php echo ucwords($postd['highestqualification']); ?></option>
                  </select>
                </div>
              </div>
             <div class="form-group">
                <label>Joining Process</label>
                <div class="input-group">
                  <div class="input-group-addon">
                   <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="joiningprocess" readonly="readonly">
                    <option value="<?php echo $postd['joiningprocess']; ?>"><?php echo ucwords($postd['joiningprocess']); ?></option>
                  </select>
                </div>
              </div>
             
              <div class="form-group">
                <label>TA/DA</label>
                <div class="input-group">
                  &nbsp;&nbsp;&nbsp;&nbsp;Yes   <input type="radio" readonly="readonly"  name="ta" <?php if($postd['ta']=='on'){ echo 'checked';} ?>> 
                  <br/> &nbsp;&nbsp;&nbsp;&nbsp;No <input type="radio"  readonly="readonly" name="ta" <?php if($postd['ta']=='off'){ echo 'checked';} ?>>
                </div>
              </div>
               
               <div class="form-group">
                <label>Post Details</label><br/>
                <!-- <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="Enter Here">
                    </textarea> -->
                <textarea id="postdetails" name="postdetails" rows="10" cols="80" placeholder="Enter Here" readonly="readonly">
                  <?php echo $postd['postdetails']; ?>
                    </textarea>
                            </div>
              <div class="form-group">
                <label>Salary</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Range &#8377;
                  </div>
                  <input type="text" placeholder="From" pattern="[0-9]+(\.[0-9][0-9]?)?" value="<?php echo $postd['ssalary']; ?>" name="startsalary" required="required" readonly="readonly"> - <input type="text" value="<?php echo $postd['esalary']; ?>" placeholder="To" name="endsalary" pattern="[0-9]+(\.[0-9][0-9]?)?" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label>Opening Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" value="<?php echo $postd['sdate']; ?>" name="openingdate" required="required" readonly="readonly">
                </div>
              </div>

              <div class="form-group">
              	 <label>End Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" value="<?php echo $postd['edate']; ?>" name="enddate" readonly="readonly">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Alternative Number</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" placeholder="Alternative Number" value="<?php echo $postd['alernumber']; ?>" class="form-control" name="alternative_number" readonly="readonly">
                </div>
                <br/>
                 <!--   <input type="checkbox" name="recheck" required="required"> <note>Recheck Before Submit</note>
                <div align="center">
                	<br/>
                	<button type="submit" name="submit" class="btn btn-warning">Update</button>
                </div> -->
              </div>
              <!-- /.form group -->

             
<?php if(isset($_GET['id'])){?>
  <?php if($postd['stf_approve']=='approved'){ ?>
<div class="col-md-12 col-xs-12">
          <div class="box box-default box-solid">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Status/Approval</h3>
            </div> -->
            <div class="box-body">
              <label>Job Posted Status</label><br/>
              <button type="button" readonly="readonly" class="btn btn-success"><?php echo strtoupper($postd['stf_approve']);?></button>
            </div> 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  <?php }else{?>
<div class="col-md-12 col-xs-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Status/Approval</h3>
            </div>
            <div class="box-body">
              <table class="table table-responsive">
                <tr>
                  <th>
                  <form method="post" action="#">
                  <input type="hidden" name="status_id" value="<?php echo base64_decode($_GET['id']); ?>">
                  <select class="form-control" name="status_name" onchange="valx(this.value);" required="required">
                    <option value="">Choose...</option>
                  <option value="approved">Approved</option>
                  <option value="reject">Reject</option>
                  </select>
                 </th>
               </tr>
               <tr>
                 <th>
                      <div id="hidden_div" style="display: none;">
                    <input type="text" name="rejectmsg" class="form-control" placeholder="Reject Reason" maxlength="65">
                  </div>
                  </th>
               </tr>
               <tr><th>
                  <button type="submit" name="approval_post" class="btn btn-success">submit</button>
                  </form>
                  </th></tr>
              </table>
            </div> 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <?php } } ?>
            </div>
            <!-- /.box-body -->
          </div></div>
        </div></div>
        <script>
        function valx(id){
        if(id=='reject'){
        document.getElementById('hidden_div').style.display = "block";
        }else{
        document.getElementById('hidden_div').style.display = "none";
        }
        } 
        $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('postdetails')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
        })
        </script>
 <?php  include_once 'footer.php'; ?>
