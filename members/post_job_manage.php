<?php  
 include_once 'client_session.php';
 include_once 'client_head.php';         
$allaplication=query("SELECT * FROM `post_job` WHERE `clientid`='$id'");
if(isset($_GET['pid'])){
$allaplicationxy=query("SELECT * FROM `post_job` WHERE `id`='".trim($_GET['pid'])."'");
$abcx=mysqli_fetch_array($allaplicationxy);?>
<?php if(isset($_GET['remove'])){ ?>
<div class="col-md-9 col-xs-12">
  <div class="col-md-4"></div>
<div class="col-md-3">
    <div class="box box-success box-solid">
       <div class="box-header with-border">
          <h3 class="box-title">Alert</h3>
            <div class="box-tools pull-right">
                <button type="button" onclick="window.open('dashboard?job-manage','_self')" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
      <div class="box-body">Removed Successfully</div>
          </div>
        </div>
      </div>
  <?php }?>
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="col-md-9 col-xs-12">
<input type="hidden" name="poid" value="<?php echo $abcx['id'] ?>" readonly="readonly">
<?php if(isset($_GET['post-job'])){ ?>
    <div class="box box-warning box-solid">
   <div class="box-header with-border">
<div align="center"><h3 class="box-title">Job Posted<br/><br/> Successfully</h3></div>
 <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('dashboard?new-job','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
<div class="box box-danger"><a href="dashboard?job-manage" class="btn btn-primary"><< Back</a>
            <div class="box-header" style="text-align: center;">
              <h3 class="box-title">Update New Job Post</h3>
            </div>
            <div class="box-body">
               <div class="form-group">
 <label>Post Code</label>: <input type="text" name="pcode" value="<?php echo $abcx['postid'] ?>" maxlength="10" readonly="readonly"><br/>
 <label>Job Type</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="jtyp">
                    <option value="<?php echo $abcx['jobtyp'] ?>"><?php echo jobtypidtoname($abcx['jobtyp']); ?></option>
                  <?php $jobtyp=mysqli_query($db,"SELECT `id`, `name` FROM `jobtype` ORDER BY `timedate` ASC"); while($abc=mysqli_fetch_array($jobtyp)){?>
                  <option value="<?php echo $abc['id']; ?>"><?php echo ucwords($abc['name']); ?></option><?php }?>
          </select>
                </div>
              </div>

               <div class="form-group">
                <label>Post Name</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo $abcx['postname']; ?>" placeholder="Post Name" maxlength="95" class="form-control" name="postname" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Number of Post</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo $abcx['post_number']; ?>" placeholder="Number of Post" maxlength="10" pattern="[0-9]+" class="form-control" name="number_post" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Priority</label>
                <div class="input-group">
                  <div class="input-group-addon">
                     <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo $abcx['priority']; ?>" maxlength="65" placeholder="Priority"  class="form-control" name="priority" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Experiance</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo $abcx['exp']; ?>" placeholder="Computer Operatior," maxlength="25" class="form-control" name="exp" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Location</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <input type="text" value="<?php echo $abcx['location']; ?>" placeholder="Location 1,Location 2,Location 3" maxlength="125" class="form-control" name="location" required="required">
                </div>
              </div>
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-circle-o text-red"></i>
                  </div>
                  <select class="form-control" name="gender">
                    <option value="<?php echo $abcx['gender']; ?>"><?php echo $abcx['gender']; ?></option>
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
                   <option value="<?php echo $abcx['highestqualification']; ?>"><?php echo ucwords($abcx['highestqualification']); ?></option>
                    <option value="any">Any</option>
                   <?php  $sql=query("SELECT `name` FROM `higest_qual`");
                        while($runop=mysqli_fetch_array($sql)){
                      echo '<option value="'.$runop['name'].'">'.ucwords($runop['name']).'</option>';
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
                    <option value="<?php echo $abcx['joiningprocess']; ?>"><?php echo ucwords($abcx['joiningprocess']); ?></option>
                    <option value="walkin">Walk In</option>
                    <option value="interview">Interview</option>
                    <option value="online">Online Interview</option>
                  </select>
                </div>
              </div>
             
              <div class="form-group">
                <label>TA/DA - <?php  if($abcx['ta']=='on'){ echo 'Yes';}else{ 'No';} ?></label>
                <div class="input-group">
                  &nbsp;&nbsp;
                       Yes   <input type="radio"  name="ta"> 
                  <br/> &nbsp;&nbsp;&nbsp;&nbsp;No <input type="radio"  name="ta" checked="checked">
                </div>
              </div>
               
               <div class="form-group">
                <label>Post Details</label><br/>
                <textarea id="postdetails" class="form-control" name="postdetails" rows="10" cols="80" placeholder="Enter Here"><?php echo $abcx['postdetails']; ?>
                    </textarea>
                            </div>
              <div class="form-group">
                <label>Salary</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Range &#8377;
                  </div>
                  <input type="text" placeholder="From" value="<?php echo $abcx['ssalary']; ?>" pattern="[0-9]+([\.,][0-9]+)?" name="startsalary" required="required"> - <input type="text" value="<?php echo $abcx['esalary']; ?>" placeholder="To" name="endsalary" pattern="[0-9]+([\.,][0-9]+)?">
                </div>
              </div>
              
              <div class="form-group">
                <label>Opening Date:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date"  value="<?php $cdate= $abcx['sdate']; echo $cdate; ?>" class="form-control" name="openingdate" required="required">
                </div>
              </div>

<div class="form-group">
<label>End Date:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="date" value="<?php echo $abcx['edate']; ?>" class="form-control" name="enddate">
</div>
</div>
<div class="form-group">
<label>Alternative Number</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-phone"></i>
</div>
<input type="text" value="<?php echo $abcx['alernumber']; ?>" maxlength="10" pattern="[0-9]+" placeholder="Alternative Number" class="form-control" name="alternative_number"></div><br/><div align="center"><button type="submit" name="update_post" class="btn btn-primary">Update</button></div></div></div></div></div></form><?php }else{?><div class="col-md-9 col-xs-12"><div class="box box-default box-solid"><div class="table-responsive"><table id="example1" class="table table-bordered table-hover"><thead><tr><th style="background-color:#E7E9F0;color:#000;"><small>Status</small></th><th style="background-color:#E7E9F0;color:#000;"><small>Name</small></th><th style="background-color:#E7E9F0;color:#000;"><small>NoP</small></th><th style="background-color:#E7E9F0;color:#000;"><small>Prority</small></th><th style="background-color:#E7E9F0;color:#000;"><small>Location</small></th><th style="background-color:#E7E9F0;color:#000;"><small>View</small></th><th style="background-color:#E7E9F0;color:#000;"><small>Remove</small></th></tr></thead>  
<?php  
$x=1;  
while($runxio=mysqli_fetch_array($allaplication)){?>
<tbody>
<tr>    
<td><a href="#"><i class="fa fa-circle text-success"></i><b>Online</b></a></td>
<td> <span class="label label-info"><?php echo ucwords($runxio['postname']); ?></span></td>
<td><span class="label label-primary"><?php echo $runxio['post_number']; ?></span></td>
<td><?php echo $runxio['priority']; ?></td> 
<td><?php echo ucwords($runxio['location']); ?></td>
<td><input type="hidden" name="pid" value="<?php echo $runxio['id']; ?>"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
View <span class="caret"></span>
</button><ul class="dropdown-menu">
<li><a href="dashboard?job-manage&id=<?php echo md5(mt_rand()); ?><?php echo md5(mt_rand()); ?>&pid=<?php echo $runxio['id']; ?>&<?php echo md5(mt_rand()); ?><?php echo md5(mt_rand()); ?>">View</a></li>
<li><a href="../../post-view/<?php echo strtolower(str_replace(' ', '-', getJobIdToJobtypName($runxio['jobtyp']))); ?>/<?php echo strtolower(str_replace(' ', '-', $runxio['postname'])); ?>/<?php echo ($runxio['id']); ?>" target="_blank">View Post</a></li></ul></div></td><td><form method="post"><input type="hidden" name="pid" value="<?php echo $runxio['id']; ?>"><button type="submit" name="postremove" onclick="return confirm('confirm to remove');" class="btn btn-danger"><i class="fa fa-trash"></i></button></form></td></tr> </tbody><?php $x++;}?></table></div></div></div>
<?php }?> 