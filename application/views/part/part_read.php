<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Detail Part</h2>
        <table class="table">
	    <tr><td>Nama Part</td><td><?php echo $nama_part; ?></td></tr>
	    <tr><td>Jenis Part</td><td><?php echo $jenis_part; ?></td></tr>
	    <tr><td>Cycle Time</td><td><?php echo $cycle_time; ?></td></tr>
	    <tr><td>Nama Ng</td><td><?php echo $nama_ng; ?></td></tr>
	    <tr><td>Id Material</td><td><?php echo $id_material; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('part') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>     
   </section>
 </div>