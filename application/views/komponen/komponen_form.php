<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
        <h2 style="margin-top:0px">Komponen</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Komponen <?php echo form_error('nama_komponen') ?></label>
            <input type="text" class="form-control" name="nama_komponen" id="nama_komponen" placeholder="Nama Komponen" value="<?php echo $nama_komponen; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ng <?php echo form_error('nama_ng') ?></label>
            <input type="text" class="form-control" name="nama_ng" id="nama_ng" placeholder="Nama Ng" value="<?php echo $nama_ng; ?>" />
        </div>
	    <input type="hidden" name="id_komponen" value="<?php echo $id_komponen; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('komponen') ?>" class="btn btn-default">Cancel</a>
	</form>
     </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

