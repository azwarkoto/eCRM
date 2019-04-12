
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Detail Data Laporan</h2>
        <table class="table">
	    <tr><td>Id Karyawan</td><td><?php echo $id_karyawan; ?></td></tr>
	    <tr><td>Id Part</td><td><?php echo $id_part; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $total; ?></td></tr>
	    <tr><td>No Mo</td><td><?php echo $no_mo; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_laporan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
   </section>
 </div>