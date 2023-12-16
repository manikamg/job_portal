<?php 
include_once '../function.php';
 if(isset($_POST['Cid'])){
 	$i=1;
 $sql=sqlquery("SELECT `id`, `data_heading`, `adm`, `member`, `name`, `number`, `email`, `location`, `hedu`, `exp_type`, `exp`, `details`, `post_looking`, `comment`, `timedate`, `reply_date`, `wronno`, `norespons`, `show`, `finalstatus`, `rand` FROM `telli_calling` WHERE `rand`='".trim($_POST['Cid'])."'");?>
 <div class="table-responsive">
 	<table class="table table-bordered">
 	<tr><th>Sno.</th><th>Name</th><th>Location</th><th>Mobile</th><th>Email</th></tr>
     <?php while($runx=mysqli_fetch_array($sql)){?>
 	<tr><td><?php echo $i; ?>.</td><td><?php echo $runx['name'] ?></td><td><?php echo $runx['location'] ?></td><td><?php echo $runx['number'] ?></td><td><?php echo $runx['email'] ?></td></tr>
 <?php $i++;}?>
</table></div>
 <?php } ?>