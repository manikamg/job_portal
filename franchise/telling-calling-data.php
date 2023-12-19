<?php  
 include_once '../layouts/heade_design.php';
 include_once 'head.php';
 if(isset($_POST["submit"])){
  $head   = input_validate($_POST['heading']); 
  $rnd    = md5(uniqid());
  $filename=$_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0){
       $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
            $sql = "INSERT INTO `telli_calling`(`data_heading`,`member`, `name`, `number`,`email`,`location`,`rand`) values('$head','$id','".$emapData[0]."','".$emapData[2]."','".$emapData[3]."','".$emapData[1]."','$rnd')";
             $result = mysqli_query($db, $sql);
        if($result>0){
          echo "<script>window.open('upload-data?success','_self')</script>";
         }else {
            $error = "Error: Please Upload only CSV File";
          } 
           }
          fclose($file);  
     }
  }   
 ?>
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
        </div>
      <?php }?>
        <div class="col-md-12"> 
          <div class="box">
            <div class="box-body table-responsive">
              <div class="box box-solid">
<div class="box-header with-border"><h3 class="box-title">Telling Calling Data Manage</h3></div> <div class="box-body"><div class="box-group" id="accordion"><div class="col-md-12">
  <table id="example1" class="table table-bordered table-striped">
  <thead><tr><th>Sno.</th><th>Update Date</th><th>Total Contact</th><th>View</th></tr></thead><tbody>
  <?php $i=1; 
  $apply=sqlquery("SELECT COUNT(`id`) AS `tid`, `adm`, `member`, `name`, `number`, `location`, `hedu`, `exp_type`, `exp`, `details`, `post_looking`, `comment`, `timedate`, `reply_date`, `wronno`, `norespons`, `show`, `finalstatus`,`rand` FROM `telli_calling` WHERE `member`='$id' GROUP BY `rand`");
  while($ab=mysqli_fetch_array($apply)){ ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><b style="color: red;"><?php echo date('d-m-Y',strtotime($ab["timedate"]));?></td>
  <td><?php echo $ab['tid']; ?></td>
  <td><input type="button" name="view" value="view" id="<?php echo $ab["rand"]; ?>" class="btn btn-default view_data" /></td></tr>
  <?php $i++;}?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
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