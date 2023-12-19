<?php error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/vendor/PHPMailer/src/Exception.php';
require 'mail/vendor/PHPMailer/src/PHPMailer.php';
require 'mail/vendor/PHPMailer/src/SMTP.php';
include_once 'config.php';
include_once "function.php"; 
$subject='You are register successfully';
$message='
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tbody><tr>
			<td align="center">
				<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
					<tbody><tr>
						<td align="center" valign="top" background="" bgcolor="#66809b" style="background-size:cover; background-position:top;height=" 400""="">
							<table class="col-600" width="600" height="400" border="0" align="center" cellpadding="0" cellspacing="0">

								<tbody><tr>
									<td height="40"></td>
								</tr>


								<tr>
									<td align="center" style="line-height: 0px;">
										<img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://rootplacement.com/images/rm-job-logo.png" width="109" height="103" alt="logo">
									</td>
								</tr>



								<tr>
									<td align="center" style="font-family: Raleway, sans-serif; font-size:37px; color:#ffffff; line-height:24px; font-weight: bold; letter-spacing: 7px;">
										ROOT <span style="font-family: Raleway, sans-serif; font-size:37px; color:#ffffff; line-height:39px; font-weight: 300; letter-spacing: 7px;">PLACEMENT</span>
									</td>
								</tr>





								<tr>
									<td align="center" style="font-family:Lato, sans-serif; font-size:15px; color:#ffffff; line-height:24px; font-weight: 300;">
										www.rootplacement.com
									</td>
								</tr>


								<tr>
									<td height="50"></td>
								</tr>
							</tbody></table>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>
		<tr>
			<td align="center">
				<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
					<tbody><tr>
						<td height="35"></td>
					</tr>

					<tr>
						<td align="center" style="font-family:Raleway, sans-serif; font-size:22px; font-weight: bold; color:#2a3a4b;">Congratulation Your Register Successfully</td>
					</tr>

					<tr>
						<td height="10"></td>
					</tr>


					<tr>
						<td align="center" style="font-family:Lato, sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">
							Root Placement is the pioneer of organised recruitment in India & Abroad. Our roots in management consulting enable us to bring a unique approach to recruitment, we have fully automated system for client & candidate.
						</td>
					</tr>

				</tbody></table>
			</td>
		</tr>

		<tr>
			<td align="center">
				<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; ">
					<tbody><tr>
						<td height="10"></td>
					</tr>
					<tr>
						<td>


							<table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td height="30"></td>
								</tr>
								<tr>
									<td align="center">
										<table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">

											<tbody><tr align="center" style="line-height:0px;">
												<td>
													<img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://designmodo.com/demo/emailtemplate/images/icon-about.png" width="69" height="78" alt="icon">
												</td>
											</tr>


											<tr>
												<td height="15"></td>
											</tr>


											<tr align="center">
												<td style="font-family: Raleway, Arial, sans-serif; font-size:20px; color:#2b3c4d; line-height:24px; font-weight: bold;">About Us</td>
											</tr>


											<tr>
												<td height="10"></td>
											</tr>


											<tr align="center">
												<td style="font-family: Lato, sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;"><a href="https://rootplacement.com/about-us">Learn More</a>
												</td>
											</tr>

										</tbody></table>
									</td>
								</tr>
								<tr>
									<td height="30"></td>
								</tr>
							</tbody></table>





							<table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">
								<tbody><tr>
									<td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">
										<p style="padding-left: 24px;">&nbsp;</p>
									</td>
								</tr>
							</tbody></table>



							<table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td height="30"></td>
								</tr>
								<tr>
									<td align="center">
										<table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">

											<tbody><tr align="center" style="line-height:0px;">
												<td>
													<img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://designmodo.com/demo/emailtemplate/images/icon-team.png" width="69" height="78" alt="icon">
												</td>
											</tr>


											<tr>
												<td height="15"></td>
											</tr>


											<tr align="center">
												<td style="font-family: Raleway, sans-serif; font-size:20px; color:#2b3c4d; line-height:24px; font-weight: bold;">How We Work</td>
											</tr>


											<tr>
												<td height="10"></td>
											</tr>


											<tr align="center">
													<td style="font-family:Lato, sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">
													<a href="https://rootplacement.com/howitworks">Learn More</a></td>
											</tr>



										</tbody></table>
									</td>
								</tr>
								<tr>
									<td height="30"></td>
								</tr>
							</tbody></table>



							<table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">
								<tbody><tr>
									<td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">
										<p style="padding-left: 24px;">&nbsp;</p>
									</td>
								</tr>
							</tbody></table>



							<table class="col3" width="183" border="0" align="right" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td height="30"></td>
								</tr>
								<tr>
									<td align="center">
										<table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">

											<tbody><tr align="center" style="line-height:0px;">
												<td>
													<img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://designmodo.com/demo/emailtemplate/images/icon-portfolio.png" width="69" height="78" alt="icon">
												</td>
											</tr>


											<tr>
												<td height="15"></td>
											</tr>


											<tr align="center">
												<td style="font-family:Raleway,  sans-serif; font-size:20px; color:#2b3c4d; line-height:24px; font-weight: bold;">Current Jobs</td>
											</tr>


											<tr>
												<td height="10"></td>
											</tr>


											<tr align="center">
												<td style="font-family:Lato, sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">
													<a href="https://rootplacement.com/jobs">Learn More</a></td>
											</tr>

										</tbody></table>
									</td>
								</tr>
								<tr>
									<td height="30"></td>
								</tr>
							</tbody></table>


						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>

			<tr>
					<td height="5"></td>
		</tr>
		<tr>
			<td align="center">
				<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
					<tbody><tr>
						<td height="50"></td>
					</tr>
					<tr>
						<td align="center" bgcolor="#34495e" background="https://designmodo.com/demo/emailtemplate/images/footer.jpg" height="185">
							<table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td height="25"></td>
								</tr>

									<tr>
									<td align="center" style="font-family:Raleway,  sans-serif; font-size:26px; font-weight: 500; color:#f1c40f;">Follow us for latest job</td>
									</tr>


								<tr>
									<td height="25"></td>
								</tr>



								</tbody></table><table align="center" width="35%" border="0" cellspacing="0" cellpadding="0">
								<tbody><tr>
									<td align="center" width="30%" style="vertical-align: top;">
											<a href="https://www.facebook.com/designmodo" target="_blank"> <img src="https://www.facebook.com/rootplacement"> </a>
									</td>

									<td align="center" class="margin" width="30%" style="vertical-align: top;">
										 <a href="https://twitter.com/designmodo" target="_blank"> <img src="https://www.facebook.com/rootplacement"> </a>
									</td>

									<td align="center" width="30%" style="vertical-align: top;">
											<a href="https://plus.google.com/+Designmodo/posts" target="_blank"> <img src="https://www.facebook.com/rootplacement"> </a>
									</td>
								</tr>
								</tbody></table>



							</td></tr></tbody></table>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr></tbody></table>';
