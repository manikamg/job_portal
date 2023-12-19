<?php 
 include_once 'client_session.php';
 include_once 'client_head.php';
 include_once 'profile_update_client.php';?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small style="color:black;"><a href="dashboard?main"><< Back</a>< Client Update Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard?main"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Client Update Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <?php
                if(isset($_GET['image'])){ ?>
         <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Image Update</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('client-profile-update','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php }  ?>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <form role="form" enctype="multipart/form-data" method="post">
                <?php if(empty($run['logo'])){ ?>
             <img class="profile-user-img img-responsive img-circle" src="../assets/general/jobs.png" alt="<?php echo $run['name']; ?>">  
           <?php }else{?>
          <img class="profile-user-img img-responsive img-circle" src="../assets/clients/<?php echo $run['logo']; ?>" alt="<?php echo $run['name']; ?>">   
          <?php }?> 
              <p class="text-muted text-center" style="text-transform: uppercase;"><?php echo $run['name']; ?></p>
              <br/>
              <input type="hidden" name="id" value="<?php echo $run['id']; ?>" class="form-control">
            <input type="file" name="pic" class="form-control" required="required">
            <br/>
            <button type="submit" name="comp_logo" class="btn btn-primary btn-block"><b>UPDATE</b></a>
            </div>
            </form>
          </div>
          </div>
          	<div class="col-md-9">
          	 <?php
                if(isset($_GET['success'])){ ?>
         <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <div align="center"><h3 class="box-title" style="text-align: center;">Profile Uodated <br/>Success</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('client-profile-update','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div></div>
                <?php } ?>
                <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Your Details</h3>
              <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button></div>
            </div>
            <form method="post" name="form data send"  enctype="multipart/form-data">  
         <div class="box-body">
      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label>Owner Name</label>
           <input type="text" name="ownername" required="required" id="password" class="form-control" placeholder="Enter First Name" value="<?php echo $run['name'] ?>">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="form-group">
            <label>Manger/Spoc Name</label>
           <input type="text" name="mng" id="password" class="form-control" placeholder="Enter Here" value="<?php echo $run['mng_name'] ?>">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Contact Number</label>
           <input type="text" maxlength="10" name="contact" required="required" pattern="[0-9]+" id="password" class="form-control" placeholder="Contact Number" value="<?php echo $run['contact'] ?>">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Contact Number(optional)</label>
           <input type="text" maxlength="10" name="contact_two" pattern="[0-9]+" id="password" class="form-control" placeholder="Contact Number" value="<?php echo $run['mobile_two'] ?>">
         </div></div>
         <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Email Id</label> 
           <input type="email" name="email" id="password" value="<?php echo $run['emailid']; ?>" class="form-control" placeholder="Enter Email" tabindex="5">
         </div></div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Email Id (optinal)</label> 
           <input type="email" name="email_two" id="password" value="<?php echo $run['email_two']; ?>" class="form-control" placeholder="Enter Email" tabindex="5">
        </div></div>
          <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Farm Name</label> 
           <input type="text" name="fname" id="" value="<?php echo $run['farmname']; ?>" class="form-control" placeholder="Enter Here" tabindex="5">
      </div></div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Farm RNo.</label> 
           <input type="text" name="rno" id="" value="<?php echo $run['farmno']; ?>" class="form-control" placeholder="Enter Here" tabindex="5">
         </div></div>
       <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>Address</label> 
           <input type="text" name="faddress" id="" value="<?php echo $run['address']; ?>" class="form-control" placeholder="Enter Here" tabindex="5">
       </div></div>
       <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <label>About Company</label> 
           <textarea type="text" name="about"  class="form-control" placeholder="Enter Here" tabindex="5">
             <?php echo $run['about']; ?>
           </textarea>

           <input type="hidden" name="id" value="<?php echo $run['id']; ?>" class="form-control">
         </div></div>
			</div>
		</div></div>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12">
				<div align="center">	
					<button type="submit" style="width: 20%" name="update" class="btn btn-primary
           btn-block">Update</button></div>
				</div>
			</div>
		</form>
          </div>
      </div>
</div>
  </div>
</div>
<script>
CKEDITOR.replace( 'about' );
</script>
<?php include_once 'footer.php';?>
