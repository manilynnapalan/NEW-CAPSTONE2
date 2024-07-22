  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-users"></i>
            <span class="mt-2">CHANGE ACCOUNT</span>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-6">
                    <form action="<?= base_url('medical_staff/update_user_account/')?>" method="post">
                      <p class="mt-2">Username</p>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Firstname" name="username" value="<?= $row->username?>" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user-secret"></span>
                          </div>
                        </div>
                      </div>
                      <p class="mt-2">New Password</p>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Enter New Password" name="password" id="password" minlength="8" maxlength="15">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <a href="#" class="fas fa-eye" data-id="1" style="color: #495057;"  id="p_eye"></a>
                          </div>
                        </div>
                      </div>
                      <p class="mt-2">Confirm Password</p>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype Password" id="re_password" name="re_password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <a href="#" class="fas fa-eye" style="color: #495057;" id="rp_eye"></a>
                          </div>
                        </div>
                      </div>
                      </br>
                      <center><button type="submit" class="btn btn-success" id="but_reg">Save Changes</button></center>
                    </form>
                  </div>
                  <div class="col-sm-3"></div>
                </div>
              </div>
              
            </div>
            <!-- /.card -->
          </div>

        </div>

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
