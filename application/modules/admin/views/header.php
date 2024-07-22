<body class="sidebar-mini">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('assets/images/logo.png')?>" alt="VPMIS" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:  #f4f6f9">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <ol class="breadcrumb float-sm-right" style="background-color: #fff;padding: 0.5rem 1rem;border-radius: 30px;">
        <i class="nav-icon fas fa-tachometer-alt" style="padding-top: 5px;color:#2b9adb;"></i>
        <li class="breadcrumb-item"><a href="<?= base_url('admin/home/')?>">Dashboard</a></li>
        <?php if($this->uri->segment(2) != 'home'){?>
        <li class="breadcrumb-item active"><?= str_replace('_',' ',ucfirst($this->uri->segment(2)))?></li>
        <?php }?>
      </ol>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="<?= base_url('assets/images/'.$hresult->pro_pic)?>" class="img-circle elevation-2" alt="User Image" width="30px" height="30px">
          <i class="fas fa-angle-down"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <div class="media" style="padding: 10px">
            <img src="<?= base_url('assets/images/'.$hresult->pro_pic)?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <span><?= $hresult->firstname.' '.$hresult->lastname?></span><br/>
              <span style="font-size: 14px;"><?= $hresult->username?></span>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <div class="media" style="padding: 10px 30px">
            <div class="media-body">
              <a href="<?= base_url('admin/profile/')?>" class="btn btn-primary mb-3" style="width: 100%;">
                <i class="fas fa-user"></i>
                <span>Profile</span><br/>
              </a><br/>
              <a href="<?= base_url('admin/logout/')?>" class="btn btn-warning" style="width: 100%;">LOGOUT</a>
            </div>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="background-color: #19b5fe">
      <img src="<?= base_url('assets/images/logo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <h4 class="brand-text">SMRS</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/images/'.$hresult->pro_pic)?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $hresult->firstname.' '.$hresult->lastname?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('admin/home/')?>" class="nav-link <?php echo $this->uri->segment(2) == 'home' ? 'active' : '';?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item  <?= $this->uri->segment(2) == 'medical_staff' || $this->uri->segment(2) == 'coaches' || $this->uri->segment(2) == 'athletes' ? 'menu-open' : '';?>">
            <a href="#" class="nav-link <?= $this->uri->segment(2) == 'medical_staff' || $this->uri->segment(2) == 'coaches' || $this->uri->segment(2) == 'athletes' ? 'active' : '';?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/coaches/')?>" class="nav-link <?php echo $this->uri->segment(2) == 'coaches' ? 'active' : '';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coaches</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/athletes/')?>" class="nav-link <?php echo $this->uri->segment(2) == 'athletes' ? 'active' : '';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Athletes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/medical_staff/')?>" class="nav-link <?php echo $this->uri->segment(2) == 'medical_staff' ? 'active' : '';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medical Staffs</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/sports/')?>" class="nav-link <?php echo $this->uri->segment(2) == 'sports' ? 'active' : '';?>">
              <i class="nav-icon fas fa-volleyball-ball"></i>
              <p>
                Team Sports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/attendance/')?>" class="nav-link <?php echo $this->uri->segment(2) == 'attendance' || $this->uri->segment(2) == 'checkAttendance' ? 'active' : '';?>">
              <i class="nav-icon fas fa-calendar-day"></i>
              <p>
                Attendance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/athleteStatus/')?>" class="nav-link <?php echo $this->uri->segment(2) == 'athleteStatus' ? 'active' : '';?>">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Athletes Status
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/post/')?>" class="nav-link <?php echo $this->uri->segment(2) == 'post' ? 'active' : '';?>">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Post
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/surveys/')?>" class="nav-link <?php echo $this->uri->segment(2) == 'surveys' ? 'active' : '';?>">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Surveys
              </p>
            </a>
          </li>
          <li class="nav-item" hidden>
            <a href="#" class="nav-link" data-target="#modal-updateSY" data-toggle="modal">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Set School Year
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="modal fade" id="modal-updateSY">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1>SET SCHOOL YEAR</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url('admin/update_SY/')?>" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <select class="select2 form-group" name="school_year" style="width: 100%">
                  <option selected><?= $this->nativesession->get('school_year');?></option>
                  <?php for($x=(date('Y')+1);$x >= 2020; $x--){?>
                  <option><?php echo $x-1 .'-'.$x?></option>
                  <?php }?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-success">Set</button>
          </div>

        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>