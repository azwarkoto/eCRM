<!doctype html>
<html>
    <head>
        <title>e-CRM | Astra Juoko Indonesia</title>
       <!-- -->
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
         <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"  type="text/css">
    <link href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
        
    </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('dasbor') ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>e-</b>CRM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>e-CRM</b> AJI</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <li><a href="<?php echo base_url();?>index.php/login/logout" <i class="fa fa-sign-in">  Keluar</a></li> </u>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url() ?>assets/dist/img/lion.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>General Affair</p>
            </div>
          </div>

      
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li><a href="<?php echo base_url('C_Beranda') ?>">
              <i class="fa fa-home text-white"></i> <span>Beranda</span></a></li>
            </a>
            <li class="header">DATA MASTER</li>
              <li class="treeview">
                <a href="<?php echo base_url('Data_barang') ?>">
                  <i class="fa fa-table"></i> <span>Data Barang</span>
                  <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('Data_barang') ?>"><i class="fa fa-circle-o"></i>Data Barang</a></li>
                  <li><a href="<?php echo base_url('Detail_barang') ?>"><i class="fa fa-circle-o"></i>Detail Barang</a></li>
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('Data_customer') ?>">
                  <i class="fa fa-user"></i> <span>Data Customer</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('Data_karyawan') ?>">
                  <i class="fa fa-users"></i> <span>Data Karyawan</span>
                </a>
              </li>
               <li class="treeview">
                <a href="<?php echo base_url('Faktur_penjualan') ?>">
                  <i class="fa fa-table"></i> <span>Faktur Penjualan</span>
                  <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('Faktur_penjualan') ?>"><i class="fa fa-circle-o"></i>Data Faktur Penjualan</a></li>
                  <li><a href="<?php echo base_url('Detail_faktur') ?>"><i class="fa fa-circle-o"></i>Detail Faktur Penjualan</a></li>
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('Data_laporan') ?>">
                  <i class="fa fa-files-o"></i> <span>Data Laporan</span>
                </a>
              </li>

              
              <li class="header">MAIN MENU</li>
              <li>
                <a href="<?php echo base_url('Material') ?>">
                  <i class="fa fa-gears"></i> <span>Data Material</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('Part') ?>">
                  <i class="fa fa-wrench"></i> <span>Data Part</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('Line') ?>">
                  <i class="fa fa-minus"></i> <span>Data Line</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('Komponen') ?>">
                  <i class="fa fa-chain"></i> <span>Data Komponen</span>
                </a>
              </li>
              
              
              <li>
                <a href="<?php echo base_url('Manufacturing_order') ?>">
                  <i class="fa fa-cog text-aqua"></i> <span>Manufacturing Order</span>
                </a>
              </li>
        <!-- /.sidebar -->
      </aside>
   
      

     <?php $this->load->view($view); ?>



    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery.chained.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js" type="text/javascript"></script>
      <!-- <script src="<?php echo base_url();?>assets/jquery/dist/jquery.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
     $('#datepicker').datepicker({
      autoclose: true
    })
    </script>
   
    </body>
</html>

