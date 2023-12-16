<?php
include_once '../layouts/heade_design.php';
include_once 'member_session.php';
include_once 'head.php';
$post = mysqli_query($db, "SELECT * FROM `post_job` WHERE `id`='" . base64_decode(trim($_GET['id'])) . "'");
$runpost = mysqli_fetch_array($post);
//farm name
$comp = mysqli_query($db, "SELECT * FROM `client` WHERE `id`='" . (trim($runpost['clientid'])) . "'");
$compd = mysqli_fetch_array($comp);
//apply for job
if (isset($_POST['submit'])) {
  $getid = trim($_POST['getid']);
  $job = mysqli_real_escape_string($db, $_POST['jobid']);
  $applicant = mysqli_real_escape_string($db, $_POST['applicantid']);
  $adm = mysqli_real_escape_string($db, $_POST['admid']);
  $stf = mysqli_real_escape_string($db, $_POST['stfid']);
  $msg = mysqli_real_escape_string($db, $_POST['msg']);
  $comp = mysqli_real_escape_string($db, $_POST['compid']);
  $check = mysqli_query($db, "SELECT * FROM `aplied_job` WHERE `compid`='$comp' AND `jobid`='$job' AND `applicantid`='$applicant' AND `status`='applied'") or die(mysqli_error($db));
  $data = mysqli_fetch_array($check);
  if ($data['id'] > 0) {
    echo "<script>window.open('apply-for-job?val=" . base64_encode(uniqid()) . "&log=" . base64_encode(uniqid()) . "&loc=" . base64_encode(mt_rand()) . "&id=" . base64_encode($getid) . "&already&adate=" . base64_encode($data['timedate']) . "','_self')</script>";
  } else {
    $sql = mysqli_query($db, "INSERT INTO `aplied_job`(`admid`, `stfid`, `compid`, `jobid`, `applicantid`, `msg`, `ip`) VALUES ('" . $adm . "','" . $stf . "','" . $comp . "','$job','$applicant','$msg','" . $_SERVER['REMOTE_ADDR'] . "')") or die(mysqli_error($db));

    if ($sql > 0) {
      echo "<script>window.open('apply-for-job?val=" . base64_encode(uniqid()) . "&log=" . base64_encode(uniqid()) . "&loc=" . base64_encode(mt_rand()) . "&id=" . base64_encode($getid) . "&success','_self')</script>";
    } else {
      echo "<script>window.open('apply-for-job?id=" . base64_encode($getid) . "','_self')</script>";
    }
  }
}
?>

