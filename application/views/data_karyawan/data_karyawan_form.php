
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Data Karyawan </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Karyawan <?php echo form_error('nama_karyawan') ?></label>
            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo $nama_karyawan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan Karyawan <?php echo form_error('jabatan_karyawan') ?></label>
            <input type="text" class="form-control" name="jabatan_karyawan" id="jabatan_karyawan" placeholder="Jabatan Karyawan" value="<?php echo $jabatan_karyawan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Shift <?php echo form_error('shift') ?></label>
            <input type="text" class="form-control" name="shift" id="shift" placeholder="Shift" value="<?php echo $shift; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Line <?php echo form_error('id_line') ?></label>
            <input type="text" class="form-control" name="id_line" id="id_line" placeholder="Id Line" value="<?php echo $id_line; ?>" />
        </div>
	    <input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_karyawan') ?>" class="btn btn-default">Cancel</a>
	</form>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


