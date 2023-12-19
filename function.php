<?php
include_once 'config.php';
function query($sql)
{
	global $db;
	return mysqli_query($db, $sql);
}
function input_validate($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function postnameIcon($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `icon` FROM `postnames` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	return $run['icon'];
}
function company2CompNo($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `contact`, `mobile_two`, `emailid`, `email_two`, `address`, `farmname`, `farmno`, `about`, `logo`, `agreement`, `other`, `loginid`, `pass`, `status`, `ip`, `datetime` FROM `client` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	return $run['contact'] . '<br/>' . $run['mobile_two'];
}

function getClientIdToName($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `clientid` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	$data = ($run['clientid']);
	return $data;
}
function citytotalpost($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `job_locations` WHERE `name`='$id'");
	$run = mysqli_num_rows($sql);
	return $run;
}
function namewisetotalpost($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `post_job` WHERE `postname`='$id'");
	$run = mysqli_num_rows($sql);
	return $run;
}
function tellicalling_data($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `telli_calling` WHERE `rand`='$id'");
	$run = mysqli_num_rows($sql);
	return $run;
}

function dateFormate($id)
{
	$data = date('d/m/Y', strtotime($id));
	return $data;
}
function sqlquery($sqldata)
{
	global $db;
	$sql = mysqli_query($db, $sqldata);
	return $sql;
}
function getStateName($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `statename` FROM `state` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	$data = ($run['statename']);
	return $data;
}
function getJobIdToJobtypName($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name` FROM `jobtype` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	$data = ($run['name']);
	return $data;
}
function printwhileloop($sql)
{
	global $db;
	$sql = mysqli_query($db, $sql);
	while ($run = mysqli_fetch_array($sql)) {
		$data[] = $run;
	}
	return $data;
}

function TotalApplications($id)
{
	$sql = mysqli_query($id, "SELECT `id` FROM `candidate`");
	$run = mysqli_num_rows($sql);
	return $run;
}
function TotalFullApplications($id)
{
	$sql = mysqli_query($id, "SELECT DISTINCT`candidateid` FROM `candidate_data`");
	$run = mysqli_num_rows($sql);
	return $run;
}
function TotalJobPost($id)
{
	$sql = mysqli_query($id, "SELECT `id` FROM `post_job`");
	$run = mysqli_num_rows($sql);
	return $run;
}
function TotalJobPostByIndividual($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `post_job` WHERE `adminid`='$id'");
	$run = mysqli_num_rows($sql);
	return $run;
}
function TotalCompany($id)
{
	$sql = mysqli_query($id, "SELECT `id` FROM `client`");
	$run = mysqli_num_rows($sql);
	return $run;
}
function companyName($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `mng_name`,`farmname` FROM `client` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	if (empty($run['farmname']) || $run['farmname'] == "") {
		return $run['mng_name'];
	} else {
		return $run['farmname'];
	}
}
function companyOwner($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name`,`mng_name`FROM `client` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	$data = ucwords($run['name']) . '&nbsp;/&nbsp;' . ucwords($run['mng_name']);
	return $data;
}
function companynameRgno($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `farmno` FROM `client` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	$data = ($run['farmno']);
	return $data;
}
function companyContact($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `contact`, `mobile_two` FROM `client` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	$data = ($run['contact'] . ',&nbsp;&nbsp;' . $run['mobile_two']);
	return $data;
}
function postName($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `postname` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['postname'];
}
function postNametoLocation($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `location` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['location'];
}
function postCode($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `postid` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['postid'];
}
function Totalpost($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `aplied_job` WHERE `jobid`='$id'");
	$run = mysqli_num_rows($sql);

	return $run;
}
function postHighQual($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `highestqualification` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['highestqualification'];
}
function postPriority($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `priority` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['priority'];
}
function postApplylastdate($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `edate` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['edate'];
}
function postComp($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `compid` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['compid'];
}

function applicantName($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name` FROM `candidate` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['name'];
}
function applicantNameByMob($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name` FROM `candidate` WHERE `contact`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['name'];
}
function applicantContact($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `contact` FROM `candidate` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['contact'];
}
function applicantPic($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `pic` FROM `candidate` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['pic'];
}
function IndustiesName($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name` FROM `industry` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['name'];
}
function LocationName($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name` FROM `job_locations` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	return $run['name'];
}
function applicantHighqual($id, $did)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `inputvalue` FROM `candidate_data` WHERE `candidateid`='$id' AND `input_field`='$did'");
	$run = mysqli_fetch_array($sql);

	return $run['inputvalue'];
}
function applicantResume($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `resume` FROM `candidate` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['resume'];
}
function joidToStatus($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `stf_status` FROM `aplied_job` WHERE `jobid`='$id'");
	$run = mysqli_fetch_array($sql);
	$data = ($run['stf_status']);
	return $data;
}
function getJobIdToTyp($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `jobtyp` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	$data = ($run['jobtyp']);
	return $data;
}
function checkapplicantApply($id, $y)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `selected_candidate` WHERE `canid`='$id' AND `jodid`='$y'");
	$run = mysqli_num_rows($sql);
	return $run;
}
function applicantQuali($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `hq` FROM `candidate` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['hq'];
}
function checkapplicantApplyStatus($id, $idd)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `selected_candidate` WHERE `canid`='$id' AND  `jodid`='$idd' AND `selection1`='1'");
	$run = mysqli_num_rows($sql);

	return $run;
}
function checkapplicantApplyStatusSecond($id, $idd)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `selected_candidate` WHERE `canid`='$id' AND  `jodid`='$idd' AND `selection2`='1'");
	$run = mysqli_num_rows($sql);

	return $run;
}
function checkapplicantApplyStatusFinal($id, $idd)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `selected_candidate` WHERE `canid`='$id' AND  `jodid`='$idd' AND `final_selection`='1'");
	$run = mysqli_num_rows($sql);

	return $run;
}
function checkapplicantApplyStatusFinalByCandidate($id, $idd)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `selected_candidate` WHERE `canid`='$id' AND  `jodid`='$idd' AND `selection1`='1' AND `selection2`='1' AND `final_selection`='1' AND `canstatus`='1'");
	$run = mysqli_num_rows($sql);

	return $run;
}

