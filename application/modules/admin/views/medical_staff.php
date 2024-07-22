  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-users"></i>
            <span class="mt-2">MEDICAL STAFFS</span>
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-register"><i class="fas fa-user-plus" style="margin-right: 5px;"></i>Add New Medical Staff</button>
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
                <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                    if(count($allMedical) > 0){
                      foreach ($allMedical as $value) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $value->username?>
                        </td>
                        <td>
                          <?php echo $value->firstname.' '. $value->lastname?>
                        </td>
                        <td>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modal-update<?= $value->account_id;?>"><i class="fas fa-edit"></i>Edit</button>
                          <!-- <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value->account_id;?>"><i class="fas fa-trash-alt"></i>Delete</button> -->
                          <!-- <div class="modal fade" id="modal-delete<?= $value->account_id;?>">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="<?php echo base_url('admin/delete_coach/'.$value->account_id)?>" method="post">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-12 text-center">
                                        <h4>Are you sure you want to delete <span class="btn btn-danger" style="cursor: default"><?= $value->firstname.' '.$value->lastname?></span>?</h4>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div> -->
                        </td>

                        <div class="modal fade" id="modal-update<?php echo $value->account_id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Update Form</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="<?php echo base_url('admin/update_staff/'.$value->account_id)?>" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <label class="mt-2">ID Number</label>
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="ID Number serves as username" name="username" value="<?=  $value->username?>" disabled>
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <label class="mt-2">Firstname</label>
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Firstname" name="fname" value="<?= $value->firstname?>" required>
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <label class="mt-2">Lastname</label>
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Lastname" name="lname" value="<?= $value->lastname?>" required>
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <label class="mt-2">Middle Initial</label>
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Middle Initial" name="middle_initial" maxlength="1" value="<?= $value->middle_initial?>" required>
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <label class="mt-2">License Number</label>
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="License Number" name="license" value="<?= $value->address?>" required>
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-id-badge"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <label class="mt-2">Date Validity</label>
                                      <div class="input-group mb-3">
                                        <input type="date" class="form-control" placeholder="Date Validity" name="validty" value="<?= $value->birthdate?>" required>
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-calendar"></span>
                                          </div>
                                        </div>
                                      </div>
                                      <label class="mt-2">Password <em style="color: red;font-size: 14px;">(Note: Leave the password blank if you don't want to change it.)</em></label>
                                      <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder="Blank" name="password">
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-user-secret"></span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger col-lg-5" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary col-lg-5">Update</button>
                                </div>

                              </form>
                            </div>
                          </div>
                        </div>
                      </tr>
                      

                    <?php } }?>
                  </tbody>
                </table>
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


      <div class="modal fade" id="modal-register">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD NEW MEDICAL STAFF</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url('admin/insert_staff/')?>" method="post" id="reg_form" enctype="multipart/form-data" autocomplete="off">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <div class="form-group">
                        <img class="image_design" src="<?php echo base_url('assets/pro_pic_images/pro_pic_icon.png')?>" id="img_preview" style="cursor: pointer;">
                        <div><label id="customFile2">(Picture Name)</label></div>
                      </div>
                      <div class="form-group" hidden>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="pro_pic" accept="image/*" onchange="loadFile(event,'pro_pic')">
                          <label class="custom-file-label" style="text-align: left" for="customFile" id="label_choose_file">Choose file</label>
                        </div>
                      </div>
                    </center>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label class="m-0"><em>Note: DEFAULT PASSWORD: Ch@ngeMe!</em></label><br/>
                    <label class="mt-2">Username</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-2">Firstname</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Firstname" name="fname" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-2">Lastname</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Lastname" name="lname" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-2">Middle Initial</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Middle Initial" name="middle_initial" maxlength="1" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-2">License Number</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="License Number" name="license" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-id-badge"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-2">Date Validity</label>
                    <div class="input-group mb-3">
                      <input type="date" class="form-control" placeholder="Date Validity" name="validty" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-calendar"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>