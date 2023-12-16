<?php  include_once 'head.php';?>
  <?php
  $apply=sqlquery("SELECT `id` FROM `aplied_job` WHERE `applicantid`='".$id."'");
  $ab=mysqli_num_rows($apply);
  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1><small>Welcome Back, <b><?php echo ucwords($run['name']); ?></b></small></h1>
      <ol class="breadcrumb"><li><a href="#"><i class="fa fa-clock-o"></i> <?php echo date('m-D-Y'); ?></a></li></ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3"> 
          <div class="box box-primary">
            <div class="box-body box-profile">
          <?php if(empty($run['pic'])){ ?>
             <img class="profile-user-img img-responsive img-circle" src="../assets/general/jobs.png" alt="<?php echo $run['name']; ?>">  
           <?php }else{?>
          <img class="profile-user-img img-responsive img-circle" src="../assets/clients/<?php echo $run['pic']; ?>" alt="<?php echo $run['name']; ?>">   
          <?php }?> 
 <h3 class="profile-username text-center"><b><?php echo ucwords($run['name']); ?></b></h3> 
<p class="text-muted text-center"><small>Mamber Since:</small> <?php echo date('M-Y',strtotime($run['created_at'])); ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Jobs Applied</b> <a class="pull-right"><?php echo $ab; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php if($run['regi_status']=='no'){?><b style="color: red;">PENDING</b><?php }else{?>ACTIVE<?php }?></a>
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
                 <li><a href="./?main"><i class="fa fa-circle-o text-yellow"></i>Home</a></li>
                <li><a href="calling-list"><i class="fa fa-circle-o text-yellow"></i> Calling List</a></li>
                <li><a href="calling-manage"><i class="fa fa-circle-o text-red"></i> Manage</a>
                </li>
                
                <li> <a class="dropdown-item" href="../logout.php">Logout</a></li>
              </ul>
            </div>
          </div></div>
          <?php  
          if(isset($_GET['main'])){
          include_once 'main.php';
          }elseif (isset($_GET['calling-list'])) {
          include_once 'applied-post.php';
          }elseif (isset($_GET['manage-account'])) {
          include_once 'calling-manage.php';
          }
          ?>
          </div>
        </div>
      </div>
    </section>
 </div>
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Post Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<script>   
 $(document).ready(function(){  
      $('.view_dataxx').click(function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"post-details-view.php",  
                method:"post",  
                data:{post_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
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
<script>
  $(function () {
    "use strict";

    // AREA CHART
    var area = new Morris.Area({
      element: 'revenue-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666, item2: 2666},
        {y: '2011 Q2', item1: 2778, item2: 2294},
        {y: '2011 Q3', item1: 4912, item2: 1969},
        {y: '2011 Q4', item1: 3767, item2: 3597},
        {y: '2012 Q1', item1: 6810, item2: 1914},
        {y: '2012 Q2', item1: 5670, item2: 4293},
        {y: '2012 Q3', item1: 4820, item2: 3795},
        {y: '2012 Q4', item1: 15073, item2: 5967},
        {y: '2013 Q1', item1: 10687, item2: 4460},
        {y: '2013 Q2', item1: 8432, item2: 5713}
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2'],
      labels: ['Item 1', 'Item 2'],
      lineColors: ['#a0d0e0', '#3c8dbc'],
      hideHover: 'auto'
    });

    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Download Sales", value: 12},
        {label: "In-Store Sales", value: 30},
        {label: "Mail-Order Sales", value: 20}
      ],
      hideHover: 'auto'
    });
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });
  });
</script>
