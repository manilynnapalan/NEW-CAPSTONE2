  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-users"></i>
            <span class="mt-2">ANSWERED SURVEYS</span>
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
                <a href="<?= base_url('admin/surveys')?>" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Back</a>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;width: 100%">
                  <thead>
                    <tr>
                      <th rowspan="2">Coach Info</th>
                      <th rowspan="2">Student Info</th>
                      <th rowspan="2">Event Name</th>
                      <th colspan="<?= count($survey_criterias)?>" class="text-center">Criterias</th>
                      <th rowspan="2" class="text-center">Total</th>
                    </tr>
                    <tr>
                      <?php foreach($survey_criterias as $value){?>
                      <th class="text-center">#<?= $value->id?></th>
                      <?php }?>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    // var_dump($result_array);
                    for($x=0;$x<count($result_array);$x++){?>
                    <tr>
                      <td>
                        <?= $result_array[$x]['coach_info']->firstname.' '.$result_array[$x]['coach_info']->lastname?></br>
                        <?= $result_array[$x]['coach_info']->sports?> Coach    
                      </td>
                      <td><?= $result_array[$x]['student_info']->name != null ? $result_array[$x]['student_info']->firstname.' '.$result_array[$x]['student_info']->lastname : ''?></td>
                      <td> 
                         <?= $result_array[$x]['event_name'] != null ? $result_array[$x]['event_name']: 'End of semester survey'?>
                      </td>
                      <?php
                        $answer = json_decode($result_array[$x]['student_info']->answer);
                        // $legend_array = ['','Very Unsatisfied','Unsatisfied','Moderate','Satisfied','Very Satisfied'];
                        $total = 0;
                        foreach($answer as $key => $value){
                          $total += $value;
                      ?>
                      <td class="text-center"> 
                        <?= $value;?> 
                      </td>
                      <?php }?>
                      <th class="text-center" style="font-weight: bolder"><?= $total?></th>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                <div class="row">
                  <div class="col-sm-12">
                    <label>Legends for Criterias:</label>
                    <?php foreach($survey_criterias as $value){?>
                    <p style="margin:0px;font-size: 13px;">Criteria #<?= $value->id?> : <?= $value->criteria?></p>
                    <?php }?>

                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 mt-2">
                    <label>Legends for Ratings:</label>
                    <p style="margin:0px;font-size: 13px;">5 : Very Satisfied</p>
                    <p style="margin:0px;font-size: 13px;">4 : Satisfied</p>
                    <p style="margin:0px;font-size: 13px;">3 : Moderate</p>
                    <p style="margin:0px;font-size: 13px;">2 : Unsatisfied</p>
                    <p style="margin:0px;font-size: 13px;">1 : Very Unsatisfied</p>

                  </div>
                </div>
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
  