  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">ATTENDANCE</span>
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
                <h4>Event Name: <?= $eventRow->event_name?></h4>
                <h6>Date: <?= date('F d, Y',strtotime($eventRow->date))?></h6>
                <h6>Time: <?= $eventRow->start_time.' - '.$eventRow->end_time?></h6>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;">
                  <thead class="text-center">
                  <tr>
                    <th>Athlete Name</th>
                    <!-- <th>Profile Picture</th> -->
                    <th>Course</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                      foreach ($AllAthletes as $row) {
                    ?>
                      <tr>
                        <td> <?= $row->firstname.' '.$row->lastname?> </td>
                        <!-- <td> <img class="brand-image img-square elevation-3" src="<?php echo base_url('assets/images/'.$row->pro_pic)?>" width="100px" height="100px"></td> -->
                        <td> <?= $row->course?> </td>
                        <td>
                          <?php
                            if(in_array($row->account_id, $arrayAccountId)){
                              echo '<i style="font-weight: bolder">'.$arrayStatus[array_search($row->account_id, $arrayAccountId)].'</i>';
                            } else {
                              if(date('Y-m-d') > $eventRow->date){
                                echo '<i style="font-weight: bolder">Absent</i>';
                              }
                            }

                          ?>
                        </td>
                        <td> 
                          <?php if(in_array($row->account_id, $arrayAccountId)){
                            echo $arrayRemarks[array_search($row->account_id, $arrayAccountId)];
                          }?>
                        </td>
                        <td>
                          <?php
                          if(date('Y-m-d') == $eventRow->date){ 
                            if(!in_array($row->account_id, $arrayAccountId)){?>
                              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-present<?php echo $row->account_id;?>">Present</button>
                          <?php } else if($arrayRemarks[array_search($row->account_id, $arrayAccountId)] == null) {?>
                              <button class="btn btn-warning" data-toggle="modal" data-target="#modal-remarks<?= $row->account_id;?>-<?= $eventRow->id;?>">Add Remarks</button><br/>
                         
                              <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#edit-status<?= $row->account_id;?>-<?= $eventRow->id;?>">Edit</button>   
                          <?php }}?>
                        </td>
                        <div class="modal fade" id="modal-present<?php echo $row->account_id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="<?= base_url('coaches/present_athletes/'.$row->account_id.'/'.$eventRow->id)?>">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h4>Are you sure you that <span class="btn btn-danger" style="cursor: default"><?= $row->firstname.' '.$row->lastname?></span> is present?</h4>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="hidden_event_id" value="<?= $eventRow->id?>">
                                  <input type="hidden" name="hidden_account_id" value="<?= $row->account_id?>">
                                  <input type="submit" class="btn btn-primary" name="Absent" value="Absent"/>
                                  <input type="submit" class="btn btn-success" name="Yes" value="Yes"/>
                                </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="modal-remarks<?= $row->account_id;?>-<?= $eventRow->id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4>ADD REMARKS</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="<?= base_url('coaches/add_remarks/'.$row->account_id.'/'.$eventRow->id)?>" method="post">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <textarea class="form-control" name="remarks" rows="3"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="hidden_event_id" value="<?= $eventRow->id?>">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                  <button type="submit" class="btn btn-success">Yes</button>
                                </div>

                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="edit-status<?= $row->account_id;?>-<?= $eventRow->id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4>EDIT STATUS</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="<?= base_url('coaches/edit_status/'.$row->account_id.'/'.$eventRow->id)?>" method="post">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h4>Are you sure you that <span class="btn btn-danger" style="cursor: default"><?= $row->firstname.' '.$row->lastname?></span> is present?</h4>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="hidden_event_id" value="<?= $eventRow->id?>">
                                  <input type="submit" class="btn btn-primary" name="Absent" value="Absent"/>
                                  <input type="submit" class="btn btn-success" name="Yes" value="Yes"/>
                                </div>

                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>

                      </tr>
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