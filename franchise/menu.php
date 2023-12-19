<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/clients/<?php echo $run['logo']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>  
                        
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{ url('/admin') }}" class="nav-primary">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Manage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="candidate-manage"><i class="fa fa-circle-o"></i> Candidate</a></li>
            <li><a href="client-manage"><i class="fa fa-circle-o"></i> Client</a></li>
            <li><a href="employee-manage"><i class="fa fa-circle-o"></i> Employee</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Blacklisting</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Employee</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Employer</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Report</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/formsetting') }}"><i class="fa fa-circle-o"></i> Form</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            
          </ul>
        </li>
        <li class="header">Action</li>
        <li>
                  <a class="dropdown-item" href="../logout.php">Logout</a>
            </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>