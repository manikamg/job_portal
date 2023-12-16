<?php
include_once 'head.php';
include_once 'menu.php';
$sql = mysqli_query($db, "SELECT `id`, `admin`, `stfid`, `pic`, `name`, `mng_name`, `contact`, `mobile_two`, `emailid`, `email_two`, `address`, `farmname`, `farmno`, `about`, `logo`, `agreement`, `other`, `loginid`, `pass`, `status`, `ip`, `datetime` FROM `client` WHERE `admin`='" . trim($_GET['id']) . "'");
if (isset($_POST['remove'])) {
  $sql = mysqli_query($db, "DELETE FROM `client` WHERE `id`='" . trim($_POST['did']) . "'");
  if ($sql > 0) {
    echo "<script>window.open('client-manage?remove','_self')</script>";
  }
  echo "<script>alert('Server Busy')</script>";
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
  <div class="container" style="padding-right:50px">
    <section class="content-header">
      <h1><small><a href="dashboard?id=<?php echo trim($_GET['id']); ?>">
            << Back</a>
              < Client Manage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">client-manage</a></li>
      </ol>
    </section>
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="box box-warning" style="border-color:purple">
          <div class="box-header with-border">
            <h3 class="box-title">Client<small> Manage</small></h3>
          </div>
          <div class="box-body">
            <?php if (isset($_GET['remove'])) { ?>
              <div class="box box-danger box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Record Remove Success</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" onclick="window.open('candidate-manage','_self');"
                      data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="table table-responsive">
              <table id="example1" class="table table-fixedheader table-bordered table-striped">
                <thead>
                  <tr>
                    <th><small>Sno.</small></th>
                    <th><small>Photo</small></th>
                    <th>Name</th>
                    <th>Farm RNo.</th>
                    <th>Contact No.</th>
                    <th>Status</th>
                    <th>Login ID</th>
                    <th>Password</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody id="myTable" style="height:400px">
                  <?php
                  $i = 1;
                  while ($rrr = mysqli_fetch_array($sql)) { ?>
                    <tr>
                      <td>
                        <?php echo $i; ?>
                      </td>
                      <td>
                        <?php if (empty($row['pic'])) { ?>
                          <img src="../assets/clients/1610802184.png" alt="GHS" width="60px;" height="60px;">
                        <?php } else { ?>
                          <img src="../assets/clients/<?php echo $rrr['pic']; ?>" alt="No Pic" width="60px;" height="60px;">
                        <?php } ?>

                      </td>
                      <td><b>
                          <?php echo $rrr['farmname']; ?>
                        </b><br />
                        <?php echo $rrr['name']; ?>
                      </td>
                      <td>
                        <?php echo $rrr['farmno']; ?>
                      </td>
                      <td>
                        <?php echo $rrr['contact']; ?>
                      </td>
                      <td><a href="#" class="btn btn-primary btn_1">
                          <?php echo ucwords($rrr['status']); ?>
                        </a></td>
                      <td>
                        <?php echo $rrr['loginid'] ?>
                      </td>
                      <td>
                        <?php echo $rrr['pass'] ?>
                      </td>
                      <td>
                        <form method="post" class="delete_form" action="#">
                          <input type="hidden" name="did" value="<?php echo $rrr['id']; ?>">
                          <button type="submit" name="remove" class="btn btn-danger"
                            onclick="return confirm('confirm to remove')"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    <?php $i++;
                  } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        </section>
      </div>
      <script>
        $(document).ready(function () {
          $('.delete_form').on('submit', function () {
            if (confirm("Are you sure you want to delete it?")) {
              return true;
            }
            else {
              return false;
            }
          });
        });
      </script>
    </div>
  </div>
</div>
</div>
<?php include_once 'footer.php'; ?>