<?php include_once 'head.php';
if(isset($_POST['getdata'])){
  echo "<script>window.open('resume-data?locate=".trim($_POST['search_city'])."&key=".trim($_POST['search_keyword'])."','_self');</script>";}
 ?><div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small>Welcome Back, <b><?php echo ucwords($run['name']); ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage</li>
      </ol>
    </section>
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
              <div class="col-lg-9 col-md-8">
                <form name="filter_search" id="filter_search"  method="POST">
                      <label>Search Candidates</label>
                         <div class="form-row">
                          <div class="col-md-4 form-group position-relative">
                              <input type="text" class="form-control rounded-0" name="search_keyword" id="seeker_keyword" onkeyup="ajax_showOptions(this,'getsubmissionurlByLetters',event)" autocomplete="off" placeholder="Enter Keywords, Skills etc">
                              <p class="pt3px" id="rs_error_msg" style="color:red;"></p>
                            </div>
                            <div class="col-md-4 form-group">
                             <select class="form-control select2" name="joblocation" onchange="joblocation(this.value);"><option value=""> Select Location</option>
              <?php $tpie=printwhileloop("SELECT `id`, `name` FROM `job_locations`");
                  foreach ($tpie as $key => $xyzu) { ?>
                    <option value="<?php echo $xyzu[0] ?>"><?php echo ucwords($xyzu[1]) ?></option>
                  <?php }?>
                </select>
                            </div>
                           <div class="col-md-4 text-center-xs form-group">
                             <button type="submit" name="getdata" class="btn btn-custom btn-lg"><i class="fa fa-search-plus"></i></button>
                           </div> 
                        </div>                         
                    </form>
                </div>
                <div class="col-lg-3 col-md-4">
                  <div class="text-center border-left border-top-md border-0-md">
                      <p class="pb-2 pt-2 mb-0">Hire from 30+ Lacs candidates</p>

                        <p><a href="new-job-post"  class="btn btn-lg btn-info text-uppercase pl-3 pr-3">Post Job</a></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-12">
          <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-black-tie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Job Post</span>
              <span class="info-box-number"><?php echo TotalJobPostByIndividual($id); ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Applies</span>
              <span class="info-box-number"><?php echo jobtyCountAppliedJobByIndiuvidual($id); ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Interview List</span>
              <span class="info-box-number">0</span>
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
}
<div class="col-md-10">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Overall Graph </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
          </div></div></div>
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly JobPost/Applies</h3>

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
      </div></div>
<div class="col-md-2">
<button type="button" onclick="window.open('new-job-post','_self')" class="btn btn-primary btn-block btn-flat btn-lg" style="width: 100%;"> Post New Job</button>
<button type="button" onclick="window.open('manage-job-post','_self')" class="btn btn-default btn-block btn-flat btn-lg" style="width: 100%;"> View Post</button>
<button type="button" onclick="window.open('search-resume','_self')" class="btn btn-info btn-block btn-flat btn-lg" style="width: 100%;"> Find Resume</button>
<button type="button" onclick="window.open('candidate-add','_self')" class="btn btn-warning btn-block btn-flat btn-lg" style="width: 100%;"> Add Candidate</button>
<button type="button" onclick="window.open('add-interview','_self')" class="btn btn-danger btn-block btn-flat btn-lg" style="width: 100%;"> Schedule Interview</button>
<button type="button" onclick="window.open('calling-manage','_self')" class="btn btn-info btn-block btn-flat btn-lg" style="width: 100%;">Calling Manage</button>
</div></div></div></div> 
<?php
$barchart=printwhileloop("SELECT `compid`,`timedate` FROM `aplied_job` WHERE `compid`='$id' GROUP BY Month(`timedate`)");?>
<script>
  $(function () {
    "use strict";
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Job Post", value: <?php echo TotalJobPostByIndividual($id); ?>},
        {label: "Total Applies", value: <?php echo jobtyCountAppliedJobByIndiuvidual($id); ?>},
        {label: "Selected", value: 3}
      ],
      hideHover: 'auto'
    });
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        <?php foreach ($barchart as $key => $barvalue) { 
  echo "{y: '".date('M',strtotime($barvalue[2]))."', a: ".TotalJobPostByIndividual($barvalue[0]).", b: ".jobtyCountAppliedJobByIndiuvidual($barvalue[0])."},";
 }?>
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
<?php include_once 'footer.php';?>