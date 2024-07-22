  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">ATHLETES STATUS</span>
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
                    <form id="formSubmit">
                      <select class="select2" name="ts" style="width: 100%">
                        <option selected> <?= $this->input->get('ts') != null ? $this->input->get('ts'): 'Select Team Sport';?></option>
                        <?php foreach($allSports as $row){?>
                          <option><?= $row->sport_name?></option>
                        <?php }?>
                      </select>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;">
                  <thead>
                  <tr>
                    <th>Athlete Information</th>
                    <!-- <th>Profile Picture</th> -->
                    <th>Coach</th>
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
                          <?= $allResult[$x]['row_info']->lastname.', '.$allResult[$x]['row_info']->firstname?><br/>
                          <?= $allResult[$x]['row_info']->course?><br/>
                          <?= $allResult[$x]['row_info']->gender?><br/>
                          <?= $allResult[$x]['row_info']->address?>
                        </td>
                        <!-- <td> <img class="brand-image img-square elevation-3" src="<?php echo base_url('assets/images/')?><?= $allResult[$x]['row_info']->pro_pic?>" width="100px" height="100px"> </td> -->
                        <td> <?= @$allResult[$x]['coach']->firstname.' '.@$allResult[$x]['coach']->lastname?> </td>
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