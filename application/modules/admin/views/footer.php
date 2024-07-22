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
<!-- fullCalendar 2.2.5 -->
<script src="<?= base_url('assets/adminlte/')?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/adminlte/')?>plugins/fullcalendar/main.js"></script>
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


  $('.update_athletes').on('click',function(){
    var account_id = $(this).attr('data-id');
    var data = JSON.parse( $('#up_athlete_data'+account_id).text());
    if(data['gender'] == null){
      var gender = "Select gender";
    } else {
      var gender = data['gender'];
    }
    $('#update_form').attr('action','<?= base_url('admin/update_athlete/')?>'+account_id);
    $('#up_img_preview').attr('src','<?= base_url('assets/images/')?>'+data['pro_pic']);
    $('#up_customFile2').text(data['pro_pic']);
    $('input[name="up_id_number"]').val(data['id_number']);
    $('input[name="up_fname"]').val(data['firstname']);
    $('input[name="up_lname"]').val(data['lastname']);
    $('input[name="up_address"]').val(data['address']);
    $('input[name="up_course"]').val(data['course']);
    $('input[name="up_datebirth"]').val(data['date']);
    $('select[name="up_gender"] option:first').text(gender);
    $('select[name="up_sport"] option:first').text(data['sport']);
    $('select[name="up_school_year"] option:first').text(data['school_year']);
    // console.log($('select[name="up_sport"] option:first').text());
    //Initialize Select2 Elements
    $('.select2').select2();
  })

    $(document).ready(function () {
      //Initialize Select2 Elements
      $('.select2').select2();

      $('#employees_table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });

      $('#survey_table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });

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
      $('#reservationdate1').datetimepicker({
          format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

      //Date range picker
      $('#reservation').daterangepicker()
    });

  $('#img_preview').click(function(e) {
    $('#customFile').click();
  })

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

  $('#profile_edit').on('click',function(){
    $('#li_update_profile').show(1000);
  })

  $('#profile_edit_close').on('click',function(){
    $('#li_update_profile').hide(1000);
  })

  $('select[name="ts"]').on('change',function(){
    $('#formSubmit').submit();
  })

  $('select[name="sy"]').on('change',function(){
    $('#submit_formSY').submit();
  })

  var loadFile2 = function(event,image) {
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

  $('#up_img_preview').click(function(e) {
      $('#up_customFile').click();
  })
  var loadFile = function(event,image) {
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
      $('#valid_id_text').text(filename);
    } else {
      $('#up_customFile2').text(filename);
    }
  };

  var loadFile4 = function(event,image) {
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

  </script>
  <script>
    var img='';
    function update_image_preview(img_id){
      $('#customFile_u'+img).click();
      img = img_id;
      console.log(img);
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

  </script>

</body>
</html>