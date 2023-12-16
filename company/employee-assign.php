<?php 
 include_once 'head.php';
 include_once 'menu.php'; 
 $client=mysqli_query($db,"SELECT * FROM `client` WHERE `status`='active'");
while($ab=mysqli_fetch_array($client)){
$row[]=$ab;
} 
$stf=mysqli_query($db,"SELECT * FROM `employee` WHERE `id`='".trim($_GET['id'])."'");
$rstf=mysqli_fetch_array($stf);
//submit area 
?>
	<div class="content-wrapper">
	<section class="content-header">
	<h1><small></small>
	</h1>
	<ol class="breadcrumb">
	<li><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
	<li><a href="#">employee assign</a></li>
	</ol>
	</section>
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border"> 
              <h3 class="box-title">Assign<small> Manage</small></h3>
            </div> 
            <?php if(isset($_GET['failed'])){?>
            	<div class="col-md-3"></div>
<div class="col-md-6">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Alert</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('employee-assign?id=<?php echo $_GET['id']; ?>','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              This Company Is Already Assigned To One of Employee
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<div class="col-md-3"></div>
            <?php }?>
             <?php if(isset($_GET['success'])){?>
             	<div class="col-md-3"></div>
<div class="col-md-6">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Alert</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('employee-assign?id=<?php echo $_GET['id']; ?>','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              This Company  Assigned Is Successfull
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
<div class="col-md-3"></div>
            <?php }?>
            <form  method="post" action="form_submit.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Employee Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="" value="<?php echo ucwords($rstf['name']); ?>" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Employee Contact</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo ucwords($rstf['contact']); ?>" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Select Company/Client</label>
                  <div class="col-sm-10"> 
                  	<input type="hidden" name="empid" value="<?php echo trim($_GET['id']); ?>">
                  	<input type="hidden" name="empname" value="<?php echo trim($rstf['name']); ?>">
                  	<input type="hidden" name="empemail" value="<?php echo trim($rstf['emailid']); ?>">
                    <select class="form-control" name="compid" required="required">
                    	<option value="">Choose...</option>
                    	<?php foreach ($row as $key => $value) { 
                       echo '<br/>'.$value; ?>
                    	<option value="<?php echo $value['id']; ?>"><?php echo ucwords($value['name']).'&nbsp;&nbsp;-&nbsp;&nbsp;'.ucwords($value['farmname']); ?></option>
                    <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" required="required"> Check To Confirm
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer" align="center">
              	<button type="submit" name="submitemp" class="btn btn-info">Submit</button>
                <!-- <button type="submit" name="empassign" class="btn btn-info pull-center">Submit</button> -->
              </div>
            </form>
          </div>
            </div>
        </div>
    </div>
</div>
</div>
 <?php  include_once 'footer.php'; ?>