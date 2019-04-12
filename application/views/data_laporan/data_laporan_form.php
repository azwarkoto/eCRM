
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Data Laporan</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Karyawan <?php echo form_error('id_karyawan') ?></label>
            <input type="text" class="form-control" name="id_karyawan" id="id_karyawan" placeholder="Id Karyawan" value="<?php echo $id_karyawan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Part <?php echo form_error('id_part') ?></label>
            <input type="text" class="form-control" name="id_part" id="id_part" placeholder="Id Part" value="<?php echo $id_part; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total <?php echo form_error('total') ?></label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Mo <?php echo form_error('no_mo') ?></label>
            <input type="text" class="form-control" name="no_mo" id="no_mo" placeholder="No Mo" value="<?php echo $no_mo; ?>" />
        </div>
	    <input type="hidden" name="id_laporan" value="<?php echo $id_laporan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_laporan') ?>" class="btn btn-default">Cancel</a>
	</form>
  </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

