<?php include_once 'head.php';
$apply = mysqli_query($db, "SELECT `id` FROM `aplied_job` WHERE `applicantid`='" . $id . "'");
$ab = mysqli_num_rows($apply);
if (isset($_POST['joiningpost'])) {
  $pid = input_validate($_POST['postid']);
  $sql = query("UPDATE `selected_candidate` SET `canstatus`=1 WHERE `canid`='$id' AND `jodid`='$pid' AND `canstatus`=0");
  if ($sql > 0) {
    echo "<script>window.open('.\?applied-job&apply','_self')</script>";
  } else {
    echo "<script>alert('Server Is Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
} ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1><small>Welcome Back, <b>
          <?php echo ucwords($run['name']); ?>
        </b></small></h1>
  </section>
  <section class="content">
    <div class="row">
      <?php if (isset($_GET['main'])) {
        if ((checkapplicantApplyStatusFinalByCandidate($id, $ab['jobid'])) == 1) {
          include_once 'applied-post.php';
        } else {
          include_once 'main.php';
        }
      } elseif (isset($_GET['applied-job'])) {
        include_once 'applied-post.php';
      } elseif (isset($_GET['manage-account'])) {
        include_once 'manage-account.php';
      } ?>
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <?php if (empty($run['pic'])) { ?><img alt="<?php echo $run['name']; ?>"
                class="img-circle img-responsive profile-user-img" src="../assets/general/jobs.png">
            <?php } else { ?><img alt="<?php echo $run['name']; ?>" class="img-circle img-responsive profile-user-img"
                src="../assets/candidate/<?php echo $run['pic']; ?>">
            <?php } ?>
            <h3 class="text-center profile-username">
              <?php echo ucwords($run['name']); ?>
            </h3>
            <p class="text-center text-muted"><small>Mamber Since:</small>
              <?php echo date('M-Y', strtotime($run['datetime'])); ?>
            </p>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item"><b>Jobs Applied</b> <a class="pull-right">
                  <?php echo $ab; ?>
                </a></li>
              <li class="list-group-item"><b>Status</b> <a class="pull-right">
                  <?php if ($run['regi_status'] == 'no') { ?><b style="color: red;">PENDING</b>
                  <?php } else { ?>ACTIVE
                  <?php } ?>
                </a></li>
            </ul>
          </div>
        </div><a href="#" class="btn btn-primary btn-block margin-bottom">Manage</a>
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Manage</h3>
            <div class="box-tools"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                  class="fa fa-minus"></i></button></div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="./?main"><i class="fa fa-circle-o text-yellow"></i>Home</a></li>
              <li><a href="./?applied-job"><i class="fa fa-circle-o text-green"></i> Applied Job</a></li>
              <li>
                <?php $chk_profile = mysqli_query($db, "SELECT `id` FROM `candidate_data` WHERE `candidateid`='$id'");
                if (empty(mysqli_num_rows($chk_profile))) { ?>  <a
                    href="profile"><i class="fa fa-circle-o text-red"></i> Manage Profile</a>
                <?php } else { ?><a href="update-profile"><i class="fa fa-circle-o text-red"></i> Manage Profile</a>
                <?php } ?>
              </li>
              <li><a href="./?manage-account"><i class="fa fa-circle-o text-light-blue"></i> Manage Account</a></li>
              <li> <a class="dropdown-item" href="../logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>$(function () { $("#example1").DataTable(), $("#example2").DataTable({ paging: !0, lengthChange: !1, searching: !0, ordering: !0, info: !0, autoWidth: !1 }) })</script>
<?php include_once 'footer.php'; ?>