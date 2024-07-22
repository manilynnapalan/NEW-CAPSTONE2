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
          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-3" hidden>
                <div class="sticky-top mb-3">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Draggable Events</h4>
                    </div>
                    <div class="card-body">
                      <!-- the events -->
                      <div id="external-events">
                        <div class="external-event bg-success">Lunch</div>
                        <div class="external-event bg-warning">Go home</div>
                        <div class="external-event bg-info">Do homework</div>
                        <div class="external-event bg-primary">Work on UI design</div>
                        <div class="external-event bg-danger">Sleep tight</div>
                        <div class="checkbox">
                          <label for="drop-remove">
                            <input type="checkbox" id="drop-remove">
                            remove after drop
                          </label>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Create Event</h3>
                    </div>
                    <div class="card-body">
                      <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                        <ul class="fc-color-picker" id="color-chooser">
                          <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                        </ul>
                      </div>
                      <!-- /btn-group -->
                      <div class="input-group">
                        <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                        <div class="input-group-append">
                          <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                        </div>
                        <!-- /btn-group -->
                      </div>
                      <!-- /input-group -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <?php
               // var_dump($bgcolor_index);
                for($i=0;$i<count($array_result);$i++){
              ?>
                <div class="col-lg-3">
                  <div class="info-box">
                    <span class="info-box-icon elevation-1" style="background-color:<?= $array_result[$i]['color']?>"><i class="fas fa-volleyball-ball"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><?= $array_result[$i]['sport_name']?></span>
                      <span class="info-box-text"><?= '('.$array_result[$i]['date'].')'?></span>
                      <span class="info-box-text">Present Athletes</span>
                      <span class="info-box-number">
                        <?= $array_result[$i]['num_rows']?>
                      </span>
                    </div>
                  </div>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

