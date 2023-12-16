<?php
include_once '../layouts/heade_design.php';
include_once 'member_session.php';
include_once 'head.php';

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
    echo "<script>window.open('update-profile?image','_self')</script>";
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
    echo "<script>window.open('update-profile?resume','_self')</script>";
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
  $qaulification = mysqli_real_escape_string($db, $_POST['hq']);
  $psql = mysqli_query($db, "UPDATE `candidate` SET `name`='$nameone',`middle`='$nametwo',`last`='$namethree',`contact`='$call',`emailid`='$mail',`hq`='$qaulification' WHERE `id`='$cid'") or die(mysqli_error($db));

  foreach ($_POST['fieldname'] as $key => $value) {
    $type = mysqli_real_escape_string($db, $_POST['type'][$key]);
    $fieldname = mysqli_real_escape_string($db, $value);
    $field_value = mysqli_real_escape_string($db, $_POST['value'][$key]);

    $sql = mysqli_query($db, "UPDATE `candidate_data` SET `fieldvalue`='$field_value',`update_at`='" . date('Y-m-d') . "' WHERE `candidateid`='$id' AND `fieldname`='$fieldname'") or die(mysqli_error($db));

  }
  if ($sql > 0 && $psql > 0) {
    echo "<script>window.open('update-profile?success','_self')</script>";
  } else {
    echo "<script>alert('Server Is Busy')</script>";
  }
}
?>

<style>
  .btn_1 {
    border: none;
    border-radius: 5px;
  }

  .btn_1:hover {
    background-color: #707cff;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small style="color:black;"><a href="./?main">
          << Back</a></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="members"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Update Profile</li>
    </ol>
  </section>
  <section class="content">

    <div class="row">
      <div class="col-md-3">
        <?php
        if (isset($_GET['image'])) { ?>
          <div class="box box-denger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Image Update</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('update-profile','_self')"
                  data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="box box-primary">
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
              <button type="submit" name="submit" class="btn btn-primary btn_1 btn-block"><b>UPDATE</b></a>
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
                <button type="button" class="btn btn-box-tool" onclick="window.open('update-profile','_self')"
                  data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="box box-primary">
          <div class="box-body box-profile">
            <form enctype="multipart/form-data" method="post"
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#">
              <?php if (!empty($run['resume'])) { ?>
                <a href="../assets/candidate/<?php echo $run['resume']; ?>" target="_blank"><img
                    class="profile-user-img img-responsive img-circle" name="resume" src="../assets/general/download.png"
                    alt="focusmedia.co.in"></a>
                <p class="text-muted text-center" style="text-transform: uppercase;">Resume</p>
              <?php } else { ?>
                <label>Select Resume/Biodate/CV</label>
              <?php } ?>
              <br />
              <input type="hidden" name="id" value="<?php echo $run['id']; ?>" class="form-control">
              <input type="file" value="<?php echo $run['resume']; ?>" name="resume" class="form-control">
              <br />
              <button type="submit" name="submit_resume" class="btn btn-primary btn_1 btn-block"><b>UPDATE</b></button>
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
                  <h3 class="box-title" style="text-align: center;">Profile Uodated <br />Success</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" onclick="window.open('update-profile','_self')"
                      data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="box">
              <div class="box-header with-border">
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
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                      <label>Contact Number</label>
                      <input type="text" name="contact" required="required" pattern="[0-9]+" id="password"
                        class="form-control" placeholder="Contact Number" value="<?php echo $run['contact'] ?>">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                      <label>Email Id</label>
                      <input type="email" name="email" id="password" value="<?php echo $run['emailid']; ?>"
                        class="form-control" placeholder="Enter Email" tabindex="5">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                      <label>Higest Qualification</label>
                      <select name="hq" class="form-control">
                        <?php if (!empty($run['hq'])) { ?>
                          <option value="<?php echo $run['hq'] ?>">
                            <?php echo $run['hq'] ?>
                          </option>
                        <?php } ?>
                        <option value="primary">Primary Education(10th)</option>
                        <option value="secondery">Secondery Education(12th)</option>
                        <option value="iti">ITI/Certificate Exam</option>
                        <option value="diploma">Diploma/Polytechnic</option>
                        <option value="bachelor">Graduate/Bachelor Degree</option>
                        <option value="pg">Post Graduate</option>
                        <option value="be">B.E/B.Tech/BCA</option>
                        <option value="me">M.E/M.Tech/MCA</option>
                        <option value="mba">MBA</option>
                        <option value="ms">Master Degree</option>
                        <option value="doctore">Doctore Degree</option>
                        <option value="phD">PhD</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            $check = mysqli_query($db, "SELECT DISTINCT `type` FROM `candidate_data` WHERE `candidateid`='$id'");
            while ($run = mysqli_fetch_array($check)) { ?>
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <?php echo ucwords($run['type']); ?>
                  </h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <?php
                    $field = mysqli_query($db, "SELECT `id`, `admid`, `frenchiseid`, `candidateid`,`input_field`,`inputvalue`,`type`, `fieldname`, `fieldvalue`, `timedate`, `ip` FROM `candidate_data` WHERE `candidateid`='$id' AND `type`='" . $run['type'] . "'");
                    while ($value = mysqli_fetch_array($field)) {
                      $arr = explode(' ', trim($value['inputvalue']));
                      $fieldtype = $arr[0]; // will print Test
                      ?>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <label>
                            <?php echo ucwords($value['inputvalue']); ?>
                          </label>
                          <input type="hidden" name="type[]" value="<?php echo strtolower($value['type']); ?>">
                          <input type="hidden" name="fieldname[]" value="<?php echo $value['fieldname']; ?>">
                          <?php if ($value['input_field'] == 'normal') { ?>
                            <input type="<?php if ($fieldtype == 'contact') {
                              echo 'number';
                            } elseif ($fieldtype == 'email') {
                              echo 'email';
                            } elseif ($fieldtype == 'date') {
                              echo 'date';
                            } else {
                              echo 'text';
                            } ?>" name="value[]" id="password" class="form-control" placeholder="Enter Here"
                              value="<?php echo ucwords($value['fieldvalue']); ?>">
                          <?php } else { ?>
                            <textarea name="value[]" id="password" class="form-control"
                              placeholder="Enter Here"><?php echo ucwords($value['fieldvalue']); ?></textarea>
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
                    class="btn btn-success btn-block">Update</button>
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