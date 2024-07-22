<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMRS</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/')?>dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/')?>plugins/toastr/toastr.min.css">
  <style type="text/css">
    .active{
      background-color: #007bff;
      border-radius: 5px;
      color: #fff!important;
      font-weight: bolder;
    }
    .content{
      background-color: #FFFFFF;
      background-image: url('<?= base_url('assets/images/logo.png')?>');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      overflow: hidden;
      height: 100%;
    }
    .centered {
      position: absolute;
      top: 72%;
      left: 2%;
      width: 96%;
      background-color: rgba(255,255,255,0.5);
      color: black;
      text-align: center;
      padding: 10px;
      font-family: Cambria;
      border-radius: 10px;
      font-size: 12pt;
    }

  </style>
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <span class="navbar-brand">
          <img src="<?= base_url('assets/')?>images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">SLSU-Bontoc SMRS</span>
        </span>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="" class="nav-link <?= $this->uri->segment(2) == NULL ? 'active':''?>">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">About</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="#" class="dropdown-item">SLSU Mission & Vision</a></li>
                <li><a href="#" class="dropdown-item">SMRS & Developers</a></li>
              </ul>
            </li>
          </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a class="nav-link btn btn-primary" style="color: #fff" href="<?= base_url('admin/login_page/')?>">
              Login
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row mt-3">
          <div class="col-sm-1"></div>
          <div class="col-sm-10">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">Carousel</h3>
              </div> -->

              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <?php for($x=0;$x<count($announcements);$x++){?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $x?>" class="<?= $x==0?'active':''?>"></li>
                    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1">sda</li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2">sdaf</li> -->
                    <?php }?>
                  </ol>
                  <div class="carousel-inner">
                    <?php 
                    $x=0;
                    foreach($announcements as $value){?>
                    <div class="carousel-item <?= $x==0?'active':''?>">
                      <img class="d-block" src="<?= base_url('assets/post_images/'.$value->image)?>" style="width: 100%;height: 500px" alt="<?= $x?> slide">
                      <div class="centered">
                        <h5><?= $value->title?></h5>
                        <h6><?= $value->description?></h6>
                        <h6><em>Posted By: <?= $value->sport_team=='admin'?'ADMIN':$value->sport_team.' Coach'?></em></h6>
                      </div>
                    </div>
                    <?php $x++; }?>
                    <!-- <div class="carousel-item">
                      <img class="d-block" style="width: 100%;height: 500px" src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block" style="width: 100%;height: 500px" src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">
                    </div> -->
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-1"></div>
        </div>
      </div>
    </div>
  </div>
    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Sports Management Recording System 2023.</strong>
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
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/')?>dist/js/adminlte.min.js?v=3.2.0"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/adminlte/')?>plugins/toastr/toastr.min.js"></script>
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
</script>
</body>
</html>
