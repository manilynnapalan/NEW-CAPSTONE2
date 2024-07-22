  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-volleyball-ball"></i>
            <span class="mt-2">SURVEYS</span>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-12">
                <div class="card card-primary card-tabs">
                  <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Answered Surveys</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Criteria</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="card-hearder p-2">
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-send-survey"><i class="fas fa-user-plus" style="margin-right: 5px;"></i>Send Survey</button>
                              </div>
                              <div class="card-body">
                                <table class="table table-bordered table-striped" id="survey_table" style="margin-top: 0px!important;width: 100%;">
                                  <thead>
                                  <tr>
                                    <th>School Year</th>
                                    <th>Semester</th>
                                    <th>No. of Responce</th>
                                    <!-- <th>Action</th> -->
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    for($x=0;$x<count($result);$x++){
                                    ?>
                                      <tr>
                                        <td> <?= $result[$x]['survey_row']->school_year?> </td>
                                        <td> <?= $result[$x]['survey_row']->semester?> </td>
                                        <td> <?= $result[$x]['numberResponces']?></td>
                                        <td>
                                          <a href="<?= base_url('admin/view_survey/'.$result[$x]['survey_row']->id)?>" class="btn btn-warning"><i class="fas fa-eye"></i> View</a>
                                        </td>
                                        <!-- <td> -->
                                          <!-- <button class="btn btn-primary mb-1 update_athletes" data-toggle="modal" data-target="#modal-update<?= $value->id;?>" data-id="<?= $value->id;?>"><i class="fas fa-edit"></i>Edit</button>
                                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value->id;?>"><i class="fas fa-trash-alt"></i>Delete</button> -->
                                        <!-- </td> -->
                                      </tr>

                                      <!-- <div class="modal fade" id="modal-delete<?php echo $value->id;?>">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="<?php echo base_url('admin/delete_criteria/'.$value->id)?>" method="post">
                                              <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <h4>Are you sure you want to delete <span class="btn btn-danger" style="cursor: default"><?= $value->criteria?></span>?</h4>
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
                                      </div>
                                      <div class="modal fade" id="modal-update<?= $value->id;?>">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4>UPDATE CRITERIA</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="<?php echo base_url('admin/update_criteria/'.$value->id)?>" method="post">
                                              <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                      <textarea name="criteria" class="form-control" required placeholder="Enter criteria ....."><?= $value->criteria?></textarea>
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
                                        </div>
                                      </div> -->
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="card">
                              <div class="card-hearder p-2">
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-register"><i class="fas fa-user-plus" style="margin-right: 5px;"></i>Add New Criteria</button>
                              </div>
                              <div class="card-body">
                                <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;width: 100%;">
                                  <thead>
                                  <tr>
                                    <th>Criteria</th>
                                    <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      foreach ($allCriteria as $value) {
                                    ?>
                                      <tr>
                                        <td>
                                          <?= $value->criteria?>
                                        </td>
                                        <td>
                                          <button class="btn btn-primary mb-1 update_athletes" data-toggle="modal" data-target="#modal-update<?= $value->id;?>" data-id="<?= $value->id;?>"><i class="fas fa-edit"></i>Edit</button>
                                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value->id;?>"><i class="fas fa-trash-alt"></i>Delete</button>
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
                                            <form action="<?php echo base_url('admin/delete_criteria/'.$value->id)?>" method="post">
                                              <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <h4>Are you sure you want to delete <span class="btn btn-danger" style="cursor: default"><?= $value->criteria?></span>?</h4>
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
                                      <div class="modal fade" id="modal-update<?= $value->id;?>">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4>UPDATE CRITERIA</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="<?php echo base_url('admin/update_criteria/'.$value->id)?>" method="post">
                                              <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                      <textarea name="criteria" class="form-control" required placeholder="Enter criteria ....."><?= $value->criteria?></textarea>
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
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                              
                            </div>
                            <!-- /.card -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      <div class="modal fade" id="modal-register">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD NEW CRITERIA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url('admin/insert_criteria/')?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group mb-3">
                      <textarea name="criteria" class="form-control" required placeholder="Enter criteria ....."></textarea>
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
      <div class="modal fade" id="modal-send-survey">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">SEND SURVEY</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url('admin/send_survey/')?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <label class="mt-1">School Year</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Ex. 2022-2023" value="<?= $this->nativesession->get('school_year')?>" name="school_year" >
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-calendar"></span>
                        </div>
                      </div>
                    </div>
                    <label class="mt-2">Semester</label>
                    <div class="input-group mb-3">
                      <select class="form-control select2bs4" style="width: 80%;" name="semester" date-placeholder="Select Semester" required>
                        <option selected="selected" value="" disabled>Select Semester</option>
                        <option>1st Semester</option>
                        <option>2nd Semester</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-calendar-day"></span>
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