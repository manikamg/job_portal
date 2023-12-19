<?php
include_once '../layouts/heade_design.php';
include_once 'head.php';
//submit area
if (isset($_POST['submit'])) {
  $oldpath = $_FILES['pic']['tmp_name'];
  //$img=$_FILES['pic']['name'];
  $temp = explode(".", $_FILES["pic"]["name"]);
  $img = round(microtime(true)) . '.' . end($temp);
  $newpath = "../assets/candidate/" . $img;
  move_uploaded_file($oldpath, $newpath);
  $id = trim($_POST['id']);
  $sql = mysqli_query($db, "UPDATE `candidate` SET `pic`='$img' WHERE `id`='$id'");
  if ($sql > 0) {
    echo "<script>window.open('profile?image','_self')</script>";
  } else {
    echo "<script>alert('Server Busy')</script>";
  }
}
if (isset($_POST['submit_resume'])) {
  $oldpath = $_FILES['resume']['tmp_name'];
  //$img=$_FILES['resume']['name'];
  $temp = explode(".", $_FILES["resume"]["name"]);
  $img = round(microtime(true)) . '.' . end($temp);
  $newpath = "../assets/candidate/" . $img;
  move_uploaded_file($oldpath, $newpath);
  $id = trim($_POST['id']);
  $sql = mysqli_query($db, "UPDATE `candidate` SET `resume`='$img' WHERE `id`='$id'");
  if ($sql > 0) {
    echo "<script>window.open('profile?resume','_self')</script>";
  } else {
    echo "<script>alert('Server Busy')</script>";
  }
}
if (isset($_POST['submit_data'])) {
  $cid = trim($id);
  $nameone = mysqli_real_escape_string($db, $_POST['fname']);
  $nametwo = mysqli_real_escape_string($db, $_POST['mname']);
  $namethree = mysqli_real_escape_string($db, $_POST['lname']);
  $call = mysqli_real_escape_string($db, $_POST['contact']);
  $mail = mysqli_real_escape_string($db, $_POST['email']);
  $psql = mysqli_query($db, "UPDATE `candidate` SET `name`='$nameone',`middle`='$nametwo',`last`='$namethree',`contact`='$call',`emailid`='$mail' WHERE `id`='$cid'");
  foreach ($_POST['fieldname'] as $key => $value) {
    $type = mysqli_real_escape_string($db, $_POST['type'][$key]);
    $fieldname = mysqli_real_escape_string($db, $value);
    $value = mysqli_real_escape_string($db, $_POST['value'][$key]);
    $inputtype = mysqli_real_escape_string($db, $_POST['inputype'][$key]);
    $inputval = mysqli_real_escape_string($db, $_POST['inputvalue'][$key]);
    $sql = mysqli_query($db, "INSERT INTO `candidate_data`(`candidateid`,`input_field`,`inputvalue`,`type`,`fieldname`, `fieldvalue`,`ip`) VALUES ('$cid','" . strtolower($inputtype) . "','" . strtolower($inputval) . "','" . strtolower($type) . "','" . strtolower($fieldname) . "','" . strtolower($value) . "','" . $_SERVER['REMOTE_ADDR'] . "')");
  }
  if ($sql > 0 && $psql > 0) {
    echo "<script>window.open('update-profile?success','_self')</script>";
  } else {
    echo "<script>alert('Server Is Busy')</script>";
  }
}
?>


