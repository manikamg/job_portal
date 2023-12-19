<?php include_once 'head.php'; ?>
<?php include_once 'menu.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">

    <div class="row">
      <div class="col-lg-3 col-xs-12">
        <div class="small-box card-purple-blue border-radius-7">
          <div class="inner">
            <p>Today Jobs</p>
          </div>

          <a href="today-job" class="small-box-footer">View<br /><i class="fa fa-arrow-circle-up"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Job Posted On This Week</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="barChart" style="height:230px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>

      <div class="col-lg-6">
        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Applied Job On This Week</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="appliedJob" style="height:230px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>


      <div class="col-lg-6">
        <!-- DONUT CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Candidate Registration On This Week</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="pieChart" style="height:230px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>


    </div>

    <div class="row">
      <hr />
      <?php $admsql = query("SELECT `id`, `admid`, `name`, `company`, `contact`, `address`, `about`, `email`, `loginid`, `password`, `pic`, `is_super`, `created_at`, `updated_at` FROM `admins` WHERE `admid`='$id'");
      while ($admrun = mysqli_fetch_array($admsql)) { ?>
        <div class="col-lg-3 col-xs-12">
          <div class="small-box card-purple-blue border-radius-7"  style="height:150px;">
            <div class="inner">
              <h3>
                <img src="../assets/clients/<?php echo $admrun['pic']; ?>" style=width:70px;border-radius:5px; />
              </h3>
              <p>
                <?php echo $admrun['company']; ?>
              </p>
            </div>
            <div class="icon">
              <i class="fa fa-dashboard"></i>
            </div>
            <a href="dashboard?id=<?php echo $admrun['id']; ?>" class="small-box-footer"><i
                class="fa fa-arrow-circle-up"></i></a>
          </div>
        </div>
      <?php } ?>
    </div>



    <div align="left">
      <legend><b>Setting</b></legend>
    </div>
    <div class="row">
      <div class="col-lg-3 col-xs-12">
        <div class="small-box card-purple-blue border-radius-7">
          <div class="inner">
            <p>Job Tag</p>
          </div>
          <a href="job-cat" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="small-box card-blue-green border-radius-7">
          <div class="inner">
            <p>Job Type</p>
          </div>
          <a href="job-type" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="small-box card-salmon-pink border-radius-7">
          <div class="inner">
            <p>Locations</p>
          </div>
          <a href="location" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="small-box card-purple-pink border-radius-7">
          <div class="inner">
            <p>Blog</p>
          </div>
          <a href="blog" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="small-box border-radius-7 card-purple-blue">
          <div class="inner">
            <p>Candidate</p>
          </div>
          <a href="candidate-manage" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="small-box border-radius-7 card-blue-green">
          <div class="inner">
            <p>Job Posted</p>
          </div>
          <a href="manage-job" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="small-box border-radius-7 card-salmon-pink">
          <div class="inner">
            <p>Intership Posted</p>
          </div>
          <a href="internship" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-12">
        <div class="small-box border-radius-7 card-purple-pink">
          <div class="inner">
            <p>Company Add</p>
          </div>
          <a href="company" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
        </div>
      </div>
    </div>
  </section>

  <div style="background-color:#fff;">
    <table id="example1" class="table table-fixedheader table-bordered table-striped">
      <thead>
        <tr>
          <th><small>Sno.</small></th>
          <th><small>Photo</small></th>
          <th>Name</th>
          <th>Company</th>
          <th>Contact Number</th>
          <th>Address</th>
          <th>Login Id</th>
          <th>Password</th>
          <th>UPI</th>
          <th>Type</th>
        </tr>
      </thead>
      <tbody id="myTable" style="height:400px">
        <?php
        $i = 1;
        $sqll = mysqli_query($db, "SELECT `id`, `admid`, `name`, `company`, `contact`, `address`, `about`, `email`, `loginid`, `password`, `pic`, `upi`, `acno`, `ifsc`, `branch`, `bankname`, `whtsnum`, `tc`, `is_super`, `created_at`, `updated_at` FROM `admins`");
        while ($row = mysqli_fetch_array($sqll)) { ?>
          <tr>
            <td>
              <?php echo $i ?>
            </td>
            <td>
              <?php if (empty($row['pic'])) { ?>
                <img src="../assets/clients/1610802184.png" alt="GHS" width="60px;" height="60px;">
              <?php } else { ?>
                <img src="../assets/<?php echo $row['pic']; ?>" alt="Job Portal" width="60px;" height="60px;">
              <?php } ?>


            </td>
            <td><b>
                <?php echo $row['name']; ?>
              </b></td>
            <td><b>
                <?php echo $row['company']; ?>
              </b></td>
            <td>
              <?php echo $row['contact']; ?>
            </td>
            <td>
              <?php echo $row['address']; ?>
            </td>
            <td>
              <?php echo $row['loginid']; ?>
            </td>
            <td>
              <?php echo $row['password']; ?>
            </td>
            <td>
              <?php echo $row['upi']; ?><br />
              <?php echo $row['acno']; ?><br />
              <?php echo $row['ifsc']; ?><br />
              <?php echo $row['branch']; ?><br />
              <?php echo $row['bankname']; ?>
            </td>
            <td>
              <a href="#" class="btn btn-warning">
                <?php if ($row['is_super'] == 0) {
                  echo 'Admin';
                } else {
                  echo 'franchise';
                } ?>
              </a>
            </td>
          </tr>
          <?php $i++;
        } ?>

      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>

