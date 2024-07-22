  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">UPCOMING EVENTS</span>
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
                    <th>Date</th>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                      foreach ($allEvents as $value) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $value->date?>
                        </td>
                        <td>
                          <?php echo $value->event_name?>
                        </td>
                        <td>
                          <?php echo $value->description?>
                        </td>
                        <td>
                          <?php echo $value->start_time?>
                        </td>
                        <td>
                          <?php echo $value->end_time?>
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