<style>
  .btn_primary {
    background-color: #605CA8;
    color: #fff
  }
  .btn_primary:hover {
    background-color: #A569BD;
    color: #fff
  }

  .box_primary{
    border-color:#605CA8;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <small style="color:black;"><a href="./?main">
          << Back</a></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="members"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3">
        <?php
        if (isset($_GET['image'])) { ?>
          <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <div align="center">
                <h3 class="box-title">Image Uploaded <br /> Successfully</h3>
              </div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('profile','_self')"
                  data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="box box_primary">
          <div class="box-body box-profile">
            <form role="form" enctype="multipart/form-data" method="post" action="#">
              <?php if (empty($run['pic'])) { ?>
                <img class="profile-user-img img-responsive img-circle" src="../assets/general/jobs.png"
                  alt="<?php echo $run['name']; ?>">
              <?php } else { ?>
                <img class="profile-user-img img-responsive img-circle"
                  src="../assets/candidate/<?php echo $run['pic']; ?>" alt="<?php echo $run['name']; ?>">
              <?php } ?>
              <p class="text-muted text-center" style="text-transform: uppercase;">
                <?php echo $run['name']; ?>
              </p>
              <br />
              <input type="hidden" name="id" value="<?php echo $run['id']; ?>" class="form-control">
              <input type="file" name="pic" class="form-control">
              <br />
              <button type="submit" name="submit" class="btn btn-block btn_primary"><b>Add</b></a>
          </div>
          </form>
        </div>
        <?php
        if (isset($_GET['resume'])) { ?>
          <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <div align="center">
                <h3 class="box-title">Resume Uploaded<br /> Successfully</h3>
              </div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('profile','_self')"
                  data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="box box_primary">
          <div class="box-body box-profile">
            <a href="../assets/candidate/<?php echo $run['resume']; ?>">
              <div style=text-align:center><b>Download Resume</b></div>
            </a>
            <form role="form" enctype="multipart/form-data" method="post" action="#">
              <p class="text-muted text-center" style="text-transform: uppercase;">Resume</p>
              <br />
              <input type="hidden" name="id" value="<?php echo $run['id']; ?>" class="form-control">
              <input type="file" value="<?php echo $run['resume']; ?>" name="resume" class="form-control">
              <br />
              <button type="submit" name="submit_resume" class="btn btn_primary btn-block"><b>Add</b></a>
          </div>
          </form>
        </div>
      </div>
      <form method="post" name="form data send" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        enctype="multipart/form-data">
        <div class="col-md-9">
          <?php
          if (isset($_GET['success'])) { ?>
            <div class="box box-warning box-solid">
              <div class="box-header with-border">
                <div align="center">
                  <h3 class="box-title" style="text-align: center;">Profile Added <br />Success</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" onclick="window.open('profile','_self')"
                      data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="box box_primary">
              <div class="box-header with-border" style="broder-top: 1px solid red;">
                <h3 class="box-title">Primary Details</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" name="fname" required="required" id="password" class="form-control"
                        placeholder="Enter First Name" value="<?php echo $run['name'] ?>">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                      <label>Middle Name</label>
                      <input type="text" name="mname" id="password" class="form-control" placeholder="Enter Middle Name"
                        value="<?php echo $run['middle'] ?>">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" name="lname" id="password" class="form-control" placeholder="Enter Last Name"
                        value="<?php echo $run['last'] ?>">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Contact Number</label>
                      <input type="text" name="contact" required="required" pattern="[0-9]+" id="password"
                        class="form-control" placeholder="Contact Number" value="<?php echo $run['contact'] ?>"
                        readonly="readonly">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label>Email Id</label>
                      <input type="email" name="email" id="password" value="<?php echo $run['emailid']; ?>"
                        class="form-control" placeholder="Enter Email" tabindex="5" readonly="readonly">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            $check = mysqli_query($db, "SELECT DISTINCT `field` FROM `formsetting` ORDER BY `id` DESC");
            while ($run = mysqli_fetch_array($check)) { ?>
              <div class="box box_primary">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <?php echo ucwords($run['field']); ?>
                  </h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">

                    <?php
                    $field = mysqli_query($db, "SELECT `id`, `admid`, `field`, `name`, `type`, `timdate` FROM `formsetting` WHERE `field`='" . $run['field'] . "'");
                    while ($value = mysqli_fetch_array($field)) {
                      $arr = explode(' ', trim($value['name']));
                      $fieldtype = $arr[0]; // will print Test
                      ?>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label>
                            <?php echo ucwords($value['name']); ?>
                          </label>
                          <input type="hidden" name="inputype[]" value="<?php echo strtolower($value['type']); ?>">
                          <input type="hidden" name="type[]" value="<?php echo strtolower($value['field']); ?>">

                          <input type="hidden" name="inputvalue[]" value="<?php echo strtolower($value['name']); ?>">
                          <input type="hidden" name="fieldname[]"
                            value="<?php echo strtolower(str_replace(' ', '', $value['name'])); ?>">
                          <?php if ($value['type'] == 'normal') { ?>
                            <input
                              type="<?php if ($fieldtype == 'contact') {
                                echo 'number';
                              } elseif ($fieldtype == 'email') {
                                echo 'email';
                              } elseif ($fieldtype == 'date') {
                                echo 'date';
                              } else {
                                echo 'text';
                              } ?>"
                              name="value[]" id="password" class="form-control"
                              placeholder="<?php echo ucwords($value['name']); ?>" tabindex="5">
                          <?php } else { ?>
                            <textarea name="value[]" id="password" class="form-control"
                              placeholder="<?php echo ucwords($value['name']); ?>"></textarea>
                          <?php } ?>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php } ?>
            <hr class="colorgraph">
            <div class="row">
              <div class="col-xs-12">
                <div align="center">
                  <button type="submit" style="width: 20%" name="submit_data"
                    class="btn btn-success btn-block">Submit</button>
                </div>
              </div>
            </div>
      </form>
    </div>
</div>
</div>
</div>
</div>

<?php include_once 'footer.php'; ?>