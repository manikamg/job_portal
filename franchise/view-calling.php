 <?php 
include_once '../function.php';
 if(isset($_POST['employee_id'])){
 $sql=sqlquery("SELECT `id`, `adm`, `member`, `name`, `number`, `location`, `hedu`, `exp_type`, `exp`, `details`, `post_looking`, `comment`, `timedate`, `reply_date`, `wronno`, `norespons`, `show`, `finalstatus` FROM `telli_calling` WHERE `id`='".trim($_POST['employee_id'])."'");
 	$runx=mysqli_fetch_array($sql);
                    $qstringxiuq = str_replace(' ', '-', ($runx['name'])); ?>
 	<form method="post">
        <input type="hidden" name="postid" id="code" readonly /><br/>
        <label>Name</label><br/><?php echo ucwords($runx['name']); ?><br/>
        <label>Number</label><br/><?php echo ucwords($runx['number']); ?><br/>
        <label>Highest Qual.</label><br/><?php echo ucwords($runx['location']); ?><br/>
        <label>Exp. Type</label><br/><?php if($runx['exp_type']=='on'){ echo 'Exp.';}else{
        	echo 'No Exp.';} ?><br/>
         <?php if(!empty($runx['exp'])){?><label>Exp. Details</label><br/><?php echo ucwords($runx['exp']);?><br/><?php }?>
          <label>Details</label><br/><?php echo ucwords($runx['details']);?><br/>
          <label>Comment</label><br/><?php echo ucwords($runx['comment']);?>
         <hr/>
         <div align="center">
         <label>Share Link To Update Profile</label>
         <br/>
          <a class="label label-info" href="mailto:?Subject=Details Update Link&amp;Body=fill your details and upload resume: https://rmjob.in/manage/register/driving/29/apply/1">Share on Email <i class="fa fa-share-square-o"></i></a><br/>
    <a href="https://api.whatsapp.com/send?phone=+919399434505&text=fill your details and upload resume: https://rmjob.in/manage/register/driving/29/apply/1" data-action="share/whatsapp/share" target="_blank" class="label label-warning">Share to whatsapp <i class="fa fa-share-square-o"></i></a>
    <br/>
    <input readonly="readonly" class="form-control" value="../manage/apply?<?php echo uniqid(); ?>&lang=<?php echo rand(111111,22222); ?>&name=<?php echo base64_encode($runx['name']); ?>&stfid=<?php echo base64_encode($runx['member']); ?>&mob=<?php echo base64_encode($runx['number']); ?>">
         </div>
       </form>
 <?php } ?>