function checkapplicantApplyStatusFinalByCandidateById($id, $idd)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `selected_candidate` WHERE `canid`='$id' AND  `jodid`='$idd' AND `selection1`='1' AND `selection2`='1' AND `final_selection`='1' AND `canstatus`='1' AND `compstatus`='0'");
	$run = mysqli_fetch_array($sql);

	return $run['id'];
}
function FinalSelectionOfCandidate($id, $idd)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `selected_candidate` WHERE `canid`='$id' AND  `jodid`='$idd' AND `selection1`='1' AND `selection2`='1' AND `final_selection`='1' AND `canstatus`='1' AND `compstatus`='1'");
	$run = mysqli_num_rows($sql);
	return $run;
}
function jobtypidtoname($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name` FROM `jobtype` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	return $run['name'];
}
function jobtypidtojobcat($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `postname` FROM `postnames` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	return $run['postname'];
}
function jobtyCountAppliedJob($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `aplied_job` WHERE `applicantid`='$id'");
	$run = mysqli_num_rows($sql);
	return $run;
}
function jobtyCountAppliedJobByIndiuvidual($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `id` FROM `aplied_job` WHERE `compid`='$id'");
	$run = mysqli_num_rows($sql);
	return $run;
}
function getposttocompnamexyz($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `adminid` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	return $run['adminid'];
}

function getidtocompname($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name` FROM `admins` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	return $run['name'];
}
function CheckUserStatus($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `select_status` FROM `candidate` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);

	return $run['select_status'];
}
function HighestQualification($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name` FROM `higest_qual` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	return $run['name'];
}
function GetidURttocomPname($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `contact` FROM `admins` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	return $run['contact'];
}

function GetSalaryDetailsForWebsite($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT  `ssalary`, `esalary`, `ctc`, `notdisc` FROM `post_job` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	if ($run['notdisc'] == 1) {
		return $date = '<small> Negotiable</small>';
	} else {
		if ($run['ctc'] != '0.00') {
			return $data = $run['ctc'];
		} else {
			return $data = $run['ssalary'] . '~' . $run['esalary'];
		}
	}
	//return  $data;
}
function checkImageORnot($id)
{
	$supported_image = array(
		'gif',
		'jpg',
		'jpeg',
		'png'
	);

	$src_file_name = $id;
	$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
	if (in_array($ext, $supported_image)) {
		return 1;
	} else {
		return 0;
	}
}
function checkResumeORnot($id)
{
	$supported_image = array(
		'pdf',
		'docx',
		'doc',
		'gif',
		'jpg',
		'jpeg',
		'png'
	);
	$src_file_name = $id;
	$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
	if (in_array($ext, $supported_image)) {
		return 1;
	} else {
		return 0;
	}
}
function Intern2company($id)
{
	global $db;
	$sql = mysqli_query($db, "SELECT `name`, `contact` FROM `company` WHERE `id`='$id'");
	$run = mysqli_fetch_array($sql);
	$name = ucwords($run['name']);
	$mob = ($run['contact']);
	$details = $name . '<br/>' . $mob;
	return $details;
}
function seo_wala_url($string, $separator = '-')
{
	$accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
	$special_cases = array('&' => 'and', "'" => '');
	$string = mb_strtolower(trim($string), 'UTF-8');
	$string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
	$string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
	$string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
	$string = preg_replace("/[$separator]+/u", "$separator", $string);
	return $string;
}
function HowLongPost($date1, $date2)
{
	$diff = strtotime($date2) - strtotime($date1);
	return abs(round($diff / 86400));
}
function tagPic($id, $pname)
{
	if (!empty(postnameIcon($id))) {
		$anb = '<img src="manage/assets/jobicons/' . postnameIcon($id) . '" title="' . ucwords($pname) . '" alt="rootplacement.com" style="width:60px;height:60px;"/>';
	} else {
		$anb = '<img src="manage/assets/jobicons/online.png" title="' . ucwords($pname) . '" alt="rootplacement.com" style="width:60px;height:60px;"/>';
	}
	return $anb;
}
?>