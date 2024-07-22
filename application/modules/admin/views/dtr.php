  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-5">
            <div style="margin-bottom: 10px;float: left;margin-right: 10px;"><a type="submit" class="btn btn-warning" href="#" id="print_all_dtr">Print ALL DTR</a></div>
            <form action="<?php echo base_url('adm/print_dtr/')?>" method="post">
              <div style="margin-bottom: 10px;"><button type="submit" class="btn btn-primary">Print DTR as PDF</button></div>
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="container" id="print_dtr">
                    <div class="row print_desing">
                      <div class="col-lg-12">
                        <div class="print_size_text"><em><span>VLQ Beverages Trading</span></em></div>
                        <div class="print_size_title text-center mb-0"><span><b>DAILY TIME RECORD</b></span></div>
                        <div class="print_size_text text-center" style="line-height: 0.5;"><span>----o0o----</span></div>
                        <div class="print_size_name text-center">
                          <select class="changeDtr" style="width: 50%;margin-left: 10px; font-size: 16px" name="account_id" required>
                            <option selected disabled value="">Select Employee</option>
                            <?php foreach($all_employees as $value){?>
                              <option value="<?php echo $value->account_id;?>"><?php echo $value->lastname.', '.$value->firstname;;?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="print_size_text text-center" style="line-height: 1;border-top: 1px solid black;">
                          <span>(Name)</span>
                        </div>
                        <div class="print_size_text">
                          <?php 
                            $month = date("m");
                          ?>
                          <em><span>For the month of </span></em>
                          <select class="changeDtr" style="width: 30%; margin-left: 10px" name="month" id="month">
                            <option <?php echo $month == 1 ? 'selected': '';?> value="1">January</option>
                            <option <?php echo $month == 2 ? 'selected': '';?> value="2">February</option>
                            <option <?php echo $month == 3 ? 'selected': '';?> value="3">March</option>
                            <option <?php echo $month == 4 ? 'selected': '';?> value="4">April</option>
                            <option <?php echo $month == 5 ? 'selected': '';?> value="5">May</option>
                            <option <?php echo $month == 6 ? 'selected': '';?> value="6">June</option>
                            <option <?php echo $month == 7 ? 'selected': '';?> value="7">July</option>
                            <option <?php echo $month == 8 ? 'selected': '';?> value="8">August</option>
                            <option <?php echo $month == 9 ? 'selected': '';?> value="9">September</option>
                            <option <?php echo $month == 10 ? 'selected': '';?> value="10">October</option>
                            <option <?php echo $month == 11 ? 'selected': '';?> value="11">November</option>
                            <option <?php echo $month == 12 ? 'selected': '';?> value="12">December</option>
                          </select>
                          <select class="changeDtr" style="width: 20%; margin-left: 10px" name="year" id="yearDTR">
                            <?php for($Year = date("Y"); $Year >= 2021; $Year--){?>
                              <option value="<?php echo $Year;?>"><?php echo $Year;?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="print_size_dtr card-body table-responsive p-0" style="margin-top: 10px;">
                          <table class="table table_dtr table-bordered" style="font-size: 14px!important;width: 100%;">
                            <thead>
                              <tr>
                                <th width="12%" class="text-center">Day</th>
                                <th width="22%" class="text-center">Time In</th>
                                <th width="22%" class="text-center">Time Out</th>
                                <th width="22%" class="text-center">Late</th>
                                <th width="22%" class="text-center">Undertime</th>
                              </tr>
                            </thead>
                            <tbody id="dtr_month">
                              <?php
                              for($x=1; $x<=31;$x++){
                              ?>
                              <tr>
                                <td class="text-center"><?php echo $x;?></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="print_size_text text-justify" style="padding-top: 15px;"><em><span>I certify on my honor that the above is a true and correct report of the hours of work performed, record of which was made daily at the time of arrival and departure from office.</span></em></div>
                        <div class="print_size_text" style="border-bottom: 2px solid black"></br>&nbsp;</div>
                        <div class="print_size_text"></br><em>VERIFIED as to the prescribed office hours:</em></div>
                        <div class="print_size_text text-center" style="border-bottom: 2px solid black"></br><b><?php echo strtoupper($admin_info->firstname.' '.$admin_info->middle_initial.'. '.$admin_info->lastname);?><b></div>
                        <div class="print_size_text text-center"><em>In Charge</em></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- /.card -->
            </form>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="row" id="printableArea_all_qr" style="page-break-inside: auto;" hidden>
    <?php 
    foreach ($classroom as $value) {
      $encode = base64_encode($value->id.'~'.$value->classroom_name.'~'.$value->designated_office_id.'~'.$value->type);
      $path = str_replace("\\", "/", FCPATH."assets/qrcode_images_doc/".$encode.'.png');
      $path1 = str_replace("+", " ", $path);
      if(file_exists($path1)){
      ?>
        <div class="col-md-6" style="border: 2px solid black">
          <img src="<?php echo base_url('assets/qrcode_images_doc/'.str_replace("+", " ", $encode).'.png')?>" width="100%"/> 
          <center><label><h1><?php echo $value->classroom_name;?></h1></label></center>
        </div>
    <?php 
      }
    }?>
  </div>