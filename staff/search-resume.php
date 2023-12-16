<?php include_once '../layouts/heade_design.php'; include_once 'head.php';
if(isset($_POST['resumid'])){
echo "<script>window.open('resume-data?iy=".trim($_POST['industry_type'])."&locate=".trim($_POST['location'])."&key=".trim($_POST['keywords'])."','_self')</script>";
}
if(isset($_POST['resumidsearch'])){
echo "<script>window.open('resume-data?resumeid=".trim($_POST['resid'])."','_self')</script>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><div class="content-wrapper">
<section class="content-header"><h1><small><a href="dashboard"><< Back</a></small></h1></section>
    <section class="content">
    	<div align="left"><b>Search Resume</b></div>
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Resume Search</a></li>
              <li><a href="#tab_2" data-toggle="tab">Resume ID Search</a></li>
              <li><a href="#tab_3" data-toggle="tab">Saved Resume</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              	<form method="post" name="resume search">
                <label>Keywords</label>
                <input type="text" name="keywords" class="form-control" placeholder="Enter Skill or Job Role" required="required">
                <br/>
                <label>Location</label>
                <input type="text" name="location" class="form-control" placeholder="Enter City"><br/>
                <label>Industry</label>
                <select class="form-control custom-select" name="industry_type" id="industry_type" required="required">
		<option value="">Select</option>
		<?php $searchresume=printwhileloop("SELECT `id`, `name` FROM `industry`");
		foreach ($searchresume as $key => $value) {?>
			<option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
				<?php }?>
					</select><br/>
            	  <div align="center"><button type="submit" class="btn btn-info" name="resumid">Search</button></div>
				</form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              	<form method="post" name="resumid">
                <label>Resume ID</label>
                <input type="text" name="resid" class="form-control" placeholder="Enter City"><br/>
                <div align="center"><button type="submit" class="btn btn-info" name="resumidsearch">Search</button></div>
            </form>
              </div>
              <div class="tab-pane" id="tab_3">
                <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead><tr><th><small>Resume ID</small></th><th><small>Name</small></th><th><small>Resume</small></th><th><small>Save Date</small></th></tr></thead>
              <?php  $rdataxcio=query("SELECT `id`, `resumid`, `adminid`, `stfid`, `timedate` FROM `saveresume` WHERE (`adminid`='$id' OR `stfid`='$id') ORDER BY `id` ASC");
             $gcnd=mysqli_fetch_array($rdataxcio);
             if(!empty($gcnd['resumid'])){
             $gcndimp=explode(",", $gcnd['resumid']);
             for ($i=0; $i < count($gcndimp); $i++) { 
             $cansql=query("SELECT * FROM `candidate` WHERE `id`='".$gcndimp[$i]."'");
             $runcansql=mysqli_fetch_array($cansql); ?>
                 <tbody>
                   <tr><th><?php echo date('Y').$runcansql['id']; ?></th>
<th><small><?php echo $runcansql['name']; ?></small></th>
<th><?php if(!empty(($runcansql['resume']))){ ?><a href="../assets/candidate/<?php echo $runcansql['resume']; ?>" target="_blank"><img src="../assets/general/download.png" style="height:30px;width:30px;" /></a><?php }else{?>No<?php }?></th>
<th><small><?php echo dateFormate($runcansql['datetime']); ?></small></th></tr>
<?php } }else{ echo ''; }?>
                 </tbody> 
               </table>
             </div>
         </div>
     </div></div></div></div>
         <div class="col-md-4" style="background-color: #fff;">
<small><h2 class="header-title">Search Tips</h2>
<b>Keywords</b>
<ul>
<li>Enter The Required Job Skill Or Role As Keyword</li>
<li>Select The Matching Keywords From The Suggestion Box<br><em class="text-custom">(To get accurate results select the keywords from suggestion box)</em></li>
</ul>

<b>Experience</b>
<ul>
<li>Select The Minimum Experience Required</li>
<li>To Find A Candidate With No Experience Select 'Fresher'</li>
</ul>

<b>Qualification</b>
<ul>
<li>Select Required Qualification</li>
<li>Select The Degree/Specialization<br><em class="text-custom">eg. If you select Post Graduation as main Qualification then you can select the sub-category as MA, MSc, Mcom)</em></li>
<li>You Can Also Select Multiple Qualifications</li>
</ul>

<b>Country</b>
<ul>
<li>Select The Country From Which You Need The Candidate<br><em class="text-custom">(The Resume Will Be From India By Default)</em></li>
</ul>

<b>Select State/City</b>
<ul class="mb-0">
<li>Select The Required Location</li>
<li>You Can Select Several Cities By Clicking Zone Wise Location<br><em class="text-custom">(eg. Northern India will include all States that belong to North India ex. Delhi, Punjab, Rajasthan)</em></li>
<li>You Can Select A Particular City/State</li>
<li>You Can Select Multiple Cities</li>
</ul>
</small></div>
</section>
</div></div>
<?php  include_once 'footer.php'; ?>