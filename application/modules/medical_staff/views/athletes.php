  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-users"></i>
            <span class="mt-2">ATHLETES</span>
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
              <div class="card-header">
                <form id="submit_formSY">
                  <select class="select2 form-group" name="ts" style="width: 20%">
                    <option><?= $this->input->get('ts') == null ? 'ALL TEAM SPORT' : $this->input->get('ts');?></option>
                    <option value="">ALL TEAM SPORT</option>
                    <?php foreach($sports as $value){?>
                    <option><?= $value->sport_name?></option>
                    <?php }?>
                  </select>
                </form>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped" id="table1" style="margin-top: 0px!important;">
                  <thead>
                  <tr>
                    <th>Athletes Info</th>
                    <th>Profile Picture</th>
                    <th>Address</th>
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
                        <td><?= $value->sports?></td>
                        <!-- <td><?= $value->sy_start.'-'.$value->sy_end?></td> -->
                        <td>
                          <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#modal-update<?= $value->account_id;?>"><i class="fas fa-eye"></i> View</button>

                          <div class="modal fade" id="modal-update<?= $value->account_id;?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">VIEW ATHLETES</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="<?php echo base_url('medical_staff/update_athlete_medical/'.$value->account_id)?>" method="post" autocomplete="off">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <center>
                                          <div class="form-group">
                                            <img class="image_design" src="<?php echo base_url('assets/images/pro_pic_icon_admin.png')?>">
                                          </div>
                                        </center>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <label class="mt-1">Blood Type</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Enter Blood Type" name="blood_type" value="<?= $value->blood_type?>" required>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fas fa-user"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <label class="mt-1">Weight</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Enter Weight" name="weight" value="<?= $value->weight?>" required>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fas fa-user"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <label class="mt-1">Height</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Enter Height" name="height" value="<?= $value->height?>" required>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fas fa-user"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <label class="mt-1">Allergies</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Enter Allergies" name="allergies" value="<?= $value->allergies?>" required>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fas fa-user"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <label class="mt-1">Medications</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Enter Medications" name="medications" value="<?= $value->medications?>" required>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fas fa-user"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <label class="mt-1">Blood Pressure</label>
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Enter Blood_pressure" name="blood_pressure" value="<?= $value->blood_pressure?>" required>
                                          <div class="input-group-append">
                                            <div class="input-group-text">
                                              <span class="fa fa-heartbeat"></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <span class="mt-1"><em><?= $value->updated_on == NULL ? '' : 'Last update on '. date('F d, Y h:i:s a',strtotime($value->updated_on))?> </em></span>
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
                        </td>
                      </tr>
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
