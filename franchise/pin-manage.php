<?php
include_once 'head.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small>
        <a href="dashboard">
          <span class="label label-default">
            << Back </span>
        </a>
      </small>
    </h1>
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pin Manage</h3>
            </div>
            <div class="box-body">
              <div class="table table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sno.</th>
                      <th>Pin</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Share</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $pinlist = query("SELECT * FROM `pin` WHERE `staffid`='$id'");
                    while ($runpost = mysqli_fetch_array($pinlist)) { ?>
                      <tr>
                        <td>
                          <?php echo $i; ?>.
                        </td>

                        <td>
                          <?php echo $runpost['pin'] ?>
                        </td>

                        <td>
                          <?php if ($runpost['status'] === "1") {
                            echo "Active";
                          } else {
                            echo "Inactive";
                          } ?>
                        </td>

                        <td>
                          <?php echo $runpost['assigndate'] ?>
                        </td>

                        <td>
                          <button onclick="window.open('#','_blank')" class="btn btn-default" style=width:70%;><i
                              class="fa fa-share"></i></button>
                        </td>
                      </tr>

                      <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
</div>
<?php include_once 'footer.php'; ?>