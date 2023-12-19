<?php
$apply=mysqli_query($db,"SELECT `id`, `admin`, `stfid`, `name`, `middle`, `last`, `contact`, `emailid`, `pic`, `resume`, `pass`, `status`, `regiprice`, `regi_status`, `sread`, `ip`, `datetime` FROM `candidate` WHERE `id`='".$id."'");
$ab=mysqli_fetch_array($apply);
?>
 <div class="col-md-9"> 
          <div class="box">
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    <?php echo date('d, M.  Y',strtotime($ab['datetime'])); ?>
                  </span>
            </li>
            <!-- /.timeline-label -->
             <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
                <span class="time">
                	<!-- <i class="fa fa-clock-o"></i> 5 mins ago -->
                </span>

                <h3 class="timeline-header no-border"><a href="#"><?php echo ucwords($ab['name']).'&nbsp;'.ucwords($ab['middle']).'&nbsp;'.ucwords($ab['last']); ?></a> You Register Successfully</h3>
              </div>
            </li>
            <!-- timeline item -->
            <li>
              <i class="fa fa-building bg-blue"></i>

              <div class="timeline-item">
                <span class="time">
                	<!-- <i class="fa fa-clock-o"></i> 12:05 -->
                </span>

                <h3 class="timeline-header"><a href="#">Your Applied Job List</a></h3>
                  <?php
                   $apply=mysqli_query($db,"SELECT `id`, `admid`, `stfid`, `compid`, `jobid`, `applicantid`, `status`, `msg`, `timedate`, `ip` FROM `aplied_job` WHERE `applicantid`='".$ab['id']."'");
                  while($ab=mysqli_fetch_array($apply)){ ?>
                <div class="timeline-body">
                 <?php echo ucwords(postName($ab["jobid"]));?>
                 <br/>
                 <?php echo ucwords(companyname(postComp($ab["jobid"])));  ?>
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs"><?php echo date('d/m/Y',strtotime($ab["timedate"])); ?> </a>
                  -><a class="btn btn-success btn-xs"><?php echo ucwords($ab["status"]); ?></a>
                </div>
            <?php }?>
              </div>
            </li>
            <!-- <li>
              <i class="fa fa-comments bg-yellow"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                <div class="timeline-body">
                  Take me to your leader!
                  Switzerland is small and neutral!
                  We are more like Germany, ambitious and misunderstood!
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                </div>
              </div>
            </li>
            <li class="time-label">
                  <span class="bg-green">
                    3 Jan. 2014
                  </span>
            </li>
            <li>
              <i class="fa fa-camera bg-purple"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                <div class="timeline-body">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                </div>
              </div>
            </li> 
            <li>
              <i class="fa fa-video-camera bg-maroon"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

                <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                            frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="timeline-footer">
                  <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                </div>
              </div>
            </li>-->
            
            <!-- <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li> -->
          </ul>
      </div>
        </div>
        </div>
      </div>