<!-- ChartJS -->
<script src="../bower_components/chart.js/Chart.js"></script>

<script>
  $(document).ready(function () {
    getdata();
  });

  const color = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
  const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  const map = {
    'Monday': 1, 'Tuesday': 2, 'Wednesday': 3, 'Thursday': 4, 'Friday': 5, 'Saturday': 6, 'Sunday': 7
  };
  var barChartOptions = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: true,
    //String - Colour of the grid lines
    scaleGridLineColor: 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: false,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - If there is a stroke on each bar
    barShowStroke: true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth: 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing: 15,
    //Number - Spacing between data sets within X values
    barDatasetSpacing: 1,
    //String - A legend template
    legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive: true,
    maintainAspectRatio: true
  }

  function getdata() {
    // Posted jon on this week ------------------------------------------
    $.ajax({
      type: "GET",
      url: "get_barchart_data.php",
      success: function (response) {
        const unique = [...new Set(response.map((element) => element.timedate.slice(0, 10)))]
        const PieData = []

        const labelDataArray = []
        const labelArray = []
        const dataArray = []

        for (let i = 0; i < unique.length; i++) {
          const count = response.filter((e) => e.timedate.slice(0, 10) == unique[i])

          var date = new Date(unique[i]);
          var dayName = days[date.getDay()];

          labelDataArray.push({
            data: count.length,
            label: dayName
          })

          if (i === (unique.length - 1)) {
            labelDataArray.sort((a, b) => {
              return map[a.label] - map[b.label];
            });

            for (let j = 0; j < labelDataArray.length; j++) {
              labelArray.push(
                labelDataArray[j].label
              )
              dataArray.push(
                labelDataArray[j].data
              )
            }

            var areaChartData = {
              labels: labelArray,
              datasets: [
                {
                  label: 'Electronics',
                  fillColor: 'rgba(210, 214, 222, 1)',
                  strokeColor: 'rgba(210, 214, 222, 1)',
                  pointColor: 'rgba(210, 214, 222, 1)',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: dataArray
                },

              ]
            }

            var barChartCanvas = $('#barChart').get(0).getContext('2d')

            var barChart = new Chart(barChartCanvas)
            var barChartData = areaChartData

            barChartData.datasets[0].fillColor = '#00a65a'
            barChartData.datasets[0].strokeColor = '#00a65a'
            barChartData.datasets[0].pointColor = '#00a65a'

            barChartOptions.datasetFill = true
            barChart.Bar(barChartData, barChartOptions)
          }
        }

      },
      error: function (err) {
        console.log(err)
      }
    });
    // Applied jon on this week ------------------------------------------
    $.ajax({
      type: "GET",
      url: "get_applied_job.php",
      success: function (response) {

        const unique = [...new Set(response.map((element) => element.timedate.slice(0, 10)))]
        const PieData = []

        const labelDataArray = []
        const labelArray = []
        const dataArray = []

        for (let i = 0; i < unique.length; i++) {
          const count = response.filter((e) => e.timedate.slice(0, 10) == unique[i])

          var date = new Date(unique[i]);
          var dayName = days[date.getDay()];

          labelDataArray.push({
            data: count.length,
            label: dayName
          })

          if (i === (unique.length - 1)) {
            labelDataArray.sort((a, b) => {
              return map[a.label] - map[b.label];
            });

            for (let j = 0; j < labelDataArray.length; j++) {
              labelArray.push(
                labelDataArray[j].label
              )
              dataArray.push(
                labelDataArray[j].data
              )
            }


            var appliedJobChartData = {
              labels: labelArray,
              datasets: [
                {
                  label: 'Electronics',
                  fillColor: 'rgba(210, 214, 222, 1)',
                  strokeColor: 'rgba(210, 214, 222, 1)',
                  pointColor: 'rgba(210, 214, 222, 1)',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: dataArray
                },

              ]
            }

            var appliedJobCanvas = $('#appliedJob').get(0).getContext('2d')

            var appliedJobChart = new Chart(appliedJobCanvas)
            var appliedJobChartData_ = appliedJobChartData

            appliedJobChartData_.datasets[0].fillColor = 'blue'
            appliedJobChartData_.datasets[0].strokeColor = 'blue'
            appliedJobChartData_.datasets[0].pointColor = 'blue'

            barChartOptions.datasetFill = true
            // barChart.Bar(barChartData, barChartOptions)
            appliedJobChart.Bar(appliedJobChartData_, barChartOptions)
          }
        }

      },
      error: function (err) {
        console.log(err)
      }
    });

    // Regiterd candidate on this week ------------------------------------------
    $.ajax({
      type: "GET",
      url: "get_candidate.php",
      success: function (response) {
        console.log(response)
        const unique = [...new Set(response.map((element) => element.datetime.slice(0, 10)))]
        const PieData = []

        for (let i = 0; i < unique.length; i++) {
          const count = response.filter((e) => e.datetime.slice(0, 10) == unique[i])

          var date = new Date(unique[i]);
          var dayName = days[date.getDay()];

          PieData.push({
            value: count.length,
            color: color[i],
            highlight: color[i],
            label: dayName
          })

        }
        if (PieData.length) {
          PieData.sort((a, b) => {
            return map[a.label] - map[b.label];
          });

          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var pieChart = new Chart(pieChartCanvas)
          var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: '#fff',
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: 'easeOutBounce',
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          pieChart.Doughnut(PieData, pieOptions)
        }

      },
      error: function (err) {
        console.log(err)
      }
    });
  }

</script>
<?php include_once 'footer.php'; ?>