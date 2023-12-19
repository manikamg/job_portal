<?php include_once '../layouts/heade_design.php'; include_once 'head.php'; ?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="content-wrapper"><section class="content-header"><h1><small><a href="dashboard"><< Back</a></small></h1></section><section class="content">
    	<div align="left"><legend>Interview List Data</legend></div>
        <div class="col-md-3">
          <script type="text/javascript">
            function getdate(id){
             window.open('interview-list?date='+id,'_self');
            }
          </script>
 	 <div class="box">
        <div class="box box-solid">
           <div class="box-header with-border">
             <label>Select Date</label> : <select onchange="getdate(this.value)">
              <?php if(empty($_GET['date'])){ ?><option>Select</option><?php }else{?>
                <option value="<?php echo $_GET['date']; ?>"><?php echo date('d-m-Y',strtotime($_GET['date'])); ?></option><?php }?>
              <?php $idate=printwhileloop("SELECT `timdate` FROM `interview` WHERE `compid`='$id' GROUP BY date(`timdate`)");
                  foreach ($idate as $key => $idatedata) { ?>
                    <option value="<?php echo date('d-m-Y',strtotime($idatedata[0]));  ?>"> <?php echo date('d-m-Y',strtotime($idatedata[0])); ?></option>
           <?php }?>
           </select>
            </div>
            <?php if(!empty($_GET['date'])){ ?>
            <div class="box-header with-border"><h3 class="box-title">Select Job</h3>
            </div>
            <div class="box-body no-padding"><ul>
                	<?php $tpex=printwhileloop("SELECT `id`,`postid` FROM `interview` WHERE `compid`='$id'");
                	foreach ($tpex as $key => $xyzux) { ?>
                    <li><button style="width: 100%" onclick="window.open('interview-list?date=<?php echo $_GET['date']; ?>&job=<?php echo $xyzux[0]; ?>','_self');" class="btn btn-primary bg-navy btn-flat"><?php echo ucwords(postName($xyzux[1])); ?></button></li>
                	<?php }?></ul>
            </div>
          <?php }?>
          </div>
        </div>
   </div>
 <div class="col-md-9">
 	 <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr><th><small>Select</small></th>
<th><small>Name</small></th>
<th><small>HQ</small></th>
<th><small>Interested Job</small></th>
<th><small>Contact</small></th>
<th><small>Photo</small></th>
<th><small>Resume</small></th>
<th><small>View</small></th>
<th><small>Remove</small></th></tr>
                </thead>
                 <tbody> 
              <?php
              $i=1;
             $rdataxcio=query("SELECT `candidateid` FROM `interview` WHERE `id`='".trim($_GET['job'])."'");
             $gcnd=mysqli_fetch_array($rdataxcio);
             $gcndimp=explode(",", $gcnd['candidateid']);
             foreach ($gcndimp as $key => $valaqweuexrty) {
             $cansql=query("SELECT `id`, `admin`, `stfid`, `jobtyp`, `indust`, `name`, `middle`, `last`, `contact`, `emailid`, `fname`, `mname`, `hq`, `pic`, `resume`, `address`, `pass`, `status`, `regiprice`, `regi_status`, `sread`, `ip`, `datetime` FROM `candidate` WHERE `id`='".$valaqweuexrty."'");
             $runcansql=mysqli_fetch_array($cansql);
              ?>
                <tr>
              <td style="text-align: center;background-color:#F4EFEF;"><input type="checkbox" name="interview[]"></td>
              <td><?php echo ucwords($runcansql['name']); ?></td>
              <td><small><?php echo ucwords(HighestQualification($runcansql['hq'])); ?></small></td>
              <td><ul><?php $jloi=explode(",",$runcansql['jobtyp']);
              foreach ($jloi as $key => $valuexrty) {
              echo '<li>'.ucwords(getJobIdToJobtypName($valuexrty)).'</li>';
              } ?></ul></td>
              <td><a href="tel:<?php echo ($runcansql['contact']); ?>" target="_self"><?php echo ($runcansql['contact']); ?></a></td>          
              <td><?php  if(!empty(($runcansql['pic']))){ ?><img src="../assets/candidate/<?php echo (($runcansql['pic'])); ?>" style="height: 60px;width: 60px;" /><?php } ?></td>
              <td><?php  if(!empty(($runcansql['resume']))){ ?><a href="../assets/candidate/<?php echo $runcansql['resume']; ?>" target="_blank"><img src="../assets/general/download.png" style="height:30px;width:30px;" /></a><?php }else{?>No<?php }?></td>
              <td style="width: 60px;">
              <button type="button" name="view"  id="<?php echo $runcansql['id']; ?>" class="btn btn-default view_data" style=width:100%; >View</button></td>
              <td style="width: 60px;">
              <form method="post">
              <input type="hidden" name="rid" value="<?php echo $runcansql['id']; ?>">
              <button type="submit" name="remove" onclick="return confirm('Confirm To Remove')"  class="btn btn-danger" style=width:100%; ><i class="fa fa-trash"></i></button></form></td>
                </tr>
    <?php  $i++;} ?>
            </tbody>
        </table>
    </div>
 </div>
</section>
</div></div>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Candidate Details</h4>  
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