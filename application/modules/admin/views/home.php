  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DASHBOARD</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row"> 
          <div class="col-sm-12">
            <?= $calendar_table ?> 
          </div>
        </div>
        <div class="row">
          <?php
            for($i=0;$i<count($array_result);$i++){
          ?>
            <div class="col-lg-3">
              <div class="info-box" data-toggle="modal" data-target="#modal<?= $i?>">
                <span class="info-box-icon elevation-1" style="background-color:<?= $array_result[$i]['color']?>"><i class="fas fa-volleyball-ball"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><?= $array_result[$i]['sport_name']?></span>
                  <span class="info-box-text">No. Active Athletes</span>
                  <span class="info-box-number">
                    <?= $array_result[$i]['num_rows']?>
                  </span>
                </div>
              </div>
            </div>
            
            <?php }?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
// var_dump($array_result);
  for($i=0;$i<count($array_result);$i++){ ?>
    <div class="modal fade" id="modal<?= $i?>">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="card-title">ACTIVE ATHLETES</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Athletes Info</th>
                      <th>Profile Picture</th>
                      <th>Address</th>
                      <th>Date of Birth (Age)</th>
                      <th>Team Sport</th>
                      <th>School Year</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($array_result[$i]['result'] as $value){
                    if($value->birthdate!=null){
                          $tz = new DateTimeZone('Asia/Manila');
                          $age = DateTime::createFromFormat('Y-m-d',$value->birthdate,$tz)
                              ->diff(new DateTime('now',$tz))
                              ->y;
                        } else {
                          $age = '-';
                        }
                        
                    ?>
                      <tr>
                        <td>
                          <?= $value->firstname.' '. $value->lastname?><br/>
                          <?= $value->username?><br/>
                          <?= $value->gender?>
                        </td>
                        <td>
                          <img class="brand-image img-square elevation-3" src="<?php echo base_url('assets/images/'.$value->pro_pic)?>" width="100px" height="100px">
                        </td>
                        <td><?= $value->address?></td>
                        <td><?= $value->birthdate != null ? date('Y-m-d',strtotime($value->birthdate)).' ('.$age.')': ''?></td>
                        <td><?= $value->sports?></td>
                        <td><?= $value->sy_start.'-'.$value->sy_end?></td>
                  <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }?>
