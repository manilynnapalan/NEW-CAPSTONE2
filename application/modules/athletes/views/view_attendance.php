  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">VIEW ATTENDANCE</span>
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
                    <th>Time</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                      for($i=0;$i<count($result);$i++) {
                    ?>
                      <tr>
                        <td><?= $result[$i]['eventRow']->date?></td>
                        <td><?= $result[$i]['eventRow']->event_name?></td>
                        <td><?= date('h:i A',strtotime($result[$i]['eventRow']->start_time)).' - '.date('h:i A',strtotime($result[$i]['eventRow']->end_time))?></td>
                        <td><?= $result[$i]['status']?></td>
                        
                      </tr>
                      
                    <?php }?>
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>