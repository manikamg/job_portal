<?php
include_once 'head.php';
include_once 'menu.php';
$sql = mysqli_query($db, "SELECT  * FROM `candidate`");
while ($row = mysqli_fetch_array($sql)) {
  $array[] = $row;
}
if (isset($_POST['remove'])) {
  $sql = mysqli_query($db, "DELETE FROM `candidate` WHERE `id`='" . trim($_POST['did']) . "'");
  if ($sql > 0) {
    echo "<script>window.open('candidate-manage?remove','_self')</script>";
  }
  echo "<script>alert('Server Busy')</script>";
}
?>
<style>
  .btn_1{
    border: none;
    border-radius: 5px;
  }
  .btn_1:hover{
    background-color: #707cff;
  }
</style>
<div class="content-wrapper" style="padding:10px;">
  <section class="content-header">
    <h1><small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="#">candidate-manage</a></li>
    </ol>
  </section>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Candidate<small> Manage</small></h3>
          <div class="box-tools pull-right">

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
          <!-- <div class="alert alert-danger">
            <p>{{$message}}</p>
            </div>
            @endif  
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ucwords(Request::segment(2))}} List</h3>
                  <div class="box-tools pull-right">
                   <a href="{{ route('candidate.create')}}" class="btn btn-primary">Add New
                    </a>
                  </div>
                </div>  -->

          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Sno.</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Contact No.</th>
                <th>Email Id</th>
                <th>Address</th>
                <th>Active Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="myTable">
              <?php foreach ($array as $index => $row) { ?>
                <tr>
                  <td>
                    <?php echo $index + 1 ?>
                  </td>
                  <td><img src="../assets/candidate/<?php echo $row['pic']; ?>" alt="GHS" width="60px;" height="60px;">
                  </td>
                  <td><b>
                      <?php echo $row['name']; ?>
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
                    <?php echo $row['emailid']; ?>
                  </td>
                  <td>
                    <?php echo $row['address']; ?>
                  </td>
                  <td>
                    <?php echo date('d/M/Y', strtotime($row['datetime'])); ?>
                  </td>
                  <td>
                    <form method="post" class="delete_form" action="#">
                      <input type="hidden" name="did" value="<?php echo $row['id']; ?>">
                      <button type="buttton" name="remove" class="btn btn-primary btn_1"
                        onclick="return confirm('confirm to remove')">Active</button>
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
<!-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script> -->
<?php include_once 'footer.php'; ?>