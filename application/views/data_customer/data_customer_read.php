

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Detail Data Customer</h2>
        <table class="table">
    	    <tr><td>Nama Customer</td><td><?php echo $nama_customer; ?></td></tr>
    	    <tr><td>Alamat Customer</td><td><?php echo $alamat_customer; ?></td></tr>
    	    <tr><td>Tanggal Lahir Customer</td><td><?php echo $tanggal_lahir_customer; ?></td></tr>
    	    <tr><td>Email Customer</td><td><?php echo $email_customer; ?></td></tr>
    	    <tr><td>No Telpon Customer</td><td><?php echo $no_telpon_customer; ?></td></tr>
    	    <tr><td></td><td><a href="<?php echo site_url('data_customer') ?>" class="btn btn-default">Cancel</a></td></tr>
	     </table>
     </section>
   </div>
          