<style>
  .btn_1 {
    border: none;
    border-radius: 5px;
    width: 150px;
    height: 35px;
    margin-top: 20px;
  }

  .btn_1:hover {
    background-color: #707cff;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1><small><a href="./?main">
          << Back</a></small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Member</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <?php
      if (isset($_GET['success'])) { ?>
        <!-- <div class="col-md-2 col-xs-12"></div> -->
        <div class="col-md-12 col-xs-12">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <div align="center">
                <h3 class="box-title">You are Successfully Applied For this Job. <br /> </h3>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool"
                  onclick="window.open('apply-for-job?id=<?php echo $_GET['id']; ?>','_self')" data-widget="remove"><i
                    class="fa fa-times"></i></button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php
      if (isset($_GET['already'])) { ?>
        <div class="col-md-12 col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <div align="center">
                <h3 class="box-title">You are Already Applied For This Post On - <?php echo date('d/m/Y', strtotime(base64_decode(trim($_GET['adate'])))); ?>
                </h3>
              </div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool"
                  onclick="window.open('apply-for-job?id=<?php echo $_GET['id']; ?>','_self')" data-widget="remove"><i
                    class="fa fa-times"></i></button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-md-9 col-xs-12">
        <form role="form" enctype="multipart/form-data" method="post">
          <div class="box box-primary" style="padding:0 20px;">
            <div class="box box-widget widget-user-2">
              <div class="widget-user-header bg-secondary">
                <div class="widget-user-image">
                  <img class="img-circle" src="../assets/general/jobs.png"
                    alt="<?php echo ucwords($runpost['postname']); ?>" style="height:50px;">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">
                  <?php echo strtoupper($runpost['postname']); ?>
                </h3>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a href="#"><i class="fa fa-ship fa-1x" style="color:#000;"></i> POST NAME
                      <span class="pull-right badge bg-blue">
                        <?php echo ucwords($runpost['postname']); ?>
                      </span></a></li>
                  <li><a href="#"><i class="fa fa-ship fa-1x" style="color:#000;"></i> NUMBER OF POST
                      <span class="pull-right badge bg-aqua">
                        <?php echo ucwords($runpost['post_number']); ?>
                      </span></a></li>
                  <li><a href="#"><i class="fa fa-ship fa-1x" style="color:#000;"></i> SELECTION PROCESS
                      <span class="pull-right badge bg-green">
                        <?php echo ucwords($runpost['joiningprocess']); ?>
                      </span></a></li>
                  <li><a href="#"><i class="fa fa-ship fa-1x" style="color:#000;"></i> QUALIFICATION <span
                        class="pull-right badge bg-red">
                        <?php echo ucwords($runpost['highestqualification']); ?>
                      </span></a></li>
                  <li><a href="#"><i class="fa fa-ship fa-1x" style="color:#000;"></i> SALARY RANGE
                      <span class="pull-right badge bg-red">
                        <?php echo '&#8377; :' . ($runpost['ssalary']) . '&nbsp; to &nbsp;&#8377; : ' . ($runpost['esalary']); ?>
                      </span></a></li>
                </ul>
              </div>
              <div class="box-header">
                <hr />
                <h4 class="box-title">JOB DESCRIPTION</h4><br /><br />
                <?php echo ucwords($runpost['postdetails']); ?>
              </div>
              <div class="box-header">
                <hr />
                <h4 class="box-title">About Company</h4><br /><br />
                <ul>
                  <li><i class="fa fa-circle-o text-aqua"></i> Company Name: <b>
                      <?php if (!empty($compd['farmname'])) {
                        echo ucwords($compd['farmname']);
                      } else {
                        echo 'Not Available';
                      } ?>
                    </b></li>
                  <li><i class="fa fa-circle-o text-aqua"></i> Contact Person Name: <b>
                      <?php if (!empty($compd['name'])) {
                        echo ucwords($compd['name']);
                      } else {
                        echo 'Not Available';
                      } ?>
                    </b></li>
                  <li><i class="fa fa-circle-o text-aqua"></i> Contact Person MOB: <b>
                      <?php if (!empty($compd['contact'])) {
                        echo ucwords($compd['contact']);
                      } else {
                        echo 'Not Available';
                      } ?>
                    </b></li>
                  <li> <i class="fa fa-circle-o text-aqua"></i> Company RNo: <b>
                      <?php if (!empty($compd['farmno'])) {
                        echo ucwords($compd['farmno']);
                      } else {
                        echo 'Not Available';
                      } ?>
                  </li>
                </ul>
                <label>Profile</label>
                <div align="justify">
                  <?php if (!empty($compd['other'])) {
                    echo ucwords($compd['other']);
                  } else {
                    echo 'Not Available';
                  } ?>
                </div>
              </div>
              <hr />
              <label>Message</label>
              <textarea class="form-control" name="msg" maxlength="225" placeholder="Enter Here"></textarea>
            </div>
            <input type="hidden" name="compid" value="<?php echo $runpost['compid']; ?>">
            <input type="hidden" name="jobid" value="<?php echo $runpost['id']; ?>">
            <input type="hidden" name="getid" value="<?php echo base64_decode(trim($_GET['id'])); ?>">

            <input type="hidden" name="applicantid" value="<?php echo $id; ?>">
            <input type="hidden" name="admid" value="<?php echo $run['admin']; ?>">
            <input type="hidden" name="stfid" value="<?php echo $run['stfid']; ?>">
            <input type="checkbox" name="check" required="required"> I want To apply with my current profile and Resume
            <div align="left">
              <button type="submit" name="submit" class="btn btn-primary btn_1">Submit</button>
            </div>
            <br />
          </div>
        </form>
      </div>
      <div class="col-sm-3 col-xs-12" style="padding:0 0px;">
        <div class="box box-primary" style="padding:0 20px;">
          <div class="box box-widget widget-user-2">
            <h4>Similar Jobs</h4>
            <?php
            $postz = query("SELECT * FROM `post_job` WHERE `id`!='" . base64_decode(trim($_GET['id'])) . "' AND `jobtyp`='" . getJobIdToTyp(base64_decode(trim($_GET['id']))) . "' AND `status`='active' AND `stf_approve`='approved'");
            if (mysqli_num_rows($postz) > 0) {
              while ($runpost = mysqli_fetch_array($postz)) { ?>
                <div class="alert alert-primary" style="
                border-radius: 7px;
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                padding:10px;
                ">
                  <li>
                    <a href="#" style="color:#000;">
                      <i class="fa fa-ship fa-1x" style="color:#000;"></i>
                      <?php echo strtoupper($runpost['postname']); ?><br /><br />
                      <span class="pull-left badge bg-red">&#8377; :
                        <?php echo ($runpost['ssalary']) . '&nbsp; - &nbsp;&#8377; : ' . ($runpost['esalary']); ?>
                      </span>
                    </a>
                    <br /><br /><br />
                    <a href="apply-for-job?id=<?php echo base64_encode($runpost['id']); ?>">
                    <span style="width: 100px; height:30px; line-height:25px; border-radius:5px;"
                        class="pull-center badge bg-blue">
                        << View</span></a>
                    <span class="pull-right badge bg-green"  style="width: 100px; height:30px; line-height:25px; border-radius:5px;">
                      <?php echo ucwords($runpost['joiningprocess']); ?>
                    </span>
                  </li>
                  <br />
                </div>
              <?php }
            } else {
              echo '<li>0</li>';
            } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include_once 'footer.php'; ?>