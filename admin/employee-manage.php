<?php
include_once 'head.php';
include_once 'menu.php';
$sql = mysqli_query($db, "SELECT `id`, `admin`, `stfid`, `pic`, `name`, `contact`, `fname`, `mname`, `emailid`, `address`, `post`, `salary`, `pass`, `ip`, `datetime` FROM `employee`");
while ($row = mysqli_fetch_array($sql)) {
  $array[] = $row;
}
if (isset($_POST['remove'])) {
  $sql = mysqli_query($db, "DELETE FROM `employee` WHERE `id`='" . trim($_POST['did']) . "'");
  if ($sql > 0) {
    echo "<script>window.open('employee-manage?remove','_self')</script>";
  }
  echo "<script>alert('Server Busy')</script>";
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1><small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="#">employee-manage</a></li>
    </ol>
  </section>
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Employee<small> Manage</small></h3>
          <div class="box-tools pull-right">
            <button onclick="window.open('employee-add','_self');" type="button" class="btn btn-primary"
              data-widget="collapse">Add New
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (isset($_GET['remove'])) { ?>
            <div class="box box-danger box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Record Remove Success</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" onclick="window.open('candidate-manage','_self');"
                    data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <!-- /.box-tools -->
              </div>
            </div>
          <?php } ?>
          <table id="example1" class="table table-fixedheader table-bordered table-striped">
            <thead>
              <tr>
                <th><small>Sno.</small></th>
                <th><small>Photo</small></th>
                <th>Name</th>
                <th>Postion</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Contact No.</th>
                <th>Profile</th>
                <th>Edit</th>
                <th>Report</th>
                <th>Assign</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody id="myTable" style="height:400px">
              <?php foreach ($array as $index => $row) { ?>
                <tr>
                  <td>
                    <?php echo $index + 1 ?>
                  </td>
                  <td>

                    <?php if (empty($row['pic'])) { ?>
                      <img src="../assets/clients/1610802184.png" alt="GHS" width="60px;" height="60px;">
                    <?php } else { ?>
                      <img src="../assets/employee/<?php echo $row['pic']; ?>" alt="Employee" width="60px;" height="60px;">
                    <?php } ?>
                    
                  </td>
                  <td><b>
                      <?php echo $row['name']; ?>
                    </b></td>
                  <td><b>
                      <?php echo $row['post']; ?>
                    </b></td>
                  <td>
                    <?php echo $row['fname']; ?>
                  </td>
                  <td>
                    <?php echo $row['mname']; ?>
                  </td>
                  <td>
                    <?php echo $row['contact']; ?>
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary"><i class="fa fa-files-o"></i></a>
                  </td>
                  <td>
                    <a href="employee-edit?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i
                        class="fa fa-edit"></i></a>
                  </td>
                  <td>
                    <a href="employee-report?id=<?php echo $row['id']; ?>" class="btn btn-default">View</a>
                  </td>
                  <td>
                    <a href="employee-assign?id=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                  </td>
                  <td>
                    <form method="post" class="delete_form" action="#">
                      <input type="hidden" name="did" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="remove" class="btn btn-danger"
                        onclick="return confirm('confirm to remove')"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
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
<?php include_once 'footer.php'; ?>