<?php 
include_once 'head.php';
if (isset($_POST['getdata'])) {
  echo "<script>window.open('resume-data?locate=" . trim($_POST['search_city']) . "&key=" . trim($_POST['search_keyword']) . "','_self');</script>";
}

include_once "../config.php";

$query = "SELECT * from pin WHERE staffid = ".$id." ";
$result = mysqli_query($db, $query);

$num_rows = mysqli_num_rows($result);
echo $num_rows;
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small>Welcome Back, <b>
          <?php echo ucwords($runs['name']); ?>
        </b></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Manage</li>
    </ol>
  </section>

  <div class="col-md-12">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-black-tie"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Income</span>
            <span class="info-box-number">0</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Commission</span>
            <span class="info-box-number">0</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Pin</span>
            <span class="info-box-number"><?php echo $num_rows; ?></span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Inquery</span>
            <span class="info-box-number">0</span>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-10">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Overall Income </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <div class="box-body chart-responsive">
                <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Pin Per Income </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <button type="button" onclick="window.open('pin-purchase','_self')"
        class="btn btn-primary btn-block btn-flat btn-lg" style="width: 100%;"> Buy Pin </button>
      <button type="button" onclick="window.open('pin-manage','_self')"
        class="btn btn-default btn-block btn-flat btn-lg" style="width: 100%;"> My Pin</button>
    </div>
  </div>
</div>
</div>
<?php
  $barchart = printwhileloop("SELECT `compid`,`timedate` FROM `aplied_job` WHERE `compid`='$id' GROUP BY Month(`timedate`)"); 
?> 
<script>
  $(function () {
    "use strict";
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        { label: "Job Post", value: <?php echo TotalJobPostByIndividual($id); ?> },
        { label: "Total Applies", value: <?php echo jobtyCountAppliedJobByIndiuvidual($id); ?> },
        { label: "Selected", value: 3 }
      ],
      hideHover: 'auto'
    });
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        <?php foreach ($barchart as $key => $barvalue) {
          echo "{y: '" . date('M', strtotime($barvalue[2])) . "', a: " . TotalJobPostByIndividual($barvalue[0]) . ", b: " . jobtyCountAppliedJobByIndiuvidual($barvalue[0]) . "},";
        } ?>
      ],
      barColors: ['#5073D7', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Post Job', 'Applies'],
      hideHover: 'auto'
    });
  });
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
<?php include_once 'footer.php'; ?>