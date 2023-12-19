<?php
 include_once '../layouts/heade_design.php';
 include_once 'head.php';
  if(isset($_POST['remove'])){
    $sql=query("DELETE FROM `candidate` WHERE `id`='".trim($_POST['rid'])."'");
    if($sql>0){
      echo "<script>window.open('manage-candidate?remove','_self')</script>";
    }else{
    echo "<script>alert('Server Busy')</script><meta http-equiv='refresh' content='0'/>";
    }
  }
?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><div class="content-wrapper"><section class="content-header"><h1><small><a href="dashboard"><< Back</a></small></h1></section><?php if(isset($_GET['remove'])){?> <div align="center"><div class="col-md-6"></div><div class="col-md-3"><div class="box box-danger box-solid"><div class="box-header with-border">
<h3 class="box-title">Alert</h3><div class="box-tools pull-right">
<button type="button" onclick="window.open('manage-candidate','_self')" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button></div></div><div class="box-body">Remove Successfully</div>
</div><div class="col-md-3"></div></div><?php }?>
 <div class="row"><?php if(isset($_GET['status'])){?>
<div class="col-md-4 col-xs-12"></div>
<div class="col-md-3 col-xs-12">
<div class="box box-warning">
<div class="box-header with-border">
<h3 class="box-title">Alert</h3>
<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="remove" onclick="window.open('new-application-details?jid=<?php echo $_GET['jid']; ?>','_self')"><i class="fa fa-times"></i></button>
</div></div><div class="box-body btn-danger" style="text-align: center;">
<?php echo strtoupper($_GET['status']); ?> Successfully</div></div></div><?php }?>
<div class="col-md-12">
<div class="box">
<div class="box-body"><div class="table-responsive">
<table id="example1" class="table table-bordered">
<thead>
<tr>
<th><small>Sno.</small></th>
<th><small>Join</small></th>
<th><small>Name</small></th>
<th><small>HQ</small></th>
<th><small>Interested Job</small></th>
<th><small>Contact</small></th>
<th><small>Photo</small></th>
<th><small>Resume</small></th>
<th><small>View</small></th>
<th><small>Remove</small></th>
</tr>
</thead>
<tbody>
<?php
$i=1;  
$canjobidxx=printwhileloop("SELECT * FROM `candidate` WHERE `admin`='$id' ORDER BY `datetime` DESC");
foreach ($canjobidxx as $key => $canjobid) { ?>
<tr><td><?php echo $i; ?>.</td>
  <td><?php echo dateFormate($canjobid[23]); ?></td>
<td><?php echo ucwords($canjobid[6]); ?></td>
<td><small><?php echo ucwords(HighestQualification($canjobid[13])); ?></small></td>
<td><ul><?php $jl=explode(",",$canjobid[3]);
         foreach ($jl as $key => $value) {
              echo '<li>'.ucwords(IndustiesName($value)).'</li>';
          } ?></ul></td>
<td><a href="tel:<?php echo ($canjobid[9]); ?>" target="_self"><?php echo ($canjobid[9]); ?></a><br/><a href="mailto:<?php echo ($canjobid[10]); ?>" target="_self"><?php echo ($canjobid[10]); ?></a></td>          
<td><?php  if(!empty(($canjobid[14]))){ ?><img src="../assets/candidate/<?php echo (($canjobid[14])); ?>" style="height: 60px;width: 60px;" /><?php } ?></td>
<td><?php  if(!empty(($canjobid[15]))){ ?><a href="../assets/candidate/<?php echo $canjobid[15]; ?>" target="_blank"><img src="../assets/general/download.png" style="height:30px;width:30px;" /></a><?php }else{?>No<?php }?></td>
<td style="width: 60px;">
  <button type="button" name="view"  id="<?php echo $canjobid[0]; ?>" class="btn btn-default view_data" style=width:100%; >View</button></td>
<td style="width: 60px;">
  <form method="post">
    <input type="hidden" name="rid" value="<?php echo $canjobid[0]; ?>">
  <button type="submit" name="remove" onclick="return confirm('Confirm To Remove')"  class="btn btn-danger" style=width:100%; ><i class="fa fa-trash"></i></button></form></td>
</tr>
<?php $i++;}?>
</tbody>
</table>    
</div></div>
</div>
</div>
</div>
</div>
</div>
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

<script type="text/javascript">
$(document).ready(function(){  
      $('.view_data').click(function(){  
           var call_id = $(this).attr("id");  
           $.ajax({  
                url:"candidate.php",  
                method:"post",  
                data:{post_id:call_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
</script><?php  include_once 'footer.php'; ?>