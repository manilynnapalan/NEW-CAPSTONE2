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
              <div class="card-body">
                <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;">
                  <thead class="text-center">
                  <tr>
                    <th>Date</th>
                    <th>Event Name</th>
                    <th>Time</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                      foreach ($allEvents as $value) {
                    ?>
                      <tr>
                        <td> <?php echo $value->date?> </td>
                        <td> <?php echo $value->event_name?> </td>
                        <td> <?php echo date('h:i A',strtotime($value->start_time))?> - <?php echo date('h:i A',strtotime($value->end_time))?> </td>
                        <td>
                          <a href="<?= base_url('coaches/checkAttendance/'.$value->event_id)?>" class="btn btn-warning"><i class="fas fa-eye"></i> Check</a>
                        </td>
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
  <!-- /.content-wrapper -->
      <div class="modal fade" id="modal-register">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD NEW EVENT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url('coaches/insert_event/')?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <label class="mt-2">Event Name</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter event name" name="event" required>
                    </div>
                    <label class="mt-2">Description</label>
                    <div class="input-group mb-3">
                      <textarea class="form-control" rows="3" placeholder="Enter about the event." name="description" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="date" data-target="#reservationdate" placeholder="Ex. 01/31/2022" required />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="bootstrap-timepicker mt-4">
                      <div class="form-group">
                        <label>Start Time:</label>
                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" name="start_time" data-target="#timepicker" placeholder="Ex. 9:00 AM" required/>
                          <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="bootstrap-timepicker mt-4">
                      <div class="form-group">
                        <label>Start Time:</label>
                        <div class="input-group date" id="timepicker1" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" name="end_time" data-target="#timepicker" placeholder="Ex. 9:00 AM" required/>
                          <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                          </div>
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
      <div class="modal fade" id="modal-update">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UPDATE EVENT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="update_form" method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <label class="mt-2">Event Name</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter event name" name="up_event" required>
                    </div>
                    <label class="mt-2">Description</label>
                    <div class="input-group mb-3">
                      <textarea class="form-control" rows="3" placeholder="Enter about the event." name="up_description" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Date:</label>
                        <div class="input-group date" id="up_reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="up_date" data-target="#reservationdate" placeholder="Ex. 01/31/2022" required />
                            <div class="input-group-append" data-target="#up_reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="bootstrap-timepicker mt-4">
                      <div class="form-group">
                        <label>Start Time:</label>
                        <div class="input-group date" id="up_timepicker" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" name="up_start_time" data-target="#timepicker" placeholder="Ex. 9:00 AM" required/>
                          <div class="input-group-append" data-target="#up_timepicker" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="bootstrap-timepicker mt-4">
                      <div class="form-group">
                        <label>Start Time:</label>
                        <div class="input-group date" id="up_timepicker1" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" name="up_end_time" data-target="#timepicker" placeholder="Ex. 9:00 AM" required/>
                          <div class="input-group-append" data-target="#up_timepicker1" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                          </div>
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