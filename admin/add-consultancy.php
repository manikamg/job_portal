<?php
include_once 'head.php';
include_once 'menu.php';
if (isset($_POST['submit'])) {
  $adminidx = mysqli_real_escape_string($db, $_POST['adminid']);
  $compnamex = mysqli_real_escape_string($db, $_POST['compname']);
  $onamex = mysqli_real_escape_string($db, $_POST['oname']);
  $mobx = mysqli_real_escape_string($db, $_POST['mob']);
  $mailx = mysqli_real_escape_string($db, $_POST['mail']);
  $addressx = mysqli_real_escape_string($db, $_POST['address']);
  $about = mysqli_real_escape_string($db, $_POST['about']);
  $pass = rand(111111, 99999);
  $login = rand(111111, 99999);
  $sql = mysqli_query($db, "INSERT INTO `admins`(`admid`, `name`, `company`, `contact`, `address`, `about`, `email`, `loginid`, `password`) VALUES ('$adminidx','$onamex','$compnamex','$mobx','$addressx','$about','$mailx','$login','$pass')") or die(mysqli_error($db));
  $lid = mysqli_insert_id($db);
  if ($sql > 0) {
    echo "<script>window.open('add-consultancy?id=" . $adminidx . "&rid=" . $lid . "&success','_self')</script>";
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
  <div class="container">
    <section class="content-header">
      <h1><small><a href="dashboard?id=<?php echo trim($_GET['id']); ?>">
            << Back</a>
              < Add New Consultacy</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">add</a></li>
      </ol>
    </section>
    <div class="row" style="margin-top:20px;">
      <!-- <div class="col-md-2 col-xs-12"></div> -->
      <div class="col-md-6 col-xs-12">

        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success">
            <p> Registration success</p>
            <hr />
            <?php $cs = query("SELECT `loginid`, `password` FROM `admins` WHERE `id`='" . trim($_GET['rid']) . "'");
            $runc = mysqli_fetch_array($cs); ?>
            <ul>
              <li>LoginId<br />
                <?php echo $runc['loginid'] ?>
              </li>
              <li>Password<br />
                <?php echo $runc['password'] ?>
              </li>
            </ul>
          </div>
        <?php } ?>
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"> Consultancy Registration</h3>
          </div>
          <div class="box-body">
            <form role="form" enctype="multipart/form-data" method="post">

              <div class="form-group">
                <label>Comapany Name <b style=color:red;></b></label>
                <input type="hidden" class="form-control" name="adminid" value="1" required="required">
                <input type="text" class="form-control" name="compname" placeholder="Enter Here" required="required">
              </div>
              <div class="form-group"><label>Owner Name <b style=color:red;></b></label>
                <input type="text" class="form-control" name="oname" placeholder="Enter Here" required="required">
              </div>
              <div class="form-group"><label>Contact <b style=color:red;></b></label>
                <input type="text" class="form-control" name="mob" placeholder="Enter Here" maxlength="10"
                  minlength="10" pattern="[0-9]+" required="required">
              </div>
              <div class="form-group"><label>Email Id <b style=color:red;></b></label>
                <input type="email" class="form-control" name="mail" placeholder="Enter Here">
              </div>
              <div class="form-group"><label>Address </label>
                <input type="text" class="form-control" name="address" placeholder="Enter Here">
              </div>
              <div class="form-group"><label>About Us </label>
                <textarea class="form-control" placeholder="enter here" name="about"></textarea>
              </div>
              <div class="form-group">
                <div align="left"><button type="submit" name="submit" id="submit" class="btn btn-primary btn_1" style="height:35px;width:150px;">
                    Submit</button></div><br />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </section>
  </div>
</div>
<?php include_once 'footer.php'; ?>