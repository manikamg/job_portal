 <?php 
 include_once 'head.php';
 $sql=mysqli_query($db,"SELECT * FROM `candidate` WHERE `admin`='".trim($_GET['id'])."' ORDER BY `id` DESC");
 while($row=mysqli_fetch_array($sql)){
  $array[] = $row;
 }
 if(isset($_POST['remove'])){
  $sql=mysqli_query($db,"DELETE FROM `candidate` WHERE `id`='".trim($_POST['did'])."'");
  if($sql>0){echo "<script>window.open('candidate-manage?remove','_self')</script>";
  }else{ echo "<script>alert('Server Busy')</script>";}
 }?>
  <div class="container">
    <section class="content-header">
 <h1><small><a href="dashboard?id=<?php echo trim($_GET['id']); ?>"><< Back</a> candidate manage </small>  </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#">candidate manage</a></li>
      </ol>
    </section>
    <div class="row">
       <div class="col-md-12 col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border"> 
              <h3 class="box-title">Candidate<small> Manage</small></h3>
            </div>
            <div class="box-body">
           <?php if(isset($_GET['remove'])){?>
            <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Record Remove Success</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" onclick="window.open('candidate-manage','_self');" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div></div>
           <?php }?>
      <div class="table table-responsive">
  <table id="example1" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th><small>Sno.</small></th>
        <th>Status</th>
        <th>Total Apply</th>
        <th><small>Photo</small></th>
        <th>Full First</th>
        <th>Contact Details</th>
        <th>Registration Date</th>
        <th>Login Details</th>
        <th>Resume</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($array as $index =>$row){ ?>
   <tr>
    <td><?php echo $index+1 ?></td>
    <td>
      <?php if($row['regi_status']=='yes'){?>
      <span class="label label-success">Active</span>
    <?php }elseif($row['regi_status']=='no'){?>
      <span class="label label-danger">Pending</span>
    <?php }else{?>
      <span class="label label-info">Trash</span>
    <?php }?>
    </td>
    <td>
      <span class="label label-danger"><?php echo jobtyCountAppliedJob($row['id']) ?></a></span>
    </td>
    <td>
     <?php if(empty($row['pic'])){ ?>
      <img src="https://consultancy.rootplacement.com/assets/general/1.png" alt="GHS" width="60px;" height="60px;">
    <?php }else{?>
      <img src="https://consultancy.rootplacement.com/assets/candidate/<?php echo $row['pic']; ?>" alt="rootplacement.com" width="60px;" height="60px;">
    <?php }?>
    </td>
    <td><b><?php echo $row['name'].'&nbsp;'.$row['middle'].'&nbsp;'.$row['last']; ?></b></td>
    <td><?php echo $row['contact'].'<br/>'.$row['emailid'];?></td>
    <td><?php echo date('d/m/Y',strtotime($row['datetime']));?></td>
    <td><?php echo 'Username: '.$row['contact'].'<br/>Password:'.$row['pass'];?></td>
    <td>
      <?php if(!empty($row['resume'])){ ?>
      <a href="https://consultancy.rootplacement.com/assets/candidate/<?php echo $row['resume']; ?>" target="_blank"><img  name="pic" src="https://consultancy.rootplacement.com/assets/general/download.png" width="30px;" height="30px;"></a>
    <?php }else{ echo 'Not Available';}?>
    </td> 
    <td>
      <form method="post" class="delete_form" action="#">
      <input type="hidden" name="did" value="<?php echo $row['id']; ?>">
      <button type="submit" name="remove" class="btn btn-danger" onclick="return confirm('confirm to remove')"><i class="fa fa-trash"></i></button>
     </form></td>
   </tr>
  <?php }?>
    </tbody>
  </table>
  </div>
        </div>
      </div>
    </section>
  </div>
  </div></div></div>
 <?php  include_once 'footer.php'; ?>
