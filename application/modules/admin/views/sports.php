  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-volleyball-ball"></i>
            <span class="mt-2">TEAMS</span>
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-register"><i class="fas fa-user-plus" style="margin-right: 5px;"></i>Add New Team Sport</button>
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
                    <th class="text-center">Team Sports</th>
                    <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                    if(count($allSports) > 0){
                      foreach ($allSports as $value) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $value->sport_name?>
                        </td>
                        <td>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modal-update<?= $value->id;?>"><i class="fas fa-edit"></i>Edit</button>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value->id;?>"><i class="fas fa-trash-alt"></i>Delete</button>
                        </td>
                      </tr>
                      <div class="modal fade" id="modal-update<?php echo $value->id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Form</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?php echo base_url('admin/update_sport/'.$value->id)?>" method="post">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="input-group mb-3">
                                      <input type="text" class="form-control" placeholder="Enter Team Sport" name="sport" value="<?= $value->sport_name?>" required>
                                      <div class="input-group-append">
                                        <div class="input-group-text">
                                          <span class="fas fa-volleyball-ball"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>

                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

                      <div class="modal fade" id="modal-delete<?php echo $value->id;?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?php echo base_url('admin/delete_sport/'.$value->id)?>" method="post">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <h4>Are you sure you want to delete <span class="btn btn-danger" style="cursor: default"><?= $value->sport_name?></span> team?</h4>
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

      <div class="modal fade" id="modal-register">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD NEW TEAM SPORT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url('admin/insert_sport/')?>" method="post" id="reg_form" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter Team Sport" name="sport" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-volleyball-ball"></span>
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