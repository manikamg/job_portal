<?php
include_once 'head.php';
include_once 'menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small>New Job Post Category</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="./"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">New Job Post Category</li>
    </ol>
  </section>
  <div class="row">
    <div class="col-md-1 col-xs-12"></div>
    <div class="col-md-10 col-xs-12">
      <div class="box border-color" style="
      border-color: #707cff;
      ">
        <div class="box-header">
          <h3 class="box-title">Select Job Category</h3>
        </div>
        <div class="box-body">
          <div class="col-lg-12 col-xs-12">
            <?php $jobtyp = query("SELECT `id`, `name` FROM `jobtype` ORDER BY `timedate` ASC");
            while ($abc = mysqli_fetch_array($jobtyp)) { ?>
              <a
                href="new-job-step?<?php echo md5(uniqid()); ?>&<?php echo md5(uniqid()); ?>&type=<?php echo base64_encode($abc['id']); ?>&<?php echo md5(uniqid()); ?>&name=<?php echo base64_encode($abc['name']); ?>">
                <div class="col-lg-4 col-xs-6 ">
                  <div class="small-box card-purple-blue border-radius-7 small-box-footer" style="height:75px;">
                    <div class="inner">
                      <h4>
                        <?php echo ucwords($abc['name']); ?> <i class="fa fa-arrow-circle-right"></i>
                      </h4>
                    </div>
                  </div>
              </a>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-12 col-xs-12">
          <hr />
        </div>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
</div>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('postdetails')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<?php include_once 'footer.php'; ?>