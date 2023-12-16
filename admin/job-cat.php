<?php
include_once 'head.php';
include_once 'menu.php';
if (isset($_POST['submit'])) {
  $pname = mysqli_real_escape_string($db, $_POST['name']);
  $admidx = mysqli_real_escape_string($db, $_POST['admid']);
  $oldpath = $_FILES['icon']['tmp_name'];
  $temp = explode(".", $_FILES["icon"]["name"]);
  $img = round(microtime(true)) . '.' . end($temp);
  $newpath = "../assets/jobicons/" . $img;
  move_uploaded_file($oldpath, $newpath);
  $sql = mysqli_query($db, "INSERT INTO `postnames`(`admid`,`postname`,`icon`,`active`) VALUES ('$admidx','$pname','$img',2)");
  if ($sql > 0) {
    echo "<script>window.open('job-cat?success','_self')</script>";
  } else {
    echo "<script>alert('Server busy')</script>";
  }
}
//update
if (isset($_POST['update'])) {
  $nm = mysqli_real_escape_string($db, $_POST['name']);
  $cid = mysqli_real_escape_string($db, $_POST['catid']);
  $aid = mysqli_real_escape_string($db, $_POST['admid']);
  if ($aid == 1) {
    $active = 1;
  } else {
    $active = 2;
  }
  $oldpath = $_FILES['icon']['tmp_name'];
  $temp = explode(".", $_FILES["icon"]["name"]);
  $img = round(microtime(true)) . '.' . end($temp);
  $newpath = "../assets/jobicons/" . $img;
  move_uploaded_file($oldpath, $newpath);
  $sql = mysqli_query($db, "UPDATE `postnames` SET `postname`='$nm',`icon`='$img' WHERE `id`='$cid' AND `active`='$active'");
  if ($sql > 0) {
    echo "<script>window.open('job-cat?update','_self')</script>";
  } else {
    echo "<script>alert('Server busy')</script>";
  }
}
//remove
if (isset($_POST['remove'])) {
  $sql = mysqli_query($db, "DELETE FROM `postnames` WHERE `id`='" . trim($_POST['did']) . "' AND `active`=2");
  if ($sql > 0) {
    echo "<script>window.open('job-cat?remove','_self')</script>";
  } else {
    echo "<script>alert('Server Busy')</script>";
  }
}
?>

<style>
  .btn_1 {
    border: none;
  }

  .btn_1:hover {
    background-color: #707cff;
  }
</style>
<div class="content-wrapper">
  <div class="container" style="padding-right:50px;">
    <section class="content-header">
      <h1><small style="font-style: uppercase"><a href=".\">
            << Back</a>
              < Job Tag</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Job Tag</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <?php if (isset($_GET['success'])) { ?>
            <div class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Add Success</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" onclick="window.open('job-cat','_self')"
                    data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php
          if (isset($_GET['update'])) { ?>
            <div class="box box-primary box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Updated Success</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" onclick="window.open('job-cat','_self')"
                    data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php
          if (isset($_GET['remove'])) { ?>
            <div class="box box-denger box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Removed Success</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" onclick="window.open('job-cat','_self')"
                    data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
            </div>
          <?php } ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Job Tag </h3>
            </div>
            <?php
            if (isset($_GET['id'])) {
              $sqlio = mysqli_query($db, "SELECT `id`, `postname`, `typ`, `icon`, `active` FROM `postnames` WHERE `id`='" . trim($_GET['id']) . "'");
              $rowx = mysqli_fetch_array($sqlio); ?>
              <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="catid" value="<?php echo $_GET['id']; ?>">
                <input type="hidden" name="admid" value="<?php echo $run['id']; ?>">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="type" name="name" class="form-control" id="formname" placeholder="Job Category"
                      value="<?php echo $rowx['postname'] ?>" required="required">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Icon</label>
                    <input type="file" name="icon" class="form-control" value="<?php echo $rowx['postname'] ?>"
                      required="required">
                  </div>
                </div>

                <div align="center">
                  <div class="box-footer">
                    <button type="submit" name="update" class="btn btn-primary btn_1">Update</button>
                    <button type="button" onclick="window.open('job-cat','_self');"
                      class="btn btn-secondary">Cancel</button>
                  </div>
                </div>
              </form>
            <?php } else { ?>
              <form method="post" action="#" enctype="multipart/form-data">
                <input type="hidden" name="admid" value="<?php echo $id; ?>">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="type" name="name" class="form-control" id="formname" placeholder="Job Category"
                      required="required">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Icon</label>
                    <input type="file" name="icon" class="form-control" id="formname" required="required">
                  </div>
                </div>
                <div align="left">
                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary btn_1">Submit</button>
                  </div>
                </div>
              </form>
            <?php } ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-primary" style="padding:20px">
            <div class="box-header with-border">
              <h3 class="box-title">Job Tag List</h3>
            </div>
            <!-- <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->
            <table id="example11" class="table table-fixedheader table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sno.</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php
                $i = 1;
                $sql = mysqli_query($db, "SELECT `id`, `postname`, `typ`, `icon`, `active` FROM `postnames` ORDER BY `id` DESC");
                while ($row = mysqli_fetch_array($sql)) { ?>
                  <tr>
                    <td>
                      <?php echo $i; ?>.
                    </td>
                    <td>
                      <b>
                        <?php echo ucwords($row['postname']); ?>
                      </b>
                    </td>
                    <td>
                      <img src="../assets/jobicons/<?php echo ($row['icon']); ?>" style="height: 40px;width: 40px;">
                    </td>
                    <td>
                      <a href="job-cat?id=<?php echo $row['id']; ?>" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
                    <td>
                      <form method="post" class="delete_form" action="#">
                        <input type="hidden" name="did" value="<?php echo $row['id']; ?>" />
                        <button type="submit" name="remove" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                  <?php $i++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
    </section>
  </div>
</div>

<?php include_once 'footer.php'; ?>