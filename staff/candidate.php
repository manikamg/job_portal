<?php include_once '../function.php';
 if(isset($_POST['post_id'])){
 $sql=sqlquery("SELECT * FROM `candidate` WHERE `id`='".trim($_POST['post_id'])."'");
 	$runx=mysqli_fetch_array($sql);?>
 	<form method="post"> 
        <input type="hidden" name="postid" id="code" readonly /><br/>
        <label>Name</label><br/><?php echo ucwords($runx['name']); ?><br/>
        <label>Contact</label><br/><a href="tel:<?php echo ($runx['contact']); ?>"><?php echo ($runx['contact']); ?></a><br/>
        <label>Email Id</label><br/><?php echo ($runx['emailid']); ?><br/>
        <label>Father Name.</label><br/><?php echo ucwords($runx['fname']); ?><br/>
        <label>Monther Name.</label><br/><?php echo ucwords($runx['mname']); ?><br/>
    <label>Highest Qualification</label><br/><?php echo ucwords(HighestQualification($runx['hq'])); ?><br/>
        <label>Pic</label><br/><?php  if(!empty(($runx['pic']))){ ?><img src="../assets/candidate/<?php echo (($runx['pic'])); ?>" style="height: 60px;width: 60px;" /><?php } ?><br/> 
	    <label>Resume</label><br/><?php  if(!empty(($runx['resume']))){ ?><a href="../assets/candidate/<?php echo $runx['resume']; ?>" target="_blank"><img src="../assets/general/download.png" style="height:30px;width:30px;" /></a><?php }else{?>No<?php }?><br/>
	    <label>Address</label><br/><?php echo ucwords($runx['address']);?><hr/>
	    <label>Interested Job.</label>: <ul><?php $jl=explode(",",$runx['jobtyp']);
         foreach ($jl as $key => $value) {
              echo '<li>'.ucwords(IndustiesName($value)).'</li>';
          } ?></ul><br/>
      <label>Pref Location</label>: <ul><?php $jloc=explode(",",$runx['preflocation']);
         foreach ($jloc as $key => $valueloc) {
              echo '<li>'.ucwords(LocationName($valueloc)).'</li>';
          } ?></ul><br/>
       </form> 
 <?php } ?>