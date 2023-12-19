<?php
include_once 'head.php';
include_once 'menu.php';
if (isset($_POST['submit'])) {
    $gpin = "JPAREA".$_POST['pin'];
    $adminid = mysqli_real_escape_string($db, $_POST['adminid']);
    $pin = mysqli_real_escape_string($db, $gpin);
    $areapin = mysqli_real_escape_string($db, $_POST['pin']);
    $area = mysqli_real_escape_string($db, $_POST['area']);
    $sql = mysqli_query($db, "INSERT INTO `pin`(`adminid`, `pin`, `areapin`, `area`) VALUES ('$adminid','$pin',$areapin, '$area')") or die(mysqli_error($db));

    if ($sql > 0) {
        echo "<script>window.open('generate-pin?success','_self')</script>";

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
    <div class="container" style="padding-right:50px;">
        <!-- Header title start here -->
        <section class="content-header">
            <h1>
                <small>
                    <a href="./">
                        << Back </a>
                            < Generate pin </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="./"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="#">Generate pin</a></li>
            </ol>
        </section>
        <!-- Header title ends here -->
        <!-- Form container starts here -->
        <div class="row">
            <?php if (isset($_GET['success'])) { ?>
                <div class="col-md-12 col-xs-12">
                    <div class="alert alert-success">
                        <p>Pin has been successfully generated.</p>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-6 col-xs-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Generate Pin</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" role="form" action="#">
                            <div class="form-group">
                                <label>Enter Pin</label>
                                <input type="hidden" class="form-control" name="adminid" value="<?php echo $id ?>"
                                    required="required">
                                <input type="text" class="form-control" name="pin" placeholder="Enter Here"
                                    required="required">
                            </div>
                            <div class="form-group">
                                <label>Enter Area</label>
                                <input type="hidden" class="form-control" name="adminid" value="<?php echo $id ?>"
                                    required="required">
                                <input type="text" class="form-control" name="area" placeholder="Enter Here"
                                    required="required">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" name="submit" id="submit"
                                    class="btn btn-primary btn_1">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- Form container ebds here -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>