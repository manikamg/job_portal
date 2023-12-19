<?php 
include_once '../function.php';
 if(isset($_POST['post_id'])){
 $sql=sqlquery("SELECT `id`, `postid`, `jobtyp`, `indust`, `tag`, `adminid`, `stfid`, `clientid`, `posttype`, `compid`, `postname`, `post_number`, `priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`, `postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`, `status`, `final_selection`, `adm_approve`, `stf_approve`, `stf_reject`, `read_sft`, `read_adm`, `comphide`, `timedate`, `ip` FROM `post_job` WHERE `id`='".trim($_POST['post_id'])."'");
 	$runx=mysqli_fetch_array($sql);
    $stringxiu = str_replace(' ', '-', postname($runx['jobtyp'])); $qstringxiuq = str_replace(' ', '-', ($runx['postname']));?>
 	<form method="post"> 
    <input type="hidden" name="postid" id="code" readonly /><br/>
    <label>Post</label><br/><?php echo ucwords($runx['postname']); ?><br/>
    <label>No. of Post</label><br/><?php echo ucwords($runx['post_number']); ?><br/>
        <label>Priority</label><br/><?php echo ucwords($runx['priority']); ?><br/>
        <label>Exp.</label><br/><?php echo ucwords($runx['exp']); ?><br/>
        <label>Post Type</label><br/><ul><?php 
         foreach (explode(",",$runx['posttype']) as $key => $valuepty) {
         echo '<li>'.jobtypidtoname($valuepty).'</li>'; }?></ul><br/>
         <label>Industries</label><br/><ul><?php  
         foreach (explode(",",$runx['indust']) as $key => $indv) {
         echo '<li>'.IndustiesName($indv).'</li>'; }?></ul><br/>
        <label>Location</label><br/><?php echo ucwords($runx['location']); ?><br/>
        <label>Gender</label><br/><?php echo ucwords($runx['gender']); ?><br/>
        <label>Highest Qualification</label><br/><?php echo ucwords($runx['highestqualification']); ?><br/>
        <label>Joining Process</label><br/><?php echo ucwords($runx['joiningprocess']); ?><br/>
	    <label>TA</label><br/><?php echo ucwords($runx['ta']);?><br/>
	    <label>Post Details</label><br/><?php echo ucwords($runx['postdetails']);?><hr/>
	    <label>Start Salary.</label>: <?php echo ucwords($runx['ssalary']); ?><br/>
	    <label>End Salary.</label>  : <?php echo ucwords($runx['esalary']); ?><br/>
         <hr/>
         <label>Start Date.</label> :<?php echo ucwords($runx['sdate']); ?><br/>
	     <label>End Date.</label>   :<?php echo ucwords($runx['edate']); ?><br/>
	     <label>Number</label><br/><?php echo ucwords($runx['alernumber']); ?><br/>
         <div align="center">
         <label>Share Job Link</label>
         <br/>
          <a class="label label-info" href="mailto:?Subject=Details Update Link&amp;Body=fill your details and upload resume: https://rmjob.in/post-view/<?php echo strtolower($qstringxiuq); ?>//<?php echo ($runx['id']); ?>">Share on Email <i class="fa fa-share-square-o"></i></a><br/>
    <a href="https://api.whatsapp.com/send?phone=+919399434505&text=fill your details and upload resume: https://rmjob.in/post-view/<?php echo strtolower($qstringxiuq); ?>//<?php echo ($runx['id']); ?>" data-action="share/whatsapp/share" target="_blank" class="label label-warning">Share to whatsapp <i class="fa fa-share-square-o"></i></a>
    <br/>
    <input readonly="readonly" class="form-control" value="https://rmjob.in/post-view/<?php echo strtolower($qstringxiuq); ?>//<?php echo ($runx['id']); ?>">
         </div>
       </form>
 <?php } ?>