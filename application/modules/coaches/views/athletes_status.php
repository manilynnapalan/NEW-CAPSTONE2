  <style type="text/css">
    .dt-buttons{display: none;}
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">ATTENDANCES OF ATHLETES</span>
            <!-- <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-register"><i class="fas fa-calendar-alt" style="margin-right: 5px;"></i>Add New Event</button> -->
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
                <div class="row">
                  <div class="col-sm-3">
                    <button class="btn btn-primary" onclick="print_attendance()"><i class="fa fa-print"></i> Print</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped" id="attendances" style="margin-top: 0px!important;">
                  <thead>
                  <tr>
                    <th>Athlete Information</th>
                    <!-- <th>Profile Picture</th> -->
                    <!-- <th>Coach</th> -->
                    <th>Sport Team</th>
                    <th>No. of Absences</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                      for($x = 0; $x < count($allResult); $x++) {
                    ?>
                      <tr>
                        <td> 
                          <p><?= $allResult[$x]['row_info']->lastname.', '.$allResult[$x]['row_info']->firstname?></p>
                          
                        </td>
                        <!-- <td> <img class="brand-image img-square elevation-3" src="<?php echo base_url('assets/images/')?><?= $allResult[$x]['row_info']->pro_pic?>" width="100px" height="100px"> </td> -->
                        <!-- <td> <?= @$allResult[$x]['coach']->firstname.' '.@$allResult[$x]['coach']->lastname?> </td> -->
                        <td> <?= @$allResult[$x]['row_info']->sports?> </td>
                        <td> <?= @$allResult[$x]['number_absences']?> </td>
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