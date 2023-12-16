<?php  
 include_once '../layouts/heade_design.php';
 include_once 'head.php';?>
  <div class="content-wrapper">
    <section class="content-header">
     <h1><small><a href="calling-manage"><span class="label label-default"><< Back</a></span></small></h1>
      <section class="">
        <?php if(isset($_GET['success'])){?>
          <div class="col-md-3">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Alert</h3>
     <div class="box-tools pull-right">
              <button type="button" onclick="window.open('upload-data','_self')" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body"> Data Upload Successfully </div>
          </div>
        </div><?php }?> 
        <?php if(!isset($_GET['id'])){?>
    <section class="content">
      <div class="row">
        <?php $apply=sqlquery("SELECT * FROM `telli_calling` WHERE `wronno`=0 AND `norespons`=0 AND `show`=1 AND `finalstatus`=0 GROUP BY `rand`");
        while($ab=mysqli_fetch_array($apply)){ ?>
        <a href="telling-calling-list-lead?<?php echo md5(uniqid()); ?>&<?php echo md5(uniqid()); ?>&id=<?php echo $ab['rand']; ?>&<?php echo md5(uniqid()); ?>"><div class="col-md-3 col-sm-6 col-xs-12">
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
<div class="box-header with-border"><a href="telling-calling-list-lead"><< Back</a><h3 class="box-title">Telling Calling Data Manage</h3></div> <div class="box-body"><div class="box-group" id="accordion">
  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr><th>Status</th><th>Name</th><th>Location</th><th>H Edu.</th><th>Exp<br/>Details</th><th>View</th></tr>
                </thead>
                <tbody>
<?php $apply=sqlquery("SELECT `id`, `adm`, `member`, `name`, `number`, `location`, `hedu`, `exp_type`, `exp`, `details`, `post_looking`, `comment`, `timedate`, `reply_date`, `wronno`, `norespons`, `show`, `finalstatus` FROM `telli_calling` WHERE `member`='$id' AND `wronno`=0 AND `norespons`=0 AND `show`=2 AND `rand`='".trim($_GET['id'])."'"); while($ab=mysqli_fetch_array($apply)){ ?>
  <tr>
    <td><?php if($ab['wronno']==0 && $ab['norespons']==0){ echo '<span class="label label-warning">Selected</span>'; }elseif($ab['finalstatus']==0){ echo '<span class="label label-danger">Wrong No.</span>'; }?></td>
    <td><b style="color: red;"><?php echo ucwords(($ab["name"]));?></b>(<i class="fa fa-mobile fa-1x" aria-hidden="true"></i> <?php echo '<a href="tel:'.$ab["number"].'">'.$ab["number"].'</a>';?>)</td>
    <td><?php echo $ab['location']; ?></td>
    <td><?php echo $ab['hedu']; ?></td><td><?php echo $ab['exp']; ?><br/><?php echo $ab['exp_type']; ?></td>
    <td><input type="button" name="view" value="view" id="<?php echo $ab["id"]; ?>" class="btn btn-default view_data" /></td></tr>
<?php $i++;}?></tbody></table></div></div></div></div></div><?php }?></section></div>
<div id="dataModal" class="modal fade"><div class="modal-dialog">  <div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Details</h4></div><div class="modal-body" id="employee_detail"></div>  
<div class="modal-footer">  
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div>  
</div>   
</div>  
</div>  
<script>    
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var call_id = $(this).attr("id");  
           $.ajax({  
                url:"telling-calling-list.php",  
                method:"post",  
                data:{Cid:call_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
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
</script><?php include_once 'footer.php'; ?>