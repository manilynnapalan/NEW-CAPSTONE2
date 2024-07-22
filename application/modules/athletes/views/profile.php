  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-2">
          </div>
          <div class="col-lg-8">
          </div><!-- /.col -->
          <div class="col-lg-2">
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <div class="card card-primary">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-9"><h3 class="m-0">Profile</h3></div>
                  <div class="col-sm-3"><a href="#" class="m-0 btn btn-success" id="profile_edit" style="width: 100%"><i class="fas fa-edit"></i> Edit</a></div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-square" src="<?php echo base_url('assets/images/'.$hresult->pro_pic);?>" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center"><?php echo strtoupper($hresult->firstname.' '.$hresult->lastname)?></h3>
                    <p class="text-muted text-center"></p>
                    <ul class="list-group list-group-unbordered mb-3 text-center">
                      <li class="list-group-item">
                        Username: <span><?php echo $hresult->username?></span>
                      </li>
                      <li id="li_update_profile" class="list-group-item text-left" style="display:none">
                        <form action="<?= base_url('athletes/update_profile/')?>" method="post" enctype="multipart/form-data">
                          <center>
                            <div class="form-group">
                              <img class="image_design" src="<?php echo base_url('assets/images/'.$hresult->pro_pic)?>" id="img_preview" style="cursor: pointer;">
                              <div><label id="customFile2"><?= $hresult->pro_pic?></label></div>
                            </div>
                            <div class="form-group" hidden>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="pro_pic" accept="image/*" onchange="loadFile(event,'pro_pic')">
                                <label class="custom-file-label" style="text-align: left" for="customFile" id="label_choose_file">Choose file</label>
                              </div>
                            </div>
                          </center>
                          <label class="mt-1">Firstname</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Firstname" name="fname" value="<?= $hresult->firstname?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Lastname</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Lastname" name="lname" value="<?= $hresult->lastname?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Middle Initial</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Middle Initial" name="mi" value="<?= $hresult->middle_initial?>" maxlength="1" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Name Extension</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="ie. Jr., Sr., I" name="extension" value="<?= $hresult->extension?>">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Course</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Course" name="course" value="<?= $hresult->course?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Username</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Lastname" name="username" value="<?= $hresult->username?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user-secret"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Password <em style="color:red;font-size: 13px;">(Note: Leave the password blank if you don't want to change your password.)</em></label>
                          <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="blank" id="password" name="password">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <a href="#" class="fas fa-eye" data-id="1" style="color: #495057;"  id="p_eye"></a>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <label class="mt-1">Other Information</label><br>
                          <!-- <label class="mt-1">Blood Type</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Blood Type" name="blood_type" value="<?= $hresult->blood_type?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Weight</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Weight" name="weight" value="<?= $hresult->weight?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Height</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Height" name="height" value="<?= $hresult->height?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Allergies</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Allergies" name="allergies" value="<?= $hresult->allergies?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Medications</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Medications" name="medications" value="<?= $hresult->allergies?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div> -->
                          <label class="mt-1">Contact Number</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact_number" value="<?= $hresult->contact_number?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Parent/Guardian</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Fullname of Parent/Guardian" name="parent" value="<?= $hresult->parent?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <label class="mt-1">Parent/Guardian Contact No.</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Parent/Guardian Contact Number" name="parent_number" value="<?= $hresult->parent_number?>" required>
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" id="profile_edit_close">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3"></div>
        </div>

      </div>
    </div>
  </div>

  <button type="button" id="hidden_btn_modal" class="btn btn-default" data-toggle="modal" data-target="#modal-default" hidden>
    Launch Default Modal
  </button>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo base_url('emp/changeAccStatus/')?>" method="post">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="account_id" id="account_id">
            <input type="hidden" name="action_number" id="action_number">
            <center>
              <h5><label id="account_name"></label></h5>
              <h5><label id="modal_text"></label></h5>
              <br>
            </center>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-success col-sm-5" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger col-sm-5">Yes</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->