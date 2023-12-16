 <?php 
 include_once 'head.php';
 include_once 'menu.php'; ?>
 <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Welcome Admin
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Welcome Admin</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo TotalApplications($db); ?></h3>

              <p>Applications</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="candidate-manage" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo TotalCompany($db); ?></h3>

              <p>Registered Company</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="client-manage" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo TotalJobPost($db); ?></h3>

              <p>Job Post</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo TotalCompany($db); ?></h3>

              <p>Company</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-up"></i></a>
          </div>
        </div>
        <div class="col-lg-12 col-xs-12"><br/><hr/><br/></div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <p>Candidate</p>
            </div>
            <a href="candidate-manage" class="small-box-footer">View<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <p>Company</p>
            </div>
            <a href="client-manage" class="small-box-footer">View<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> 
      <div class="col-lg-12 col-xs-12"><br/><hr/><br/></div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-stumbleupon-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Telecaller</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Telecaller| PBO | KPO 
                  </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=telecaller','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Back Office</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Data Enter| Office Staff | MTS| Back Office
                  </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=backoffice','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-stumbleupon-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Marketing </span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Marketing | Sales
                  </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=marketing','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Accountant</span>
                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    CA| Accountant |TELLY </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=accountant','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-stumbleupon-circle"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">IT-Computer</span>
                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Engineer| Developer |Designer </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filtere?job=it','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Teacher</span>
                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    College| School |Coaching </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=teacher','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Front Office</span>
                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Receptionist | Front Office  </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=frontoffice','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Hotel</span>
                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Hotel | Travel | Resturant </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=hotel','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-stumbleupon-circle"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Designer</span>
                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Fashion| graphics | Decore </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=designer','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-stumbleupon-circle"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Technician</span>
                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Operator | Technician  </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=technicial','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Driver</span>
                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Lite| Hyvy |National </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=driver','_self')">
                    View
                  </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-stumbleupon-circle"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Delivery </span>
                <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Delivery| Callection </span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=delivery','_self')">
                    View
                  </button>
            </div>
          </div>
        </div> 
        <div class="col-md-3 col-sm-6 col-xs-12"></div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Other Jobs </span>
                <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    We will Forward Best Suitable Section , According to your CV</span><br/>
                  <button class="btn-lg btn btn-danger" onclick="window.open('candidate-manage-filter?job=other','_self')">
                    View
                  </button>
            </div>
          </div>
      </section>
      </div></div></div>  
 <?php  include_once 'footer.php'; ?>