function imageResize($imageResourceId,$width,$height) {
$targetWidth =200;
$targetHeight =200;
$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
return $targetLayer;
}
if(isset($_POST["submit"])){
$contact    = mysqli_real_escape_string($db,$_POST['mobile']);
$fname      = mysqli_real_escape_string($db,$_POST['fname']);
$email      = mysqli_real_escape_string($db,$_POST['mail']);
$password   = mysqli_real_escape_string($db,$_POST['password']);
$jtype      = 32;
$highestq   = mysqli_real_escape_string($db,$_POST['hq']);
$location   = mysqli_real_escape_string($db,$_POST['currentcity']);
$pid        = mysqli_real_escape_string($db,$_POST['postid']);
$ind        = mysqli_real_escape_string($db,$_POST['tag']);
//$ind        = 1;
$preference = mysqli_real_escape_string($db,$_POST['preference']);
$gender     = mysqli_real_escape_string($db,$_POST['gender']);
$exp        = mysqli_real_escape_string($db,$_POST['exp']);
$english    = mysqli_real_escape_string($db,$_POST['english']);
$comp          = mysqli_real_escape_string($db,$_POST['comp']);
$yourlanguage  = mysqli_real_escape_string($db,$_POST['yourlanguage']);
$locationnear  = mysqli_real_escape_string($db,$_POST['locationnear']);
$city         = mysqli_real_escape_string($db,$_POST['city']); 

if(empty($_POST['skillid'])){ $skill= ''; }else{ $skill= implode(" , " ,$_POST['skillid']);  }

$linkk=seo_wala_url($fname).'-'.time();
$fnamef=seo_wala_url($fname);
 
$checkq=mysqli_query($db,"SELECT `id` FROM `candidate` WHERE `contact`='$contact'")or die(mysqli_error($db));
if(mysqli_num_rows($checkq)>0){
        $runn=mysqli_fetch_array($checkq);
         ob_start(); session_start();  
        $_SESSION['candid'] = $runn['id'];
        header("Location: member/index.php?main");
}else{
$sql =mysqli_query($db,"INSERT INTO `candidate`(`admin`,`jobtyp`,`indust`,`preflocation`,`gender`,`name`, `contact`, `emailid`,`hq`,`compknow`,`fresher`,`address`,`pass`, `ip`,`preference`,`english`, `localleng`,`skill`,`city`,`link`) VALUES (0,'".$jtype."','".$ind."','".$locationnear."','".$gender."','".strtolower($fname)."','".$contact."','".strtolower($email)."','".$highestq."','".$comp."','".$exp."','".$location."','".$password."','".$_SERVER['REMOTE_ADDR']."','".$preference."','".$english."','".$yourlanguage."','".$skill."','".$city."','".$linkk."')")or die(mysqli_error($db));
//echo 'ddddd';
$lidd=mysqli_insert_id($db);
//echo '<br/>xxxxxx';

//if(isset($_FILES['pic']["name"]) && isset($_FILES['pic']["tmp_name"]) ){
  if(isset($_FILES['pic']) && !empty($_FILES['pic']['name'])) { 
 
        $file = $_FILES['pic']['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $folderPath = "assets/candidate/";
        $ext = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
        switch ($imageType) {
            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $linkk.".". $ext);
                break;
            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$folderPath. $linkk.".". $ext);
                break;
            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $linkk.".". $ext);
                break;
            default:
              $imgstatus="Involid Select PNG, JPG, GIF Image";
                
        }
        move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
        $uploadIMG=$linkk.".". $ext;
        $sql=mysqli_query($db,"UPDATE `candidate` SET `pic`='$uploadIMG' WHERE `id`='$lidd'")or die(mysqli_error($db));
    }
