<?php
include_once 'head.php';

if (isset($_POST['post_pin_request'])) {
  $staffid = mysqli_real_escape_string($db, $_POST['staff_id']);
  $staffname = mysqli_real_escape_string($db, $_POST['staff_name']);
  $quantity = mysqli_real_escape_string($db, $_POST['qnty']);
  $requestdate = mysqli_real_escape_string($db, $_POST['request_date']);
  $amount = mysqli_real_escape_string($db, $_POST['amount']);

  // Attempt insert query execution
  $sql = "INSERT INTO purchase_pin (staffid, staffname,  quantity,  requestdate, amount) VALUES ($staffid, '$staffname',  '$quantity', '$requestdate', '$amount' )";
  if (mysqli_query($db, $sql)) {
    echo "<script>window.open('pin-purchase?success','_self')</script>";
  } else {
    echo "<script>alert('Failed Server Is Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1><small><a href="dashboard"><span class="label label-default">
            << Back</a>
          </span></small></h1>
    <section class="content">

      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box-body">
            <form role="form" enctype="multipart/form-data" method="post"
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="col-md-9 col-xs-12">
                <?php if (isset($_GET['success'])) { ?>
                  <div class="box box-success box-solid">
                    <div class="box-header with-border">
                      <div align="center">
                        <h3 class="box-title">Pin Purchased Successfully</h3>
                      </div>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" onclick="window.open('dashboard?new-job','_self')"
                          data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <div class="box box-danger">
                  <div class="box-header">
                    <h3 class="box-title">Pin Purchase Area</h3>
                  </div>
                  <script>
                    function myFunction() {
                      var x = document.getElementById("myDIV");
                      var y = document.getElementById("DivFull");
                      if (x.style.display === "none") {
                        x.style.display = "block";
                        y.style.display = "none";
                      } else {
                        y.style.display = "block";
                        x.style.display = "none";
                      }
                    }
                  </script>
                  <div class="box-body">
                    <div class="form-group">


                      <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                          <label>Pin Qty</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-circle-o text-red"></i>
                            </div>
                            <input type="hidden" value="<?php echo $runs['name']; ?>" name="staff_name"
                              required="required">
                            <input type="hidden" value="<?php echo $id; ?>" name="staff_id" required="required">
                            <input type="number" placeholder="Pin Qty" maxlength="95" class="form-control" name="qnty"
                              required="required">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                          <label>Request Date</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-circle-o text-red"></i>
                            </div>
                            <input type="date" placeholder="Number of Post" value="<?php echo date('Y-m-d'); ?>"
                              class="form-control" name="request_date" required="required">
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-12 col-md-6">

                      </div>
                      <div class="form-group">
                        <label>Total amount</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-doller"></i>
                          </div>
                          <input type="text" maxlength="10" pattern="[0-9]+" placeholder="total amount"
                            class="form-control" name="amount">
                        </div>
                        <br />
                        <input type="checkbox" name="recheck" required="required">
                        <note>Recheck Before Submit</note>
                        <div align="center">
                          <br />
                          <button type="submit" name="post_pin_request" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
            </form>
          </div>
        </div>
      </div>
</div>
<div class="col-md-3 col-xs-12">
  <div class="box box-solid">
    <div class="box-header with-border">
      <i class="fa fa-text-width"></i>

      <h3 class="box-title">Important</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <blockquote>
        <small>
          <ul>
            <li>Buy Minmum 20 Pin</li>
            <li>Pin Purchase And order will reflect on 24 hr</li>
          </ul>
        </small>
      </blockquote>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>
</div>
</div>
</div>
</section>
<script> $(function () {
    CKEDITOR.replace('postdetails')
    $('.textarea').wysihtml5()
  })</script>
<script> $(function () { $('.select2').select2() }) </script>
<?php include_once 'footer.php'; ?>