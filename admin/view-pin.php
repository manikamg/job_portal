<?php
include_once 'head.php';
include_once 'menu.php';
$sql = mysqli_query($db, "SELECT * FROM `pin` WHERE `adminid`='" . trim($id) . "'");
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
                    <a href="./"> << Back </a>
                    < View pin </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="./"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li><a href="#">View pin</a></li>
            </ol>
        </section>
        <!-- Header title ends here -->
        <!-- Pin listing starts here -->
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="box box-warning" style="border-color:purple">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pin<small> Manage</small></h3>
                    </div>
                    <div class="table table-responsive">
                        <table class="table table-fixedheader table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Pin</th>
                                    <th>Area Code</th>
                                    <th>Area</th>
                                    <th>Assign</th>
                                    <th>Pay Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $i = 1;
                                while ($rrr = mysqli_fetch_array($sql)) { ?>

                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $rrr['pin']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rrr['areapin']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rrr['area']; ?>
                                        </td>
                                        <td>
                                            <?php if ($rrr['asigndate'] === NULL) {
                                                echo "Not yet";
                                            } else {
                                                echo $rrr['asigndate'];
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($rrr['paystatus'] === "0") {
                                                echo "Not yet";
                                            } else {
                                                echo $rrr['paystatus'];
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($rrr['status'] === 0) {
                                                echo "Inactive";
                                            } else {
                                                echo "Active";
                                            } ?>
                                        </td>
                                        <td>
                                            <a href="#"class="btn btn-primary btn_1">Assign to</a>
                                        </td>
                                    </tr>

                                    <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pin listing ends here -->
    </div>
</div>
<?php include_once 'footer.php'; ?>