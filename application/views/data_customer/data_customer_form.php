<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>e-CRM | Astra Juoko Indonesia</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"  type="text/css">
   
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url('login') ?>"><b>e-</b>CRM</a>
      </div>
      <div class="login-box-body" style="padding: 40px;">
        <p class="login-box-msg"><b>Silahkan Register</b></p>
          <form action="<?php echo $action; ?>" method="post">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="Nama Customer" value="<?php echo $nama_customer; ?>" />
              </div>
              <div class="form-group has-feedback">
                <textarea class="form-control" rows="3" name="alamat_customer" id="alamat_customer" placeholder="Alamat Customer"><?php echo $alamat_customer; ?></textarea>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" id="datepicker" name="tanggal_lahir_customer" placeholder="Tanggal Lahir Customer"  value="<?php echo $tanggal_lahir_customer; ?>">
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="email_customer" id="email_customer" placeholder="Email Customer" value="<?php echo $email_customer; ?>" />
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="no_telpon_customer" id="no_telpon_customer" placeholder="No Telpon Customer" value="<?php echo $no_telpon_customer; ?>" />
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password Customer" value="<?php echo $password; ?>" />
              </div>
              <div class="row">
                <div class="col-xs-5">
                  <button <input type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button" value="Sign In">
                </div>
              </div>
        </form>
      </div>
    </div>


    <script src="<?php echo base_url();?>assets/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
      $('#datepicker').datepicker({
      autoclose: true
    })
    </script>
   
  </body>
</html>

