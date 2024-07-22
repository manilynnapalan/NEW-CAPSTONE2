<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VMS</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/');?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/');?>dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/')?>plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/')?>custom-css.css">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/favicon_io/favicon32.png')?>">
  <style type="text/css">
    .login-page{
/*      align-items: end!important;*/
    }
    .card-primary.card-outline {
      border-top: 3px solid #007bff;
      width: 35%;
    }

    .login-sidebar{
      min-height: 100vh;
      position: relative;
      border-radius: 5px;
      z-index: 2;
      justify-content: center;
      background: #fff;
      border-radius: 0;
    }

    .login-container {
      position: absolute;
      z-index: 10;
      width: 94%;
      padding: 30px;
      top: 50%;
      margin-top: -150px;
    }

    body{
      background-color: #FFFFFF;
      background-image: url('<?= base_url('assets/images/logo.png')?>');
      background-position: 50%;
      background-repeat: no-repeat;
      overflow: hidden;
    }
    .title-container {
      position: fixed;
      width: 100%;
      bottom: 0;
      margin-top: -100px;
      left: 30px
    }
    .fade-bg {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(50,50,50,.5);
      background: linear-gradient(180deg,rgba(21,21,28,0) 0,rgba(21,21,28,.1) 40%,rgba(21,21,28,.3) 55%,rgba(21,21,28,.61) 75%,#15151c);
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card">
      <div class="card-body login-card-body">
        <label class="login-box-msg text-left" style="padding: 10px 0px; color: gray">ENTER YOUR CREDENTIALS BELOW:</label>
        <form action="<?php echo base_url('admin/login/')?>" method="post">
          <label>School ID Number</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-secret"></span>
              </div>
            </div>
          </div>

          <label>Password</label>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <a href="#" class="fas fa-eye" data-id="1" style="color: #495057;"  id="p_eye"></a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 pb-4">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn-block" style="height: 50px;border-radius: 2px;">Login</button>
            </div>
            <!-- /.col -->
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <a href="<?= base_url()?>" class="brand-text font-weight-light" style="color: black; text-decoration: underline;">Back</a>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <?php @$message = $this->input->get('m');?>
        <input type="hidden" id="hidden_text" value="<?php echo base64_decode(@$message);
          ?>">
      </div>
    </div>
  </div>
  
  <!-- /.card -->
<!-- </div> -->
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?php echo base_url('assets/adminlte/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/adminlte/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/adminlte/');?>dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url('assets/adminlte/')?>plugins/toastr/toastr.min.js"></script>
<script>
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

  $('#p_eye').click(function(e) {
    e.preventDefault();
    var pe = $('#p_eye').data('id');
    console.log(pe);
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

</script>
</body>
</html>
