  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">PASUC-SCUAA <?= strtoupper($scuaaGameDetails->game_type)?> GAMES</span>
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
            <form action="<?= base_url('coaches/add_varsity_list/').$this->uri->segment(3)?>" method="post" id="ids_form">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-8">
                    <h5>Venue : <?= $scuaaGameDetails->host_name.', '.$scuaaGameDetails->host_address?></h5>
                    <h5>Date : <?= $scuaaGameDetails->date_scuaa?></h5>
                    <h5>Sport : <?= $scuaaGameDetails->sport_id?></h5>
                    <h5>Category : <?= $scuaaGameDetails->category?></h5>
                  </div>
                  <div class="col-sm-4 text-right">
                    <button class="btn btn-primary proceed_button">Proceed</button>
                  </div>
                </div>
                
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;">
                  <thead>
                    <tr>
                      <th>NAME OF ATHLETE (LAST NAME, FIRST NAME, M.I.)</th>
                      <th>AGE</th>
                      <th>DATE OF BIRTH</th>
                      <th>
                        Check the checkbox if the player is eligible for SCUAA.
                        <br>
                        <center>
                          <div class="icheck-success d-inline" style="margin-left: 18px;">
                            <input type="checkbox" id="checkboxSuccessAll" cbs="0">
                            <label for="checkboxSuccessAll"></label>
                          </div>
                        </center>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                      foreach ($players as $value) {
                        $tz = new DateTimeZone('Asia/Manila');
                        $age = DateTime::createFromFormat('Y-m-d',$value->birthdate,$tz)
                          ->diff(new DateTime('now',$tz))
                          ->y;
                    ?>
                      <tr>
                        <td><?= strtoupper($value->lastname).', '.strtoupper($value->firstname)?></td>
                        <td><?= $age?></td>
                        <td><?= date('F d, Y',strtotime($value->birthdate))?></td>
                        <td>
                          <div class="icheck-success d-inline">
                            <input type="checkbox" class="cb_clist" id="checkboxSuccess<?= $value->account_id?>" data-id="<?= $value->account_id?>">
                            <label for="checkboxSuccess<?= $value->account_id?>"></label>
                            <input type="hidden" class="hidden_ids" id="hidden_ids<?= $value->account_id?>" value="<?= $value->account_id?>">
                          </div>
                        </td>
                      </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
            </div>

            </form>
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