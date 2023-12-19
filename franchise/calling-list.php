<?php 
 include_once '../layouts/heade_design.php';
 include_once 'head.php';
 $apply=sqlquery("SELECT `id` FROM `aplied_job` WHERE `applicantid`='".$id."'");
 $ab=mysqli_num_rows($apply); 
 if(isset($_POST['noresponse_success'])){
  $sql=sqlquery("UPDATE `telli_calling` SET `norespons`=1,`show`=2 WHERE `id`='".trim($_POST['noresponse'])."'");
  if($sql>0){
    echo "<script>alert('No Response Add')</script><meta http-equiv='refresh' content='0'/>";
  }else{
    echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
}
if(isset($_POST['wrongno_success'])){
  $sql=sqlquery("UPDATE `telli_calling` SET `wronno`=1,`show`=2 WHERE `id`='".trim($_POST['wrongno'])."'");
  if($sql>0){
    echo "<script>alert('Wrong Number Add')</script><meta http-equiv='refresh' content='0'/>";
  }else{
    echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
}
if(isset($_POST['calling_submit'])){
  $sql=sqlquery("UPDATE `telli_calling` SET `name`='".mysqli_real_escape_string($db,$_POST['post'])."',`location`='".mysqli_real_escape_string($db,$_POST['location'])."',`hedu`='".mysqli_real_escape_string($db,$_POST['high_edu'])."',`exp_type`='".mysqli_real_escape_string($db,$_POST['exp'])."',`exp`='".mysqli_real_escape_string($db,$_POST['total_exp'])."',`details`='".mysqli_real_escape_string($db,$_POST['details'])."',`comment`='".mysqli_real_escape_string($db,$_POST['comment'])."',`reply_date`='".time()."',`show`=2,`finalstatus`=1 WHERE `id`='".trim($_POST['postid'])."'")or die(mysqli_error($db));
  if($sql>0){
    echo "<script>alert('Data Submited Successfully')</script><meta http-equiv='refresh' content='0'/>";
  }else{
    echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
}?>
  <div class="content-wrapper">
    <section class="content-header">
     <h1><small><a href="calling-manage"><span class="label label-default"><< Back</a></span></small></h1>
    </section> 
    <?php if(!isset($_GET['id'])){?>
    <section class="content">
      <div class="row">
        <?php $apply=sqlquery("SELECT * FROM `telli_calling` WHERE `wronno`=0 AND `norespons`=0 AND `show`=1 AND `finalstatus`=0 GROUP BY `rand`");
        while($ab=mysqli_fetch_array($apply)){ ?>
        <a href="calling-list?<?php echo md5(uniqid()); ?>&<?php echo md5(uniqid()); ?>&id=<?php echo $ab['rand']; ?>&<?php echo md5(uniqid()); ?>"><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-map-signs"></i></span>
           <div class="info-box-content">
              <span class="info-box-text"><?php echo date('d-M-Y',strtotime($ab['timedate'])); ?></span> 
              <span class="info-box-number"><?php echo tellicalling_data($ab['rand']); ?></span>
            </div>
          </div>  
        </div></a>
      <?php }?>
      </div>
    </section>
  <?php }else{?>
        <div class="col-md-12"> 
          <div class="box">
            <div class="box-body table-responsive">
              <div class="box box-solid">
        <div class="box-header with-border"><small><a href="calling-list"><< Back</a></small>
          <h3 class="box-title">Calling List</h3></div>
            <div class="box-body">
              <div class="box-group" id="accordion">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr><th>Name</th><th>Call</th><th>Response</th></tr>
                </thead>
                <tbody>
<?php $apply=sqlquery("SELECT `id`, `adm`, `member`, `name`, `number`, `location`, `hedu`, `exp`, `details`, `post_looking`, `comment`, `timedate`, `show`, `finalstatus` FROM `telli_calling` WHERE `wronno`=0 AND `norespons`=0 AND `show`=1 AND `finalstatus`=0 AND `rand`='".trim($_GET['id'])."'");
        while($ab=mysqli_fetch_array($apply)){ ?>
  <tr><td><h5><b style="color: red;"><?php echo ucwords(($ab["name"]));?></b></h5></td><td><i class="fa fa-mobile fa-1x" aria-hidden="true"></i> <?php echo '<a href="tel:'.$ab["number"].'">'.$ab["number"].'</a>';?></td>
  <td><a href="#myModal" class="btn btn-primary" data-toggle="modal" data-code="<?php echo $ab['id']; ?>" data-company="<?php echo $ab['name']; ?>" style="width:100px;">Add Data</a>
       <form method="post">
        <input type="hidden" value="<?php echo $ab['id'] ?>" name="noresponse">
        <button type="submit" name="noresponse_success" class="btn btn-warning" style="width:100px;">No Response</button>
      </form>
       <form method="post">
        <input type="hidden" value="<?php echo $ab['id'] ?>" name="wrongno">
        <button type="submit" name="wrongno_success" class="btn btn-default" style="width:100px;">Wrong no.</button>
      </form>
    </td></tr>
<?php $i++;}?>
</tbody>
              </table>
              </div>
            </div>
           </div>
         </div>
       </div>
     </div>
   <?php }?>
</section>
</div>
<script type="text/javascript">
  $(function () {
  $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var code = button.data('code'); // Extract info from data-* attributes
    var company = button.data('company'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    var modal = $(this);
    modal.find('#code').val(code);
    modal.find('#company').val(company);
  });
});
</script>
<div class="modal fade bs-example-modal-sm" tabindex="-1" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="mySmallModalLabel">Fill Details</h4>
      </div>
      <div class="modal-body">
        <form method="post">
        <input type="hidden" name="postid" id="code" readonly /><br/>
        <label>Post For <b style="color: red;"> * </b></label><br/>
         <input type="text" id="post" name="post" placeholder="enter here" class="form-control" style="min-width:120px;" required="required"><br/>
        <label>Location</label><br/>
        <input type="text" id="location" name="location" placeholder="enter here" class="form-control" style="min-width:120px;"><br/>
        <label>Highest Qual. <b style="color: red;"> * </b></label><br/>
        <input type="text" id="high_edu" name="high_edu" placeholder="enter here" class="form-control" style="min-width:120px;" required="required"><br/>
        <label>Exp. Type</label><br/>
        <input type="radio" name="exp" checked="checked">No Exp.
        <input type="radio" name="exp">Total Exp.
        <br/>
         <label>Total Exp.</label><br/>
         <input type="text" id="total_exp" name="total_exp" placeholder="enter here" class="form-control" style="min-width:120px;"><br/>
          <label>Details</label><br/>
          <textarea id="details" name="details" placeholder="enter here" class="form-control" style="min-width:120px;"></textarea><br/>
          <label>Comment</label><br/>
         <input type="text" id="comment" name="comment" placeholder="enter here" class="form-control" style="min-width:120px;">
         <hr/>
         <div align="center">
          <input type="checkbox" name="checked" required="required"> Recheck Before Submit<br/>
          <button type="submit" class="btn btn-primary" name="calling_submit">Submit</button></div>
       </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<?php include_once 'footer.php'; ?>