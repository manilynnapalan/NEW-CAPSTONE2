
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-lg-12" style="font-size: 30px;">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <span class="mt-2">PASUC-SCUAA FORMS</span>
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
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">FORM 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">FORM 2</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">FORM 3</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <div style="text-align: right;">
                      <button class="btn btn-primary" id="print"><i class="fa fa-print"></i> Print</button>
                    </div>
                    <div id="printableArea">
                      <table width="100%" style="font-size: 11pt;font-family: calibri;">
                        <thead>
                          <tr>
                            <td colspan="4"></td>
                            <td colspan="2" rowspan="4" style="border-bottom: 2px solid;text-align: center;"><img src="<?= base_url('assets/images/PASUC_logo.png')?>" style="width: 1in;"></td>
                            <td colspan="3"></td>
                          </tr>
                          <tr>
                            <td colspan="4" style="font-family: lucida fax;font-size: 12pt"><strong><?= strtoupper($scuaaGameDetails->scuaa_name)?></strong></td>
                            
                            <td colspan="3" style="text-align: right;font-size: 9pt;font-family: calibri;"><strong>PASUC-SCUAA FORM 1</strong></td>
                          </tr>
                          <tr>
                            <td colspan="4" style="font-family: lucida fax;font-size: 10pt"><strong>Date & Venue : <?= $scuaaGameDetails->date_scuaa?> | <?= $scuaaGameDetails->host_name?></strong></td>
                            
                            <td colspan="3" style="text-align: center;font-size: 10pt;font-family: lucida fax;border-top: 2px solid;border-right: 2px solid;border-left: 2px solid;"><strong>CHECKLIST OF ELIGIBILITY REQUIREMENT OF</strong></td>
                          </tr>
                          <tr>
                            <td colspan="4" style="text-align: center;font-family: lucida fax;font-size: 10pt;border-bottom: 2px solid;"><strong><?= $scuaaGameDetails->host_address?></strong></td>
                            <td colspan="3" style="text-align: center;font-size: 12pt;font-family: lucida fax;border-bottom: 2px solid;border-right: 2px solid;border-left: 2px solid;"><strong><?= strtoupper($scuaaGameDetails->sport_id)?></strong></td>
                          </tr>
                          <tr>
                            <td colspan="6"></td>
                            <td colspan="2" style="text-align: right;">DATE OF SCREENING : </td>
                            <td><strong><?= strtoupper($scuaaGameDetails->date_screening)?></strong></td>
                          </tr>
                          <tr>
                            <td colspan="6"><span style="text-decoration: underline;font-weight: bolder;">SCHOOL : SOUTHERN LEYTE STATE UNIVERSITY</span></td>
                            <td colspan="2" style="text-align: right;">CATEGORY : </td>
                            <td><strong><?= strtoupper($scuaaGameDetails->category)?></strong></td>
                          </tr>
                          <tr style="text-align: center;font-weight: bolder;;">
                            <td width="28%" style="border: 1px solid">NAME OF ATHLETE (LAST NAME, FIRST NAME, M.I.)</td>
                            <td width="5%" style="border: 1px solid">Age</td>
                            <td width="12%" style="border: 1px solid">Date of Birth</td>
                            <td width="7%" style="border: 1px solid">TOR</td>
                            <td width="7%" style="border: 1px solid">Form 2</td>
                            <td width="7%" style="border: 1px solid">Form 3</td>
                            <td width="7%" style="border: 1px solid">NSO B.C.</td>
                            <td width="8%" style="border: 1px solid">2X2 Picture</td>
                            <td width="20%" style="border: 1px solid">Remarks</td>
                          </tr>
                          <?php
                          $count = 1;
                          for($x = 0 ; $x < 18; $x++){
                            if($x < count($studentsInfo)){
                              $tz = new DateTimeZone('Asia/Manila');
                              $age = DateTime::createFromFormat('Y-m-d',$studentsInfo[$x]->birthdate,$tz)
                                ->diff(new DateTime('now',$tz))
                                ->y;
                          ?>
                            <tr style="font-weight: bolder; text-align: center;">
                              <td width="28%" style="border: 1px solid; text-align: left;"><strong><?= $count?>. 
                              <?= strtoupper($studentsInfo[$x]->firstname);?>
                              <?= $studentsInfo[$x]->middle_initial == NULL? "":" ".strtoupper($studentsInfo[$x]->middle_initial).". ";?>
                              <?= strtoupper($studentsInfo[$x]->lastname);?></strong></td>
                              <td width="5%" style="border: 1px solid"><?= $age?></td>
                              <td width="12%" style="border: 1px solid"><?= date('F d, Y',strtotime($studentsInfo[$x]->birthdate)) ?></td>
                              <td width="7%" style="border: 1px solid"></td>
                              <td width="7%" style="border: 1px solid"></td>
                              <td width="7%" style="border: 1px solid"></td>
                              <td width="7%" style="border: 1px solid"></td>
                              <td width="8%" style="border: 1px solid"></td>
                              <td width="20%" style="border: 1px solid"></td>
                            </tr>
                          <?php }else{ ?>
                            <tr style="font-weight: bolder;">
                              <td width="28%" style="border: 1px solid"><?= $count?>.</td>
                              <td width="5%" style="border: 1px solid"></td>
                              <td width="12%" style="border: 1px solid"></td>
                              <td width="7%" style="border: 1px solid"></td>
                              <td width="7%" style="border: 1px solid"></td>
                              <td width="7%" style="border: 1px solid"></td>
                              <td width="7%" style="border: 1px solid"></td>
                              <td width="8%" style="border: 1px solid"></td>
                              <td width="20%" style="border: 1px solid"></td>
                            </tr>
                          <?php 
                            }
                            $count++; 
                          }?>
                          <tr style="text-align: center;font-weight: bolder;">
                            <td colspan="2" style="padding-top: 50px;font-size: 12pt;text-decoration: underline;border-left: 1px solid;border-right: 1px solid"><strong>
                              <?= strtoupper($coachDetails->firstname);?>
                              <?= $coachDetails->middle_initial == NULL? "":" ".strtoupper($coachDetails->middle_initial).". ";?>
                              <?= strtoupper($coachDetails->lastname);?></strong></td>
                            <td colspan="5" style="padding-top: 50px;font-size: 12pt;text-decoration: underline;text-transform: uppercase;border-left: 1px solid;border-right: 1px solid"><strong><?= $scuaaGameDetails->sports_coordinator;?></strong></td>
                            <td colspan="2" style="border-left: 1px solid;border-right: 1px solid"></td>
                          </tr>
                          <tr style="text-align: center;">
                            <td colspan="2" style="font-size: 11pt;border-left: 1px solid;border-right: 1px solid;border-bottom: 1px solid">Name & Signature of Coach</td>
                            <td colspan="5" style="font-size: 11pt;border-left: 1px solid;border-right: 1px solid;border-bottom: 1px solid">Name & Signature of Sports Coordinator</td>
                            <td colspan="2" style="border-left: 1px solid;border-right: 1px solid;border-bottom: 1px solid"></td>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade table-responsive" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div style="text-align: right;">
                      <button class="btn btn-primary" id="print1"><i class="fa fa-print"></i> Print</button>
                    </div>
                    <div id="printableArea1">
                      <table width="100%" style="font-size: 11pt;font-family: calibri;" class=" table-striped">
                        <thead>
                          <tr>
                            <td colspan="4" style="font-family: lucida fax;font-size: 12pt"><strong><?= strtoupper($scuaaGameDetails->scuaa_name)?></strong></td>
                            
                            <td colspan="2" style="text-align: right;font-size: 9pt;font-family: calibri;"><strong>PASUC-SCUAA FORM 2</strong></td>
                          </tr>
                          <tr>
                            <td colspan="4" style="font-family: lucida fax;font-size: 10pt"><strong>Date & Venue : <?= $scuaaGameDetails->date_scuaa?> | <?= $scuaaGameDetails->host_name?></strong></td>
                            
                            <td colspan="2" style="text-align: center;font-size: 10pt;font-family: lucida fax;border-top: 2px solid;border-right: 2px solid;border-left: 2px solid;"><strong>CHECKLIST OF ELIGIBILITY REQUIREMENT OF</strong></td>
                          </tr>
                          <tr>
                            <td colspan="4" style="text-align: center;font-family: lucida fax;font-size: 10pt;border-bottom: 2px solid;"><strong><?= $scuaaGameDetails->host_address?></strong></td>
                            <td colspan="2" style="text-align: center;font-size: 12pt;font-family: lucida fax;border-bottom: 2px solid;border-right: 2px solid;border-left: 2px solid;"><strong><?= strtoupper($scuaaGameDetails->sport_id)?></strong></td>
                          </tr>
                          <tr>
                            <td colspan="4"></td>
                            <td style="text-align: right;">DATE OF SCREENING : </td>
                            <td><strong><?= strtoupper($scuaaGameDetails->date_screening)?></strong></td>
                          </tr>
                          <tr>
                            <td colspan="4"><span style="text-decoration: underline;font-weight: bolder;">SCHOOL : SOUTHERN LEYTE STATE UNIVERSITY</span></td>
                            <td style="text-align: right;">CATEGORY : </td>
                            <td><strong><?= strtoupper($scuaaGameDetails->category)?></strong></td>
                          </tr>

                          <!-- player info fro 1 - 5 -->
                          <tr style="text-align: center;font-weight: bolder;">
                            <td width="10%" style="border: 1px solid"><img src="<?= base_url('assets/images/PASUC_logo.png')?>" style="width: 1in;"></td>
                            <?php 
                            for($x = 0; $x < 5;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid">
                              <span>ATHLETE</span><br>
                              <img src="<?= base_url('assets/images/'.$studentsInfo[$x]->pro_pic)?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              <span>ATHLETE</span><br>
                              <img src="<?= base_url('assets/images/white_image.png')?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <?php }}?>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Name </td>
                            <?php 
                            for($x = 0; $x < 5;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= strtoupper($studentsInfo[$x]->firstname);?>
                              <?= $studentsInfo[$x]->middle_initial == NULL? "":" ".strtoupper($studentsInfo[$x]->middle_initial).". ";?>
                              <?= strtoupper($studentsInfo[$x]->lastname);?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Date of Birth </td>
                            <?php 
                            for($x = 0; $x < 5;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= date('F d, Y',strtotime($studentsInfo[$x]->birthdate));?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Course & Year</td>
                            <?php 
                            for($x = 0; $x < 5;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= date('F d, Y',strtotime($studentsInfo[$x]->course));?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                          </tr>

                          <!-- player info fro 6 - 10 -->
                          <tr style="text-align: center;font-weight: bolder;">
                            <td width="10%" style="border: 1px solid">&nbsp;</td>
                            <?php 
                            for($x = 5; $x < 10;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid">
                              <span>ATHLETE</span><br>
                              <img src="<?= base_url('assets/images/'.$studentsInfo[$x]->pro_pic)?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              <span>ATHLETE</span><br>
                              <img src="<?= base_url('assets/images/white_image.png')?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <?php }}?>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Name </td>
                            <?php 
                            for($x = 5; $x < 10;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= strtoupper($studentsInfo[$x]->firstname);?>
                              <?= $studentsInfo[$x]->middle_initial == NULL? "":" ".strtoupper($studentsInfo[$x]->middle_initial).". ";?>
                              <?= strtoupper($studentsInfo[$x]->lastname);?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Date of Birth </td>
                            <?php 
                            for($x = 5; $x < 10;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= date('F d, Y',strtotime($studentsInfo[$x]->birthdate));?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Course & Year</td>
                            <?php 
                            for($x = 5; $x < 10;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= date('F d, Y',strtotime($studentsInfo[$x]->course));?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                          </tr>

                          <!-- player info fro 11 - 15 -->
                          <!-- <tr style="text-align: center;font-weight: bolder;">
                            <td width="10%" style="border: 1px solid">&nbsp;</td>
                            <?php 
                            for($x = 10; $x < 15;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid">
                              <span>ATHLETE</span><br>
                              <img src="<?= base_url('assets/images/'.$studentsInfo[$x]->pro_pic)?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              <span>ATHLETE</span><br>
                              <img src="<?= base_url('assets/images/white_image.png')?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <?php }}?>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Name </td>
                            <?php 
                            for($x = 10; $x < 15;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= strtoupper($studentsInfo[$x]->firstname);?>
                              <?= $studentsInfo[$x]->middle_initial == NULL? "":" ".strtoupper($studentsInfo[$x]->middle_initial).". ";?>
                              <?= strtoupper($studentsInfo[$x]->lastname);?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Date of Birth </td>
                            <?php 
                            for($x = 10; $x < 15;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= date('F d, Y',strtotime($studentsInfo[$x]->birthdate));?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Course & Year</td>
                            <?php 
                            for($x = 10; $x < 15;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= date('F d, Y',strtotime($studentsInfo[$x]->course));?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                          </tr> -->

                          <!-- player info fro 16 - 17 -->
                          <tr style="text-align: center;font-weight: bolder;">
                            <td width="10%" style="border: 1px solid">&nbsp;</td>
                            <?php 
                            for($x = 15; $x < 17;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid">
                              <span>ATHLETE</span><br>
                              <img src="<?= base_url('assets/images/'.$studentsInfo[$x]->pro_pic)?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              <span>ATHLETE</span><br>
                              <img src="<?= base_url('assets/images/white_image.png')?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <?php }}?>
                            <td width="18%" style="border: 1px solid">
                              <span>ASST. COACH</span><br>
                              <img src="<?= base_url('assets/images/white_image.png')?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <td width="18%" style="border: 1px solid">
                              <span>COACH</span><br>
                              <img src="<?= base_url('assets/images/'.$coachDetails->pro_pic)?>" style="width: 2in;height: 2in;border: 1px solid">
                            </td>
                            <td width="18%" style="border: 1px solid; text-align: center; vertical-align: center;"><i>University Seal</i></td>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Name </td>
                            <?php 
                            for($x = 15; $x < 17;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= strtoupper($studentsInfo[$x]->firstname);?>
                              <?= $studentsInfo[$x]->middle_initial == NULL? "":" ".strtoupper($studentsInfo[$x]->middle_initial).". ";?>
                              <?= strtoupper($studentsInfo[$x]->lastname);?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">&nbsp;
                            </td>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= strtoupper($coachDetails->firstname);?>
                              <?= $coachDetails->middle_initial == NULL? "":" ".strtoupper($coachDetails->middle_initial).". ";?>
                              <?= strtoupper($coachDetails->lastname);?>
                            </td>
                            <td rowspan="3" width="18%" style="border: 1px solid; text-align: center; vertical-align: center;">
                              <strong style="text-decoration: underline;text-transform: uppercase;"><?= $scuaaGameDetails->sports_coordinator;?></strong>
                              <br>
                              <span>Sports Director</span>
                            </td>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Date of Birth </td>
                            <?php 
                            for($x = 15; $x < 17;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= date('F d, Y',strtotime($studentsInfo[$x]->birthdate));?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">&nbsp;
                            </td>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= $coachDetails->contact_number;?>
                            </td>
                          </tr>

                          <tr>
                            <td style="border: 1px solid">Course & Year</td>
                            <?php 
                            for($x = 15; $x < 17;$x++){
                            if(count($studentsInfo) > $x){?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= date('F d, Y',strtotime($studentsInfo[$x]->course));?>
                            </td>
                            <?php } else {?>
                            <td width="18%" style="border: 1px solid">
                              &nbsp;
                            </td>
                            <?php }}?>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">&nbsp;
                            </td>
                            <td width="18%" style="border: 1px solid; text-align: center;font-weight: bolder;">
                              <?= $coachDetails->email_address;?>
                            </td>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <table class="table table-bordered table-striped" id="employees_table" style="margin-top: 0px!important;width: 100%;">
                      <thead>
                        <tr>
                          <th>ATHLETE NAME</th>
                          <th>BIRTHDATE</th>
                          <th>COURSE</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for($x=0;$x<count($studentsInfo);$x++){?>
                          <tr>
                            <td><?= strtoupper($studentsInfo[$x]->firstname);?>
                            <?= $studentsInfo[$x]->middle_initial == NULL? "":" ".strtoupper($studentsInfo[$x]->middle_initial).". ";?>
                            <?= strtoupper($studentsInfo[$x]->lastname);?>
                            <?= strtoupper($studentsInfo[$x]->extension);?></td>
                            <td><?= date('F d, Y',strtotime($studentsInfo[$x]->birthdate))?></td>
                            <td><?= strtoupper($studentsInfo[$x]->course);?></td></td>
                            <td>
                              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-view-form3-<?php echo $studentsInfo[$x]->account_id;?>"><i class="fa fa-eye"></i> View</button>
                              <style type="text/css">
                                .modal-body .row .col-sm-12 div table{
                                    table-layout:fixed;
                                }
                              </style>
                              <div class="modal fade" id="modal-view-form3-<?php echo $studentsInfo[$x]->account_id;?>">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button data-id="<?= $studentsInfo[$x]->account_id?>" class="btn btn-primary print2"><i class="fas fa-print"></i> Print</button>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div id="printableArea2<?= $studentsInfo[$x]->account_id?>">
                                            <table width="100%" style="font-size: 11pt;font-family: calibri;">
                                              <tr>
                                                <td width="15%"></td>
                                                <td width="15%"></td>
                                                <td width="15%"></td>
                                                <td width="15%"></td>
                                                <td width="15%"></td>
                                                <td width="10%"></td>
                                                <td width="15%"></td>
                                              </tr>
                                              <tr>
                                                <td rowspan="5" style="text-align: center"><img src="<?= base_url('assets/images/PASUC_logo.png')?>" style="width: 1in;height:1in;" ></td>
                                                <td colspan="5" style="font-family: lucida fax;font-size: 12pt">&nbsp;</td>
                                                
                                                <td style="text-align: right;font-size: 9pt;font-family: calibri;"><strong>PASUC-SCUAA FORM 3</strong></td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="font-family: lucida fax;font-size: 14pt;text-align: center"><strong>PASUC-<?= strtoupper($scuaaGameDetails->scuaa_name)?></strong></td>
                                                <td colspan="2" rowspan="8" style="text-align: right;vertical-align: top;"> <img src="<?= base_url('assets/images/'.$studentsInfo[$x]->pro_pic)?>" style="width: 2in;height:2in;border:1px solid;padding-right: 10px;" ></td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="font-family: lucida fax;font-size: 10pt;text-align: center"><strong>Host : <?= $scuaaGameDetails->host_name?></strong></td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="font-family: lucida fax;font-size: 10pt;text-align: center"><strong><?= $scuaaGameDetails->date_scuaa?></strong></td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="font-family: lucida fax;font-size: 10pt;text-align: center"><strong>&nbsp;</strong></td>
                                              </tr>
                                              <tr>
                                                <td colspan=5 style="font-family: lucida fax;font-size: 10pt;">
                                                  <strong><em style="padding-left: 50px">Theme : </em></strong>
                                                  <div style="width: 82%;text-align: center;border-bottom: 1px solid;float: right;margin-right: 12px;"><strong><em><?= ucwords($scuaaGameDetails->scuaa_theme)?></em></strong></div>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="5" style="font-family: lucida fax;font-size: 10pt;"><strong>&nbsp;</strong></td>
                                              </tr>
                                              <tr>
                                                <td colspan="5" style="font-family: lucida fax;font-size: 14pt;text-align: right;padding-right: 18%"><strong>ELIGIBILITY FORM</strong></td>
                                              </tr>
                                              <tr>
                                                <td colspan="5" style="font-family: lucida fax;font-size: 10pt;text-align: center"><strong>&nbsp;</strong></td>
                                              </tr>
                                              <tr>
                                                <td colspan="7" style="font-size: 12pt;text-align: center;border:1px solid"><strong>PARTICIPANT'S PERSONAL INFORMATION</strong></td>
                                              </tr>
                                              <tr>
                                                <td style="font-size: 11pt;;border:1px solid">NAME OF ATHLETE :</td>
                                                <td colspan="4" style="font-size: 14pt;border:1px solid"><strong>
                                                  <?= strtoupper($studentsInfo[$x]->firstname);?>
                                                  <?= $studentsInfo[$x]->middle_initial == NULL? "":" ".strtoupper($studentsInfo[$x]->middle_initial).". ";?>
                                                  <?= strtoupper($studentsInfo[$x]->lastname);?>
                                                  <?= strtoupper($studentsInfo[$x]->extension);?>
                                                </strong></td>
                                                <td style="font-size: 11pt;border:1px solid;text-align: right;">AGE :</td>
                                                <td style="font-size: 12pt;border:1px solid;font-weight:bolder;text-align: center;"><?php
                                                    $tz = new DateTimeZone('Asia/Manila');
                                                    $age = DateTime::createFromFormat('Y-m-d',$studentsInfo[$x]->birthdate,$tz)
                                                      ->diff(new DateTime('now',$tz))
                                                      ->y;
                                                      echo $age;
                                                    ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td style="font-size: 11pt;border:1px solid">DATE OF BIRTH :</td>
                                                <td style="font-size: 12pt;border:1px solid;font-weight:bolder;"><?= date('F d, Y', strtotime($studentsInfo[$x]->birthdate))?></td>
                                                <td style="font-size: 11pt;border:1px solid;text-align: right;">WEIGHT (kg.) :</td>
                                                <td style="font-size: 12pt;border:1px solid;font-weight:bolder;text-align: center;"><?= $studentsInfo[$x]->weight?></td>
                                                <td colspan="2" style="font-size: 11pt;border:1px solid;text-align: right;">HEIGHT (cm.) :</td><td style="font-size: 12pt;border:1px solid;font-weight:bolder;text-align: center;"><?= $studentsInfo[$x]->height?></td>
                                              </tr>
                                              <tr>
                                                <td style="font-size: 11pt;border:1px solid">BLOOD TYPE : <strong style="font-size: 12pt;"><?= $studentsInfo[$x]->blood_type?></strong></td>
                                                <td colspan="2" style="font-size: 11pt;border:1px solid">ALLERGIES : <strong style="font-size: 12pt;"><?= $studentsInfo[$x]->allergies?></strong></td>
                                                <td colspan="4" style="font-size: 11pt;border:1px solid">Medication (if any) : <strong style="font-size: 12pt;"><?= $studentsInfo[$x]->medications?></strong></td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="font-size: 11pt;border:1px solid">ADDRESS : <strong style="font-size: 12pt;"><?= $studentsInfo[$x]->address?></strong></td>
                                                <td colspan="2" style="font-size: 11pt;border:1px solid;text-align: right;">CONTACT NO. : </td>
                                                <td style="font-size: 11pt;border:1px solid;text-align: center;"><strong style="font-size: 12pt;"><?= $studentsInfo[$x]->contact_number?></strong></td>
                                              </tr>
                                              <tr>
                                                <td colspan="7" style="font-size: 10pt;text-align: center;"><strong>=============================================================================================================================================================================</td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="font-family:lucida fax;border-top:1px solid;border-right:1px solid;border-left:1px solid;text-align: center;"><strong style="font-size: 14pt;"><u>MEDICAL CERTIFICATE</u></strong></td>
                                                <td colspan="4" style="font-size: 14pt;border-top:1px solid;border-right:1px solid;border-left:1px solid;font-weight: bolder;text-align: center;font-family:lucida fax;"><u>ATHLETE'S WAIVER & RELEASE AGREEMENT</u></td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="border-right:1px solid;border-left:1px solid;font-size: 11pt;">This is to certify that:</td>
                                                <td colspan="4" rowspan="8" style="font-size: 11pt;border-right:1px solid;text-align: justify;font-family:lucida fax;vertical-align: text-top;padding: 30px 20px 0px 20px;">In consideration of the acceptance of my entry, myself, my heirs, executors, administrators & assigns, do hereby release & discharge the organizers of the <em style="font-weight: bolder;"><?= strtoupper($scuaaGameDetails->scuaa_name)?></em>, assisting groups of private or government agencies, the Commission of Higher Education and other concerned institutions, respective schools and officials, and other parties, individual or group, from all claims and damages, demands or actions whatsoever in any manner arising from or growing out of my participation in, or while traveling to and from the above-mentioned sports competition. I further attest and verify that I have obtained the necessary clearance from my medical doctor and guaranteed <em style="font-weight: bolder;">Physically Fit</em> to participate in the said sports competition.
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="border-right:1px solid;border-left:1px solid;text-align: center;font-size: 14pt;font-weight: bolder;">
                                                  <?= strtoupper($studentsInfo[$x]->firstname);?>
                                                  <?= $studentsInfo[$x]->middle_initial == NULL? "":" ".strtoupper($studentsInfo[$x]->middle_initial).". ";?>
                                                  <?= strtoupper($studentsInfo[$x]->lastname);?>
                                                  <?= strtoupper($studentsInfo[$x]->extension);?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="border-right:1px solid;border-left:1px solid;text-align: center;font-size: 11pt;">
                                                  is <em style="font-weight: bolder;">Physically Fit</em> to participate in the following competitions:
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="border:1px solid;font-size: 11pt;">
                                                  [<?= $scuaaGameDetails->game_type=="Regional" ? "&#10004;":"&nbsp;&nbsp;&nbsp;&nbsp;"?>] <?= $scuaaGameDetails->game_type=="Regional" ? '<em style="font-weight:bolder">'.strtoupper($scuaaGameDetails->scuaa_name).'</em> on <em>'.$scuaaGameDetails->date_scuaa.' at ' .$scuaaGameDetails->host_name.', '.$scuaaGameDetails->host_address.'</em>':'<em style="font-weight:bolder"> SCUAA REGIONAL GAMES</em>'?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="border:1px solid;font-size: 11pt;">
                                                  [<?= $scuaaGameDetails->game_type=="National" ? "&#10004;":"&nbsp;&nbsp;&nbsp;&nbsp;"?>] <?= $scuaaGameDetails->game_type=="National" ? '<em style="font-weight:bolder">'.strtoupper($scuaaGameDetails->scuaa_name).'</em> on <em>'.$scuaaGameDetails->date_scuaa.' at ' .$scuaaGameDetails->host_name.', '.$scuaaGameDetails->host_address.'</em>':'<em style="font-weight:bolder"> SCUAA NATIONAL GAMES</em>'?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="1" style="border:1px solid;font-size: 11pt;vertical-align: text-top;">
                                                  Blood Pressure:</br>
                                                  <?php
                                                  $date1 = new DateTime($studentsInfo[$x]->updated_on);
                                                  $date2 = new DateTime();
                                                  $interval = $date1->diff($date2);
                                                  ?>
                                                  <center><label><?= $interval->y==0 && $interval->m<1 ? $studentsInfo[$x]->blood_pressure : ''?></label></center>
                                                </td>
                                                <td colspan="2" style="border:1px solid;font-size: 11pt;">
                                                  <center><label style="text-transform: uppercase;padding-top: 40px"><?= $interval->y==0 && $interval->m<1 ? $studentsInfo[$x]->ms_fname.' '.$studentsInfo[$x]->ms_mi.'. '.$studentsInfo[$x]->ms_lname : ''?></label></center>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td style="border:1px solid;font-size: 11pt;">

                                                </td>
                                                <td colspan="2" style="border:1px solid;font-size: 11pt;font-weight: bolder;text-align: center;">
                                                  Name and Signature of  Physician
                                                </td>
                                              </tr>
                                              <tr>
                                                <td style="border:1px solid;font-size: 11pt;vertical-align: text-top;">
                                                  Date of Examination:</br>
                                                  <center><label><?= $interval->y==0 && $interval->m<1 ? $studentsInfo[$x]->updated_on != NULL ? date('Y-m-d', strtotime($studentsInfo[$x]->updated_on)) :'' : ''?></label></center>
                                                </td>
                                                <td style="border:1px solid;font-size: 11pt;vertical-align: text-top;">
                                                  License No.:</br>
                                                  <center><label><?= $interval->y==0 && $interval->m<1 ? $studentsInfo[$x]->ms_license : ''?></label></center>
                                                </td>
                                                <td style="border:1px solid;font-size: 11pt;vertical-align: text-top;">
                                                  Validity Date:</br>
                                                  <center><label><?= $interval->y==0 && $interval->m<1 ? $studentsInfo[$x]->ms_validity : ''?></label></center>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="font-size: 11pt;vertical-align: text-top;border-left: 1px solid;">
                                                  
                                                </td>
                                                <td colspan="4" style="font-size: 11pt;font-weight: bolder;text-align: center;border-left: 1px solid;border-right: 1px solid;">
                                                  <?= strtoupper($studentsInfo[$x]->firstname);?>
                                                  <?= $studentsInfo[$x]->middle_initial == NULL? "":" ".strtoupper($studentsInfo[$x]->middle_initial).". ";?>
                                                  <?= strtoupper($studentsInfo[$x]->lastname);?>
                                                  <?= strtoupper($studentsInfo[$x]->extension);?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="font-size: 11pt;border-left: 1px solid;border-bottom: 1px solid;">
                                                </td>
                                                <td colspan="4" style="border: 1px solid;font-size: 11pt;font-weight: bolder;text-align: center;">
                                                  Printed Name and Signature of Athlete
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="7" style="font-size: 10pt;text-align: center;"><strong>=============================================================================================================================================================================</td>
                                              </tr>
                                              <tr>
                                                <td colspan="7" style="font-size: 14pt;border-top:1px solid;border-right:1px solid;border-left:1px solid;font-weight: bolder;text-align: center;font-family:lucida fax;"><u>PARENT/GUARDIAN PERMIT/CONSENT</u></td>
                                              </tr>
                                              <tr>
                                                <td colspan="7" style="border-left:1px solid;border-right:1px solid;font-size: 11pt;vertical-align: text-top;">
                                                  This is to certify that I have full knowledge of and permission for my son/daughter/foster child to join and participate in the following competitions;
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="7" style="border:1px solid;font-size: 11pt;">
                                                  [<?= $scuaaGameDetails->game_type=="Regional" ? "&#10004;":"&nbsp;&nbsp;&nbsp;&nbsp;"?>] <?= $scuaaGameDetails->game_type=="Regional" ? '<em style="font-weight:bolder">'.strtoupper($scuaaGameDetails->scuaa_name).'</em> on <em>'.$scuaaGameDetails->date_scuaa.' at ' .$scuaaGameDetails->host_name.', '.$scuaaGameDetails->host_address.'</em>':'<em style="font-weight:bolder"> SCUAA REGIONAL GAMES</em>'?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="7" style="border:1px solid;font-size: 11pt;">
                                                  [<?= $scuaaGameDetails->game_type=="National" ? "&#10004;":"&nbsp;&nbsp;&nbsp;&nbsp;"?>] <?= $scuaaGameDetails->game_type=="National" ? '<em style="font-weight:bolder">'.strtoupper($scuaaGameDetails->scuaa_name).'</em> on <em>'.$scuaaGameDetails->date_scuaa.' at ' .$scuaaGameDetails->host_name.', '.$scuaaGameDetails->host_address.'</em>':'<em style="font-weight:bolder"> SCUAA NATIONAL GAMES</em>'?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="7" style="border:1px solid;font-size: 11pt; padding-top: 20px;">
                                                  I concur and agree on the rules, policies and regulations being implemented by the concerned organizers.
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="border-left:1px solid;border-right:1px solid;font-size: 11pt;padding-top:30px;text-align: center;">
                                                  <u><strong><?= strtoupper($studentsInfo[$x]->parent);?></strong></u>
                                                </td>
                                                <td colspan="4" style="border-left:1px solid;border-right:1px solid;font-size: 11pt;padding-top:30px;text-align: center;">
                                                  <u><strong><?= strtoupper($studentsInfo[$x]->parent_number);?></strong></u>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="3" style="border-left:1px solid;border-right:1px solid;font-size: 11pt;font-weight: bolder;text-align: center;">
                                                  Printed Name and Signature of Parent/Guardian
                                                </td>
                                                <td colspan="4" style="border-left:1px solid;border-right:1px solid;font-size: 11pt;font-weight: bolder;text-align: center;">
                                                  Contact Number
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="7" style="border:1px solid;font-size: 11pt;text-align: center;padding-top: 20px;padding-bottom: 60px;">
                                                  <div>SUBCRIBED AND SWORN TO before me this _______________________ in ________________________.</div>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="4" style="padding-top: 80px;">
                                                  
                                                </td>
                                                <td colspan="3" style="padding-top: 80px;border-bottom: 1px solid">
                                                  
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="4">
                                                  
                                                </td>
                                                <td colspan="3" style="font-weight: bolder;font-size: 11pt;text-align: center;">
                                                  Notary
                                                </td>
                                              </tr>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
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

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->