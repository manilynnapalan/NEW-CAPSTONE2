  <!-- Main Footer -->
  <!-- ./wrapper -->
  <footer class="main-footer">
    <strong>Sports Management Recording System 2023</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
      <?php @$message = $this->input->get('m');?>
      <input type="hidden" id="hidden_text" value="<?php echo base64_decode(@$message);?>">
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/adminlte/')?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/adminlte/')?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/adminlte/')?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/adminlte/')?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/adminlte/')?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/adminlte/')?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/adminlte/')?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('assets/adminlte/')?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/adminlte/')?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/adminlte/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/')?>dist/js/adminlte.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/adminlte/')?>plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/adminlte/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/adminlte/')?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('assets/adminlte/')?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- Page specific script -->
  <script>
    window.addEventListener('load', (event) => {
      var message = document.getElementById('hidden_text').value;
      var text = message.split("~")[1];
      var des = message.split("~")[0];
      if(message != ''){
        if(des == 'success'){
          toastr.success(text);
        } else if(des == 'errorrr'){
          toastr.error(text);
        }
      }
    });

    $(document).ready(function () {

      $('#employees_table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });

      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });
      //Date picker
      $('#up_reservationdate').datetimepicker({
          format: 'L'
      });
      //Date picker
      $('#reservationdate1').datetimepicker({
          format: 'L'
      });

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Timepicker
      $('#timepicker1').datetimepicker({
        format: 'LT'
      })

      //Timepicker
      $('#up_timepicker').datetimepicker({
        format: 'LT'
      })

      //Timepicker
      $('#up_timepicker1').datetimepicker({
        format: 'LT'
      })

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

      //Date range picker
      $('#reservation').daterangepicker()
    });

  $('#img_preview').click(function(e) {
      $('#customFile').click();
  })

  $('#up_img_preview').click(function(e) {
      $('#up_customFile').click();
  })

  $('#profile_edit').on('click',function(){
    $('#li_update_profile').show(1000);
  })

  $('#profile_edit_close').on('click',function(){
    $('#li_update_profile').hide(1000);
  })

  $('.event_update_button').on('click',function(){
    var event_id = $(this).attr('data-id');
    var data = JSON.parse( $('#up_event_data'+event_id).text());
    $('#update_form').attr('action','<?= base_url('coaches/update_event/')?>'+event_id);
    $('input[name="up_event"]').val(data['event_name']);
    $('textarea[name="up_description"]').text(data['description']);
    $('input[name="up_date"]').val(data['date']);
    $('input[name="up_start_time"]').val(data['start_time']);
    $('input[name="up_end_time"]').val(data['end_time']);
  })

  $('.update_athletes').on('click',function(){
    var account_id = $(this).attr('data-id');
    var data = JSON.parse( $('#up_athlete_data'+account_id).text());
    if(data['gender'] == null){
      var gender = "Select gender";
    } else {
      var gender = data['gender'];
    }
    $('select[name="up_gender"] > option').remove();
    console.log(gender);
    $('#update_form').attr('action','<?= base_url('coaches/update_athlete/')?>'+account_id);
    $('#up_img_preview').attr('src','<?= base_url('assets/images/')?>'+data['pro_pic']);
    $('#up_customFile2').text(data['pro_pic']);
    $('input[name="up_id_number"]').val(data['id_number']);
    $('input[name="up_fname"]').val(data['firstname']);
    $('input[name="up_lname"]').val(data['lastname']);
    $('input[name="up_address"]').val(data['address']);
    $('input[name="up_course"]').val(data['course']);
    $('input[name="up_datebirth"]').val(data['date']);
    $('select[name="up_gender"]').append('<option selected="selected" disabled>'+gender+'</option><option>Male</option><option>Female</option>');
  })

  var loadFile = function(event,image) {
    if(image == 'valid_id'){
      var output = document.getElementById('valid_id_preview');
    }else{
      var output = document.getElementById('img_preview');
    }
    
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src); // free memory
    }
    var filename = $('input[type=file]').val().split('\\').pop();
    $('#label_choose_file').text(filename);
    if(image == 'valid_id'){
      $('#valid_id_text').text(filename);
    } else {
      $('#customFile2').text(filename);
    }
  };

  var loadFile3 = function(event,image) {
    if(image == 'valid_id'){
      var output = document.getElementById('valid_id_preview');
    }else{
      var output = document.getElementById('up_img_preview');
    }
    
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src); // free memory
    }
    var filename = $('input[type=file]').val().split('\\').pop();
    $('#up_label_choose_file').text(filename);
    if(image == 'valid_id'){
      $('#up_customFile2').text(filename);
    } else {
      $('#up_customFile2').text(filename);
    }
  };

  </script>
  <script>
    var img='';
    function update_image_preview(img_id){
      $('#customFile_u'+img).click();
      img = img_id;
    }
    var loadFile1 = function(event,image) {
      var output = document.getElementById('img_preview_u'+img);
      console.log(img);
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src); // free memory
      }
      var filename = $('#customFile_u'+img).val().split('\\').pop();
      $('#label_choose_file_u'+img).text(filename);
      $('#customFile2_u'+img).text(filename);
    };

    $('#but_reg').attr("disabled","disabled");
    $('#password').keyup(function(){
    $('span[class="text-danger"]').remove();
    $('span[class="text-success"]').remove();
    var password = $('#password').val();
    var re_password = $('#re_password').val();
    if(password.match(/[a-z]/) && password.match(/[0-9]/) && password.match(/[!@#$%^&*_]/) && password.match(/[A-Z]/) && password.length >= 8){
      $('input[name="password"]').css("border","");
      $('input[name="password"]').closest('.input-group').after('<span class="text-success">Password is good.</span>');
      if(password == re_password){
        $('input[name="re_password"]').css("border","");
        $('input[name="re_password"]').closest('.input-group').after('<span class="text-success">Password matched.</span>');
        $('#not_re').attr("style","color: green");
        $('#but_reg').removeAttr("disabled");
      } else {
        $('input[name="re_password"]').css("border","1px solid red");
        $('input[name="re_password"]').closest('.input-group').after('<span class="text-danger">Password not matched.</span>');
        $('#not_re').attr("style","color: red");
        $('#but_reg').attr("disabled","disabled");
      }
    } else {
      $('input[name="password"]').css("border","1px solid red");
      $('input[name="password"]').closest('.input-group').after('<span class="text-danger">Password must contain at least 8 characters, 1 Capital Letter, 1 Small Letter, 1 Special Character and 1 Number.</span>');
    }
    
  });

  $('#re_password').keyup(function(){
    $('span[class="text-danger"]').remove();
    $('span[class="text-success"]').remove();
    var password = $('#password').val();
    var re_password = $('#re_password').val();
    if(password == re_password){
      $('input[name="re_password"]').css("border","");
      $('input[name="re_password"]').closest('.input-group').after('<span class="text-success">Password matched.</span>');
      $('#not_re').attr("style","color: green");
      $('#but_reg').removeAttr("disabled");
    } else {
      $('input[name="re_password"]').css("border","1px solid red");
      $('input[name="re_password"]').closest('.input-group').after('<span class="text-danger">Password not matched.</span>');
      $('#not_re').attr("style","color: red");
      $('#but_reg').attr("disabled","disabled");
    }
    
  });

  $('#p_eye').click(function(e) {
    e.preventDefault();
    var pe = $('#p_eye').data('id');
    if(pe == 1){
      $('#password').attr("type","text");
      $('#p_eye').data('id',0);
      $('#p_eye').attr("class","fas fa-eye-slash");
    } else {
      $('#password').attr("type","password");
      $('#p_eye').data('id',1);
      $('#p_eye').attr("class","fas fa-eye");
    }
  });

  $('#rp_eye').click(function(e) {
    e.preventDefault();
    var pe = $('#rp_eye').data('id');
    if(pe == 1){
      $('#re_password').attr("type","text");
      $('#rp_eye').data('id',0);
      $('#rp_eye').attr("class","fas fa-eye-slash");
    } else {
      $('#re_password').attr("type","password");
      $('#rp_eye').data('id',1);
      $('#rp_eye').attr("class","fas fa-eye");
    }
  });
  </script>
</body>
</html>