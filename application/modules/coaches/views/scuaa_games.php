  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">PASUC-SCUAA GAMES</span>
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-register"><i class="fas fa-calendar-alt" style="margin-right: 5px;"></i>ADD NEW SCUAA GAME</button>
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
                    <th>Theme</th>
                    <th>Name</th>
                    <th>Date & Venue</th>
                    <th>Host Address</th>
                    <th>Category</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                      foreach ($scuaaGames as $value) {
                    ?>
                      <tr>
                        <td><?= strtoupper($value->scuaa_theme)?></td>
                        <td><?= strtoupper($value->scuaa_name)?></td>
                        <td><?= $value->date_scuaa?> | <?= $value->host_name?></td>
                        <td><?= $value->host_address?></td>
                        <td><?= $value->category?></td>
                        <td>
                          <?php if($value->student_ids == NULL){?>
                            <a href="<?= base_url('coaches/checklist/'.$value->id)?>" class="btn btn-primary mb-1"><i class="fas fa-eye"></i>View Players Checklist</a>
                          <?php } else {?>
                            <a href="<?= base_url('coaches/scuaa_forms/'.$value->id)?>" class="btn btn-primary mb-1"><i class="fas fa-eye"></i>View SCUAA Forms</a>
                          <?php }?>
                          <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#modal-update<?php echo $value->id;?>" data-id="<?= $value->id;?>"><i class="fas fa-edit"></i>Edit</button>
                          <button class="btn btn-danger mb-1" data-toggle="modal" data-target="#modal-delete<?= $value->id;?>"><i class="fas fa-trash-alt"></i>Delete</button>
                        </td>
                      </tr>
                      <div class="modal fade" id="modal-delete<?php echo $value->id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?php echo base_url('coaches/delete_scuaa/'.$value->id)?>" method="post">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <center>
                                      <span class="btn btn-primary" style="cursor: default">SCUAA Theme : <?= strtoupper($value->scuaa_theme)?></span></br>
                                      <span class="btn btn-primary mt-2" style="cursor: default">SCUAA Name : <?= strtoupper($value->scuaa_name)?></span>
                                    </center>
                                    <h4>Are you sure you want to delete this data?</h4>
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

                      <div class="modal fade" id="modal-update<?php echo $value->id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">UPDATE SCUAA GAMES</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?php echo base_url('coaches/update_scuaa/'.$value->id)?>" method="post" autocomplete="off">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label>SCUAA Theme</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Ex. Bayanihan Through Sports" name="scuaa_theme" value="<?= $value->scuaa_theme?>" style="text-transform:uppercase" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-12">
                                    <label>SCUAA Name</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Ex. SCUAA REGIONAL GAMES 2023" name="scuaa_name" value="<?= $value->scuaa_name?>" style="text-transform:uppercase" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-12">
                                    <label>SCUAA Date</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Ex. Nov. 29-30 - Dec. 1-2, 2023" name="date_scuaa" value="<?= $value->date_scuaa?>" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-12">
                                    <label>Host Name</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Ex. Southern Leyte State University" name="host_name" value="<?= $value->host_name?>" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-12">
                                    <label>Host Address</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Ex. Sogod, Southern Leyte" name="host_address" value="<?= $value->host_address?>" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-12">
                                    <label>Date of Screening</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Ex. November 8-12, 2023" name="date_screening" value="<?= $value->date_screening?>" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-12">
                                    <label>Sport Category</label>
                                    <div class="input-group">
                                      <select class="select2" name="category" style="width: 100%">
                                        <option><?= $value->category?></option>
                                        <option value="">Select Category</option>
                                        <option>Men</option>
                                        <option>Women</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-12">
                                    <label>Sports Coordinator</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Enter Sports Coordinator" name="sports_coordinator" value="<?= $value->sports_coordinator;?>" style="text-transform: uppercase;" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col-md-12">
                                    <label>SCUAA TYPE</label>
                                    <div class="input-group">
                                      <select class="select2" name="game_type" style="width: 100%">
                                        <option><?= $value->game_type?></option>
                                        <option value="">Select SCUAA Type</option>
                                        <option>Regional</option>
                                        <option>National</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <input type="hidden" name="sport_id" value="<?= $Sport?>">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>

                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                    <?php }?>
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
              <h4 class="modal-title">ADD NEW SCUAA GAME</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url('coaches/insert_game/')?>" method="post" autocomplete="off">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <label>SCUAA Theme</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Ex. Bayanihan Through Sports" name="scuaa_theme" style="text-transform:uppercase" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <label>SCUAA Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Ex. SCUAA REGIONAL GAMES 2023" name="scuaa_name" style="text-transform:uppercase" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <label>SCUAA Date</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Ex. Nov. 29-30 - Dec. 1-2, 2023" name="date_scuaa" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <label>Host Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Ex. Southern Leyte State University" name="host_name" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <label>Host Address</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Ex. Sogod, Southern Leyte" name="host_address" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <label>Date of Screening</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Ex. November 8-12, 2023" name="date_screening" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <label>Sport Category</label>
                    <div class="input-group">
                      <select class="select2" name="category" style="width: 100%">
                        <option value="">Select Category</option>
                        <option>Men</option>
                        <option>Women</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <label>Sports Coordinator</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Sports Coordinator" name="sports_coordinator" style="text-transform: uppercase;" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <label>SCUAA TYPE</label>
                    <div class="input-group">
                      <select class="select2" name="game_type" style="width: 100%">
                        <option value="">Select SCUAA Type</option>
                        <option>Regional</option>
                        <option>National</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <input type="hidden" name="sport_id" value="<?= $Sport?>">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>