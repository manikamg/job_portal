<?php
include_once 'head.php';
include_once 'menu.php';
$sql = mysqli_query($db, "SELECT * FROM `assign_to_emp` WHERE `empid`='" . trim($_GET['id']) . "'");
while ($row = mysqli_fetch_array($sql)) {
  $array[] = $row;
}
if (isset($_POST['remove'])) {
  $sql = mysqli_query($db, "DELETE FROM `assign_to_emp` WHERE `id`='" . trim($_POST['did']) . "'");
  if ($sql > 0) {
    echo "<script>window.open('employee-report?remove','_self')</script>";
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
      <li><a href="#">employee Report</a></li>
    </ol>
  </section>
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Report<small> Manage</small></h3>

          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (isset($_GET['remove'])) { ?>
            <div class="box box-danger box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Record Remove Success</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" onclick="window.open('employee-manage','_self');"
                    data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <!-- /.box-tools -->
              </div>
            </div>
          <?php } ?>
          <table id="" class="table table-fixedheader table-bordered table-striped">
            <thead>
              <tr>
                <th><small>Sno.</small></th>
                <th><small>Company Name</small></th>
                <th>Owner/Manager Name</th>
                <th>CRC</th>
                <th>Assign Date</th>
                <th>Status</th>
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
                    <?php echo companyname($row['compid']); ?>
                  </td>
                  <td><b>
                      <?php echo companyOwner($row['compid']); ?>
                    </b></td>
                  <td><b>
                      <?php echo strtoupper(companynameRgno($row['compid'])); ?>
                    </b></td>
                  <td>
                    <?php echo date('d/M/Y', strtotime($row['timedate'])); ?>
                  </td>
                  <td>

                    <?php if ($row['status'] == 'yes') {
                      echo '<span class="pull-right badge bg-green">Active</span>';
                    } elseif ($row['status'] == 'no') {
                      echo '<span class="pull-right badge bg-red">Deactive</span>';
                    } ?>
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