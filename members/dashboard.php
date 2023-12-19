<?php 
 include_once 'client_session.php';
 include_once 'client_head.php';      
  //error_reporting(E_ALL);  
$npost=query("SELECT * FROM `client` WHERE `id`='$id'");

if(isset($_POST['update_post'])){
$jobtyp=mysqli_real_escape_string($db,$_POST['jtyp']);
$company=mysqli_real_escape_string($db,$_POST['company']);
$postname=mysqli_real_escape_string($db,$_POST['postname']);
$postdetails=mysqli_real_escape_string($db,$_POST['postdetails']);
$startsalary=mysqli_real_escape_string($db,$_POST['startsalary']);
$endsalary=mysqli_real_escape_string($db,$_POST['endsalary']);
$openingdate=mysqli_real_escape_string($db,$_POST['openingdate']);
$enddate=mysqli_real_escape_string($db,$_POST['enddate']);
$priority=mysqli_real_escape_string($db,$_POST['priority']);
$exp=mysqli_real_escape_string($db,$_POST['exp']);
$location=mysqli_real_escape_string($db,$_POST['location']);
$gender=mysqli_real_escape_string($db,$_POST['gender']);
$highestqualification=mysqli_real_escape_string($db,$_POST['highestqualification']);
$joiningprocess=mysqli_real_escape_string($db,$_POST['joiningprocess']);
$ta=mysqli_real_escape_string($db,$_POST['ta']);
$alternative_number=mysqli_real_escape_string($db,$_POST['alternative_number']);
$pcode=mysqli_real_escape_string($db,$_POST['pcode']);
$number_post=mysqli_real_escape_string($db,$_POST['number_post']);
$pid=mysqli_real_escape_string($db,$_POST['poid']);

  $sql=mysqli_query($db,"UPDATE `post_job` SET `jobtyp`='$jobtyp',`postname`='$postname',`post_number`='$number_post',`priority`='$priority',`exp`='$exp',`location`='$location',`gender`='$gender',`highestqualification`='$highestqualification',`joiningprocess`='$joiningprocess',`ta`='$ta',`postdetails`='$postdetails',`ssalary`='$startsalary',`esalary`='$endsalary',`sdate`='$openingdate',`edate`='$enddate',`alernumber`='$alternative_number' WHERE `id`='$pid'")or die(mysqli_error($db));

    if($sql>0){
      echo "<script>window.open('dashboard?job-manage','_self')</script>";
      }else{
      echo "<script>window.open('dashboard?job-manage','_self')</script>";
      }
}

if(isset($_POST['post_job'])){
$jobtyp=mysqli_real_escape_string($db,$_POST['jtyp']);
$company=mysqli_real_escape_string($db,$_POST['company']);
$postname=mysqli_real_escape_string($db,$_POST['postname']);
$postdetails=mysqli_real_escape_string($db,$_POST['postdetails']);
$startsalary=mysqli_real_escape_string($db,$_POST['startsalary']);
$endsalary=mysqli_real_escape_string($db,$_POST['endsalary']);
$openingdate=mysqli_real_escape_string($db,$_POST['openingdate']);
$enddate=mysqli_real_escape_string($db,$_POST['enddate']);
$priority=mysqli_real_escape_string($db,$_POST['priority']);
$exp=mysqli_real_escape_string($db,$_POST['exp']);
$location=mysqli_real_escape_string($db,$_POST['location']);
$gender=mysqli_real_escape_string($db,$_POST['gender']);
$highestqualification=mysqli_real_escape_string($db,$_POST['highestqualification']);
$joiningprocess=mysqli_real_escape_string($db,$_POST['joiningprocess']);
$ta=mysqli_real_escape_string($db,$_POST['ta']);
$alternative_number=mysqli_real_escape_string($db,$_POST['alternative_number']);
$pcode=mysqli_real_escape_string($db,$_POST['pcode']);
$number_post=mysqli_real_escape_string($db,$_POST['number_post']);

$sql=query("INSERT INTO `post_job`(`postid`,`jobtyp`,`clientid`,`compid`, `postname`,`post_number`,`priority`, `exp`, `location`, `gender`, `highestqualification`, `joiningprocess`, `ta`,`postdetails`, `ssalary`, `esalary`, `sdate`, `edate`, `alernumber`,`ip`) VALUES ('$pcode','$jobtyp','$id','$company','".strtolower($postname)."','$number_post','".strtolower($priority)."','".strtolower($exp)."','".strtolower($location)."','".strtolower($gender)."','".strtolower($highestqualification)."','".strtolower($joiningprocess)."','".strtolower($ta)."','".strtolower($postdetails)."','".strtolower($startsalary)."','".strtolower($endsalary)."','".($openingdate)."','".($enddate)."','".($alternative_number)."','".$_SERVER['REMOTE_ADDR']."')")or die(mysqli_error($db));
  if($sql>0){
    $loc=(explode(",",$location));
   foreach ($loc as $key => $value) {
     $loc=query("INSERT INTO `job_locations`(`name`) VALUES ('$value')");
   }
    echo "<script>window.open('dashboard?new-job&post-job','_self')</script>";
  }else{
    echo "<script>alert('Server Is Busy')</script><meta http-equiv='refresh' content='0'/>";
  }
 }
 if(isset($_POST['postremove'])){
       $postid = trim($_POST['pid']);
  $sql=query("DELETE FROM `post_job` WHERE `id`='$postid'"); 
    if($sql>0){
      echo "<script>window.open('dashboard?job-manage&remove','_self')</script>";
      }else{
      echo "<script>window.open('dashboard?job-manage','_self')</script>";
      }
 }
?> 
<div class="content-wrapper">
 <section class="content-header">
    <h1><small>Welcome Back, <b><?php echo ucwords($run['name']); ?></b></small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Member</li>
      </ol>
    </section>
    <section class="content"> 
      <div class="row">
         <?php       
             
             if(isset($_GET['main'])){
             include_once 'client-main.php';
             }elseif (isset($_GET['new-job'])) {
             include_once 'new-job-post.php';
             }elseif (isset($_GET['job-manage'])){
             include_once 'post_job_manage.php'; 
             }

         ?> 
        <div class="col-md-3 col-xs-12">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if(isset($run['logo'])){?>
              <img class="profile-user-img img-responsive img-circle" src="../assets/clients/<?php echo $run['logo']; ?>" alt="<?php echo $run['name']; ?>"> 
              <?php }else{?>
               <img class="profile-user-img img-responsive img-circle" src="../assets/general/1.png" alt="<?php echo $run['name']; ?>"> 
               <?php }?>   
 <h3 class="profile-username text-center"></h3>
<p class="text-muted text-center"><small></small> <b><?php echo ucwords($run['name']); ?></b></p>
<ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"> <?php echo  ucwords($run['status']); ?></a>
                </li>
              </ul>
            </div></div>
          <a href="#" class="btn btn-primary btn-block margin-bottom">Manage</a>
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Manage</h3>
                <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="dashboard?main"><i class="fa fa-circle-o text-red"></i> Home</a></li>
                <li><a href="dashboard?new-job"><i class="fa fa-circle-o text-yellow"></i> Post New Job</a></li>
                <li><a href="dashboard?job-manage"><i class="fa fa-circle-o text-red"></i> Manage Post</a>
                </li>
                <!-- <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Account Report</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i>Report</a></li> -->
                <li> <a class="dropdown-item" href="../logout.php">Logout</a></li>
              </ul>
            </div>
          </div></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div></div>
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
</script>
<?php include_once 'footer.php';?>
