  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">POST</span>
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
                    <th>Posted By</th>
                    <th>Title & Description</th>
                    <th>Image</th>
                    <!-- <th>Actions</th> -->
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
                          <?php echo $value->firstname.' '.$value->lastname?><br/>
                        </td>
                        <td>
                          <h4><?php echo $value->title?></h4>
                          <?php echo $value->description?>
                        </td>
                        <td>
                          <img style="cursor: pointer;width: 90%;height: 200px;" src="<?php echo base_url('assets/post_images/'.$value->image)?>">
                        </td>
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