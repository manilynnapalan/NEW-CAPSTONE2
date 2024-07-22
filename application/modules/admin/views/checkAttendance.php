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
                <h6>No. of Absences: <?php if(date('Y-m-d') > date('Y-m-d',strtotime($eventRow->date))){
                  echo $AllAthletes != null ? count($AllAthletes) - $noPresents : '-';
                } ?></h6>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;">
                  <thead class="text-center">
                  <tr>
                    <th>Athlete Name</th>
                    <th>Profile Picture</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Remarks</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                      foreach ($AllAthletes as $row) {
                    ?>
                      <tr>
                        <td> <?= $row->firstname.' '.$row->lastname?> </td>
                        <td> <img class="brand-image img-square elevation-3" src="<?php echo base_url('assets/images/'.$row->pro_pic)?>" width="100px" height="100px"></td>
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