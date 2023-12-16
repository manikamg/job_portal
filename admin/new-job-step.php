<?php
include_once 'head.php';
include_once 'menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small>New Job Post Tag</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="./"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">New Job Post Tag </li>
    </ol>
  </section>
  <a href="new-job">
    << Back</a>
      <div class="row">
        <div class="col-md-1 col-xs-12"></div>
        <div class="col-md-10 col-xs-12">
          <div class="box box-danger" style="
      border-color: #707cff;
      ">
            <div class="box-header">
              <h3 class="box-title">
                <?php echo base64_decode(trim($_GET['name'])); ?> <i class="fa fa-arrow-circle-right"></i> Select Job
                Tag
              </h3>
            </div>
            <div class="box-body">
              <div class="col-lg-12 col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $jobtypx = query("SELECT `id`,`postname`, `typ`, `icon`, `active` FROM `postnames` GROUP BY `postname` ORDER BY `id` DESC");
                    while ($abcx = mysqli_fetch_array($jobtypx)) { ?>
                      <tr>
                        <td>
                          <div><a
                              href="new-job-post?<?php echo (md5(uniqid())); ?>&type=<?php echo trim($_GET['type']); ?>&typen=<?php echo trim($_GET['name']); ?>&tag=<?php echo base64_encode($abcx['id']); ?>&tagn=<?php echo base64_encode($abcx['postname']); ?>">
                              <div class="col-lg-12 col-xs-6" style="width: 50%;">
                                <div class="small-box card-purple-blue border-radius-7" align="center">
                                  <div class="inner small-box-footer">
                                    <h5>
                                      <?php echo ucwords($abcx['postname']); ?>
                                    </h5>
                                  </div>
                                </div>
                            </a></div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
<script>
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
</script>
<script>
  $(function () {
    CKEDITOR.replace('postdetails')
    $('.textarea').wysihtml5()
  })
</script>
<?php include_once 'footer.php'; ?>