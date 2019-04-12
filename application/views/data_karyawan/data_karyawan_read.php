

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Detail Data Karyawan</h2>
        <table class="table">
	    <!-- <tr><td>Password</td><td><?php echo $password; ?></td></tr> -->
	    <tr><td>Nama Karyawan</td><td><?php echo $nama_karyawan; ?></td></tr>
	    <tr><td>Jabatan Karyawan</td><td><?php echo $jabatan_karyawan; ?></td></tr>
	    <tr><td>Shift</td><td><?php echo $shift; ?></td></tr>
	    <tr><td>Id Line</td><td><?php echo $id_line; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_karyawan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
    </section>
  </div>