
<div class="col-md-9"> 
<div class="box">
<!-- <div class="box-header">
<h3 class="box-title">Data Table With Full Features</h3>
</div> -->
<!-- /.box-header -->
<div class="box-body">
<div class="box box-info">
<div class="box-header with-border"> 
</div>
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="box-body">
<label>Owner/Manager Name</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-circle-o text-yellow"></i></span>
<input type="text" class="form-control" name="ownername" placeholder="Enter Here" value="<?php echo $run['name']; ?>" required="required">
</div>
<br/>
<label>Farm Full Name</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-circle-o text-yellow"></i></span>
<input type="text" class="form-control" name="farmname"  value="<?php echo $run['farmname']; ?>" placeholder="Enter Here">
</div>
<br/>
<label>Contact Number</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-circle-o text-yellow"></i></span>
<input type="text" pattern="[0-9]+" maxlength="10" value="<?php echo $run['contact']; ?>" class="form-control" name="contact" placeholder="Enter Here">
<input type="text" pattern="[0-9]+" maxlength="10" value="<?php echo $run['mobile_two']; ?>" class="form-control" name="contact_two" placeholder="Enter Here">
</div>
<br/>
<label>Farm Address</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-circle-o text-yellow"></i></span>
<textarea  type="text"  class="form-control" name="address" placeholder="Enter Here"><?php echo $run['address']; ?></textarea>
</div>
<br/>
<label>Email Id</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-circle-o text-yellow"></i></span>
<input type="email"  class="form-control" value="<?php echo $run['emailid']; ?>" name="email" placeholder="Enter Here">
<input type="email"  class="form-control" value="<?php echo $run['email_two']; ?>" name="email_two" placeholder="Enter Here">
</div>
<br/>
<label>Farm Registration Number</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-circle-o text-yellow"></i></span>
<input type="text"  class="form-control" value="<?php echo $run['farmno']; ?>" name="farm_number" placeholder="Enter Here">
</div>
<br/>
<label>About Message</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-circle-o text-yellow"></i></span>
<textarea type="text"  class="form-control" name="about" placeholder="Enter Here"><?php echo $run['about']; ?></textarea>
</div>
<hr/>
<input type="hidden" class="form-control" name="clientid" value="<?php echo $id; ?>">
 <div align="center"> <button class="btn btn-primary" name="update">Update</button></div>
  </div>
</form>
  <hr/>
<div class="col-md-4 col-xs-12">
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label>Company Logo</label>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../assets/clients/<?php echo $run['logo']; ?>" alt="<?php echo $run['name']; ?>">
 <input type="file" name="logo" class="form-control">
 <input type="hidden" class="form-control" name="clientid" value="<?php echo $id; ?>">
            </div>
   <div align="center"> 
              <button class="btn btn-warning" name="comp_logo">Update</button>
            </div>
</div>
</form>
        </div>

          <div class="col-md-4 col-xs-12">
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label>Agreement Copy</label>
          <div class="box box-primary">
            <div class="box-body box-profile">
 <a href="../assets/clients/<?php echo $run['agreement']; ?>" target="_blank" ><img class="profile-user-img img-responsive img-circle" src="../assets/general/download.png" alt="<?php echo $run['name']; ?>"></a>
 <input type="file" name="agreement" class="form-control">
 <input type="hidden" class="form-control" name="clientid" value="<?php echo $id; ?>">
            </div>
             <div align="center">
              <button class="btn btn-warning"  name="agreement_update">Update</button>
            </div>
          </div>
        </form>
        </div>

         <div class="col-md-4 col-xs-12">
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label>Other Document Copy</label>
          <div class="box box-primary">
            <div class="box-body box-profile">
    <a href="../assets/clients/<?php echo $run['other']; ?>" target="_blank"><img class="profile-user-img img-responsive img-circle" src="../assets/general/download.png" alt="<?php echo $run['name']; ?>"></a>
 <input type="file" name="document" class="form-control">
 <input type="hidden" class="form-control" name="clientid" value="<?php echo $id; ?>">
            </div>
            <div align="center">
              <button class="btn btn-warning" name="document_upload">Update</button>
            </div>
          </div>
        </form>
        </div>
        </div>
</div> 
</div>
</div>
</div>
</div>
</div>
