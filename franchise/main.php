  <div class="col-md-9">  
<div class="col-md-8">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title"><small>Apply/Post Chart</small></h3>
</div></div>
<div class="box-body chart-responsive">
<div class="chart" id="revenue-chart" style="height: 300px;"></div></div></div>
  <div class="col-md-4">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-building-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number"><?php echo TotalJobPostByIndividual($id); ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">Total Job Post</span>
            </div>
          </div>
          <div class="info-box bg-gray">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-number"><?php echo jobtyCountAppliedJobByIndiuvidual($id); ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">Total Applies
                  </span>
            </div>
          </div>
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-list-ul"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">0</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">Short Listed
                  </span>
            </div></div>
          </div></div>
          
            <div class="box-body table-responsive" style="background-color:#fff;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            <tr><th>Sno.</th><th>Last Date</th><th>Type</th><th>Location</th><th>Post</th><th>No.Post<th>Prority</th><th>Experiance</th><th>View</th></tr></thead>
                      <tbody id="myTable"> 
                    <?php 
                    $i=1;
                    $sqlrun="SELECT * FROM `post_job` WHERE `adminid`='$id' AND `status`='active' ORDER BY `timedate` DESC";
                    $postlist=sqlquery($sqlrun);
                    while($row=mysqli_fetch_array($postlist)){
                    $stringxiu = str_replace(' ', '-', postname($row['jobtyp'])); 
                    $qstringxiuq = str_replace(' ', '-', ($row['postname'])); ?>
                  <tr> 
                    <td><?php echo $i; ?>.</td>
                    <td class="mailbox-attachment"><span class="label label-warning"><?php echo date('d-m/Y',strtotime($row['edate'])); ?></span></td> 
                    <td><a href="#"><?php echo ucwords($row['joiningprocess']); ?></a></td>
                    <td><a href="#"><?php echo ucwords($row['location']); ?></a></td>
                    <td class="mailbox-subject"><b><?php echo ucwords($row['postname']); ?></td>
                      <td class="mailbox-subject"><span class="label label-warning"><?php echo ($row['post_number']); ?></span></td> 
                      <td class="mailbox-subject"><b><?php echo ucwords($row['priority']); ?></td>
                        <td class="mailbox-subject"><b><?php echo ucwords($row['exp']); ?></td> <td>
                          <ul>
                  <li role="presentation"><input type="button" name="view" value="View Full Post" id="<?php echo $row["id"]; ?>" class="btn btn-info view_dataxx" /></li> 
                  <li role="presentation"><a href="https://rmjob.in/post-view/<?php echo strtolower($qstringxiuq); ?>//<?php echo ($row['id']); ?>/apply" target="_blank" class="btn btn-default">Get Apply Link</a></li>
                </ul>
              </td></tr>
                  <?php $i++;}?>
                  </tbody>
                </table>
              </div>
            </div>
           </div>
           
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

</script>