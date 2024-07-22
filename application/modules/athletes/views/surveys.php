  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-users"></i>
            <span class="mt-2">ANSWER SURVEY</span>
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
                <div class="card-hearder p-2">
                  <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-send-survey"><i class="fas fa-user-plus" style="margin-right: 5px;"></i>Send Survey</button>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;">
                    <thead>
                    <tr>
                      <th>School Year</th>
                      <th>Semester</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 

                        for($i=0;$i<count($AnswerSurvey);$i++) {
                      ?>
                        <tr>
                          <td> <?= $AnswerSurvey[$i]->school_year?> </td>
                          <td> <?= $AnswerSurvey[$i]->semester?> </td>
                          <td class="text-center">
                            <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#modal-answer<?= $AnswerSurvey[$i]->id;?>"><i class="fas fa-edit"></i> Answer</button>
                          </td>
                        </tr>
                        <div class="modal fade" id="modal-answer<?= $AnswerSurvey[$i]->id;?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4>ANSWER SURVEY</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="<?php echo base_url('athletes/sent_survey/'.$AnswerSurvey[$i]->id)?>" method="post">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <center><h4 style="font-weight:bolder">CLIENT SATISFACTORY FORM</h4></center>
                                      <center><h6>SY. <?= $AnswerSurvey[$i]->school_year?>, <?= $AnswerSurvey[$i]->semester?></h6></center>
                                      <label style="font-weight:normal;">Name (Optional): </label>
                                      <input type="checkbox" name="checkbox"> <span style="color:red;font-size: 12px">(Note: Check if you want to view your name at admin side.)</span>
                                      <div class="row" style="border: 1px solid;">
                                        <div class="col-sm-7" style="border: 1px solid;">Performance Criteria</div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;">
                                          Very Good (5)
                                        </div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;">
                                          4
                                        </div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;">
                                          3
                                        </div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;">
                                          2
                                        </div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;">
                                          1
                                        </div>
                                      </div>
                                      <?php foreach ($allCriteria as $value) {?>
                                      
                                      <div class="row" style="border: 1px solid;">
                                        <div class="col-sm-7" style="border: 1px solid;"><?= $value->criteria?></div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;"><input type="radio" name="answer<?= $value->id?>" value="5" checked></div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;"><input type="radio" name="answer<?= $value->id?>" value="4"></div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;"><input type="radio" name="answer<?= $value->id?>" value="3"></div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;"><input type="radio" name="answer<?= $value->id?>" value="2"></div>
                                        <div class="col-sm-1 text-center" style="border: 1px solid;"><input type="radio" name="answer<?= $value->id?>" value="1"></div>
                                      </div>
                                      <?php }?>

                                      <br/>Suggestions and reccomendations.
                                      <div class="input-group mb-3">
                                        <textarea name="suggestions" class="form-control" placeholder="Say something ....."></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Send</button>
                                </div>

                              </form>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                
              </div>
          </div>

        </div>

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
