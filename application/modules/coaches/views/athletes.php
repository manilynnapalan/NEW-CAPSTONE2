  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-users"></i>
            <span class="mt-2">ATHLETES</span>
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-register"><i class="fas fa-user-plus" style="margin-right: 5px;"></i>Add New Athlete</button>
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
              <!-- <div class="card-header">
                <form id="submit_formSY">
                  <select class="select2 form-group" name="sy" style="width: 20%">
                    <option><?= $this->input->get('sy') == null ? 'Select School Year' : $this->input->get('sy');?></option>
                    <option>ALL SCHOOL YEAR</option>
                    <?php for($x=(date('Y') + 1);$x >= 2020; $x--){?>
                    <option><?php echo $x-1 .'-'.$x?></option>
                    <?php }?>
                  </select>
                </form>
              </div> -->
              <div class="card-body">
                <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;">
                  <thead>
                  <tr>
                    <th>Athletes Info</th>
                    <th>Profile Picture</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Age</th>
                    <th>Team Sport</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach ($allData as $value) {
                        if($value->birthdate!=null){
                          $tz = new DateTimeZone('Asia/Manila');
                          $age = DateTime::createFromFormat('Y-m-d',$value->birthdate,$tz)
                              ->diff(new DateTime('now',$tz))
                              ->y;
                        } else {
                          $age = '-';
                        }
                        $sy = $value->sy_start.'-'.$value->sy_end;
                    ?>
                      <tr>
                        <td>
                          <?= $value->lastname.', '. $value->firstname?><br/>
                          <?= $value->username?><br/>
                          <?= $value->gender?>
                        </td>
                        <td>
                          <img class="brand-image img-square elevation-3" src="<?php echo base_url('assets/images/'.$value->pro_pic)?>" width="100px" height="100px">
                        </td>
                        <td><?= $value->address?></td>
                        <td><?= $value->birthdate != null ? date('F d, Y',strtotime($value->birthdate)) : ''?></td>
                        <td><?= $value->birthdate != null ? $age: ''?></td>
                        <td><?= $value->sports?></td>
                        <!-- <td><?= $value->sy_start.'-'.$value->sy_end?></td> -->
                        <td>
                          <button class="btn btn-primary mb-1 update_athletes" data-toggle="modal" data-target="#modal-update" data-id="<?= $value->account_id;?>"><i class="fas fa-edit"></i>Edit</button>
                          <textarea id="up_athlete_data<?= $value->account_id?>" hidden><?= json_encode(['account_id'=>$value->account_id,'pro_pic'=>$value->pro_pic,'firstname'=>$value->firstname,'lastname'=>$value->lastname,'id_number'=>$value->username,'address'=>$value->address,'course'=>$value->course,'date'=>$value->birthdate,'school_year'=>$sy,'gender'=>$value->gender,'blood_type'=>$value->blood_type,'weight'=>$value->weight,'height'=>$value->height,'allergies'=>$value->allergies,'medications'=>$value->medications,'contact_number'=>$value->contact_number,'parent'=>$value->parent,'parent_number'=>$value->parent_number])?></textarea>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value->account_id;?>"><i class="fas fa-trash-alt"></i>Delete</button>
                        </td>
                      </tr>

                      <div class="modal fade" id="modal-delete<?php echo $value->account_id;?>">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?php echo base_url('coaches/delete_athletes/'.$value->account_id)?>" method="post">
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
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                    <?php } ?>
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

  <!-- /.modal -->

      <div class="modal fade" id="modal-register">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD NEW ATHLETES</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url('coaches/insert_athletes/')?>" method="post" id="reg_form" enctype="multipart/form-data" autocomplete="off">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <div class="form-group">
                        <img class="image_design" src="<?php echo base_url('assets/images/pro_pic_icon_admin.png')?>" id="img_preview" style="cursor: pointer;">
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
                    <label class="m-0"><em>Note: DEFAULT PASSWORD: 123456</em></label><br/>
                    <label class="mt-1">School ID Number</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter School Id Number" name="id_number" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-id-card"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Firstname</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Firstname" name="fname" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Lastname</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Lastname" name="lname" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Middle Initial</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Middle Initial" name="mi" maxlength="1" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Address</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Address" name="address" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Course & Year Level</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Course & Year Level" name="course" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Enter/Select Birthdate" name="datebirth" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <label class="mt-2">Gender</label>
                    <div class="input-group mb-3">
                      <select class="form-control select2bs4" style="width: 80%;" name="gender" date-placeholder="Select Gender" required>
                        <option selected="selected" id="up_gender_option">Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-transgender"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">School Year</label>
                    <div class="input-group mb-3">
                      <select class="select2 form-group" name="school_year" style="width: 91%">
                        <?php for($x=(date('Y') + 1);$x >= 2020; $x--){?>
                        <option><?php echo $x-1 .'-'.$x?></option>
                        <?php }?>
                      </select>
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
                <input type="hidden" name="sport" value="<?= $sport?>">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-update">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="update_form" method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <div class="form-group">
                        <img class="image_design" src="<?php echo base_url('assets/images/'.$value->pro_pic)?>" id="up_img_preview" style="cursor: pointer;">
                        <div><label id="up_customFile2"></label></div>
                      </div>
                      <div class="form-group" hidden>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="up_customFile" name="up_pro_pic" accept="image/*" onchange="loadFile3(event,'up_pro_pic')">
                          <label class="custom-file-label" style="text-align: left" for="up_customFile" id="up_label_choose_file">Choose file</label>
                        </div>
                      </div>
                    </center>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label class="mt-1">School ID Number</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter School Id Number" name="up_id_number" readonly="readonly">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-id-card"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Firstname</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Firstname" name="up_fname" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Lastname</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Lastname" name="up_lname" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Address</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Address" name="up_address" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Course & Year Level</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Course & Year Level" name="up_course" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-2">Gender</label>
                    <div class="input-group mb-3">
                      <select class="form-control select2" style="width: 91%;" name="up_gender" date-placeholder="Select Gender" required>
                        <option selected="selected" id="up_gender_option"></option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-transgender"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">School Year</label>
                    <div class="input-group mb-3">
                      <select class="select2 form-group" name="up_school_year" style="width: 91%">
                        <option>Select School Year</option>
                        <?php for($x=(date('Y') + 1);$x >= 2020; $x--){?>
                        <option><?php echo $x-1 .'-'.$x?></option>
                        <?php }?>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-calendar"></span>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <label class="mt-1">Other Information</label><br>
                    <!-- <label class="mt-1">Blood Type</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Blood Type" name="up_blood_type" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Weight</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Weight" name="up_weight" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Height</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Height" name="up_height" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Allergies</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Allergies" name="up_allergies" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Medications</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Medications" name="up_medications" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div> -->
                    <label class="mt-1">Contact Number</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Contact Number" name="up_contact_number" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Parent/Guardian</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Fullname of Parent/Guardian" name="up_parent" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-1">Parent/Guardian Contact No.</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Parent/Guardian Contact Number" name="up_parent_number" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>