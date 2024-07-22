  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">POST</span>
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-register"><i class="fas fa-calendar-alt" style="margin-right: 5px;"></i>Add New Post</button>
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
                    <th>Date Posted</th>
                    <th>Title & Description</th>
                    <th>Posted By</th>
                    <th width="30%">Image</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                      foreach ($allDocumentation as $value) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $value->date_posted?>
                        </td>
                        <td>
                          <h4><?php echo $value->title?></h4>
                          <?php echo $value->description?>
                        </td>
                        <td>
                          <?php echo $value->firstname.' '.$value->lastname?><br/>
                          <?php echo $value->sports?>
                        </td>
                        <td>
                          <img style="cursor: pointer;width: 50%;" src="<?php echo base_url('assets/post_images/'.$value->image)?>">
                        </td>
                        <td>
                          <!-- <button class="btn btn-primary event_update_button" data-toggle="modal" data-target="#modal-update" data-id="<?= $value->id;?>"><i class="fas fa-edit"></i>Edit</button> -->
                          <!-- <textarea id="up_event_data<?= $value->id?>" hidden><?= json_encode(['event_id'=>$value->event_id,'event_name'=>$value->event_name,'description'=>$value->description,'date'=>$value->date,'start_time'=>$value->start_time,'end_time'=>$value->end_time])?></textarea> -->
                          <?php if($value->sport_team == 'admin'){?>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value->post_id;?>"><i class="fas fa-trash-alt"></i>Delete</button>
                          <?php }?>
                        </td>
                      </tr>
                      <div class="modal fade" id="modal-delete<?php echo $value->post_id;?>">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?php echo base_url('admin/delete_post/'.$value->post_id)?>" method="post">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <h4>Are you sure you want to delete <span class="btn btn-danger" style="cursor: default"><?= $value->title?></span> post?</h4>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                              </div>

                            </form>
                          </div>
                          <!-- /.modal-content
                        <!-- </div> -->
                        <!-- /.modal-dialog -->
                      <!-- </div> -->
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
              <h4 class="modal-title">ADD NEW POST</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url('admin/insert_documentation/')?>" method="post" enctype="multipart/form-data" autocomplete="off">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <label class="mt-2">Title</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Enter documentation title" name="title" required>
                    </div>
                    <label class="mt-2">Description</label>
                    <div class="input-group mb-3">
                      <textarea class="form-control" rows="3" placeholder="Enter about the documentation" name="description" required></textarea>
                    </div>
                    <label class="mt-2">Upload Image</label>
                    <div class="form-group text-center">
                      <img style="cursor: pointer;width: 90%;height: 200px;" src="<?php echo base_url('assets/post_images/icon-image.png')?>" id="img_preview">
                      <div><label id="customFile2">(Image Name)</label></div>
                    </div>
                    <div class="form-group" hidden>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="pro_pic" accept="image/*" onchange="loadFile2(event,'pro_pic')">
                        <label class="custom-file-label" style="text-align: left" for="customFile" id="label_choose_file">Choose file</label>
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