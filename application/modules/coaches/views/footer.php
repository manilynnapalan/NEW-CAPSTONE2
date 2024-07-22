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

      $('#attendances').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "buttons": ["print"]
      }).buttons().container().appendTo('#attendances_wrapper .col-md-6:eq(0)');

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

  $('.submit_button').click(function(e) {
      console.log($(this).text());
      var id = $('input[name="hidden_account_id"]').val();
      var form = $(this).closest($('modalForm'));
      console.log(form);
      form.attr('action','<?= base_url('coaches/present_athletes/')?>'+id+'/'+$(this).text());
      // form.submit();
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
    $('#selected_value').text(data['venue']);
    $('input[name="up_end_time"]').val(data['end_time']);
  });


  $('select[name="sy"]').on('change',function(){
    $('#submit_formSY').submit();
  });

  $('.update_athletes').on('click',function(){
    var account_id = $(this).attr('data-id');
    var data = JSON.parse( $('#up_athlete_data'+account_id).text());
    console.log(data);
    if(data['gender'] == null){
      var gender = "Select gender";
    } else {
      var gender = data['gender'];
    }

    $('select[name="up_school_year"] option:first').text(data['school_year']);
    $('#update_form').attr('action','<?= base_url('coaches/update_athlete/')?>'+account_id);
    $('#up_img_preview').attr('src','<?= base_url('assets/images/')?>'+data['pro_pic']);
    $('#up_customFile2').text(data['pro_pic']);
    $('input[name="up_id_number"]').val(data['id_number']);
    $('input[name="up_fname"]').val(data['firstname']);
    $('input[name="up_lname"]').val(data['lastname']);
    $('input[name="up_address"]').val(data['address']);
    $('input[name="up_course"]').val(data['course']);
    $('input[name="up_blood_type"]').val(data['blood_type']);
    $('input[name="up_weight"]').val(data['weight']);
    $('input[name="up_height"]').val(data['height']);
    $('input[name="up_allergies"]').val(data['allergies']);
    $('input[name="up_medications"]').val(data['medications']);
    $('input[name="up_contact_number"]').val(data['contact_number']);
    $('input[name="up_parent"]').val(data['parent']);
    $('input[name="up_parent_number"]').val(data['parent_number']);
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
   <?php if($this->uri->segment(2) == null){
    ?>
  <script>

    $(function () {
      /* initialize the external events
       -----------------------------------------------------------------*/
      function ini_events(ele) {
        ele.each(function () {

          // create an Event Object (https://fullcalendar.io/docs/event-object)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex        : 1070,
            revert        : true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          })

        })
      }

      ini_events($('#external-events div.external-event'))

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)

      var date = new Date()
      var d    = date.getDate(),
          m    = date.getMonth(),
          y    = date.getFullYear()
          console.log(date +' - '+date.getDate());
      var Calendar = FullCalendar.Calendar;
      var Draggable = FullCalendar.Draggable;

      var containerEl = document.getElementById('external-events');
      var checkbox = document.getElementById('drop-remove');
      var calendarEl = document.getElementById('calendar');

      // initialize the external events
      // -----------------------------------------------------------------

      new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText,
            backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
            borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
            textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
          };
        }
      });
      
      var calendar = new Calendar(calendarEl, {
        headerToolbar: {
          left  : 'prev,next today',
          center: 'title',
          right : 'timeGridWeek'
        },
        themeSystem: 'bootstrap',
        //Random default events
        events: [
          <?php 

          $count = 1;
          $total = count($allEvents);
          foreach ($allEvents as  $value) {?>
              {
                title          : '<?= $value->event_name;?>',
                start          : new Date(new Date('<?= $value->date;?>').getFullYear(), new Date('<?= $value->date;?>').getMonth(), new Date('<?= $value->date;?>').getDate(), <?= date('H',strtotime($value->start_time));?>, <?= date('i',strtotime($value->start_time));?>),
                end            : new Date(new Date('<?= $value->date;?>').getFullYear(), new Date('<?= $value->date;?>').getMonth(), new Date('<?= $value->date;?>').getDate(), <?= date('H',strtotime($value->end_time));?>, <?= date('i',strtotime($value->end_time));?>),
                backgroundColor: '<?= $bgcolor_index[$value->event_id]?>', //yellow
                borderColor    : '<?= $bgcolor_index[$value->event_id]?>' //yellow
              },
          <?php }?>
          
          {
            
          }
        ],
        editable  : false,
        droppable : false, // this allows things to be dropped onto the calendar !!!
        drop      : function(info) {
          // is the "remove after drop" checkbox checked?
          if (checkbox.checked) {
            // if so, remove the element from the "Draggable Events" list
            info.draggedEl.parentNode.removeChild(info.draggedEl);
          }
        }
      });

      calendar.render();
      // $('#calendar').fullCalendar()

      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      // Color chooser button
      $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
          'background-color': currColor,
          'border-color'    : currColor
        })
      })
      $('#add-new-event').click(function (e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }

        // Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color'    : currColor,
          'color'           : '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
      })

      $('.fc-timeGridWeek-button').click();
    })
  </script>
  <?php }?>

  <script>
    $(function () {
      $('#checkboxSuccessAll').on('click', function(e){
        var id = $(this).attr("cbs");
        if(id == "0") {
          $(this).attr("cbs","1");
          $('input.cb_clist').attr("checked","checked");
          $('.hidden_ids').attr('name','hidden_var_ids[]');
        } else if (id == "1") {
          $(this).attr("cbs","0");
          $('input.cb_clist').removeAttr("checked");
          $('.hidden_ids').removeAttr('name');
        }
      });

      $("input.cb_clist").on("click", function(e){
        var a = $("input.cb_clist");
        var id = $(this).data("id");
        if(a.length == a.filter(":checked").length){
          $('#checkboxSuccessAll').attr("checked","checked");
        } else {
          $('#checkboxSuccessAll').removeAttr("checked");
        }

        if($(this).is(":checked")){
          $('#hidden_ids'+id).attr('name','hidden_var_ids[]');
        } else {
          $('#hidden_ids'+id).removeAttr('name');
        }
      });

      $('.proceed_button').on('click', function(){
        $('#ids_form').submit();
      })
    });

    $("#print").on('click',function(){
      var css = '@page { size: A3 landscape; }',
      head = document.head || document.getElementsByTagName('head')[0],
      style = document.createElement('style');

      style.type = 'text/css';
      style.media = 'print';

      if (style.styleSheet){
        style.styleSheet.cssText = css;
      } else {
        style.appendChild(document.createTextNode(css));
      }

      head.appendChild(style);
      var printContents = document.getElementById('printableArea').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
    });

    $("#print1").on('click',function(){
      var css = '@page { size: A3 landscape; }',
      head = document.head || document.getElementsByTagName('head')[0],
      style = document.createElement('style');

      style.type = 'text/css';
      style.media = 'print';

      if (style.styleSheet){
        style.styleSheet.cssText = css;
      } else {
        style.appendChild(document.createTextNode(css));
      }

      head.appendChild(style);
      var printContents = document.getElementById('printableArea1').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
    });

    $(".print2").on('click',function(){
      var id = $(this).data('id');
      $('#printableArea2'+id).removeAttr('class');
      $('#label_blood_pressure'+id).html($('#blood_pressure'+id).val());
      $('#blood_pressure'+id).remove();

      $('#label_physician'+id).html($('#physician'+id).val());
      $('#physician'+id).remove();

      $('#label_examination_date'+id).html($('#examination_date'+id).val());
      $('#examination_date'+id).remove();

      $('#label_license_number'+id).html($('#license_number'+id).val());
      $('#license_number'+id).remove();
      
      $('#label_validity_date'+id).html($('#validity_date'+id).val());
      $('#validity_date'+id).remove();
      // console.log(id);
      var css = '@page { size: A3 orientation;margin: 1in; } td{padding: 5px;}',
      head = document.head || document.getElementsByTagName('head')[0],
      style = document.createElement('style');

      style.type = 'text/css';
      style.media = 'print';

      if (style.styleSheet){
        style.styleSheet.cssText = css;
      } else {
        style.appendChild(document.createTextNode(css));
      }

      head.appendChild(style);

      var printContents = $('#printableArea2'+id).html();
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
    });

    function getCurrentURL () {
      return window.location.href
    }

    window.addEventListener('afterprint', (event) => {
      const url = getCurrentURL();
      window.location.href = url;
    });

    function print_attendance(){
      document.title = "SLSU-Bontoc Campus Sports Management Record System";
      $('.buttons-print').click();
    }
  </script>
</body>
</html>