if(isset($_FILES['resume']) && !empty($_FILES['resume']['name'])) { 
    $oldpathr = $_FILES['resume']['tmp_name'];
    $tempr = explode(".", $_FILES["resume"]["name"]);
    $imgr = $linkk. '.' . end($tempr);
    $newpathr ="assets/candidate/".$imgr;
    move_uploaded_file($oldpathr, $newpathr);
    $sql=mysqli_query($db,"UPDATE `candidate` SET `resume`='$imgr' WHERE `id`='$lidd'")or die(mysqli_error($db));
}
//echo '<br/>qqqq --- qqqqqq';
//if($sql>0){

//mail code start

$mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'job@portal.com';     
        $mail->Password = 'poral@password';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 587;                                   

        //Send Email
        $mail->setFrom('job@portal.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('software@gmail.com');
        
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
		
       $_SESSION['result'] = 'Message has been sent';
	   $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }

//mail code end
    ob_start(); session_start();  
	$_SESSION['candid'] = $lidd;
	$_SESSION['name']  =  'name'; 
	$_SESSION['email']  =  'client@gmail.com'; 
   // $_SESSION['candid'] = $lidd;
    header("Location: members/?main");
    exit();
// }else{
//     echo "<script>alert('Failed To Register Apply After Some Time')</script>";
//      header("Location: register"); }
}
}
mysqli_close($db);?>